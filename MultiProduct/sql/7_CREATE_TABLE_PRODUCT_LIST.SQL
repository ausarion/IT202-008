CREATE TABLE IF NOT EXISTS `ProductList` (

                                           `id` int auto_increment not null,

                                           `product_id` int not null,

                                           `productName` varchar(255) not null,

                                           `Url`  varchar(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL ,

                                           `date_modified` timestamp not null default current_timestamp on update current_timestamp,

                                           PRIMARY KEY (`id`)

) CHARACTER SET utf8 COLLATE utf8_general_ci