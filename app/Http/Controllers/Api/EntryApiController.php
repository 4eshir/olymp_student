<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\api\ChildrenEventApi;
use App\Models\api\EducationalInstitutionWorkApi;
use App\Models\api\EventApi;
use App\Models\api\MunicipalityWorkApi;
use App\Models\api\OlympiadEntryWorkApi;
use App\Models\api\SubjectApi;
use App\Models\api\UserWorkApi;
use App\Models\temporary\ChildrenEvent;
use App\Models\work\OlympiadEntryWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryApiController extends Controller
{
    public function getSubject($token, $subject_id)
    {
        return response()->json(['name' => SubjectApi::where('id', $subject_id)->first()->name]);
    }

    public function getMunicipality($token, $municipality_id)
    {
        return response()->json(['name' => MunicipalityWorkApi::where('id', $municipality_id)->first()->name]);
    }


    public function getOlympiadEntry($token, $municipality_id, $subject_id)
    {
        // КАК СЛОЖНО ДЕЛАТЬ БЛЯДСКИЕ ДЖОЙНЫ В ELOQUENT!!!

        $events = EventApi::where('subject_id', $subject_id)->where('tour', 1)->get();
        $eIds = [];
        foreach ($events as $event) $eIds[] = $event->id;

        $childrenEvents = ChildrenEventApi::whereIn('event_id', $eIds)->get();
        $ceIds = [];
        foreach ($childrenEvents as $childrenEvent) $ceIds[] = $childrenEvent->id;

        if ($municipality_id > 100) $educational = EducationalInstitutionWorkApi::where('id', $municipality_id)->get();
        else $educational = EducationalInstitutionWorkApi::where('jurisdiction_id', $municipality_id)->get();
        $educIds = [];
        foreach ($educational as $one) $educIds[] = $one->id;

        $users = UserWorkApi::whereIn('educational_institution_id', $educIds)->get();
        $uIds = [];
        foreach ($users as $user) $uIds[] = $user->id;

        $entries = OlympiadEntryWorkApi::whereIn('children_event_id', $ceIds)->whereIn('user_id', $uIds)->whereNull('status')->get();

        // КАК СЛОЖНО ДЕЛАТЬ БЛЯДСКИЕ ДЖОЙНЫ В ELOQUENT!!!

        $data = [];
        foreach ($entries as $entry)
        {
            $row = [
                'id' => $entry->id,
                'name' => $entry->user->name,
                'surname' => $entry->user->surname,
                'patronymic' => $entry->user->patronymic,
                'birthdate' => $entry->user->birthdate,
                'class' => $entry->childrenEvent->classT->name,
                'educational' => $entry->user->educational->name,
                'warrant' => $entry->warrant->name
            ];
            $data[] = $row;
        }

        return response()->json(['data' => $data]);
    }

    // Изменяет статус заявки для обучающихся
    public function checkStudents(Request $request)
    {
        $body = json_decode(file_get_contents('php://input'));

        $results = [];

        for ($i = 0; $i < count($body->data); $i++)
        {
            $olympiadEntry = OlympiadEntryWorkApi::where('id', $body->data[$i][0])->first();

            $childrenEvent = ChildrenEventApi::where('id', $olympiadEntry->children_event_id)->first();
            $subject_id = EventApi::where('id', $childrenEvent->event_id)->first()->subject_id;
            $eventsId = EventApi::where('subject_id', $subject_id)->get();
            $eventIdArr = [];
            foreach ($eventsId as $one) $eventIdArr[] = $one->id;
            $childrenEvents = ChildrenEventApi::where('class_id', $childrenEvent->class_id)->whereIn('event_id', $eventIdArr)->get();

            foreach ($childrenEvents as $childrenEventId)
                $results[] = OlympiadEntryWorkApi::where('user_id', $olympiadEntry->user_id)->where('children_event_id', $childrenEventId->id)->update(['citizenship_id' => $body->data[$i][1], 'disabled' => $body->data[$i][2], 'status' => $body->data[$i][3]]);

            //$results[] = OlympiadEntryWorkApi::where('user_id', $olympiadEntry->user_id)->update(['citizenship_id' => $body->data[$i][1], 'disabled' => $body->data[$i][2], 'status' => $body->data[$i][3]]);
        }


        return $results;
    }
}
