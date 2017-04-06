/**
 * Created by ss on 2017/2/7.
 */


function renderLoadPage(data) {
    renderNavStoreList(data.storeNameList);
    renderCommodityInfo(data.basicCommodityInfo);
    renderDescription(data.descriptionData);
    renderComment(data.commentData);
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
    for (var i = 0; i < commentData.length; i++) {
        var oneCommentData = commentData[i];
        var commentItem = document.createElement("div");
        var commentInfo = document.createElement("p");
        $(commentInfo).text(oneCommentData.commentInfo);
        var commentContent = document.createElement("p");
        $(commentContent).text(oneCommentData.commentContent);
        $(commentItem).append(commentInfo);
        $(commentItem).append(commentContent);
        $(commentItem).insertBefore("#pagination");
    }
}

function renderCommodityInfo(basicCommodityInfo) {
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