/**
 * Created by ss on 2017/5/2.
 */
function renderPagination(totalItem, pageNumber) {

    var totalPage = Math.ceil(totalItem / 15);
    $("#pagination").attr("data-page", pageNumber);

    switch (totalPage) {
        case 1:
            render1Pagination(pageNumber);
            break;
        case 2:
            render2Pagination(pageNumber);
            break;
        case 3:
            render3Pagination(pageNumber);
            break;
        case 4:
            render4Pagination(pageNumber);
            break;
        case 5:
            render5Pagination(pageNumber);
            break;
        default:
            renderMoreThan6Pagination(pageNumber, totalPage);
    }
}

function render1Pagination(pageNumber) {

    var pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    var lastButtonA = document.createElement("a");
    lastButtonA.setAttribute("class", "unactive-button");
    lastButtonA.innerHTML = "&laquo";
    var lastButton = document.createElement("li");
    lastButton.appendChild(lastButtonA);
    var grid1A = document.createElement("a");
    grid1A.setAttribute("class", "now-button");
    grid1A.innerHTML = "1";
    var grid1 = document.createElement("li");
    grid1.appendChild(grid1A);
    var nextButtonA = document.createElement("a");
    nextButtonA.setAttribute("class", "unactive-button");
    nextButtonA.innerHTML = "&raquo;";
    var nextButton = document.createElement("li");
    nextButton.appendChild(nextButtonA);

    pagination.appendChild(lastButton);
    pagination.appendChild(grid1);
    pagination.appendChild(nextButton);
}

function render2Pagination(pageNumber) {
    var pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    var lastButtonA = document.createElement("a");
    lastButtonA.innerHTML = "&laquo";
    var lastButton = document.createElement("li");
    lastButton.appendChild(lastButtonA);
    var grid1A = document.createElement("a");
    grid1A.innerHTML = "1";
    var grid1 = document.createElement("li");
    grid1.appendChild(grid1A);
    var grid2A = document.createElement("a");
    grid2A.innerHTML = "2";
    var grid2 = document.createElement("li");
    grid2.appendChild(grid2A);
    var nextButtonA = document.createElement("a");
    nextButtonA.innerHTML = "&raquo;";
    var nextButton = document.createElement("li");
    nextButton.appendChild(nextButtonA);

    switch (pageNumber) {
        case 1:
            lastButtonA.setAttribute("class", "unactive-button");
            grid1A.setAttribute("class", "now-button");
            grid2A.setAttribute("onclick", "renderPage(2)");
            nextButtonA.setAttribute("onclick", "renderNext()");
            break;
        case 2:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.setAttribute("class", "now-button");
            nextButtonA.setAttribute("class", "unactive-button");
            break;
    }

    pagination.appendChild(lastButton);
    pagination.appendChild(grid1);
    pagination.appendChild(grid2);
    pagination.appendChild(nextButton);
}

function render3Pagination(pageNumber) {
    var pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    var lastButtonA = document.createElement("a");
    lastButtonA.innerHTML = "&laquo";
    var lastButton = document.createElement("li");
    lastButton.appendChild(lastButtonA);
    var grid1A = document.createElement("a");
    grid1A.innerHTML = "1";
    var grid1 = document.createElement("li");
    grid1.appendChild(grid1A);
    var grid2A = document.createElement("a");
    grid2A.innerHTML = "2";
    var grid2 = document.createElement("li");
    grid2.appendChild(grid2A);
    var grid3A = document.createElement("a");
    var grid3 = document.createElement("li");
    grid3.appendChild(grid3A);
    var nextButtonA = document.createElement("a");
    nextButtonA.innerHTML = "&raquo;";
    var nextButton = document.createElement("li");
    nextButton.appendChild(nextButtonA);

    switch (pageNumber) {
        case 1:
            lastButtonA.setAttribute("class", "unactive-button");
            grid1A.setAttribute("class", "now-button");
            grid2A.setAttribute("onclick", "renderPage(2)");
            grid3A.innerHTML = "...";
            grid3A.setAttribute("class", "unactive-button");
            nextButtonA.setAttribute("onclick", "renderNext()");
            break;
        case 2:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.setAttribute("class", "now-button");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("onclick", "renderPage(3)");
            nextButtonA.setAttribute("onclick", "renderNext()");
            break;
        case 3:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.setAttribute("onclick", "renderPage(2)");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("class", "now-button");
            nextButtonA.setAttribute("class", "unactive-button");
            break;
    }

    pagination.appendChild(lastButton);
    pagination.appendChild(grid1);
    pagination.appendChild(grid2);
    pagination.appendChild(grid3);
    pagination.appendChild(nextButton);
}

