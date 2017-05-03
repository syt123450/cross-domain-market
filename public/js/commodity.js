/**
 * Created by ss on 2017/2/7.
 */


function renderLoadPage(data) {
    renderNavStoreList(data.storeNameList);
    renderCommodityInfo(data.basicCommodityInfo);
    renderDescription(data.descriptionData);
    renderComment(data.commentData);
    renderPagination(data.commentNumber, 1);
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
        var commentItem = document.createElement("div");
        $(commentItem).attr("class", "commentItem");
        var commentInfo = document.createElement("p");
        $(commentInfo).text(oneCommentData.commentInfo);
        var commentParagraph = document.createElement("p");
        $(commentParagraph).text(oneCommentData.commentContent);
        $(commentItem).append(commentInfo);
        $(commentItem).append(commentParagraph);
        $(commentItem).insertBefore("#paginationArea");
    }
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
            renderPagination(data.commentNumber, data.pageID);
        }
    });
}