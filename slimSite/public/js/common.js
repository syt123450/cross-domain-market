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