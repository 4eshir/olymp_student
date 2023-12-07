<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\common\WarrantInvolvement;
use App\Models\displayed\DisplayEntry;
use App\Models\temporary\ChildrenEvent;
use App\Models\temporary\ClassT;
use App\Models\temporary\Event;
use App\Models\temporary\Subject;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;
use App\Models\work\UserWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EntryController extends Controller
{
    public function create()
    {
        $model = UserWork::where('id', Auth::id())->first();
        $subjects = Subject::all();
        $entries = [];
        $warrant = WarrantInvolvement::all();

        $targetOlympiadEntries = OlympiadEntryWork::where('user_id', Auth::id())->get();

        foreach ($targetOlympiadEntries as $olympiadEntry)
        {
            $displayEntry = new DisplayEntry();
            $displayEntry->id = $olympiadEntry->id;
            $displayEntry->subject = $olympiadEntry->childrenEvent->event->subject->name;
            $displayEntry->class = $olympiadEntry->childrenEvent->classT->name;
            $displayEntry->address = $olympiadEntry->childrenEvent->address ? $olympiadEntry->childrenEvent->address : 'Скоро станет известно';
            $displayEntry->datetime = $olympiadEntry->childrenEvent->date_olympiad ?
                date("d.m.y", strtotime($olympiadEntry->childrenEvent->date_olympiad)).' в '.date("H:i", strtotime($olympiadEntry->childrenEvent->date_olympiad)) :
                'Скоро станет известно';
            $displayEntry->tour = $olympiadEntry->childrenEvent->event->tour;

            $entries[] = $displayEntry;
        }

        return view('lk.entry', ['model' => $model, 'subjects' => $subjects, 'entries' => $entries, 'warrants' => $warrant]);
    }

    public function store(Request $request)
    {
        $events = Event::where('subject_id', $request->subject)->get();

        $eIds = [];
        foreach ($events as $event) $eIds[] = $event->id;

        $childrenEvents = ChildrenEvent::whereIn('event_id', $eIds)->where('class_id', $request->participationClass)->get();

        foreach ($childrenEvents as $childrenEvent)
        {
            $duplicate = OlympiadEntryWork::where('user_id', Auth::id())->where('children_event_id', $childrenEvent->id)->get();
            if (count($duplicate) > 0)
            {
                Session::flash('flash_message', 'Вы уже записаны на выбранную олимпиаду');
            }
            else
            {
                $entry = new OlympiadEntryWork();
                $entry->user_id = Auth::id();

                $entry->children_event_id = $childrenEvent->id;
                $entry->warrant_involvement_id = $request->warrant;
                $entry->created_at = date("Y-m-d H:i:s");

                $entry->save();
            }


        }

        return redirect()->route('entry');
    }

    public function delete(Request $request)
    {
        $entry = OlympiadEntryWork::where('id', $request->entryId)->first();
        $entry->delete();
        return redirect()->route('entry');
    }

    public function dropdownClassData(Request $request)
    {
        if($request->has('subject_id')){
            $events = Event::where('subject_id', $request->get('subject_id'))->get();
            $eIds = [];
            foreach ($events as $event) $eIds[] = $event->id;

            $childrenEvent = ChildrenEvent::whereIn('event_id', $eIds)->get();
            $classes = [];
            foreach ($childrenEvent as $one) $classes[] = $one->class_id;

            $classes = array_unique($classes);

            $realClasses = ClassT::whereIn('id', $classes)->get();
            $classNumbers = [];
            $classMinimal = [];
            $classIds = [];
            foreach ($realClasses as $class)
            {
                $classNumbers[] = $class->name;
                $classMinimal[] = $class->number;
                $classIds[] = $class->id;
            }

            $userClass = UserWork::where('id', Auth::id())->first()->class;

            for ($i = 0; $i < count($classNumbers); $i++)
                if ($classMinimal[$i] < $userClass)
                {
                    unset($classNumbers[$i]);
                    unset($classMinimal[$i]);
                    unset($classIds[$i]);
                }

            $classNumbers = array_values($classNumbers);
            $classMinimal = array_values($classMinimal);
            $classIds = array_values($classIds);

            return ['success'=>true,'data'=>[$classNumbers, $classIds]];
        }
    }
}
