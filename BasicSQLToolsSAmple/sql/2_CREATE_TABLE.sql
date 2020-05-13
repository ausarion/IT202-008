CREATE TABLE IF NOT EXISTS `UserSearch` (

                            `Product_id` int auto_increment not null,

                            `Product_name` varchar(100) not null unique,

                            `date_of_search` date not null,

                            `date_modified` date not null,

                            PRIMARY KEY (`product_id`)

                            ) CHARACTER SET utf8 COLLATE utf8_general_ci


