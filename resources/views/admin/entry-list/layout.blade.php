<head>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="{{ asset('js/admin/entry-list/main-script.js') }}"></script>
    <link href="{{ asset('css/admin/entry-list.css') }}" rel="stylesheet"/>
</head>

<body style="background-color: #f1f1f1">
    @include('admin.entry-list.navbar')

    <p>{{ $model->temp }}</p>

    <article class="content">
        <h3 align="left">Заявки на олимпиаду</h3>
        <h5 align="left" style="color: green" id="allCount"></h5>
        <table class="table table-striped" id="myTable">
            <thead>
            <tr>
                <th></th>
                <th><input style="width: 100%" type="text" id="userInput" onkeyup="search()"></th>
                <th><input style="width: 100%" type="text" id="subjectInput" onkeyup="search()"></th>
                <th><input style="width: 100%" type="text" id="dateInput" onkeyup="search()"></th>
                <th><input style="width: 100%" type="text" id="classInput" onkeyup="search()"></th>
                <th><input style="width: 100%" type="text" id="tourInput" onkeyup="search()"></th>
                <th><input style="width: 100%" type="text" id="dateEntryInput" onkeyup="search()"></th>
                <th><input style="width: 100%" type="text" id="statusInput" onkeyup="search()"></th>
            </tr>

            <tr>
                <th></th>
                <th>Обучающийся/Обучающаяся</th>
                <th>Предмет</th>
                <th>Дата проведения</th>
                <th>Класс участия</th>
                <th>Тур</th>
                <th>Дата подачи заявки</th>
                <th>Статус заявки</th>
            </tr>
            </thead>
            <tbody>
            <?php $counter = 1; ?>
            @foreach($model as $row)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $row->user->surname ? : 'none'.' '.$row->user->name ? : 'none'.' '.$row->user->patronymic ? : 'none'.' '.$row->user->educational->name ? : 'none'.' '.$row->user->class ? : '??'.' класс' }}</td>
                    <td>{{ $row->childrenEvent->event->subject->name }}</td>
                    <td>{{ date("d.m.y", strtotime($row->childrenEvent->date_olympiad)) }}</td>
                    <td>{{ $row->childrenEvent->classT->name }}</td>
                    <td>{{ $row->childrenEvent->event->tour }} тур</td>
                    <td>{{ date("d.m.Y H:i", strtotime($row->created_at)) }}</td>
                    <td>{!! $row->prettyStatus() !!}</td>
                </tr>
                <?php $counter++ ?>
            @endforeach

            </tbody>
        </table>
    </article>


</body>
