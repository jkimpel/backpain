-- Setup for backpain database
-- 5.21.13

CREATE TABLE `data` (
   `user` varchar(80) not null,
   `app` varchar(80) not null,
   `field` varchar(80) not null,
   `val` longtext not null,
   `time` timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
   UNIQUE KEY (`user`,`app`,`field`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `data` (`user`, `app`, `field`, `val`, `time`) VALUES 
('joe', 'backpain', 'save', '[[], []]', '2013-05-22 02:38:31');