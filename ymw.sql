-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Dic 19, 2013 alle 16:04
-- Versione del server: 5.5.24-log
-- Versione PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ymw`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `amministratori`
--

CREATE TABLE IF NOT EXISTS `amministratori` (
  `id_amministratore` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_amministratore`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `amministratori`
--

INSERT INTO `amministratori` (`id_amministratore`, `username`, `password`) VALUES
(5, 'pixo', 'b925359903e74b15fdc14231a41b87d6'),
(6, 'niccolÃ²-ballerini', '0b97bd6dfade5cc9f9566bf9b0dec81a'),
(7, 'francesca-biancat', 'f12b7433e58dda1cedb8b11b814131e9');

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categoria` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descrizione` varchar(250) DEFAULT NULL,
  `special` int(1) NOT NULL,
  `id_categoria_padre` int(32) unsigned DEFAULT NULL,
  `indice_ordinamento` int(32) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_categoria`),
  KEY `fk_categorie_categorie_idx` (`id_categoria_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id_categoria`, `nome`, `descrizione`, `special`, `id_categoria_padre`, `indice_ordinamento`) VALUES
(14, 'FOR HIM / HER', 'Wines are perfect for friends, family and beautiful evenings ...', 0, NULL, 0),
(15, 'TO AMAZE', 'Wines perfect for romantic situations and nights of love', 0, NULL, 0),
(16, 'FOR EXPERT', 'Perfect wines for experts in the field.', 0, NULL, 0),
(17, 'SUPERIOR', 'The ultimate selection of wines for tasting excellent.', 0, NULL, 0),
(18, 'FOR PARTY', 'Selected wines for an evening of fun and celebration', 1, NULL, 0),
(19, 'FOR FAMILY', 'Wines selected for evenings with family and for the family', 1, NULL, 0),
(20, 'FOR BUSINESS', 'Wines selected for large enterprises and small and large today''s professionals.', 1, NULL, 0),
(21, 'FOR LOVE', 'Selected wines for small and big occasions of love...', 1, NULL, 0),
(22, 'YOUNG', 'For the ones who live his/her life with lightness and carefreeness in search of the perfect balance.', 0, 14, 0),
(23, 'FIRM', 'For people who like plunging in the flow of his/her thoughts and is always ready to take the initiative.', 0, 14, 0),
(24, 'ROBUST', 'For those who face life in the most profuse way but sometimes is got carried away by  strong emotions.', 0, 14, 0),
(25, 'SPARKLING', 'For the ones who are always ready to take on any challenge but needs a push of courage.', 0, 14, 0),
(26, 'BORDEAUX STYLE', 'With its classical shape, it''s the protagonist in the different events of international wine.', 0, 15, 0),
(27, 'RHINE STYLE', 'With its narrow and tall form it''s suitable to contain young red wines that must be consumed in a short period. ', 0, 15, 0),
(28, 'BURGUNDIAN STYLE', 'The bottle that always contains refined wines. Its original shape with sloping shoulders enhances the complexity of its wine.', 0, 15, 0),
(29, 'CHAMPAGNE STYLE', 'It''s the bottle suggested for important occasions that usually don''t repeat twice in the life of a person!', 0, 15, 0),
(30, 'LYRICH STYLE', 'An unusual shape for a bottle, often used in moments that need a big dose of sweetness.', 0, 15, 0),
(31, 'SMALL BALLON', 'This is the right shape for the young red or white wines, that helps the preservation of their freshness.', 0, 16, 0),
(32, 'BURGUNDY', 'This is the right glass for wine that aren''t aged too much: take your time, breath together with it and put yourself into its hands.', 0, 16, 0),
(33, 'LARGE BALLON', 'The maturity and the experience of a wine that has decided to occupy this space made of glass.', 0, 16, 0),
(34, 'FLUTE', 'Beauty is perceived by the five senses and arouses pleasant sensations like a precious gift or the perlage of a great wine.', 0, 16, 0),
(35, 'TULIP', 'Sweetness is made of romantic gestures, with this glass you can even taste it.', 0, 16, 0),
(36, 'RED', 'If you really love drinking wine, probably you''ll prefer red wines. This is the right colour of all great wines.', 0, 17, 0),
(37, 'WHITE', 'The white wines offer another way of interpreting wine: it may be fresh, spicy, fruity, aromatic. Just decide who you are!', 0, 17, 0),
(38, 'SPARKLING', 'Elegance and taste marry perfectly in these sparkling works of art signed by Dom Perignon, Moet Chandon...', 0, 17, 0),
(39, 'SWEET', 'Wines that are the heap of fragrances, tastes, history. A wine that reveals all in a sudden its richness.', 0, 17, 0),
(40, 'SPIRIT', 'The roots of different countries immerse into the aromas of these liqueurs. Bon voyage!', 0, 17, 0),
(41, 'SWEET', 'For people who want to taste his/her life with a of sweetness letting himself/herself wind up by a soft and endearing pleasure.', 0, 14, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `impostazioni`
--

CREATE TABLE IF NOT EXISTS `impostazioni` (
  `chiave` char(20) NOT NULL,
  `valore` varchar(8000) NOT NULL,
  PRIMARY KEY (`chiave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `impostazioni`
