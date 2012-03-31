DROP TABLE IF EXISTS `#__cursos_estube`;
 
CREATE TABLE `#__cursos_estube` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_content` int(11) NOT NULL,
 `valor` varchar(200),
 `link1` text,
 `link2` text,
 `link3` text,
 `link4` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
