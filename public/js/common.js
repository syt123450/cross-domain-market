/**
 * Created by ss on 2017/2/7.
 */

function bindNav() {

    $("nav>ul>li:eq(1)").hover(
        function () {
            $("nav>ul>li>ul:eq(0)").show();
        },
        function () {
            $("nav>ul>li>ul:eq(0)").hide();
        }
    );

    $("nav>ul>li:eq(3)").hover(
        function () {
            $("nav>ul>li>ul:eq(1)").show();
        },
        function () {
            $("nav>ul>li>ul:eq(1)").hide();
        }
    );
}

function renderNavStoreList(storeNameList) {
    var storeListArea = $("nav>ul>li>ul:eq(0)");
    for(var i = 0; i < storeNameList.length; i++) {
        var nameLi = document.createElement("li");
        $(nameLi).attr("data-storeID", storeNameList[i].storeID);
        var nameA = document.createElement("a");
        $(nameA).attr("href", "store.html").text(storeNameList[i].storeName);
        $(nameLi).append(nameA);
        $(storeListArea).append(nameLi);
    }
}