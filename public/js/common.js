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
}

function renderNavStoreList(storeNameList) {
    var storeListArea = $("nav>ul>li>ul:eq(0)");
    for (var i = 0; i < storeNameList.length; i++) {
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

function setCookie(name, value) {
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

function getCookieValue(cookieName) {
    var cookieValue = document.cookie;
    var cookieStartAt = cookieValue.indexOf("" + cookieName + "=");
    if (cookieStartAt == -1) {
        cookieStartAt = cookieValue.indexOf(cookieName + "=");
    }
    if (cookieStartAt == -1) {
        cookieValue = null;
    }
    else {
        cookieStartAt = cookieValue.indexOf("=", cookieStartAt) + 1;
        cookieEndAt = cookieValue.indexOf(";", cookieStartAt);
        if (cookieEndAt == -1) {
            cookieEndAt = cookieValue.length;
        }
        cookieValue = unescape(cookieValue.substring(cookieStartAt, cookieEndAt));
    }
    return cookieValue;
}

function deleteCookie(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function renderUser() {

    var userID = getCookieValue("userID");

    if (userID != null) {

        console.log(222);

        var userName = getCookieValue("userName");

        $("#loginArea a").text("Welcome, " + userName);
        $("#loginArea a").removeAttr("href");

        $("#loginArea").hover(
            function () {
                $("nav>ul>li>ul:eq(1)").show();
            },
            function () {
                $("nav>ul>li>ul:eq(1)").hide();
            }
        );

        $("#logOut").click(function () {

            $.ajax({
                url: '../login/logout',
                type: 'GET',
                contentType: "application/json; charset=utf-8",
                async: true,
                success: function () {
                    renderUser();
                    $("#loginArea").unbind("mouseenter").unbind("mouseleave");
                }
            });
        });

    } else {
        console.log("111");
        $("#loginArea ul").hide();
        $("#loginArea a").text("Log In");
        $("#loginArea a").attr("href", "login.html");
    }
}