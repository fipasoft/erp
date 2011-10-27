-- RBAC Manager 
--
-- Tabellenstruktur für Tabelle `authassignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authassignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('SuperAdmin', '1', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authitem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authitem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('SuperAdmin', 2, '', '', ''),
('RbacAssignmentEditor', 1, '', '', ''),
('RbacViewer', 0, '', '', ''),
('RbacEditor', 1, '', '', ''),
('RbacAssignmentViewer', 0, '', '', ''),
('RbacAdmin', 2, '', '', ''),
('registered', 2, 'Default role by Yii-conf', 'return !Yii::app()->user->isGuest;', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authitemchild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authitemchild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('RbacAdmin', 'RbacAssignmentEditor'),
('RbacAdmin', 'RbacEditor'),
('RbacAssignmentEditor', 'RbacAssignmentViewer'),
('RbacEditor', 'RbacViewer'),
('SuperAdmin', 'RbacAdmin');
