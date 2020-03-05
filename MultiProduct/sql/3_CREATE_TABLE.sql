CREATE TABLE IF NOT EXISTS `CustomerInfo` (

                            `CustomerId` int auto_increment not null,

                            `FirstName` varchar(100) not null unique,
                            
                            `LastName` varchar(100) not null unique,
                             
                            `address` varchar(100) not null unique,
                            
                            `city` varchar(100) not null unique,
                            
                            `state` varchar(100) not null unique,
                            
                            `postal_code` int
                            
                            `date` int date not null,

                            `date_modified` date not null,

                            PRIMARY KEY (`CustomerId`)

                            ) CHARACTER SET utf8 COLLATE utf8_general_ci


