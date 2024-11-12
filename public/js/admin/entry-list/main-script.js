var markedTr = [[], [], [], [], [], [], [], [], []]

window.onload = function () {
    var elem = document.getElementById("allCount");
    elem.innerHTML = "Всего заявок: " + countTrTable();
}

function search()
{
    userSearch();
    subjectSearch();
    dateSearch();
    classSearch();
    schoolSearch();
    jurisdictionSearch()
    //tourSearch();
    dateEntrySearch();
    statusSearch();

    recountTableNumber();

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

    if (filter === "") markedTr[0].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td && !checkMarked(i)) {
            let index = markedTr[0].indexOf(i);
            if (index !== -1) markedTr[0].splice(index, 1);
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                if (index === -1) markedTr[0].push(i);
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

    if (filter === "") markedTr[1].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        let index = markedTr[1].indexOf(i);
        if (index !== -1) markedTr[1].splice(index, 1);
        if (td && !checkMarked(i)) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {
                tr[i].style.display = "none";
                markedTr[1].push(i);
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

    if (filter === "") markedTr[2].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        let index = markedTr[2].indexOf(i);
        if (index !== -1) markedTr[2].splice(index, 1);
        if (td && !checkMarked(i)) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[2].push(i);
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

    if (filter === "") markedTr[3].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td && !checkMarked(i)) {
            let index = markedTr[3].indexOf(i);
            if (index !== -1) markedTr[3].splice(index, 1);
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[3].push(i);
            }
        }
    }
}


function schoolSearch() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("schoolInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    if (filter === "") markedTr[4].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {

        td = tr[i].getElementsByTagName("td")[5];
        if (td && !checkMarked(i)) {
            let index = markedTr[4].indexOf(i);
            if (index !== -1) markedTr[4].splice(index, 1);
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[4].push(i);
            }
        }
    }
}


function jurisdictionSearch() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("jurisdictionInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    if (filter === "") markedTr[5].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[6];
        if (td && !checkMarked(i)) {
            let index = markedTr[5].indexOf(i);
            if (index !== -1) markedTr[5].splice(index, 1);
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[5].push(i);
            }
        }
    }
}


/*function tourSearch() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("tourInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    if (filter === "") markedTr[6].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[7];
        let index = markedTr[6].indexOf(i);
        if (index !== -1) markedTr[6].splice(index, 1);
        if (td && !checkMarked(i)) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[6].push(i);
            }
        }
    }
}*/


function dateEntrySearch() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("dateEntryInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    if (filter === "") markedTr[7].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[8];
        let index = markedTr[7].indexOf(i);
        if (index !== -1) markedTr[7].splice(index, 1);
        if (td && !checkMarked(i)) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[7].push(i);
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

    if (filter === "") markedTr[8].length = 0;

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[9];
        let index = markedTr[8].indexOf(i);
        if (index !== -1) markedTr[8].splice(index, 1);
        if (td && !checkMarked(i)) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                markedTr[8].push(i);
            }
        }
    }
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

function checkMarked(index)
{
    for (let i = 0; i < markedTr.length; i++)
        for (let j = 0; j < markedTr[i].length; j++)
            if (markedTr[i][j] === index)
                return true

    return false;
}
