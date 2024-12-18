<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\api\ChildrenEventApi;
use App\Models\api\OlympiadEntryWorkApi;
use App\Models\temporary\ChildrenEvent;
use App\Models\temporary\Event;
use App\Models\temporary\Subject;
use App\Models\work\OlympiadEntryWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EntryListController extends Controller
{
    /*public function genCodes()
    {
        $subjects = Subject::where('actual', 1)->get();

        foreach ($subjects as $subject)
        {
            $events = Event::where('subject_id', $subject->id)->where('tour', 1)->get();
            $eIds = [];
            foreach ($events as $event) $eIds[] = $event->id;

            $childrenEvents = ChildrenEvent::whereIn('event_id', $eIds)->get();
            $ceIds = [];
            foreach ($childrenEvents as $childrenEvent) $ceIds[] = $childrenEvent->id;

            $entries = OlympiadEntryWork::whereIn('children_event_id', $ceIds)->where('status', 1)->get();

            $counter9 = 0;
            $counter10 = 0;
            $counter11 = 0;
            foreach ($entries as $entry)
            {
                $tempCE = ChildrenEvent::where('id', $entry->children_event_id)->first();
                $tempE = Event::where('id', $tempCE->event_id)->first();

                $class = explode(" ", $tempCE->classT->name)[0];
                $code = '';

                switch ($subject->name) {
                    case 'Техника, технологии и техническое творчество (труд/технология)':
                        $code .= 'ТТТТ_';
                        break;
                    case 'Культура дома, дизайн и технологии (труд/технология)':
                        $code .= 'ККДТ_';
                        break;
                    case 'Робототехника (труд/технология)':
                        $code .= 'Р_';
                        break;
                    case 'Информационная безопасность (труд/технология)':
                        $code .= 'ИБ_';
                        break;
                }

                $code .= strlen($class) < 2 ? '0' : '';
                $code .= $class.'_';

                if ($class == '9')
                {
                    $counter9++;
                    $counter = $counter9;
                }

                if ($class == '10')
                {
                    $counter10++;
                    $counter = $counter10;
                }

                if ($class == '11')
                {
                    $counter11++;
                    $counter = $counter11;
                }


                $code .= $counter < 100 ? '0' : '';
                $code .= $counter < 10 ? '0' : '';
                $code .= $counter.'_';

                $code .= $tempE->tour;

                $entry->code = $code;
                $entry->save();
            }
        }

    }*/

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (!Gate::allows('admin-base')) {
            abort(403);
        }

        $model = OlympiadEntryWork::select('olympiad_entry.*')
            ->join('children_event', 'olympiad_entry.children_event_id', '=', 'children_event.id')
            ->join('event', 'children_event.event_id', '=', 'event.id')
            ->join('subject', 'event.subject_id', '=', 'subject.id')
            ->where('subject.actual', true)
            ->where('event.tour', 1)->get();

        $model->temp = json_encode(Http::get(url('/api/get-entries')));

        return view('admin.entry-list.layout', ['model' => $model]);
    }

    public function downloadExcel(Request $request){
        $excelExport = [
            ['Субъект РФ', 'Код участника', 'Фамилия', 'Имя', 'Отчество', 'Пол',
                'Дата рождения', 'Гражданство', 'Ограниченные возможности здоровья',
                'Полное наименование общеобразовательной организации', 'Класс/возрастная группа участия', 'Класс обучения',
                'Является победителем/ призером заключительного этапа ВсОШ', 'Муниципалитет (округ), город', 'Обоснование участия',
                'Предмет', 'Статус заявки', 'Номер телефона участника', 'Эл.почта участника'], // Заголовки столбцов
        ];

        //$olympiadEntryAll = OlympiadEntryWork::all();
        $olympiadEntryAll = OlympiadEntryWork::select('olympiad_entry.*')
            ->join('children_event', 'olympiad_entry.children_event_id', '=', 'children_event.id')
            ->join('event', 'children_event.event_id', '=', 'event.id')
            ->join('subject', 'event.subject_id', '=', 'subject.id')
            ->where('subject.actual', true)
            ->get();
        $citizenship = ['РФ', 'Резидент', 'Иностранный гражданин'];
        $ovz = ['Нет', 'Да'];

        foreach ($olympiadEntryAll as $olympiadEntry)
        {
            if ($olympiadEntry->childrenEvent->event->tour == 1)
            $excelExport[] = ['Астраханская область', $olympiadEntry->code, $olympiadEntry->user->surname, $olympiadEntry->user->name, $olympiadEntry->user->patronymic, mb_substr($olympiadEntry->user->sex, 0, 1),
                date("d.m.Y", strtotime($olympiadEntry->user->birthdate)), $olympiadEntry->citizenship_id !== null ? $citizenship[(int)$olympiadEntry->citizenship_id] : '', $olympiadEntry->disabled !== null ? $ovz[(int)$olympiadEntry->disabled] : '',
                $olympiadEntry->user->educational->name, $olympiadEntry->childrenEvent->classT->name, $olympiadEntry->user->class,
                $olympiadEntry->warrant_involvement_id == 2 ? 'Да' : 'Нет', $olympiadEntry->user->educational->jurisdiction->name, $olympiadEntry->warrant->name,
                $olympiadEntry->childrenEvent->event->subject->name, $olympiadEntry->status == null ? 'Не рассмотрена' : ($olympiadEntry->status === 0 ? 'Отклонена' : 'Одобрена'),
                $olympiadEntry->user->phone_number, $olympiadEntry->user->email];
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($excelExport, null, 'A1');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('Заявки на ВсОШ 2024-2025.xlsx');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Заявки на ВсОШ 2024-2025.xlsx"');
        header('Cache-Control: max-age=3600');
        header('Cache-Control: max-age=3600');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Expires: ' . gmdate('r', time() + 3600));
        readfile('Заявки на ВсОШ 2024-2025.xlsx');

        // Удалить файл после скачивания
        if (file_exists('Заявки на ВсОШ 2024-2025.xlsx')) {
            unlink('Заявки на ВсОШ 2024-2025.xlsx');
        }

        exit;

    }
    /*
    public function store(Request $request)
    {
        $messages = [
            'accepted' => 'Вы должны согласиться с политикой обработки данных',
        ];

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'confirmed', PasswordCustom::defaults()],
            'phone_number' => ['required', 'unique:user'],
        ]);

        $request->validate([
            'pdPolicy' => 'accepted',
        ], $messages);


        $request->phone_number = str_replace(["(", ")", "+", "-", " "], "", $request->phone_number);
        $request->phone_number = substr_replace($request->phone_number, '8', 0, 1);

        $user = UserWork::create([
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }*/
}
