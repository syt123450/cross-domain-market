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

function renderPage(data) {
    renderNavStoreList(data.storeNameList);
    renderTop5(data.top5Data);
    renderRecentView(data.recentViewData);
    renderStore(data.storeData);
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

function renderNavStoreList(storeNameList) {
    var storeListArea = $("nav>ul>li>ul:eq(0)");
    for(var i = 0; i < storeNameList.length; i++) {
        var nameLi = document.createElement("li");
        $(nameLi).attr("data-storeID", storeNameList[i].storeID);
        var nameA = document.createElement("a");
        $(nameA).attr("href", "html/store.html").text(storeNameList[i].storeName);
        $(nameLi).append(nameA);
        $(storeListArea).append(nameLi);
    }
}

function renderTop5(top5Data) {
    var top5Area = $("#top5>section");
    for (var i = 0; i < top5Data.length; i++) {
//            console.log(top5Data[i]);
        var commodityObject = document.createElement("div");
        $(commodityObject).attr("data-commodityID", top5Data[i].commodityID);
        var commodityPic = document.createElement("img");
        $(commodityPic).attr("src", top5Data[i].commodityPicUrl);
        var commodityPricePlace = document.createElement("div");
        var commodityPrice = document.createElement("p");
        $(commodityPrice).text(top5Data[i].commodityPrice);
        var addButton = document.createElement("img");
        $(addButton).attr("src", "img/common/pageIcon/add_to_cart1.png");
        var commodityName = document.createElement("p");
        $(commodityName).text(top5Data[i].commodityName);
        var commodityStore = document.createElement("p");
        $(commodityStore).text(top5Data[i].commodityStore);

        $(commodityPricePlace).append(commodityPrice);
        $(commodityPricePlace).append(addButton);

        $(commodityObject).append(commodityPic);
        $(commodityObject).append(commodityPricePlace);
        $(commodityObject).append(commodityName);
        $(commodityObject).append(commodityStore);

        $(top5Area).append(commodityObject);
    }
}

function renderStore(storeData) {
    var storeArea = $("#store>section");
    for (var i = 0; i < storeData.length; i++) {
        var storeObject = document.createElement("div");
        $(storeObject).attr("data-storeID", storeData[i].storeID);
        var storePic = document.createElement("img");
        $(storePic).attr("src", storeData[i].storePicUrl);
        var storeName = document.createElement("p");
        $(storeName).text(storeData[i].storeName);
        storeObject.append(storePic);
        storeObject.append(storeName);
        storeArea.append(storeObject);
    }
}

function renderRecentView(recentViewData) {
    var storeArea = $("#recentView>section");
    for (var i = 0; i < recentViewData.length; i++) {
//            console.log(recentViewData[i]);
        var commodityObject = document.createElement("div");
        $(commodityObject).attr("data-commodityID", recentViewData[i].commodityID);
        var commodityPic = document.createElement("img");
        $(commodityPic).attr("src", recentViewData[i].commodityPicUrl);
        var commodityPricePlace = document.createElement("div");
        var commodityPrice = document.createElement("p");
        $(commodityPrice).text(recentViewData[i].commodityPrice);
        var addButton = document.createElement("img");
        $(addButton).attr("src", "img/common/pageIcon/add_to_cart1.png");
        var commodityName = document.createElement("p");
        $(commodityName).text(recentViewData[i].commodityName);
        var commodityStore = document.createElement("p");
        $(commodityStore).text(recentViewData[i].commodityStore);

        $(commodityPricePlace).append(commodityPrice);
        $(commodityPricePlace).append(addButton);

        $(commodityObject).append(commodityPic);
        $(commodityObject).append(commodityPricePlace);
        $(commodityObject).append(commodityName);
        $(commodityObject).append(commodityStore);

        $(storeArea).append(commodityObject);
    }
}