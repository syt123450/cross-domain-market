/**
 * Created by ss on 2017/2/7.
 */

function bindEvent() {
    bindHeaderButton();
    bindNav();
}

function bindHeaderButton() {
    $("#signIn").click(function () {
        $("main").attr("class", "signIn");
        $("#signIn").attr("class", "activeTitle");
        $("#register").attr("class", "inactiveTitle");
        $("#signInContent").show();
        $("#registerContent").hide();
    });

    $("#register").click(function () {
        $("main").attr("class", "register");
        $("#signIn").attr("class", "inactiveTitle");
        $("#register").attr("class", "activeTitle");
        $("#signInContent").hide();
        $("#registerContent").show();
    });
}