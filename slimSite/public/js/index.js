/**
 * Created by ss on 2017/2/7.
 */

function bindEvent() {
    bindNav();
    bindAd();
    bindTop5Selector();
    bindLink();
    bindClickButton();
}

function bindAd() {
    $(".carousel-indicators li:eq(0)").hover(
        function () {
            $("#advertisement").carousel(0);
        }
    );

    $(".carousel-indicators li:eq(1)").hover(
        function () {
            $("#advertisement").carousel(1);
        }
    );

    $(".carousel-indicators li:eq(2)").hover(
        function () {
            $("#advertisement").carousel(2);
        }
    );
}

function bindTop5Selector() {

    $("#top5>header>div>p").click(function () {
        $("#top5>header>div>ul").slideDown();
    });

    $("#top5>header>div>ul>li").click(function () {
        $("#top5>header>div>p").text($(this).text());
        $("#top5>header>div>ul").hide();
    });

    $("main>#top5>header>div").hover(
        function () {},
        function () {
            $("main>#top5>header>div>ul").hide();
        }
    );
}

function bindLink() {

    $("#store>section>div").click(function () {
        location.href = "html/store.html";
    });

    $("#top5>section>div, #recentView>section>div").click(function () {
        location.href = "html/commodity.html";
    });
}

function bindClickButton() {
    $(".itemBar>section>div").hover(
        function () {
            $(this).children("div").children("img").attr("src", "img/common/pageIcon/add_to_cart2.png");
        },
        function () {
            $(this).children("div").children("img").attr("src", "img/common/pageIcon/add_to_cart1.png");
        }
    );
}