--

INSERT INTO `impostazioni` (`chiave`, `valore`) VALUES
('BONIFICO', 'For...   : YOUMYWINE DI NICCOLO'' MARIA BALLERINI\r\n\r\nIBAN   : IT0000000000000000000000'),
('FORAMAZE', 'test site - Cartoline - Frase For Amaze\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('FORBUSSINESS', 'test site - Cartoline - Frase For Bussiness\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('FOREXPERT', 'test site - Cartoline - Frase For Expert\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('FORFAMILY', 'test site - Cartoline - Frase For Family\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('FORFRIENDS', 'test site - Cartoline - Frase For Friends\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('FORHIMHER', 'test site - Cartoline - Frase For Him & Her\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('FORLOVE', 'test site - Cartoline - Frase For Love\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('PAYPALMAIL', 'info@youmywine.com'),
('PAYPALTOKEN', 'Xu-fDAMNP45ZjAY9rCdJG4LJqHY1NSzsZAsISk-RSjwguLF1juIpqFEBlK0'),
('SUPERIOR', 'test site - Cartoline - Frase Superior\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Struttura della tabella `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id_location` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(150) NOT NULL,
  `country` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `spedizione` float NOT NULL,
  `id_location_padre` int(32) unsigned DEFAULT NULL,
  `cap` varchar(8000) DEFAULT NULL,
  `mostrainhome` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_location`),
  KEY `fk_locations_locations1_idx` (`id_location_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dump dei dati per la tabella `locations`
--

INSERT INTO `locations` (`id_location`, `state`, `country`, `city`, `spedizione`, `id_location_padre`, `cap`, `mostrainhome`) VALUES
(13, 'ITALY', NULL, NULL, 0, NULL, NULL, 0),
(14, 'ITALY', 'PUGLIA', 'Bari', 0, 13, '70100 Bari\r\n70010 Adelfia\r\n70010 Capurso\r\n70010 Casamassima\r\n70010 Cellamare\r\n70010 Locorotondo\r\n70010 Sammichele di Bari\r\n70010 Turi\r\n70010 Valenzano\r\n70011 Alberobello\r\n70013 Castellana Grotte\r\n70014 Conversano\r\n70015 Noci\r\n70016 NoicÃ ttaro\r\n70017 Putignano\r\n70018 Rutigliano\r\n70019 Triggiano\r\n70020 Binetto\r\n70020 Bitetto\r\n70020 Bitritto\r\n70020 Cassano delle Murge\r\n70020 Poggiorsini\r\n70020 Toritto\r\n70021 Acquaviva delle Fonti\r\n70022 Altamura\r\n70023 Gioia del Colle\r\n70024 Gravina in Puglia\r\n70025 Grumo Appula\r\n70026 Modugno\r\n70027 Palo del Colle\r\n70028 Sannicandro di Bari\r\n70029 Santeramo in Colle\r\n70031 Andria\r\n70032 Bitonto\r\n70033 Corato\r\n70037 Ruvo di Puglia\r\n70038 Terlizzi\r\n70042 Mola di Bari\r\n70043 Monopoli\r\n70044 Polignano a Mare\r\n70051 Barletta\r\n70052 Bisceglie\r\n70053 Canosa di Puglia\r\n70054 Giovinazzo\r\n70055 Minervino Murge\r\n70056 Molfetta\r\n70058 Spinazzola\r\n70059 Trani', 0),
(15, 'ITALY', 'EMILIA-ROMAGNA', 'Bologna', 0, 13, '40010 Bentivoglio\r\n40010 Sala Bolognese\r\n40011 Anzola dell''Emilia\r\n40012 Calderara di Reno\r\n40013 Castel Maggiore\r\n40014 Crevalcore\r\n40015 Galliera\r\n40016 San Giorgio di Piano\r\n40017 San Giovanni in Persiceto\r\n40018 San Pietro in Casale\r\n40019 Sant''Agata Bolognese\r\n40020 Casalfiumanese\r\n40021 Borgo Tossignano\r\n40022 Castel del Rio\r\n40023 Castel Guelfo di Bologna\r\n40024 Castel San Pietro Terme\r\n40025 Fontanelice\r\n40026 Imola\r\n40027 Mordano	\r\n40030 Castel di Casio\r\n40030 Grizzana Morandi\r\n40032 Camugnano\r\n40033 Casalecchio di Reno\r\n40034 Castel d''Aiano\r\n40035 Castiglione dei Pepoli\r\n40036 Monzuno\r\n40037 Sasso Marconi\r\n40038 Vergato\r\n40041 Gaggio Montano\r\n40042 Lizzano in Belvedere\r\n40043 Marzabotto\r\n40045 Granaglione\r\n40046 Porretta Terme\r\n40048 San Benedetto Val di Sambro\r\n40050 Argelato\r\n40050 Castello d''Argile\r\n40050 Castello di Serravalle\r\n40050 Loiano\r\n40050 Monte San Pietro\r\n40050 Monterenzio\r\n40050 Monteveglio\r\n40051 Malalbergo\r\n40052 Baricella\r\n40053 Bazzano\r\n40054 Budrio\r\n40055 Castenaso\r\n40056 Crespellano\r\n40057 Granarolo dell''Emilia\r\n40059 Medicina\r\n40060 Dozza\r\n40060 Savigno\r\n40061 Minerbio\r\n40062 Molinella	\r\n40063 Monghidoro\r\n40064 Ozzano dell''Emilia\r\n40065 Pianoro\r\n40066 Pieve di Cento\r\n40068 San Lazzaro di Savena\r\n40069 Zola Predosa', 0),
(16, 'ITALY', 'TOSCANA', 'Firenze', 0, 13, '50012	Bagno a Ripoli\r\n50013	Campi Bisenzio\r\n50014	Fiesole\r\n50018	Scandicci\r\n50019	Sesto Fiorentino\r\n50021	Barberino Val d''Elsa\r\n50022	Greve in Chianti	\r\n50023	Impruneta\r\n50025	Montespertoli\r\n50026	San Casciano in Val di Pesa\r\n50028	Tavarnelle Val di Pesa\r\n50031	Barberino di Mugello\r\n50032	Borgo San Lorenzo\r\n50033	Firenzuola\r\n50034	Marradi\r\n50035	Palazzuolo sul Senio\r\n50036	Vaglia\r\n50037	San Piero a Sieve\r\n50038	Scarperia\r\n50039	Vicchio\r\n50041	Calenzano\r\n50050	Capraia e Limite\r\n50050	Cerreto Guidi\r\n50050	Gambassi Terme\r\n50050	Montaione\r\n50051	Castelfiorentino\r\n50052	Certaldo\r\n50053	Empoli\r\n50054	Fucecchio\r\n50055	Lastra a Signa\r\n50056	Montelupo Fiorentino\r\n50058	Signa\r\n50059	Vinci	\r\n50060	Londa\r\n50060	Pelago\r\n50060	San Godenzo\r\n50062	Dicomano\r\n50063	Figline Valdarno\r\n50064	Incisa in Val d''Arno\r\n50065	Pontassieve\r\n50066	Reggello\r\n50067	Rignano sull''Arno\r\n50068	Rufina', 0),
(17, 'ITALY', 'LOMBARDIA', 'Milano', 0, 13, '', 0),
(18, 'ITALY', 'VENETO', 'Padova', 0, 13, '', 0),
(19, 'ITALY', 'SICILIA', 'Palermo', 0, 13, '', 0),
(20, 'ITALY', 'UMBRIA', 'Perugia', 0, 13, '', 0),
(21, 'ITALY', 'LAZIO', 'Roma', 0, 13, NULL, 0),
(22, 'ITALY', 'PIEMONTE', 'Torino', 0, 13, '', 0),
(23, 'ITALY', 'FRIULI-VENEZIA-GIULIA', 'Trieste', 0, 13, '', 0),
(24, 'ITALY', 'VENETO', 'Venezia', 0, 13, '', 0),
(25, 'ITALY', 'CAMPANIA', 'Napoli', 0, 13, '', 0),
(26, 'NEDERLAND', 'NOORD-HOLLAND', 'AMSTERDAM', 0, NULL, NULL, 0),
(27, 'GREECE', 'ATTICA', 'ATHENS', 0, NULL, NULL, 0),
(28, 'GERMANY', 'METROPOLREGION BERLIN/BRANDEBURG', 'BERLIN', 0, NULL, NULL, 0),
(29, 'HUNGARY', 'HUNGARIAN CENTRAL', 'BUDAPEST', 0, NULL, NULL, 0),
(30, 'GERMANY', 'ASSIA - DARMSTADT', 'FRANKFURT', 0, NULL, NULL, 0),
(31, 'UNITEDKINGDOM', 'ENGLAND', 'LONDON', 0, NULL, NULL, 0),
(32, 'FRANCE', 'ISLAND OF FRANCE', 'PARIS', 0, NULL, NULL, 0),
(33, 'RUSSIA', 'CENTRAL FEDERAL DISTRICT', 'MOSKOW', 0, NULL, NULL, 0),
(34, 'CZECH REPUBLIC', ' ', 'PRAGUE', 0, NULL, NULL, 0),
(35, 'SWISS', 'CANTON OF ZÃ¼RICH', 'ZÃ¼RICH', 0, NULL, NULL, 0),
(36, 'CROATIA', 'CITY OF ZAGREB', 'ZAGREB', 0, NULL, '00', 0),
(37, 'AUSTRIAN', ' ', 'VIENNA', 0, NULL, NULL, 0),
(38, 'SPAIN', 'CATALONIA', 'BARCELONA', 15, NULL, NULL, 0),
(39, 'SPAIN', ' ', 'MADRID', 20, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE IF NOT EXISTS `ordini` (
  `id_ordine` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_prodotto` int(32) unsigned NOT NULL,
  `nome_prodotto` varchar(150) NOT NULL,
  `costo_prodotto` float NOT NULL,
  `costo_spedizione` float NOT NULL,
  `biglietto` varchar(310) DEFAULT NULL,
  `data_spedizione` date NOT NULL,
  `id_utente` int(32) unsigned DEFAULT NULL,
  `nome` varchar(150) NOT NULL,
  `cognome` varchar(150) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `nome_sped` varchar(150) NOT NULL,
  `cognome_sped` varchar(150) NOT NULL,
  `telefono_sped` varchar(45) DEFAULT NULL,
  `state_sped` varchar(150) NOT NULL,
  `country_sped` varchar(150) NOT NULL,
  `city_sped` varchar(150) NOT NULL,
  `cap_sped` varchar(150) NOT NULL,
  `address_sped` varchar(150) NOT NULL,
  `order_details` int(1) NOT NULL,
  `invoice_details` int(1) NOT NULL,
  `agency_name` varchar(150) DEFAULT NULL,
  `agency_address` varchar(150) DEFAULT NULL,
  `agency_code` varchar(150) DEFAULT NULL,
  `stato_ordine` char(15) NOT NULL DEFAULT 'IN_ATTESA',
  `sliceofday` varchar(20) NOT NULL,
  `data_ordine` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ordine`),
  KEY `fk_ordini_prodotti1_idx` (`id_prodotto`),
  KEY `fk_ordini_utenti1_idx` (`id_utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id_ordine`, `id_prodotto`, `nome_prodotto`, `costo_prodotto`, `costo_spedizione`, `biglietto`, `data_spedizione`, `id_utente`, `nome`, `cognome`, `telefono`, `email`, `nome_sped`, `cognome_sped`, `telefono_sped`, `state_sped`, `country_sped`, `city_sped`, `cap_sped`, `address_sped`, `order_details`, `invoice_details`, `agency_name`, `agency_address`, `agency_code`, `stato_ordine`, `sliceofday`, `data_ordine`) VALUES
(23, 19, 'winename', 210, 0, 'Caro amedeo... grazie di tutto.\r\n\r\nAlberto.', '2013-10-31', NULL, 'Alberto', 'MarÃ ', '000 000 00 00', 'alberto@mail.com', 'Amedeo', 'Ferro', '000 000 00 00', 'ITALY', 'CAMPANIA', 'Napoli', '00000 battipaglia', 'via degli amedeiferri', 0, 0, NULL, NULL, NULL, 'PAGATO', 'evening', '2013-10-29 11:08:43'),
(24, 15, 'winename', 210, 0, 'Questo messaggio Ã¨ un test...\r\n\r\n', '2013-11-20', NULL, 'Mario', 'Rossi', '3280000000', 'mariorossi@demomail.com', 'Maria', 'Rossetti', '3280000000', 'ITALY', 'LAZIO', 'Roma', '00100', 'piazza dell''altare della patria', 0, 0, NULL, NULL, NULL, 'IN_ATTESA', 'evening', '2013-11-20 14:01:34');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE IF NOT EXISTS `prodotti` (
  `id_prodotto` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descrizione` varchar(8000) NOT NULL,
  `prezzo` float NOT NULL,
  `id_categoria` int(32) unsigned NOT NULL,
  `id_location` int(32) unsigned NOT NULL,
  PRIMARY KEY (`id_prodotto`),
  KEY `fk_prodotti_categorie1_idx` (`id_categoria`),
  KEY `fk_prodotti_locations1_idx` (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id_prodotto`, `nome`, `descrizione`, `prezzo`, `id_categoria`, `id_location`) VALUES
(8, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 15),
(9, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 14),
(10, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 16),
(11, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 17),
(12, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 18),
(13, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 19),
(14, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 20),
(15, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 21),
(16, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 22),
(17, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 23),
(18, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 24),
(19, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 25),
(20, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 26),
(21, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 27),
(22, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 28),
(23, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 29),
(24, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 30),
(25, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 31),
(26, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 32),
(27, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 33),
(28, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 34),
(29, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 35),
(30, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 36),
(31, 'winename', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...', 210, 22, 37),
(38, 'ABADAL 2011', 'A young red wine, although it has been fermented four months in barriques, that you can taste on the instant without decanting it\r\nGrape: Cabernet Franc - ABV: Tempranillo. 13Â°', 23, 22, 38),
(39, 'ABEL MENDOZA JARRARTE 2012', 'The right match with a pizza! A peculiar red wine that has been fermented in cement tanks.\r\nGrape: Tempranillo - ABV: 13.8Â°', 20, 22, 38),
(40, 'CHÃ‚TEAU CROIX-MOUTON 2011', 'Who loves eating huge plates of mixed grill can''t miss this lovely French wine, very similiar to the Bordeaux.\r\nGrape: Merlot, Cabernet Franc, Petit Verdot - ABV: 13.5Â°', 30, 22, 38),
(41, 'L'' EQUILIBRISTA GARNATXA 2011', 'A spanish wine grown up in French oak barrels. A wine, as we use to say, â€œharmoniousâ€, that has found the right equilibrium... The name says it all!\r\nGrape: Garnacha - ABV: 14.5Â°', 31, 22, 38),
(42, 'LA CHABLISIENNE LA SEREINE 2011', 'Directly from Burgundy a white wine considered from the passionate a myth. If who receives it worth as much, what are you waiting for?\r\nGrape: Chardonnay - ABV: 12.5Â°', 32, 22, 38),
(43, 'PALACIOS REMONDO PROPIEDAD 2010', 'A wine of the unique taste that''s only waiting for being espoused with refined plates cooked by real chefs. \r\nGrape: Garnacha - ABV: 14.5Â°', 35, 23, 38),
(44, 'CHANSON PÃˆRE & FILS CHABLIS 2010', 'If who has to receive it is cooking fish in the most different ways all day long, he/she is only waiting that this white wine suddenly arrives from the door of his/her house to complete the work.\r\nGrape: Chardonnay - ABV: 12.5Â°', 37, 23, 38),
(45, 'HUELLAS 2009', 'The right mix of wine, love and fantasy... Are they enough as ingredients for a gift?\r\nGrape: Garnacha, CariÃ±ena, Cabernet Sauvignon, Syrah - ABV: 14.5Â°', 37, 23, 38),
(46, 'MARCEL DEISS PINOT GRIS 2010', 'Like all the Pinot gris, his taste is delicate and soft, does it match with your better half?\r\nGrape: Pinot Grigio - ABV: 13.5Â°', 39, 23, 38),
(47, 'R. VOERZIO LANGHE NEBBIOLO 2009', 'A wine that contains all the tastes of the Italian tradition.\r\nGrape: Nebbiolo - ABV: 14Â°', 42, 23, 38),
(48, 'CLOS D''AGON 2005', 'A wine that can puzzle your ideas for its richness and for the variety of the grapes that it contains\r\nGrape: Cabernet Sauvignon, Cabernet Franc, Syrah, other varietes', 57, 24, 38),
(49, 'MISERERE 2006', 'A demanding wine that has to take all the time to give off its taste.\r\nGrape: Garnacha, Tempranillo, Cabernet Sauvignon - ABV: 14.5Â°', 58, 24, 38),
(50, 'CIMS DE PORRERA CARANYANA 2006', 'A wine that can stay alone with the thoughts and projects of whom is drinking it.\r\nGrape: CariÃ±ena - ABV: 14.5Â°', 59, 24, 38),
(51, 'CHANSON PÃˆRE & FILS - CHAMBERTIN 2007', 'A wine that is satisfied of combining with any kind of meat.\r\nGrape: Pinot Noir - ABV: 13.5Â°', 64, 24, 38),
(52, 'GOLDERT GEWÃœRZTRAMINER 2007', 'As soon as the fragrance of this wine gives off in the air, your taste is already looking forward to experience its aromatic pleasure.\r\nGrape: GewÃ¼rztraminer - ABV: 15Â°', 64, 24, 38),
(53, 'GRAMONA BRUT GRAN RESERVA 2007', 'For a bang that wants to leave your mark.\r\nGrape: Xarel.lo, Macabeo, Chardonnay - ABV: 11.5Â°', 30, 25, 38),
(54, 'CASTELL SANT ANTONI GRAN ROSAT BRUT NATURE', 'A wine that''s halfaway between a white and a red wine... Reason is always in the middle!\r\nGrape: Pinot Noir - ABV: 11.5Â°', 34, 25, 38),
(55, 'MUMM CORDON ROUGE BRUT', 'A classical gift that always hits the mark.\r\nGrape: Pinot Noir, Chardonnay, Pinot Meunier - ABV: 12Â°', 43, 25, 38),
(56, 'VEUVE CLICQUOT BRUT', 'A French Champagne, great for any occasions.\r\nGrape: Pinot Noir, Pinot Meunier, Chardonnay - ABV: 12Â°', 52, 25, 38),
(57, 'GOSSET BRUT EXCELLENCE', 'If maths is not an opinion, if you add Chardonnay and Pinot noir, the answer is always inevitable: Champagne!\r\nGrape: Chardonnay, Pinot Noir, Pinot Meunier - ABV: 12Â°', 55, 25, 38),
(58, 'LUSTAU FINO JARANA', 'The right balance between sweetness and delicacy.\r\nGrape: Palomino Fino - ABV: 15Â°', 24, 41, 38),
(59, 'BARBADILLO AMONTILLADO PRÃNCIPE', 'The right bottle for important decisions, it''s difficult to double back!\r\nGrape: Palomino - ABV: 19.5Â°', 32, 41, 38),
(61, 'HÃ‰TSZÃ–LÃ– ASZÃš 3 PUTTONYOS 2003 ', 'A light wine, of Hungarian origin.\r\nGrape: Furmint - ABV: 11Â°', 38, 41, 38),
(62, 'NIEPOORT RUBY DUM (MAGNUM)', 'For whom sometimes needs to plunge in the Portuguese saudade\r\nGrape: Touriga Franca, Touriga Nacional, Tinta Roriz, Otras variedades - ABV: 20Â°', 45, 41, 38),
(63, 'CHÃ‚TEAU LAFAURIE-PEYRAGUEY 2003', 'A sweet wine that doesn''t hide the traces of the wood.\r\nGrape: Semillon, Sauvignon Blanc - ABV: 14.5Â°', 55, 41, 38),
(64, 'CHÃ‚TEAU DE PEZ 2010', 'A wine that puts together Cabernet Sauvignon and Merlot, once you''ll open it you''ll recognise immediately its fragrance.\r\nGrape: Cabernet Sauvignon, Merlot - ABV: 14Â°', 59, 26, 38),
(65, 'BODEGAS PALACIO GLORIOSO RES 1973', 'A Spanish wine that preserves an ancient flavor.\r\nGrape: Tempranillo - ABV: 13Â°', 63, 26, 38),
(66, 'CLOS MARTINET 2010', 'A wine made of mood and light.\r\nGrape: Garnacha, Cabernet Sauvignon, Merlot, CariÃ±ena - ABV: 14.5Â°', 67, 26, 38),
(67, 'CHÃ‚TEAU LA DOMINIQUE 2010', 'The ideal wine to do good business\r\nGrape: Merlot, Cabernet Franc, Cabernet Sauvignon - ABV: 14.5', 73, 26, 38),
(68, 'LA VINYA DEL VUIT 2009', 'A meal without wine is like a day without sun. Are you ready to donate a sunny day?\r\nGrape: CariÃ±ena, Garnacha - ABV: 14.5Â°', 88, 26, 38),
(69, 'winename', 'asdasdas', 210, 22, 39),
(70, 'ALZINGER GRÃœNER VELTLINER 2011', 'An Austrian white wine that is brought to life in the mountains and is looking for tastes of the sea.\r\nGrape: GrÃ¼ner Veltliner ABV: 14Â°', 45, 27, 38),
(71, 'DOMAINE GRANDE MAISON 2011', 'A wine that preserves the French flavor of the Loire.\r\nGrape: Melon de Bourgogne - ABV: 11.5Â°', 27, 27, 38),
(72, 'FELTON ROAD RIESLING BLOCK 1 2011', 'An aromtaic flavor that remembers the moss, a wine that doesn''t deny its origins from the earth.\r\nGrape: Riesling - ABV: 9Â°', 49, 27, 38),
(73, 'KELLER RIESLING VON DER FELS 2011', 'A typical German gift.\r\nGrape: Riesling - ABV: 12Â°', 49, 27, 38),
(74, 'TRAPET GEWÃœRZTRAMINER SPOREN 2009', 'Who loves spicy foods, can''t miss this fitting combination.\r\nGrape: GewÃ¼rztraminer - ABV: 12.5Â°', 52, 27, 38),
(75, 'DUJAC F. PÃˆRE MOREY SAINT DENIS 2010', 'Pinot noir is one of the best known wine in the world.\r\nGrape: Pinot Noir - ABV: 13Â°', 65, 28, 38),
(76, 'TOMMASI AMARONE CLASSICO 2009', 'For whom never hangs back.', 72, 28, 38);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `id_utente` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cognome` varchar(150) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `state` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `whatwine` varchar(45) NOT NULL,
  `agency_name` varchar(150) DEFAULT NULL,
  `agency_address` varchar(150) DEFAULT NULL,
  `agency_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='		' AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `nome`, `cognome`, `telefono`, `email`, `password`, `state`, `country`, `city`, `address`, `whatwine`, `agency_name`, `agency_address`, `agency_code`) VALUES
(1, 'pixo', 'studios', '000 000 00 00', 'amedeoarun@gmail.com', '202cb962ac59075b964b07152d234b70', 'Italy', 'Lazio', 'Roma', 'Via dei business', 'Rosato', 'Pixo', 'Via dei business', '00100');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `fk_categorie_categorie` FOREIGN KEY (`id_categoria_padre`) REFERENCES `categorie` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `fk_locations_locations1` FOREIGN KEY (`id_location_padre`) REFERENCES `locations` (`id_location`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `fk_ordini_prodotti1` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id_prodotto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordini_utenti1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id_utente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `fk_prodotti_categorie1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodotti_locations1` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id_location`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
