CREATE TABLE IF NOT EXISTS `NewUsers` (

                                       `id` int auto_increment not null,

                                       `FirstName` varchar(100) not null unique,

                                       `LastName` varchar(100) not null unique ,

                                       `Username` varchar(60) not null unique,

                                       `email` varchar(30) not null unique,

                                       `password` varchar(60) not null,

                                       `date_created` timestamp not null default current_timestamp,

                                       `date_modified` timestamp not null default current_timestamp on update current_timestamp,

                                       PRIMARY KEY (`id`)

) CHARACTER SET utf8 COLLATE utf8_general_ci