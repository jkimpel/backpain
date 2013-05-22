-- Setup for backpain database
-- 5.21.13

CREATE TABLE `data` (
   `user` varchar(80) not null,
   `app` varchar(80) not null,
   `field` varchar(80) not null,
   `val` longtext not null,
   `time` timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
   PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;