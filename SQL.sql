-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 16 Feb 2011 om 16:09
-- Serverversie: 5.1.36
-- PHP-Versie: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `faabdesign`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `avatar`
--

CREATE TABLE IF NOT EXISTS `avatar` (
  `userid` int(11) NOT NULL,
  `extension` text NOT NULL,
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `avatar`
--

INSERT INTO `avatar` (`userid`, `extension`) VALUES
(1, 'png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `userid` int(11) NOT NULL,
  `expires` varchar(50) NOT NULL,
  `permanent` int(11) NOT NULL,
  `expired` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `bans`
--

INSERT INTO `bans` (`userid`, `expires`, `permanent`, `expired`, `comment`) VALUES
(1, '10000000', 0, 1, 'Test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `menus`
--

INSERT INTO `menus` (`id`, `menuid`, `name`, `link`) VALUES
(2, 3, 'Show Memberlist', '/memberlist.php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `middlenews`
--

CREATE TABLE IF NOT EXISTS `middlenews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `threadid` int(11) NOT NULL,
  `usethread` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `middlenews`
--

INSERT INTO `middlenews` (`id`, `threadid`, `usethread`, `title`, `text`) VALUES
(1, 1, 0, 'Welcome', 'Welcome at FaabTech!');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `p1` text NOT NULL,
  `p2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `news`
--

INSERT INTO `news` (`id`, `title`, `p1`, `p2`) VALUES
(1, 'FaabBB Revision 2.1 Released', '<img style="margin-top: -50px;margin-right: -10px; vertical-align: baseline;" align="right" src="images/screen1.png" /> ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non nisi vitae mauris facilisis pharetra non nec quam. Pellentesque est odio, fermentum a vestibulum a, lacinia id tortor. Nunc tempus, ante in gravida tincidunt, quam leo fringilla sem, eu dapibus odio est ac velit. Maecenas tristique varius facilisis. Nam volutpat urna id felis porta pellentesque. Cras eget arcu sit amet ligula ornare cursus a vel quam. Vivamus quis justo quam, a bibendum lacus. Pellentesque feugiat risus eget dui ultricies luctus. Etiam vitae dui ut odio sollicitudin pellentesque ut ac magna. Duis posuere tempus scelerisque. Morbi et purus in nibh pharetra sagittis. Duis et lacus arcu. Morbi vestibulum ultrices justo pretium gravida. Curabitur et fermentum ligula.'),
(3, 'FaabBB Revision 2.0 Released', '<img style="margin-top: -50px;margin-right: -10px; vertical-align: baseline;" align="right" src="images/screen1.png" />', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non nisi vitae mauris facilisis pharetra non nec quam. Pellentesque est odio, fermentum a vestibulum a, lacinia id tortor. Nunc tempus, ante in gravida tincidunt, quam leo fringilla sem, eu dapibus odio est ac velit. Maecenas tristique varius facilisis. Nam volutpat urna id felis porta pellentesque. Cras eget arcu sit amet ligula ornare cursus a vel quam. Vivamus quis justo quam, a bibendum lacus. Pellentesque feugiat risus eget dui ultricies luctus. Etiam vitae dui ut odio sollicitudin pellentesque ut ac magna. Duis posuere tempus scelerisque. Morbi et purus in nibh pharetra sagittis. Duis et lacus arcu. Morbi vestibulum ultrices justo pretium gravida. Curabitur et fermentum ligula.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateline` text NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `fromusername` varchar(30) NOT NULL,
  `touserid` int(11) NOT NULL,
  `unreaded` int(11) NOT NULL,
  `text` text NOT NULL,
  `title` text NOT NULL,
  `deleted` int(11) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `pm`
--

INSERT INTO `pm` (`id`, `dateline`, `fromuserid`, `fromusername`, `touserid`, `unreaded`, `text`, `title`, `deleted`, `reason`) VALUES
(4, '211110141144', 28, 'Loller', 27, 1, 'test', 'Test', 0, ''),
(5, '141210161733', 28, 'Loller', 27, 1, 'Yo', 'Test2', 0, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `readedthreads`
--

CREATE TABLE IF NOT EXISTS `readedthreads` (
  `threadid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateline` bigint(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `readedthreads`
--

INSERT INTO `readedthreads` (`threadid`, `userid`, `dateline`) VALUES
(1, 0, 281210173550),
(1, 0, 281210173550),
(2, 0, 10111111208),
(3, 0, 10111111757),
(4, 0, 222140),
(5, 0, 110101112148),
(6, 0, 20110101112255),
(7, 0, 20110101112423),
(8, 0, 20110101112442),
(0, 0, 150111095941),
(0, 0, 20110115103857),
(2, 0, 20110115104223);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `postid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL DEFAULT '0',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `pagetext` mediumtext,
  `allowsmilie` smallint(6) NOT NULL DEFAULT '0',
  `showsignature` smallint(6) NOT NULL DEFAULT '0',
  `ipaddress` char(15) NOT NULL DEFAULT '',
  `iconid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `visible` smallint(6) NOT NULL DEFAULT '0',
  `attach` smallint(5) unsigned NOT NULL DEFAULT '0',
  `infraction` smallint(5) unsigned NOT NULL DEFAULT '0',
  `reportthreadid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `replies`
--

INSERT INTO `replies` (`postid`, `threadid`, `parentid`, `username`, `userid`, `title`, `dateline`, `pagetext`, `allowsmilie`, `showsignature`, `ipaddress`, `iconid`, `visible`, `attach`, `infraction`, `reportthreadid`) VALUES
(1, 1, 0, 'Fabian M', 1, 'test', 0, 'test', 0, 0, '', 0, 1, 0, 0, 0),
(2, 0, 0, 'Fabian M', 1, 'lol', 0, 'lol', 0, 0, '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `childof` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `rights` int(11) NOT NULL,
  `posts` int(11) NOT NULL,
  `threads` int(11) NOT NULL,
  `lastposter` varchar(45) NOT NULL,
  `lastposterid` int(11) NOT NULL,
  `lastpostid` int(11) NOT NULL,
  `lastpost` varchar(45) NOT NULL,
  `dateline` varchar(45) NOT NULL,
  `visiblefor` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `section`
--

INSERT INTO `section` (`id`, `name`, `description`, `childof`, `closed`, `rights`, `posts`, `threads`, `lastposter`, `lastposterid`, `lastpostid`, `lastpost`, `dateline`, `visiblefor`, `visible`) VALUES
(1, 'FaabTech', 'test', 0, 1, 0, 0, 0, '0', 0, 0, '0', '', 0, 0),
(2, 'News &amp; Announcements', 'All the news, updates and other important things will be posted here.', 1, 0, 5, 0, 1, 'Fabian M', 0, 2, 'Test', '15/01/11 10:42:24', 0, 0),
(3, 'Feedback', 'Do you have a nice suggestion for us to add to our site, or just a rant about something? Please post them here and we&#039;ll do something about it!', 1, 0, 0, 0, 0, '0', 0, 0, '0', '', 0, 0),
(4, 'Suggestions', 'Any suggestion? Post &#039;em here.', 3, 0, 0, 0, 0, '0', 0, 0, '0', '', 0, 0),
(5, 'Complaints', 'Something to rant about?', 3, 0, 0, 0, 0, '0', 0, 0, '0', '', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sectional`
--

CREATE TABLE IF NOT EXISTS `sectional` (
  `userid` int(11) NOT NULL,
  `boardid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `sectional`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `siteName` text NOT NULL,
  `AddThis` text NOT NULL,
  `themeCopyright` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `settings`
--

INSERT INTO `settings` (`siteName`, `AddThis`, `themeCopyright`) VALUES
('FaabTech', 'true', '&copy; FaabTech | <a href="http://''.scriptUrl.''/contact.php">Contact</a> | <a href="http://''.scriptUrl.''/faq.php">FAQ</a> | <a href="http://''.scriptUrl.''/support.php">Support</a> | <a href="http://''.scriptUrl.''/about.php">About us</a>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shortnews`
--

CREATE TABLE IF NOT EXISTS `shortnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `threadid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `shortnews`
--

INSERT INTO `shortnews` (`id`, `threadid`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `styleid` int(11) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `creator` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`styleid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `themes`
--

INSERT INTO `themes` (`styleid`, `path`, `creator`, `name`) VALUES
(0, 'default', 'FaabTech', 'Default');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `threadid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `prefixid` varchar(25) NOT NULL DEFAULT '',
  `firstpostid` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpostid` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `forumid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `pollid` int(10) unsigned NOT NULL DEFAULT '0',
  `open` smallint(6) NOT NULL DEFAULT '0',
  `replycount` int(10) unsigned NOT NULL DEFAULT '0',
  `hiddencount` int(10) unsigned NOT NULL DEFAULT '0',
  `deletedcount` int(10) unsigned NOT NULL DEFAULT '0',
  `postusername` varchar(100) NOT NULL DEFAULT '',
  `postuserid` int(10) unsigned NOT NULL DEFAULT '0',
  `lastposter` varchar(100) NOT NULL DEFAULT '',
  `lastposterid` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` varchar(30) NOT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `iconid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `notes` varchar(250) NOT NULL DEFAULT '',
  `visible` smallint(6) NOT NULL DEFAULT '0',
  `sticky` smallint(6) NOT NULL DEFAULT '0',
  `votenum` smallint(5) unsigned NOT NULL DEFAULT '0',
  `votetotal` smallint(5) unsigned NOT NULL DEFAULT '0',
  `attach` smallint(5) unsigned NOT NULL DEFAULT '0',
  `similar` varchar(55) NOT NULL DEFAULT '',
  `taglist` mediumtext,
  `keywords` mediumtext,
  `lastpostdate` varchar(30) NOT NULL,
  `absdate` bigint(20) NOT NULL,
  `aproved` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`threadid`),
  KEY `postuserid` (`postuserid`),
  KEY `pollid` (`pollid`),
  KEY `forumid` (`forumid`,`visible`,`sticky`,`lastpost`),
  KEY `forumid_lastpost` (`forumid`,`lastpost`),
  KEY `lastpost` (`lastpost`),
  KEY `dateline` (`dateline`),
  KEY `prefixid` (`prefixid`,`forumid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `threads`
--

INSERT INTO `threads` (`threadid`, `title`, `prefixid`, `firstpostid`, `lastpostid`, `lastpost`, `forumid`, `pollid`, `open`, `replycount`, `hiddencount`, `deletedcount`, `postusername`, `postuserid`, `lastposter`, `lastposterid`, `dateline`, `views`, `iconid`, `notes`, `visible`, `sticky`, `votenum`, `votetotal`, `attach`, `similar`, `taglist`, `keywords`, `lastpostdate`, `absdate`, `aproved`, `content`) VALUES
(2, 'Test', '', 0, 0, 0, 2, 0, 0, 0, 0, 0, 'Fabian M', 1, 'Fabian M', 0, '15/01/11 10:42:24', 0, 0, '', 0, 0, 0, 0, 0, '', NULL, 'lololo', '15/01/11 10:42:24', 20110115104224, 0, 'Trol \\r\\n\\r\\nTrol'),
(3, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', NULL, NULL, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `usertitlechange` int(11) NOT NULL,
  `usertitle` text NOT NULL,
  `htmlbefore` text NOT NULL,
  `htmlafter` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `usertitlechange`, `usertitle`, `htmlbefore`, `htmlafter`) VALUES
(0, 'Banned', 0, 'Banned', '<font color="black"><s>', '</s></font>'),
(5, 'Global Moderator', 1, 'Global Moderator', '<font color="blue"><b>', '</b></font>'),
(1, 'Member', 0, 'Member', '', ''),
(6, 'Administrator', 1, 'Administrator', '<font color="red"><b>', '</b></font>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usergroupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `membergroupids` char(250) NOT NULL DEFAULT '',
  `displaygroupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `passworddate` date NOT NULL,
  `email` char(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `styleid` smallint(5) unsigned NOT NULL,
  `homepage` char(100) DEFAULT NULL,
  `icq` char(20) DEFAULT NULL,
  `aim` char(20) DEFAULT NULL,
  `yahoo` char(32) DEFAULT NULL,
  `msn` char(100) DEFAULT NULL,
  `skype` char(32) DEFAULT NULL,
  `showbirthday` smallint(5) unsigned NOT NULL DEFAULT '2',
  `usertitle` char(250) NOT NULL DEFAULT '',
  `customtitle` smallint(6) NOT NULL DEFAULT '0',
  `joindate` varchar(10) NOT NULL,
  `daysprune` smallint(6) NOT NULL DEFAULT '0',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0',
  `lastactivity` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpostid` int(10) unsigned NOT NULL DEFAULT '0',
  `posts` int(10) unsigned NOT NULL DEFAULT '0',
  `reputation` int(11) NOT NULL DEFAULT '10',
  `reputationlevelid` int(10) unsigned NOT NULL DEFAULT '1',
  `timezoneoffset` char(4) NOT NULL DEFAULT '',
  `pmpopup` smallint(6) NOT NULL DEFAULT '0',
  `avatarid` smallint(6) NOT NULL DEFAULT '0',
  `avatarrevision` int(10) unsigned NOT NULL DEFAULT '0',
  `profilepicrevision` int(10) unsigned NOT NULL DEFAULT '0',
  `sigpicrevision` int(10) unsigned NOT NULL DEFAULT '0',
  `options` int(10) unsigned NOT NULL DEFAULT '33570831',
  `birthday` text NOT NULL,
  `birthday_search` date NOT NULL DEFAULT '0000-00-00',
  `maxposts` smallint(6) NOT NULL DEFAULT '-1',
  `startofweek` smallint(6) NOT NULL DEFAULT '1',
  `ipaddress` char(15) NOT NULL DEFAULT '',
  `referrerid` int(10) unsigned NOT NULL DEFAULT '0',
  `languageid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `emailstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `threadedmode` smallint(5) unsigned NOT NULL DEFAULT '0',
  `autosubscribe` smallint(6) NOT NULL DEFAULT '-1',
  `pmtotal` smallint(5) unsigned NOT NULL DEFAULT '0',
  `pmunread` smallint(5) unsigned NOT NULL DEFAULT '0',
  `salt` char(3) NOT NULL DEFAULT '',
  `ipoints` int(10) unsigned NOT NULL DEFAULT '0',
  `infractions` int(10) unsigned NOT NULL DEFAULT '0',
  `warnings` int(10) unsigned NOT NULL DEFAULT '0',
  `infractiongroupids` varchar(255) NOT NULL DEFAULT '',
  `infractiongroupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `adminoptions` int(10) unsigned NOT NULL DEFAULT '0',
  `profilevisits` int(10) unsigned NOT NULL DEFAULT '0',
  `friendcount` int(10) unsigned NOT NULL DEFAULT '0',
  `friendreqcount` int(10) unsigned NOT NULL DEFAULT '0',
  `vmunreadcount` int(10) unsigned NOT NULL DEFAULT '0',
  `vmmoderatedcount` int(10) unsigned NOT NULL DEFAULT '0',
  `socgroupinvitecount` int(10) unsigned NOT NULL DEFAULT '0',
  `socgroupreqcount` int(10) unsigned NOT NULL DEFAULT '0',
  `pcunreadcount` int(10) unsigned NOT NULL DEFAULT '0',
  `pcmoderatedcount` int(10) unsigned NOT NULL DEFAULT '0',
  `gmmoderatedcount` int(10) unsigned NOT NULL DEFAULT '0',
  `assetposthash` varchar(32) NOT NULL DEFAULT '',
  `bankpin` int(11) NOT NULL,
  `htmlbefore` text NOT NULL,
  `htmlafter` text NOT NULL,
  `signature` text NOT NULL,
  `oldusergroupid` int(11) NOT NULL,
  `activated` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usergroupid` (`usergroupid`),
  KEY `username` (`username`),
  KEY `birthday_search` (`birthday_search`),
  KEY `referrerid` (`referrerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `usergroupid`, `membergroupids`, `displaygroupid`, `username`, `password`, `passworddate`, `email`, `firstname`, `lastname`, `styleid`, `homepage`, `icq`, `aim`, `yahoo`, `msn`, `skype`, `showbirthday`, `usertitle`, `customtitle`, `joindate`, `daysprune`, `lastvisit`, `lastactivity`, `lastpost`, `lastpostid`, `posts`, `reputation`, `reputationlevelid`, `timezoneoffset`, `pmpopup`, `avatarid`, `avatarrevision`, `profilepicrevision`, `sigpicrevision`, `options`, `birthday`, `birthday_search`, `maxposts`, `startofweek`, `ipaddress`, `referrerid`, `languageid`, `emailstamp`, `threadedmode`, `autosubscribe`, `pmtotal`, `pmunread`, `salt`, `ipoints`, `infractions`, `warnings`, `infractiongroupids`, `infractiongroupid`, `adminoptions`, `profilevisits`, `friendcount`, `friendreqcount`, `vmunreadcount`, `vmmoderatedcount`, `socgroupinvitecount`, `socgroupreqcount`, `pcunreadcount`, `pcmoderatedcount`, `gmmoderatedcount`, `assetposthash`, `bankpin`, `htmlbefore`, `htmlafter`, `signature`, `oldusergroupid`, `activated`) VALUES
(1, 6, '', 6, 'Fabian M', '0d908098750779a9b5bcab1c6404eb42', '0000-00-00', 'faab234@hotmail.com', 'Fabian', 'Mast', 0, NULL, NULL, NULL, NULL, NULL, NULL, 2, '', 0, '28/12/2010', 0, 0, 0, 0, 0, 6, 10, 1, '', 0, 0, 0, 0, 0, 33570831, '28/1/1993', '0000-00-00', -1, 1, '', 0, 0, 0, 0, -1, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `usersonline`
--

CREATE TABLE IF NOT EXISTS `usersonline` (
  `timestamp` int(15) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` text NOT NULL,
  `isguest` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `self` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `usersonline`
--

INSERT INTO `usersonline` (`timestamp`, `userid`, `username`, `isguest`, `ip`, `self`, `url`) VALUES
(1297442189, 0, '0', 1, '127.0.0.1', 'showforum', 'http://localhost/faabbb/board/2/news-amp-announcements');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `visitormessages`
--

CREATE TABLE IF NOT EXISTS `visitormessages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `userpostid` int(11) NOT NULL,
  `username` text NOT NULL,
  `text` text NOT NULL,
  `dateline` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Gegevens worden uitgevoerd voor tabel `visitormessages`
--

