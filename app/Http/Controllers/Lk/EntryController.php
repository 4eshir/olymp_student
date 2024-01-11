<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\common\WarrantInvolvement;
use App\Models\displayed\DisplayEntry;
use App\Models\temporary\ChildrenEvent;
use App\Models\temporary\ClassT;
use App\Models\temporary\Event;
use App\Models\temporary\ImportantDates;
use App\Models\temporary\Subject;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;
use App\Models\work\UserWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $display = new class () {
                public $id;
                public $subject;
                public $address;
                public $tour;
                public $olymp_date;
                public $olymp_time;
                public $end_checked_work;
                public $statement_points;
                public $showing_works;
                public $address_showing_works;
                public $petition_appeal;
                public $address_petition_appeal;
                public $appeal;
                public $address_appeal;
                public $publication;

                public function fill($entry) {
                    $childrenEvent = ChildrenEvent::where('id', $entry->children_event_id)->first();
                    $importantDates = ImportantDates::where('children_event_id', $childrenEvent->id)->first();

                    $this->id = $entry->id;

                    if ($childrenEvent !== null) {
                        $this->tour = $this->getTour($childrenEvent);
                        $this->subject = $this->getSubject($childrenEvent);
                        $this->address = $childrenEvent->address;
                        $this->olymp_date = date("d.m.y", strtotime(explode(" ", $childrenEvent->date_olympiad)[0]));
                        $this->olymp_time = date("H:i", strtotime(explode(" ", $childrenEvent->date_olympiad)[1]));
                    }

                    if ($importantDates !== null) {
                        $this->end_checked_work = date("d.m.y", strtotime($importantDates->end_checked_work));
                        $this->statement_points = date("d.m.y", strtotime($importantDates->statement_points));
                        $this->showing_works = date("d.m.y в H:i", strtotime($importantDates->showing_works));
                        $this->address_showing_works = $importantDates->address_showing_works;
                        $this->appeal = date("d.m.y в H:i", strtotime($importantDates->appeal));
                        $this->petition_appeal = date("d.m.y в H:i", strtotime($importantDates->petition_appeal));
                        $this->address_petition_appeal = $importantDates->address_petition_appeal;
                        $this->address_appeal = $importantDates->address_appeal;
                        $this->publication = date("d.m.y", strtotime($importantDates->publication));
                    }

                }

                private function getSubject($childrenEvent) {
                    $event = Event::where('id', $childrenEvent->event_id)->first();
                    $subject = Subject::where('id', $event->subject_id)->first();
                    return $subject->name;
                }

                private function getTour($childrenEvent) {
                    $event = Event::where('id', $childrenEvent->event_id)->first();
                    return $event->tour;
                }

                public function shortAddress($count) {
                    return strlen($this->address) > $count + 3 ? mb_substr($this->address, 0, $count)."..." : $this->address;
                }
            };

            $display->fill($olympiadEntry);

            $entries[] = $display;
        }

        return view('lk.entry', ['model' => $model, 'subjects' => $subjects, 'entries' => $entries, 'warrants' => $warrant]);
    }

    public function store(Request $request)
    {
        $events = Event::where('subject_id', $request->subject)->get();

        $eIds = [];
        foreach ($events as $event) $eIds[] = $event->id;

        $childrenEvents = ChildrenEvent::whereIn('event_id', $eIds)/*->where('class_id', $request->participationClass)*/->get();

        $duplicate = 0;
        foreach ($childrenEvents as $childrenEvent)
        {
            $duplicate = OlympiadEntryWork::where('user_id', Auth::id())->where('children_event_id', $childrenEvent->id)->get();
            if (count($duplicate) > 0)
            {
                $message = '<p>Вы не можете подать заявку на выбранную олимпиаду!</p>
                            <div style="padding: 0 45% 5%">
                                <svg fill="#dc3545" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="-0.5 0.5 42 42" xml:space="preserve">
                                    <path d="M29.582,8.683l-0.129,0.12L8.3,29.954c-0.249,0.249-0.428,0.478-0.547,0.688c-2.04-2.639-3.233-6-3.233-9.701 c0-8.797,6.626-15.482,15.421-15.482C23.632,5.459,26.955,6.644,29.582,8.683z M10.937,33.704c0.189-0.117,0.388-0.287,0.606-0.507 l21.151-21.151l0.041-0.04c1.74,2.518,2.746,5.602,2.746,8.994c0,8.785-6.696,15.541-15.481,15.541 C16.568,36.541,13.454,35.506,10.937,33.704z M0.5,21c0,10.775,8.735,19.5,19.5,19.5c10.767,0,19.501-8.725,19.501-19.5 c0-10.775-8.734-19.5-19.5-19.5C9.235,1.5,0.5,10.225,0.5,21z"/>
                                </svg>
                            </div>
                            <p>Вероятные причины: </p>
                            <p>1. Вы уже записаны на выбранную олимпиаду, проверьте это можно в разделе "мои олимпиады".</p>
                            <p>2. Подача заявок уже завершена. Установленные организаторами сроки подачи заявок прошли.</p>';
                break;
            }
        }

        if (count($duplicate) == 0)
            foreach ($childrenEvents as $childrenEvent)
            {
                if ($childrenEvent->class_id == $request->participationClass)
                {
                    $entry = new OlympiadEntryWork();
                    $entry->user_id = Auth::id();

                    $entry->children_event_id = $childrenEvent->id;
                    $entry->warrant_involvement_id = $request->warrant;
                    //$entry->created_at = strtotime(date("Y-m-d H:i:s"));

                    $entry->save();

                    $message = '<p>Вы успешно подали заявку на выбранную олимпиаду!</p>
                            <div style="padding: 0 45% 5%">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="edit_icon_gray">
                                    <path d="M17.5821 6.95711C17.9726 6.56658 17.9726 5.93342 17.5821 5.54289C17.1916 5.15237 16.5584 5.15237 16.1679 5.54289L5.54545 16.1653L1.70711 12.327C1.31658 11.9365 0.683417 11.9365 0.292893 12.327C-0.0976311 12.7175 -0.097631 13.3507 0.292893 13.7412L4.83835 18.2866C5.22887 18.6772 5.86204 18.6772 6.25256 18.2866L17.5821 6.95711Z" fill="rgb(153, 215, 244)" fill-opacity="1"/>
                                    <path d="M23.5821 6.95711C23.9726 6.56658 23.9726 5.93342 23.5821 5.54289C23.1915 5.15237 22.5584 5.15237 22.1678 5.54289L10.8383 16.8724C10.4478 17.263 10.4478 17.8961 10.8383 18.2866C11.2288 18.6772 11.862 18.6772 12.2525 18.2866L23.5821 6.95711Z" fill="#002456" fill-opacity="0.8"/>
                                </svg>
                            </div>
                            <p>Обратите внимание на дату, время, адрес и количество туров проведения выбранного Вами предмета.</p>
                            <p>Вы имеете право писать олимпиаду за класс старше, но не наоборот.</p>
                            <p>Напоминаем участникам о недопустимости использования средств связи во время проведения туров.</p>';
                }
            }

        Session::flash('flash_message', $message);

        return redirect()->route('entry');
    }

    public function delete(Request $request)
    {
        $entry = OlympiadEntryWork::where('id', $request->entryId)->first();

        $childrenEventsId = DB::select('SELECT `children_event`.`id` FROM `children_event` inner join `event` on `children_event`.`event_id` = `event`.`id` WHERE `event`.`subject_id` = (SELECT `event`.`subject_id` from `event` INNER JOIN `children_event` on `children_event`.`event_id` = `event`.`id` WHERE `children_event`.`id` = '.$entry->children_event_id.')');
        $idArr = [];
        foreach ($childrenEventsId as $one) $idArr[] = $one->id;

        $deleteEntry = OlympiadEntryWork::where('user_id', $entry->user_id)->whereIn('children_event_id', $idArr)->get();

        foreach ($deleteEntry as $entry)
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
