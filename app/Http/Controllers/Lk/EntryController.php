<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\temporary\ChildrenEvent;
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

        return view('lk.entry', ['model' => $model, 'subjects' => $subjects]);
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
            $entry->participation_class = $request->participationClass;
            $entry->user_id = Auth::id();

            $entry->children_event_id = $childrenEvent->id;

            $entry->save();
        }



        return redirect()->route('default');
    }
}
