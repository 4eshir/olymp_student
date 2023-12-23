<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\api\ChildrenEventApi;
use App\Models\api\EducationalInstitutionWorkApi;
use App\Models\api\EventApi;
use App\Models\api\OlympiadEntryWorkApi;
use App\Models\api\UserWorkApi;
use App\Models\work\OlympiadEntryWork;
use Illuminate\Support\Facades\DB;

class EntryApiController extends Controller
{
    public function getOlympiadEntry($municipality_id, $subject_id)
    {
        // КАК СЛОЖНО ДЕЛАТЬ БЛЯДСКИЕ ДЖОЙНЫ В ELOQUENT!!!

        $events = EventApi::where('subject_id', $subject_id)->where('tour', 1)->get();
        $eIds = [];
        foreach ($events as $event) $eIds[] = $event->id;

        $childrenEvents = ChildrenEventApi::whereIn('id', $eIds)->get();
        $ceIds = [];
        foreach ($childrenEvents as $childrenEvent) $ceIds[] = $childrenEvent->id;

        $educational = EducationalInstitutionWorkApi::where('jurisdiction_id', $municipality_id)->get();
        $educIds = [];
        foreach ($educational as $one) $educIds[] = $one->id;

        $users = UserWorkApi::whereIn('educational_institution_id', $educIds)->get();
        $uIds = [];
        foreach ($users as $user) $uIds[] = $user->id;

        $entries = OlympiadEntryWorkApi::whereIn('children_event_id', $ceIds)->whereIn('user_id', $uIds)->get();

        // КАК СЛОЖНО ДЕЛАТЬ БЛЯДСКИЕ ДЖОЙНЫ В ELOQUENT!!!

        $ids = [];
        $data = [];
        foreach ($entries as $entry)
        {
            $ids[] = $entry->id;
            $data = $entry->getDisplayData();
        }

        return response()->json(['identifiers' => $ids, 'data' => $data]);
    }
}
