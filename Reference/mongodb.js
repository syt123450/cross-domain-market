/**
 * Created by zchholmes on 2017/5/18.
 */
db.Store.insertMany(
    [
        {
            "StoreName" : "ZCHHolmes Education",
            "StoreID" : 1,
            "StoreLogoLarge" : "http://cmpe272.zchholmes.cc/Pic/large/store_logo.png",
            "StoreLogoSmall" : "http://cmpe272.zchholmes.cc/Pic/small/store_logo.png",
            "StoreBanner" : [
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner_2.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner_3.jpg"
            ],
            "Domain" : "http://cmpe272.zchholmes.cc",
            "ProductList" : "http://cmpe272.zchholmes.cc/Template/allProduct.php"
        },
        {
            "StoreName" : "Figure Home",
            "StoreID" : 2,
            "StoreLogoLarge" : "http://www.syt123450.com/storeImg/logo.jpg",
            "StoreLogoSmall" : "http://www.syt123450.com/storeImg/logo.jpg",
            "StoreBanner" : [
                "http://www.syt123450.com/storeImg/1.jpg",
                "http://www.syt123450.com/storeImg/2.jpg",
                "http://www.syt123450.com/storeImg/3.jpg"
            ],
            "Domain" : "http://www.syt123450.com",
            "ProductList" : "http://www.syt123450.com/api/allProduct.php"
        },
        {
            "StoreName" : "Cupcake Seduction",
            "StoreID" : 3,
            "StoreLogoLarge" : "http://www.qiliu.info/public/index/assets/images/logo_250.png",
            "StoreLogoSmall" : "http://www.qiliu.info/public/index/assets/images/logo_155.png",
            "StoreBanner" : [
                "http://www.qiliu.info/public/index/assets/images/banner1.jpg",
                "http://www.qiliu.info/public/index/assets/images/banner2.jpg",
                "http://www.qiliu.info/public/index/assets/images/banner3.jpg"
            ],
            "Domain" : "http://www.qiliu.info",
            "ProductList" : "http://www.qiliu.info/public/index/assets/otherPages/source/allProduct.php"
        },
        {
            "StoreName" : "SHOP LI-NING",
            "StoreID" : 4,
            "StoreLogoLarge" : "http://cmpe272.zchholmes.cc/Pic/large/store_logo.png",
            "StoreLogoSmall" : "http://cmpe272.zchholmes.cc/Pic/small/store_logo.png",
            "StoreBanner" : [
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg"
            ],
            "Domain" : "http://cmpe272.zchholmes.cc",
            "ProductList" : "http://cmpe272.zchholmes.cc/Template/allProduct.php"
        }
    ]
)
;

db.User.insertMany(
    [
        {
            "userID" : 1,
            "userName" : "cmpe272",
            "password" : "cmpe272pw",
            "email" : "zhu.chenhua@sjsu.edu",
            "ifOwner" : 1,
            "recentViewed" : [
                {
                    "storeID" : 1,
                    "storeName" : "ZCHHolmes Education",
                    "productID" : 6,
                    "productName" : "MongoDB 101",
                    "priceNew" : "29.99",
                    "viewed" : 66,
                    "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/mongodb.png"
                },
                {
                    "storeID" : 1,
                    "storeName" : "ZCHHolmes Education",
                    "productID" : 1,
                    "productName" : "C/C++ 101",
                    "priceNew" : "19.99",
                    "viewed" : 10,
                    "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/cpp.png"
                }
            ]
        },
        {
            "userID" : 2,
            "userName" : "tester",
            "password" : "asdf",
            "email" : "zchholmes@gmail.com",
            "ifOwner" : 0,
            "recentViewed" : [
                {
                    "storeID" : 1,
                    "storeName" : "ZCHHolmes Education",
                    "productID" : 1,
                    "productName" : "C/C++ 101",
                    "priceNew" : "19.99",
                    "viewed" : 10,
                    "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/cpp.png"
                },
                {
                    "storeID" : 1,
                    "storeName" : "ZCHHolmes Education",
                    "productID" : 6,
                    "productName" : "MongoDB 101",
                    "priceNew" : "29.99",
                    "viewed" : 66,
                    "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/mongodb.png"
                }
            ]
        }
    ]
)
;

