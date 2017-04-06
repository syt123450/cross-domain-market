/**
 * Created by ss on 2017/2/7.
 */
function bindEvent() {
    bindNav();
    bindAd();
    bindClickButton();
    bindLink();
    bindTop5Selector();
}

function renderLoadPage(data) {
    renderNavStoreList(data.storeNameList);
    renderAD(data.storeADList);
    renderProductList(data.productList);
    renderTop5(data.top5Data);
}

function renderAD(storeADList) {
    $(".carousel-inner>div>img:eq(0)").attr("src", storeADList[0].adSrc);
    $(".carousel-inner>div>img:eq(1)").attr("src", storeADList[1].adSrc);
    $(".carousel-inner>div>img:eq(2)").attr("src", storeADList[2].adSrc);
}

function renderTop5(top5Data) {
    var top5Area = $("main>aside>div");
    for (var i = 0; i < top5Data.length; i++) {
        renderProductItem(top5Area, top5Data[i]);
    }
}

function renderProductList(productList) {
    var productArea = $("main>section>div");
    for (var i = 0; i < productList.length; i++) {
        renderProductItem(productArea, productList[i]);
    }
}

function renderProductItem(productArea, productData) {
    var productItem = document.createElement("div");
    $(productItem).attr("data-commodityID", productData.commodityID);
    $(productItem).attr("class", "product");
    var productPic = document.createElement("img");
    $(productPic).attr("src", productData.commodityPicUrl);
    var productPricePlace = document.createElement("div");
    var productPrice = document.createElement("p");
    $(productPrice).text(productData.commodityPrice);
    var addButton = document.createElement("img");
    $(addButton).attr("src", "../img/common/pageIcon/add_to_cart1.png");
    var productName = document.createElement("p");
    $(productName).text(productData.commodityName);
    $(productPricePlace).append(productPrice);
    $(productPricePlace).append(addButton);
    $(productItem).append(productPic);
    $(productItem).append(productPricePlace);
    $(productItem).append(productName);
    $(productArea).append(productItem);
}

function bindTop5Selector() {
    $("aside>header>div>p").click(function () {
        $("aside>header>div>ul").slideDown();
    });

    $("aside>header>div>ul>li").click(function () {
        $("aside>header>div>p").text($(this).text());
        $("aside>header>div>ul").hide();
    });
}

function bindClickButton() {
    $(".product").hover(
        function () {
            $(this).children("div").children("img").attr("src", "../img/common/pageIcon/add_to_cart2.png");
        },
        function () {
            $(this).children("div").children("img").attr("src", "../img/common/pageIcon/add_to_cart1.png");
        }
    );
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

function bindLink() {
    $(".container>section>div>div, .container>aside>div>div").click(function () {
        location.href = "commodity.html";
    });
}