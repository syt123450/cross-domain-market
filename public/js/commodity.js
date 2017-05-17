/**
 * Created by ss on 2017/2/7.
 */

function renderLoadPage(data) {
    renderNavStoreList(data.storeNameList);
    renderCommodityInfo(data.basicCommodityInfo);
    renderDescription(data.descriptionData);
    renderComment(data.commentData);
    renderPagination(data.commentNumber/5, 1);
    renderRate(data.averageRate);
}

function renderRate(averageRate) {
    var starNumber = Math.round(averageRate);
    console.log(starNumber);
    var infoStars = $("#commodityAverageRate img");
    var addStars = $("#rateContent>img");
    for (var i = 4; i >= starNumber; i--) {

        console.log(addStars);
        $(infoStars[i]).attr("src", "../img/products/star_empty.png");
        $(addStars[i]).attr("src", "../img/products/star_empty.png");
    }
}

function renderDescription(descriptionData) {
    var descriptionArea = $("#descriptionContent");
    for (var i = 0; i < descriptionData.length; i++) {
        var paragraph = document.createElement("p");
        $(paragraph).text(descriptionData[i]);
        $(descriptionArea).append(paragraph);
    }
}

function renderComment(commentData) {

    var commentContent = $(".commentItem");
    $(commentContent).remove();

    for (var i = 0; i < commentData.length; i++) {
        var oneCommentData = commentData[i];
        var commentItem = createOneCommentItem(oneCommentData);
        $(commentItem).insertBefore("#paginationArea");
    }
}

function createOneCommentItem(oneCommentData) {
    var commentItem = document.createElement("div");
    $(commentItem).attr("class", "commentItem");
    var commentInfo = document.createElement("p");
    $(commentInfo).text(oneCommentData.commentInfo);
    var commentParagraph = document.createElement("p");
    $(commentParagraph).text(oneCommentData.commentContent);
    $(commentItem).append(commentInfo);
    $(commentItem).append(commentParagraph);

    return commentItem;
}

function renderCommodityInfo(basicCommodityInfo) {
    var commodityPic = $("main>div:eq(0)>img");
    $(commodityPic).attr("src", basicCommodityInfo.commodityPic);
    var productName = document.createElement("p");
    $(productName).text(basicCommodityInfo.commodityName);
    var productPriceArea = document.createElement("div");
    var productPrice = document.createElement("p");
    $(productPrice).text(basicCommodityInfo.commodityPrice);
    var productNumber = document.createElement("p");
    var stockInfo = "Only " + basicCommodityInfo.stock + " left in stock";
    $(productNumber).text(stockInfo);
    $(productPriceArea).append(productPrice);
    $(productPriceArea).append(productNumber);
    $("#commodityAverageRate").before($(productName));
    $("#commodityAverageRate").after($(productPriceArea));
}

function setaAllTitleInactive() {
    $("#description").attr("class", "inactiveTitle");
    $("#comment").attr("class", "inactiveTitle");
    $("#rate").attr("class", "inactiveTitle");
}

function hideAllContent() {
    $("#descriptionContent").hide();
    $("#commentContent").hide();
    $("#rateContent").hide();
}

function renderPage(pageNumber) {
    console.log(pageNumber);

    var storeID = getUrlParameter("storeID");
    var commodityID = getUrlParameter("commodityID");

    var postBody = {
        "storeID": storeID,
        "commodityID": commodityID,
        "pageID": pageNumber
    };

    $.ajax({
        url: '../commodity/getComment',
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        async: true,
        data: JSON.stringify(postBody),
        dataType: 'json',
        success: function (data) {
            console.log(data);
            renderComment(data.commentData);
            renderPagination(data.commentNumber/5, data.pageID);
        }
    });
}

function bindEvent() {
    bindNav();
    bindInfoHeader();
    bindCommentArea();
    bindRateArea();
    bindAlertArea();
}

function bindCommentArea() {
    $("#commentButton").click(function () {

        if (getCookieValue("userID") != null) {
            showAddItem();
        } else {
            showOops();
        }
    });

    $("#submitComment").click(function () {
        submitComment();
    });

    $("#cancelComment").click(function () {
        hideAddItem();
    });

}

function bindRateArea() {
    $("#rateButton").click(function () {

        if (getCookieValue("userID") != null) {
            submitRate();
        } else {
            showOops();
        }
    });
}

function bindInfoHeader() {
    $("#description").click(function () {
        setaAllTitleInactive();
        hideAllContent();
        $(this).attr("class", "activeTitle");
        $("#descriptionContent").show();
    });

    $("#comment").click(function () {

        setaAllTitleInactive();
        hideAllContent();
        $(this).attr("class", "activeTitle");
        $("#commentContent").show();
    });

    $("#rate").click(function () {
        setaAllTitleInactive();
        hideAllContent();
        $(this).attr("class", "activeTitle");
        $("#rateContent").show();
    });
}

function bindAlertArea() {
    $("#curtain").click(function () {
        hideOops();
    });

    $("#moveToSignIn").click(function () {
        location.href = "login.html";
    });

    $("#cancelOperation").click(function () {
        hideOops();
    });
}

function submitComment() {

    var userID = getCookieValue("userID");
    var storeID = getUrlParameter("storeID");
    var commodityID = getUrlParameter("commodityID");
    var comment = $("textarea").val();

    var postBody = {
        "userID": userID,
        "storeID": storeID,
        "commodityID": commodityID,
        "commentContent": comment
    };

    $.ajax({
        url: '../commodity/addComment',
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        async: true,
        data: JSON.stringify(postBody),
        dataType: 'json',
        success: function (data) {
            console.log(data);
            hideAddItem();
            renderComment(data.commentData);
            renderPagination(data.commentNumber/5, 1);
        }
    });
}

function submitRate() {

    var userID = getCookieValue("userID");
    var storeID = getUrlParameter("storeID");
    var commodityID = getUrlParameter("commodityID");
    var like = $("#likeArea>div").attr("data-rate");
    var price = $("#priceArea>div").attr("data-rate");
    var quality = $("#qualityArea>div").attr("data-rate");

    var postBody = {
        "userID": userID,
        "storeID": storeID,
        "commodityID": commodityID,
        "like": like,
        "price": price,
        "quality": quality
    };

    $.ajax({
        url: '../commodity/addRate',
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        async: true,
        data: JSON.stringify(postBody),
        dataType: 'json',
        success: function (data) {
            renderRate(data.averageRate);
        }
    });
}

function hideAddItem() {
    $("textarea").val("");
    $("#textarea").hide();
    $("#operationArea").hide();
    $("#commentButton").show();
}

function showAddItem() {
    $("#textarea").show();
    $("#operationArea").show();
    $("#commentButton").hide();
}

function showOops() {
    $("#curtain").fadeIn(300);
    $("#oops").fadeIn(300);
    $("body").css("overflow", "hidden");
}

function hideOops() {
    $("#curtain").hide();
    $("#oops").hide();
    $("body").css("overflow", "scroll");
}