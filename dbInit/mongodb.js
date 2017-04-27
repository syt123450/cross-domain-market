// Insert Store info
db.Store.insertMany(
    [
        { "StoreName" : "ZCHHolmes Education",
            "StoreID" : 1,
            "StoreLogoLarge" : "http://cmpe272.zchholmes.cc/Pic/large/store_logo.png",
            "StoreLogoSmall" : "http://cmpe272.zchholmes.cc/Pic/small/store_logo.png",
            "StoreBanner" : [
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg"
            ],
            "Domain" : "http://cmpe272.zchholmes.cc",
            "ProductList" : "http://cmpe272.zchholmes.cc/Template/allProduct.php"
        },
        { "StoreName" : "SHOP PUMA",
            "StoreID" : 2,
            "StoreLogoLarge" : "http://cmpe272.zchholmes.cc/Pic/large/store_logo.png",
            "StoreLogoSmall" : "http://cmpe272.zchholmes.cc/Pic/small/store_logo.png",
            "StoreBanner" : [
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg"
            ],
            "Domain" : "http://cmpe272.zchholmes.cc",
            "ProductList" : "http://cmpe272.zchholmes.cc/Template/allProduct.php"
        },
        { "StoreName" : "SHOP 361",
            "StoreID" : 3,
            "StoreLogoLarge" : "http://cmpe272.zchholmes.cc/Pic/large/store_logo.png",
            "StoreLogoSmall" : "http://cmpe272.zchholmes.cc/Pic/small/store_logo.png",
            "StoreBanner" : [
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg",
                "http://cmpe272.zchholmes.cc/Pic/large/store_banner.jpg"
            ],
            "Domain" : "http://cmpe272.zchholmes.cc",
            "ProductList" : "http://cmpe272.zchholmes.cc/Template/allProduct.php"
        },
        { "StoreName" : "SHOP LI-NING",
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
        },
        { "StoreName" : "SHOP NIKE",
            "StoreID" : 5,
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
);

// Insert TopProduct INFO (for initialization)
db.TopProduct.insertMany(
    [
        {
            "storeID":1,
            "storeName":"ZCHHolmes Education",
            "productID":1,
            "productName":"C\/C++ 101",
            "priceNew":"19.99",
            "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/cpp.png",
            "viewed":10,
            "rated":18,
            "rate":4.3,
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
                    "userID": 1,
                    "userName": "cmpe272",
                    "timeStamp": "04/26/2017 08:00:03",
                    "description": "lol"
                }
            ]
        },
        {
            "storeID":2,
            "storeName":"SHOP PUMA",
            "productID":2,
            "productName":"Java 101",
            "priceNew":"19.99",
            "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/java.png",
            "viewed":11,
            "rated":33,
            "rate":3.8,
            "comment" : []
        },
        {
            "storeID":3,
            "storeName":"SHOP 361",
            "productID":3,
            "productName":"Python 101",
            "priceNew":"19.99",
            "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/python.png",
            "viewed":9,
            "rated":4,
            "rate":4.9,
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
                    "userID": 1,
                    "userName": "cmpe272",
                    "timeStamp": "04/26/2017 08:00:03",
                    "description": "lol"
                }
            ]
        },
        {
            "storeID":4,
            "storeName":"SHOP LI-NING",
            "productID": 4,
            "productName": "PHP 101",
            "priceNew": "19.99",
            "smallPicUrl": "http://cmpe272.zchholmes.cc/Pic/small/php.png",
            "viewed": 5,
            "rated":18,
            "rate":2.9,
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
                    "userID": 1,
                    "userName": "cmpe272",
                    "timeStamp": "04/26/2017 08:00:03",
                    "description": "lol"
                }
            ]
        },
        {
            "storeID":5,
            "storeName":"SHOP NIKE",
            "productID":5,
            "productName":"MySQL 101",
            "priceNew":"29.99",
            "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/mysql.png",
            "viewed":1,
            "rated":81,
            "rate":4.3,
            "comment" : []
        },
        {
            "storeID":1,
            "productID":6,
            "productName":"MongoDB 101",
            "priceNew":"29.99",
            "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/mongodb.png",
            "viewed":66,
            "rated":18,
            "rate":4.3,
            "comment" : []
        }
    ]
);

// Insert test users
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
                    "storeID":1,
                    "productID":6,
                    "productName":"MongoDB 101",
                    "priceNew":"29.99",
                    "viewed":66,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/mongodb.png"
                },
                {
                    "storeID":1,
                    "storeName":"ZCHHolmes Education",
                    "productID":1,
                    "productName":"C\/C++ 101",
                    "priceNew":"19.99",
                    "viewed":10,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/cpp.png"
                },
                {
                    "storeID":4,
                    "storeName":"SHOP LI-NING",
                    "productID": 4,
                    "productName": "PHP 101",
                    "priceNew": "19.99",
                    "viewed": 5,
                    "smallPicUrl": "http://cmpe272.zchholmes.cc/Pic/small/php.png"
                },
                {
                    "storeID":5,
                    "storeName":"SHOP NIKE",
                    "productID":5,
                    "productName":"MySQL 101",
                    "priceNew":"29.99",
                    "viewed":1,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/mysql.png"
                },
                {
                    "storeID":2,
                    "storeName":"SHOP PUMA",
                    "productID":2,
                    "productName":"Java 101",
                    "priceNew":"19.99",
                    "viewed":11,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/java.png"
                },
                {
                    "storeID":3,
                    "storeName":"SHOP 361",
                    "productID":3,
                    "productName":"Python 101",
                    "priceNew":"19.99",
                    "viewed":9,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/python.png"
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
                    "storeID":1,
                    "storeName":"ZCHHolmes Education",
                    "productID":1,
                    "productName":"C\/C++ 101",
                    "priceNew":"19.99",
                    "viewed":10,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/cpp.png"
                },
                {
                    "storeID":5,
                    "storeName":"SHOP NIKE",
                    "productID":5,
                    "productName":"MySQL 101",
                    "priceNew":"29.99",
                    "viewed":1,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/mysql.png"
                },
                {
                    "storeID":1,
                    "productID":6,
                    "productName":"MongoDB 101",
                    "priceNew":"29.99",
                    "viewed":66,
                    "smallPicUrl":"http://cmpe272.zchholmes.cc/Pic/small/mongodb.png"
                }
            ]
        }
    ]
);