function render4Pagination(pageNumber) {
    var pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    var lastButtonA = document.createElement("a");
    lastButtonA.innerHTML = "&laquo";
    var lastButton = document.createElement("li");
    lastButton.appendChild(lastButtonA);
    var grid1A = document.createElement("a");
    grid1A.innerHTML = "1";
    var grid1 = document.createElement("li");
    grid1.appendChild(grid1A);
    var grid2A = document.createElement("a");
    var grid2 = document.createElement("li");
    grid2.appendChild(grid2A);
    var grid3A = document.createElement("a");
    grid3A.innerHTML = "3";
    var grid3 = document.createElement("li");
    grid3.appendChild(grid3A);
    var grid4A = document.createElement("a");
    var grid4 = document.createElement("li");
    grid4.appendChild(grid4A);
    var nextButtonA = document.createElement("a");
    nextButtonA.innerHTML = "&raquo;";
    var nextButton = document.createElement("li");
    nextButton.appendChild(nextButtonA);

    switch (pageNumber) {
        case 1:
            lastButtonA.setAttribute("class", "unactive-button");
            grid1A.setAttribute("class", "now-button");
            grid2A.innerHTML = "2";
            grid2A.setAttribute("onclick", "renderPage(2)");
            grid3A.innerHTML = "...";
            grid3A.setAttribute("class", "unactive-button");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(nextButton);
            break;
        case 2:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "2";
            grid2A.setAttribute("class", "now-button");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("onclick", "renderPage(3)");
            grid4A.innerHTML = "...";
            grid4A.setAttribute("class", "unactive-button");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(nextButton);
            break;
        case 3:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "2";
            grid2A.setAttribute("onclick", "renderPage(2)");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("class", "now-button");
            grid4A.innerHTML = "4";
            grid4A.setAttribute("onclick", "renderPage(4)");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(nextButton);
            break;
        case 4:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "...";
            grid2A.setAttribute("class", "unactive-button");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("onclick", "now-button");
            grid4A.innerHTML = "4";
            grid4A.setAttribute("class", "now-button");
            nextButtonA.setAttribute("class", "unactive-button");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(nextButton);
            break;
    }
}

