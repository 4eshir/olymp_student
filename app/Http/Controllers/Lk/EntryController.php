<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
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

class EntryController extends Controller
{
    public function create()
    {
        $model = UserWork::where('id', Auth::id())->first();
        $subjects = Subject::all();
        $entries = [];

        $targetOlympiadEntries = OlympiadEntryWork::where('user_id', Auth::id())->get();

        foreach ($targetOlympiadEntries as $olympiadEntry)
        {
            $displayEntry = new DisplayEntry();
            $displayEntry->subject = $olympiadEntry->childrenEvent->event->subject->name;
            $displayEntry->class = $olympiadEntry->childrenEvent->class;
            $displayEntry->address = $olympiadEntry->childrenEvent->address ? $olympiadEntry->childrenEvent->address : 'Скоро станет известно';
            $displayEntry->datetime = $olympiadEntry->childrenEvent->date_olympiad ?
                date("d.m.y", strtotime($olympiadEntry->childrenEvent->date_olympiad)).' в '.date("H:i", strtotime($olympiadEntry->childrenEvent->date_olympiad)) :
                'Скоро станет известно';
            $displayEntry->tour = $olympiadEntry->childrenEvent->event->tour;

            $entries[] = $displayEntry;
        }

        return view('lk.entry', ['model' => $model, 'subjects' => $subjects, 'entries' => $entries]);
    }

    public function store(Request $request)
    {
        $events = Event::where('subject_id', $request->subject)->get();

        $eIds = [];
        foreach ($events as $event) $eIds[] = $event->id;

        $childrenEvents = ChildrenEvent::whereIn('event_id', $eIds)->where('class', $request->participationClass)->get();

        foreach ($childrenEvents as $childrenEvent)
        {
            $entry = new OlympiadEntryWork();
            $entry->user_id = Auth::id();

            $entry->children_event_id = $childrenEvent->id;

            $entry->save();

        }

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
            foreach ($realClasses as $class)
            {
                $classNumbers[] = $class->name;
                $classMinimal[] = $class->number;
            }

            $userClass = UserWork::where('id', Auth::id())->first()->class;

            for ($i = 0; $i < count($classNumbers); $i++)
                if ($classMinimal[$i] < $userClass)
                    unset($classNumbers[$i]);

            $classNumbers = array_values($classNumbers);

            return ['success'=>true,'data'=>$classNumbers];
        }
    }
}
