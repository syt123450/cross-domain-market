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
        // $(nameLi).attr("data-storeID", storeNameList[i].storeID);
        var nameA = document.createElement("a");
        $(nameA).attr("href", "store.html?storeID=" + storeNameList[i].storeID).text(storeNameList[i].storeName);
        $(nameLi).append(nameA);
        $(storeListArea).append(nameLi);
    }
}

function getUrlParameter(key) {

    var reg = new RegExp("(^|&)" + key + "=([^&]*)(&|$)");
    var result = window.location.search.substr(1).match(reg);

    if (result != null) {
        return unescape(result[2]);
    }
    return null;
}

String.prototype.format = function () {
    var args = [].slice.call(arguments);
    return this.replace(/(\{\d+\})/g, function (a) {
        return args[+(a.substr(1, a.length - 2)) || 0];
    });
};