db.TopProduct.insertMany(
    [
        {
            "storeID" : 2,
            "storeName" : "Figure Home",
            "productID" : 2,
            "productName" : "The Adventurer of Arland: Totori",
            "priceNew" : 93.72,
            "smallPicUrl" : "http://www.syt123450.com/img/products/2.jpg",
            "viewed" : 16,
            "rated" : 1,
            "rate_avg" : 5,
            "rate_like" : 5,
            "rate_quality" : 5,
            "rate_price" : 5,
            "comment" : [
                {
                    "userID" : "3",
                    "userName" : "studentUser",
                    "timeStamp" : "05/17/2017 02:14:42am",
                    "description" : "Can't wait to get it!"
                },
                {
                    "userID" : "3",
                    "userName" : "studentUser",
                    "timeStamp" : "05/17/2017 02:14:54am",
                    "description" : "So exciting!!!"
                }
            ],
            "largePicUrl" : "http://www.syt123450.com/img/products/2.jpg"
        },
        {
            "storeID" : 3,
            "storeName" : "Cupcake Seduction",
            "productID" : 3,
            "productName" : "BLUE Sea",
            "priceNew" : 6.99,
            "smallPicUrl" : "http://www.qiliu.info/public/index/assets/otherPages/source/pic/cake3_s.jpg",
            "viewed" : 12,
            "rated" : 1,
            "rate_avg" : 5,
            "rate_like" : 5,
            "rate_quality" : 5,
            "rate_price" : 5,
            "comment" : [
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:00:00",
                    "description" : "First"
                },
                {
                    "userID" : 2,
                    "userName" : "tester",
                    "timeStamp" : "04/26/2017 08:00:01",
                    "description" : "2nd"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:00:03",
                    "description" : "lol"
                },
                {
                    "userID" : "3",
                    "userName" : "studentUser",
                    "timeStamp" : "05/17/2017 02:41:10pm",
                    "description" : "Test Comment for your cake"
                }
            ],
            "largePicUrl" : "http://www.qiliu.info/public/index/assets/otherPages/source/pic/cake3.jpg"
        },
        {
            "storeID" : 1,
            "storeName" : "ZCHHolmes Education",
            "productID" : 6,
            "productName" : "MongoDB 101",
            "priceNew" : 29.99,
            "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/mongodb.png",
            "viewed" : 67,
            "rated" : 0,
            "rate_avg" : 0,
            "rate_like" : 0,
            "rate_quality" : 0,
            "rate_price" : 0,
            "comment" : [
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:05:52pm",
                    "description" : "asdfasdf"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:06:50pm",
                    "description" : "1New Comment"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:07:13pm",
                    "description" : "2New Comment"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:08:33pm",
                    "description" : "3New Comment"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:12:43pm",
                    "description" : "7New Comment"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:14:25pm",
                    "description" : "8New Comment"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "05/15/2017 11:31:57pm",
                    "description" : "New Comment"
                }
            ],
            "largePicUrl" : "http://cmpe272.zchholmes.cc/Pic/large/mongodb.png"
        },
        {
            "storeID" : 1,
            "storeName" : "ZCHHolmes Education",
            "productID" : 1,
            "productName" : "C/C++ 101",
            "priceNew" : 19.99,
            "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/cpp.png",
            "viewed" : 15,
            "rated" : 6,
            "rate_avg" : 4.666666666666667,
            "rate_like" : 5,
            "rate_quality" : 5,
            "rate_price" : 4,
            "comment" : [
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:00:00",
                    "description" : "First"
                },
                {
                    "userID" : 2,
                    "userName" : "tester",
                    "timeStamp" : "04/26/2017 08:00:01",
                    "description" : "2nd"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:00:03",
                    "description" : "lol"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:01:03",
                    "description" : "asdf"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:02:03",
                    "description" : "hello"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:03:03",
                    "description" : "hola"
                },
                {
                    "userID" : 1,
                    "userName" : "cmpe272",
                    "timeStamp" : "04/26/2017 08:04:03",
                    "description" : "hiya"
                }
            ],
            "largePicUrl" : "http://cmpe272.zchholmes.cc/Pic/large/cpp.png",
            "rate" : 0
        },
        {
            "productID" : 2,
            "storeID" : 1,
            "storeName" : "ZCHHolmes Education",
            "productName" : "Java 101",
            "priceNew" : 19.99,
            "largePicUrl" : "http://cmpe272.zchholmes.cc/Pic/large/java.png",
            "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/java.png",
            "viewed" : 1,
            "rated" : 0,
            "rate_avg" : 0,
            "rate_like" : 0,
            "rate_quality" : 0,
            "rate_price" : 0,
            "comment" : [ ]
        },
        {
            "productID" : 5,
            "storeID" : 1,
            "storeName" : "ZCHHolmes Education",
            "productName" : "MySQL 101",
            "priceNew" : 29.99,
            "largePicUrl" : "http://cmpe272.zchholmes.cc/Pic/large/mysql.png",
            "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/mysql.png",
            "viewed" : 2,
            "rated" : 1,
            "rate_avg" : 5,
            "rate_like" : 5,
            "rate_quality" : 5,
            "rate_price" : 5,
            "comment" : [ ]
        },
        {
            "productID" : 10,
            "storeID" : 1,
            "storeName" : "ZCHHolmes Education",
            "productName" : "PHP+MySQL",
            "priceNew" : 29.99,
            "largePicUrl" : "http://cmpe272.zchholmes.cc/Pic/large/php_mysql.png",
            "smallPicUrl" : "http://cmpe272.zchholmes.cc/Pic/small/php_mysql.png",
            "viewed" : 4,
            "rated" : 0,
            "rate_avg" : 0,
            "rate_like" : 0,
            "rate_quality" : 0,
            "rate_price" : 0,
            "comment" : [ ],
            "rate" : 0
        },
        {
            "productID" : 3,
            "storeID" : 2,
            "storeName" : "Figure Home",
            "productName" : "Odin Sphere: Gwendolyn",
            "priceNew" : 119.99,
            "largePicUrl" : "http://www.syt123450.com/img/products/3.jpg",
            "smallPicUrl" : "http://www.syt123450.com/img/products/3.jpg",
            "viewed" : 1,
            "rated" : 1,
            "rate_avg" : 3.6666666666666665,
            "rate_like" : 5,
            "rate_price" : 2,
            "rate_quality" : 4,
            "comment" : [
                {
                    "userID" : "3",
                    "userName" : "studentUser",
                    "timeStamp" : "05/17/2017 02:13:04am",
                    "description" : "asdf"
                },
                {
                    "userID" : "3",
                    "userName" : "studentUser",
                    "timeStamp" : "05/17/2017 02:13:25am",
                    "description" : "Some other comments as 2nd"
                },
                {
                    "userID" : "3",
                    "userName" : "studentUser",
                    "timeStamp" : "05/17/2017 02:13:46am",
                    "description" : "Try to add the 3rd comment\nLOL"
                }
            ]
        }
    ]
)



