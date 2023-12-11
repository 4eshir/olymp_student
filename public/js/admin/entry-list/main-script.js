window.onload = function () {
    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
}

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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();

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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
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

    recountTableNumber();

    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
}

function recountTableNumber()
{
    var table = document.getElementById("myTable");
    var tr = table.getElementsByTagName("tr");
    var counter = 1;
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 2; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (tr[i].style.display !== "none")
        {
            td.innerHTML = counter;
            counter += 1
        }
    }
}

function countTrTable()
{
    var table = document.getElementById("myTable");
    var tr = table.getElementsByTagName("tr");
    var len = 0;
    for (let i = 0; i < tr.length; i++)
        if (tr[i].style.display !== "none")
            len++
    return len - 2;
}
