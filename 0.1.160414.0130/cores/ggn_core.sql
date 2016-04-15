-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Mars 2016 à 17:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12


-- --------------------------------------------------------

--
-- Structure de la table `ggn_native_users`
--

CREATE TABLE IF NOT EXISTS `ggn_native_users` (
  `VERS` int(11) NOT NULL AUTO_INCREMENT,
  `UKEY` varchar(199) NOT NULL,
  `ACCOUNT_TYPE` int(3) NOT NULL DEFAULT '2' COMMENT '0-Visiteur | 1-Utilisateur Temporaire | 2-Utilisateur Permanent | 3-Moderateur | 4-Administrateur | 5-Super-Administrateur | 6-System',
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` text NOT NULL,
  `PASSWORD` text NOT NULL,
  `CAPACITY` varchar(255) DEFAULT 'read:0;write:0;copy:0;share:0;update:0;cut:0;rename:0;modify:0;',
  `DECRYPKEY` text NOT NULL,
  `IDACCESS` text NOT NULL,
  `EXPIRE` bigint(20) NOT NULL DEFAULT '0',
  `ACCEPT` int(1) NOT NULL DEFAULT '0',
  `DATETIME` int(20) NOT NULL,
  PRIMARY KEY (`VERS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `ggn_native_users`
--

INSERT INTO `ggn_native_users` (`VERS`, `UKEY`, `ACCOUNT_TYPE`, `USERNAME`, `EMAIL`, `PASSWORD`, `CAPACITY`, `DECRYPKEY`, `IDACCESS`, `EXPIRE`, `ACCEPT`, `DATETIME`) VALUES
(1, '0pq8dxuwogYc3FiOm7kaVb89iuuWDIlRvPArLgJ6Bj7pEKi7usM2DC520bELOeOmsWV0Ujwdwt7EHSmd6fA75RJidpxQJL1C2Z5eK7SBRolGla8Cjie2j6DuPVVZHrAhMjAxNC0wNi0yNiAxODo1Mjo0Ng', 5, 'admin', 'admin@demo.com', 'eae3f7268597e110dc4463737363907a8ffe506292b44b557d17bcb178116832eae3f7268597e110dc4463737363907a8ffe506292b44b557d17bcb178116832cde0a10e0e03ec2fffc541a7f0a4acc6d393c601e32d1854dd99ae24f3d66b7d26b978c6aee168f59f20d16ea460929e3ba6c3821af8c9043bdd5a2b509e2ccd', 'read:1;write:1;copy:1;share:1;', 'AIbR0dwQjiXN70nX3NxXMfukxXm@:lmnpvJhSaENt0QVP5czwv9c2XUB8WlZkRSWsX@Bv8BH8CHnFED@eaKQFRw85?5YCIJ:MrWbpHwEphyBQT41Z1RJuaALBHpyls430p:4lj8aq8dAJN8AFaVCPjPCwWoq55QZMC8iINjAF6BMQu23DxMX3:JndDOUKHsfFW4TCCGDs6bPEettEhdapZKZSQHGt2WI2f8MXfCP0DafxbyAY6IoO6I1h4i3Er4DTWpBeE5DMHhNUzB3TnlBeE1EbzFNRG96TUE9PQ', 'G/::1::h8lcd9x5JrrDHHlbSFNcKCrGjNXqhe3RZWQh8bZYLoTTUd0O7QBvq9oqrKb5xKcmTWpBeE5TMHdOUzB5TkNBd01qb3hOem8wTmc9PQ', 0, 1, 1456323296);

-- --------------------------------------------------------

--
-- Structure de la table `ggn_native_users_blogs`
--

CREATE TABLE IF NOT EXISTS `ggn_native_users_blogs` (
  `VERS` int(20) NOT NULL AUTO_INCREMENT,
  `BID` varchar(32) NOT NULL,
  `UKEY` varchar(255) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `ABOUT` text NOT NULL,
  `SLUG` varchar(225) NOT NULL,
  `BLOGTYPE` varchar(128) NOT NULL,
  `COUNTRY` varchar(160) NOT NULL,
  `CITY` varchar(160) NOT NULL,
  `DATETIMES` int(20) NOT NULL,
  `AVAILABLE` int(1) NOT NULL,
  PRIMARY KEY (`VERS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;


-- --------------------------------------------------------

--
-- Structure de la table `ggn_native_users_blogs_criterions`
--

CREATE TABLE IF NOT EXISTS `ggn_native_users_blogs_criterions` (
  `VERS` int(20) NOT NULL AUTO_INCREMENT,
  `BID` varchar(128) NOT NULL,
  `CRITERION` varchar(200) NOT NULL,
  `_DATA` text NOT NULL,
  `AVAILABLE` int(1) NOT NULL,
  PRIMARY KEY (`VERS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;


-- --------------------------------------------------------

--
-- Structure de la table `ggn_native_users_identity`
--

CREATE TABLE IF NOT EXISTS `ggn_native_users_identity` (
  `VERS` int(12) NOT NULL AUTO_INCREMENT,
  `UKEY` varchar(199) NOT NULL,
  `FIRSTNAME` varchar(48) NOT NULL,
  `LASTNAME` varchar(48) NOT NULL,
  `NICKNAME` varchar(32) NOT NULL,
  `SEXE` int(1) NOT NULL DEFAULT '9',
  `NAISSANCE` year(4) NOT NULL,
  `DATETIMES` datetime NOT NULL,
  `AVAILABLE` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`VERS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ggn_native_users_identity_active`
--

CREATE TABLE IF NOT EXISTS `ggn_native_users_identity_active` (
  `VERS` int(11) NOT NULL AUTO_INCREMENT,
  `UKEY` text NOT NULL,
  `AKEY` text NOT NULL,
  `EXPIRE` bigint(20) NOT NULL,
  `AVAILABLE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`VERS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
