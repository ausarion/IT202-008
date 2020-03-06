CREATE TABLE IF NOT EXISTS `CustomerInfo` (

                            `CustomerId` int(3) auto_increment not null,

                            `ContactName` varchar(100) not null unique,
                             
                            `address` varchar(100) not null unique,
                            
                            `City` varchar(100) not null unique,
                            
                            `State` varchar(100) not null unique,
                            
                            `PostalCode` int(30),

                            PRIMARY KEY (`CustomerId`)

                            ) CHARACTER SET utf8 COLLATE utf8_general_ci