function render5Pagination(pageNumber) {
    var pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    var lastButtonA = document.createElement("a");
    lastButtonA.innerHTML = "&laquo";
    var lastButton = document.createElement("li");
    lastButton.appendChild(lastButtonA);
    var grid1A = document.createElement("a");
    grid1A.innerHTML = "1";
    var grid1 = document.createElement("li");
    grid1.appendChild(grid1A);
    var grid2A = document.createElement("a");
    var grid2 = document.createElement("li");
    grid2.appendChild(grid2A);
    var grid3A = document.createElement("a");
    var grid3 = document.createElement("li");
    grid3.appendChild(grid3A);
    var grid4A = document.createElement("a");
    var grid4 = document.createElement("li");
    grid4.appendChild(grid4A);
    var grid5A = document.createElement("a");
    var grid5 = document.createElement("li");
    grid5.appendChild(grid5A);
    var nextButtonA = document.createElement("a");
    nextButtonA.innerHTML = "&raquo;";
    var nextButton = document.createElement("li");
    nextButton.appendChild(nextButtonA);

    switch (pageNumber) {
        case 1:
            lastButtonA.setAttribute("class", "unactive-button");
            grid1A.setAttribute("class", "now-button");
            grid2A.innerHTML = "2";
            grid2A.setAttribute("onclick", "renderPage(2)");
            grid3A.innerHTML = "...";
            grid3A.setAttribute("class", "unactive-button");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(nextButton);
            break;
        case 2:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "2";
            grid2A.setAttribute("class", "now-button");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("onclick", "renderPage(3)");
            grid4A.innerHTML = "...";
            grid4A.setAttribute("class", "unactive-button");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(nextButton);
            break;
        case 3:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "2";
            grid2A.setAttribute("onclick", "renderPage(2)");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("class", "now-button");
            grid4A.innerHTML = "4";
            grid4A.setAttribute("onclick", "renderPage(4)");
            grid5A.innerHTML = "...";
            grid5A.setAttribute("class", "unactive-button");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(grid5);
            pagination.appendChild(nextButton);
            break;
        case 4:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "...";
            grid2A.setAttribute("class", "unactive-button");
            grid3A.innerHTML = "3";
            grid3A.setAttribute("onclick", "renderPage(3)");
            grid4A.innerHTML = "4";
            grid4A.setAttribute("class", "now-button");
            grid5A.innerHTML = "5";
            grid5A.setAttribute("onclick", "renderPage(5)");
            nextButtonA.setAttribute("onclick", "renderNext()");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(grid5);
            pagination.appendChild(nextButton);
            break;
        case 5:
            lastButtonA.setAttribute("onclick", "renderLast()");
            grid1A.setAttribute("onclick", "renderPage(1)");
            grid2A.innerHTML = "...";
            grid2A.setAttribute("class", "unactive-button");
            grid3A.innerHTML = "4";
            grid3A.setAttribute("onclick", "renderPage(4)");
            grid4A.innerHTML = "5";
            grid4A.setAttribute("class", "now-button");
            nextButtonA.setAttribute("class", "unactive-button");
            pagination.appendChild(lastButton);
            pagination.appendChild(grid1);
            pagination.appendChild(grid2);
            pagination.appendChild(grid3);
            pagination.appendChild(grid4);
            pagination.appendChild(nextButton);
            break;
    }
}

