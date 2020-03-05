CREATE TABLE IF NOT EXISTS `UserSearch` (

                            `product_id` int auto_increment not null,

                            `Product_Name` varchar(100) not null unique,

                            `date_of_search` date not null,

                            `date_modified` date not null,

                            PRIMARY KEY (`product_id`)

                            ) CHARACTER SET utf8 COLLATE utf8_general_ci


