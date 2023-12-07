<head>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>


<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin-top: 0px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        border-width: 1px 1px 0;
        background-color: #f7f7f7;
    }

    .content {
        margin: 20px;
    }

    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination button {
        padding: 5px 10px;
        margin: 0 5px;
        cursor: pointer;
        outline: 1px solid #494a4f;
        border-radius: 1px;
        border: none;
    }

    .hidden {
        clip: rect(0 0 0 0);
        clip-path: inset(50%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .pagination button.active {
        background-color: #007bff;
        color: white;
    }
</style>





<article class="content">
    <table class="table table-striped" id="myTable">
        <thead>
        <tr>
            <th></th>
            <th><input style="width: 100%" type="text" id="userInput" onkeyup="userSearch()"></th>
            <th><input style="width: 100%" type="text" id="subjectInput" onkeyup="subjectSearch()"></th>
            <th><input style="width: 100%" type="text" id="dateInput" onkeyup="dateSearch()"></th>
            <th><input style="width: 100%" type="text" id="classInput" onkeyup="classSearch()"></th>
            <th><input style="width: 100%" type="text" id="tourInput" onkeyup="tourSearch()"></th>
            <th><input style="width: 100%" type="text" id="dateEntryInput" onkeyup="dateEntrySearch()"></th>
            <th><input style="width: 100%" type="text" id="statusInput" onkeyup="statusSearch()"></th>
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
                <td>{{ $row->user->surname.' '.$row->user->name.' '.$row->user->patronymic.' '.$row->user->educational->name.' '.$row->user->class.' класс' }}</td>
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





<script>
    /*document.addEventListener('DOMContentLoaded', function () {
        const content = document.querySelector('.content');
        const itemsPerPage = 10;
        let currentPage = 0;
        const items = Array.from(content.getElementsByTagName('tr')).slice(1);

        function showPage(page) {
            const startIndex = page * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            items.forEach((item, index) => {
                item.classList.toggle('hidden', index < startIndex || index >= endIndex);
            });
            updateActiveButtonStates();
        }

        function createPageButtons() {
            const totalPages = Math.ceil(items.length / itemsPerPage);
            const paginationContainer = document.createElement('div');
            const paginationDiv = document.body.appendChild(paginationContainer);
            paginationContainer.classList.add('pagination');

            // Add page buttons
            for (let i = 0; i < totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i + 1;
                pageButton.classList.add("page-link");
                pageButton.addEventListener('click', () => {
                    currentPage = i;
                    showPage(currentPage);
                    updateActiveButtonStates();
                });

                content.appendChild(paginationContainer);
                paginationDiv.appendChild(pageButton);
            }
        }

        function updateActiveButtonStates() {
            const pageButtons = document.querySelectorAll('.pagination button');
            pageButtons.forEach((button, index) => {
                if (index === currentPage) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        }

        createPageButtons(); // Call this function to create the page buttons initially
        showPage(currentPage);
    });
*/

    function userSearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("userInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function subjectSearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("subjectInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function dateSearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("dateInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function classSearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("classInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function tourSearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("tourInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function dateEntrySearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("dateEntryInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function statusSearch() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("statusInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[7];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