function renderMoreThan6Pagination(pageNumber, totalPage) {

    var pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    var lastButtonA = document.createElement("a");
    lastButtonA.innerHTML = "&laquo";
    var lastButton = document.createElement("li");
    lastButton.appendChild(lastButtonA);
    var grid1A = document.createElement("a");
    grid1A.innerHTML = "1";
    var grid1 = document.createElement("li");
    grid1.appendChild(grid1A);
    var grid2A = document.createElement("a");
    var grid2 = document.createElement("li");
    grid2.appendChild(grid2A);
    var grid3A = document.createElement("a");
    var grid3 = document.createElement("li");
    grid3.appendChild(grid3A);
    var grid4A = document.createElement("a");
    var grid4 = document.createElement("li");
    grid4.appendChild(grid4A);
    var grid5A = document.createElement("a");
    var grid5 = document.createElement("li");
    grid5.appendChild(grid5A);
    var grid6A = document.createElement("a");
    var grid6 = document.createElement("li");
    grid6.appendChild(grid6A);
    var nextButtonA = document.createElement("a");
    nextButtonA.innerHTML = "&raquo;";
    var nextButton = document.createElement("li");
    nextButton.appendChild(nextButtonA);

    if (pageNumber == 1) {
        lastButtonA.setAttribute("class", "unactive-button");
        grid1A.setAttribute("class", "now-button");
        grid2A.innerHTML = "2";
        grid2A.setAttribute("onclick", "renderPage(2)");
        grid3A.innerHTML = "...";
        grid3A.setAttribute("class", "unactive-button");
        nextButtonA.setAttribute("onclick", "renderNext()");
        pagination.appendChild(lastButton);
        pagination.appendChild(grid1);
        pagination.appendChild(grid2);
        pagination.appendChild(grid3);
        pagination.appendChild(nextButton);
    }
    else if (pageNumber == 2) {
        lastButtonA.setAttribute("onclick", "renderLast()");
        grid1A.setAttribute("onclick", "renderPage(1)");
        grid2A.innerHTML = "2";
        grid2A.setAttribute("class", "now-button");
        grid3A.innerHTML = "3";
        grid3A.setAttribute("onclick", "renderPage(3)");
        grid4A.innerHTML = "...";
        grid4A.setAttribute("class", "unactive-button");
        nextButtonA.setAttribute("onclick", "renderNext()");
        pagination.appendChild(lastButton);
        pagination.appendChild(grid1);
        pagination.appendChild(grid2);
        pagination.appendChild(grid3);
        pagination.appendChild(grid4);
        pagination.appendChild(nextButton);
    }
    else if (pageNumber == 3) {
        lastButtonA.setAttribute("onclick", "renderLast()");
        grid1A.setAttribute("onclick", "renderPage(1)");
        grid2A.innerHTML = "2";
        grid2A.setAttribute("onclick", "renderPage(2)");
        grid3A.innerHTML = "3";
        grid3A.setAttribute("class", "now-button");
        grid4A.innerHTML = "4";
        grid4A.setAttribute("onclick", "renderPage(4)");
        grid5A.innerHTML = "...";
        grid5A.setAttribute("class", "unactive-button");
        nextButtonA.setAttribute("onclick", "renderNext()");
        pagination.appendChild(lastButton);
        pagination.appendChild(grid1);
        pagination.appendChild(grid2);
        pagination.appendChild(grid3);
        pagination.appendChild(grid4);
        pagination.appendChild(grid5);
        pagination.appendChild(nextButton);
    }
    else if (pageNumber > 3 && pageNumber < (totalPage - 1)) {
        lastButtonA.setAttribute("onclick", "renderLast()");
        grid1A.setAttribute("onclick", "renderPage(1)");
        grid2A.innerHTML = "...";
        grid2A.setAttribute("class", "unactive-button");
        grid3A.innerHTML = pageNumber - 1;
        grid3A.setAttribute("onclick", "renderPage({0})".format(pageNumber - 1));
        grid4A.innerHTML = pageNumber;
        grid4A.setAttribute("class", "now-button");
        grid5A.innerHTML = pageNumber + 1;
        grid5A.setAttribute("onclick", "renderPage({0})".format(pageNumber + 1));
        grid6A.innerHTML = "...";
        grid6A.setAttribute("class", "unactive-button");
        nextButtonA.setAttribute("onclick", "renderNext()");
        pagination.appendChild(lastButton);
        pagination.appendChild(grid1);
        pagination.appendChild(grid2);
        pagination.appendChild(grid3);
        pagination.appendChild(grid4);
        pagination.appendChild(grid5);
        pagination.appendChild(grid6);
        pagination.appendChild(nextButton);
    }
    else if (pageNumber == (totalPage - 1)) {
        lastButtonA.setAttribute("onclick", "renderLast()");
        grid1A.setAttribute("onclick", "renderPage(1)");
        grid2A.innerHTML = "...";
        grid2A.setAttribute("class", "unactive-button");
        grid3A.innerHTML = totalPage - 2;
        grid3A.setAttribute("onclick", "renderPage({0})".format(pageNumber - 1));
        grid4A.innerHTML = totalPage - 1;
        grid4A.setAttribute("class", "now-button");
        grid5A.innerHTML = totalPage;
        grid5A.setAttribute("onclick", "renderPage({0})".format(pageNumber + 1));
        nextButtonA.setAttribute("onclick", "renderNext()");
        pagination.appendChild(lastButton);
        pagination.appendChild(grid1);
        pagination.appendChild(grid2);
        pagination.appendChild(grid3);
        pagination.appendChild(grid4);
        pagination.appendChild(grid5);
        pagination.appendChild(nextButton);
    }
    else {
        lastButtonA.setAttribute("onclick", "renderLast()");
        grid1A.setAttribute("onclick", "renderPage(1)");
        grid2A.innerHTML = "...";
        grid2A.setAttribute("class", "unactive-button");
        grid3A.innerHTML = totalPage - 1;
        grid3A.setAttribute("onclick", "renderPage({0})".format(pageNumber - 1));
        grid4A.innerHTML = totalPage;
        grid4A.setAttribute("class", "now-button");
        nextButtonA.setAttribute("class", "unactive-button");
        pagination.appendChild(lastButton);
        pagination.appendChild(grid1);
        pagination.appendChild(grid2);
        pagination.appendChild(grid3);
        pagination.appendChild(grid4);
        pagination.appendChild(nextButton);
    }
}

function renderLast() {
    var page = $("#pagination").attr("data-page");
    renderPage(--page);
}

function renderNext() {
    var page = $("#pagination").attr("data-page");
    renderPage(++page);
}