-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 05 Mar 2013, 12:10
-- Wersja serwera: 5.5.8
-- Wersja PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `swos`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `dyrektor`
--
-- Utworzenie: 09 Lut 2013, 11:23
-- Ostatnia aktualizacja: 09 Lut 2013, 11:23
--

CREATE TABLE IF NOT EXISTS `dyrektor` (
  `iddyrektora` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(11) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL,
  `imie` varchar(15) COLLATE utf8_bin NOT NULL,
  `imie2` varchar(15) COLLATE utf8_bin NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_bin NOT NULL,
  `data_urodzenia` date NOT NULL,
  `wyksztalcenie` varchar(20) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(9) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iddyrektora`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `dyrektor`
--

INSERT INTO `dyrektor` (`iddyrektora`, `login`, `pass`, `imie`, `imie2`, `nazwisko`, `data_urodzenia`, `wyksztalcenie`, `telefon`) VALUES
(18, 'tadek', '629f7f295b6c66dd91df62e8424ecb67', 'Tadeusz', '', 'sito', '1986-07-19', 'WyÅ¼sze', '548544444');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `klasy`
--
-- Utworzenie: 09 Lut 2013, 11:23
-- Ostatnia aktualizacja: 09 Lut 2013, 11:23
--

CREATE TABLE IF NOT EXISTS `klasy` (
  `idklasy` int(11) NOT NULL AUTO_INCREMENT,
  `klasa` varchar(2) COLLATE utf8_bin NOT NULL,
  `RokSzkolny` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`idklasy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `klasy`
--

INSERT INTO `klasy` (`idklasy`, `klasa`, `RokSzkolny`) VALUES
(1, '1A', '2012'),
(2, '1B', '2012'),
(3, '1C', '2012'),
(4, '2A', '2012'),
(5, '2B', '2012'),
(6, '2C', '2012'),
(7, '3A', '2012'),
(8, '3B', '2012'),
(9, '3C', '2012'),
(10, '4A', '2012'),
(11, '4B', '2012'),
(12, '4C', '2012'),
(13, '5A', '2012'),
(14, '5B', '2012'),
(15, '5C', '2012'),
(16, '6A', '2012'),
(17, '6B', '2012'),
(18, '6C', '2012');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `nauczyciel`
--
-- Utworzenie: 17 Lut 2013, 14:10
-- Ostatnia aktualizacja: 04 Mar 2013, 18:04
--

CREATE TABLE IF NOT EXISTS `nauczyciel` (
  `idnauczyciela` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL,
  `imie` varchar(15) COLLATE utf8_bin NOT NULL,
  `imie2` varchar(15) COLLATE utf8_bin NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8_bin NOT NULL,
  `data_urodzenia` date NOT NULL,
  `wyksztalcenie` varchar(40) COLLATE utf8_bin NOT NULL,
  `nip` int(10) NOT NULL,
  `telefon` int(9) NOT NULL,
  `idprzedmiotu` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idnauczyciela`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- RELACJE TABELI `nauczyciel`:
--   `idprzedmiotu`
--       `przedmioty` -> `idprzedmiotu`
--

--
-- Zrzut danych tabeli `nauczyciel`
--

INSERT INTO `nauczyciel` (`idnauczyciela`, `login`, `pass`, `imie`, `imie2`, `nazwisko`, `data_urodzenia`, `wyksztalcenie`, `nip`, `telefon`, `idprzedmiotu`) VALUES
(14, 'darek', 'd64a1ef920f5b7ec3eba99da3e1cf257', 'Dariusz', 'Antoni', 'Kowalski', '1966-05-12', 'wyzsze', 12346679, 456789123, 'Historia'),
(13, 'janek', '7a2c76dc456c0cef244977487f7c50ba', 'Janusz', 'Adam', 'JabÅ‚oÅ„ski', '1966-02-12', 'wyzsze', 123456789, 60123456, 'Angielski'),
(17, 'agata', '653b5dd203bc6a3d8b1295904fe1833b', 'Agata', '', 'KamiÅ„ska', '1961-12-06', 'WyÅ¼sze', 123456789, 125487963, 'Polski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `nieobecności`
--
-- Utworzenie: 09 Lut 2013, 11:23
-- Ostatnia aktualizacja: 09 Lut 2013, 11:23
--

CREATE TABLE IF NOT EXISTS `nieobecności` (
  `idNieobecnosci` int(11) NOT NULL,
  `idUcznia` int(11) NOT NULL,
  `IdNauczyciela` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Uwagi` int(11) NOT NULL,
  PRIMARY KEY (`idNieobecnosci`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACJE TABELI `nieobecności`:
--   `IdNauczyciela`
--       `nauczyciel` -> `idnauczyciela`
--   `idUcznia`
--       `uczen` -> `iducznia`
--

--
-- Zrzut danych tabeli `nieobecności`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `oceny`
--
-- Utworzenie: 09 Lut 2013, 11:23
-- Ostatnia aktualizacja: 09 Lut 2013, 11:23
--

CREATE TABLE IF NOT EXISTS `oceny` (
  `iducznia` int(11) NOT NULL,
  `idnauczyciela` int(11) NOT NULL,
  `idrodzaju_oceny` int(11) NOT NULL,
  `idprzedmiotu` int(11) NOT NULL,
  `Ocena` int(11) NOT NULL,
  `DataWystawienia` date NOT NULL,
  `idoceny` int(11) NOT NULL,
  PRIMARY KEY (`idoceny`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACJE TABELI `oceny`:
--   `idnauczyciela`
--       `nauczyciel` -> `idnauczyciela`
--   `idprzedmiotu`
--       `przedmioty` -> `idprzedmiotu`
--   `idrodzaju_oceny`
--       `rodzajocen` -> `idrodzaju_oceny`
--   `iducznia`
--       `uczen` -> `iducznia`
--

--
-- Zrzut danych tabeli `oceny`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `przedmioty`
--
-- Utworzenie: 09 Lut 2013, 11:23
-- Ostatnia aktualizacja: 09 Lut 2013, 11:23
--

CREATE TABLE IF NOT EXISTS `przedmioty` (
  `idprzedmiotu` int(11) NOT NULL AUTO_INCREMENT,
  `przedmiot` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`idprzedmiotu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`idprzedmiotu`, `przedmiot`) VALUES
(2, 'Polski'),
(3, 'Historia'),
(4, 'Angielski'),
(5, 'WF'),
(6, 'Informatyka'),
(7, 'Biologia'),
(8, 'Matematyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `przedmioty_uczniowie`
--
-- Utworzenie: 28 Sty 2013, 18:47
-- Ostatnia aktualizacja: 28 Sty 2013, 18:47
--

CREATE TABLE IF NOT EXISTS `przedmioty_uczniowie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idprzedmiotu` int(11) NOT NULL,
  `iducznia` int(11) NOT NULL,
  `semestr_1_srednia` float NOT NULL,
  `semestr_2_srednia` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- RELACJE TABELI `przedmioty_uczniowie`:
--   `iducznia`
--       `uczen` -> `iducznia`
--

--
-- Zrzut danych tabeli `przedmioty_uczniowie`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `rodzajocen`
--
-- Utworzenie: 09 Lut 2013, 11:24
-- Ostatnia aktualizacja: 09 Lut 2013, 11:24
--

CREATE TABLE IF NOT EXISTS `rodzajocen` (
  `idrodzaju_oceny` int(11) NOT NULL,
  `Nazwa` int(11) NOT NULL,
  PRIMARY KEY (`idrodzaju_oceny`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `rodzajocen`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `uczen`
--
-- Utworzenie: 06 Lut 2013, 19:53
-- Ostatnia aktualizacja: 18 Lut 2013, 12:41
-- Ostatnie sprawdzenie: 06 Lut 2013, 19:53
--

CREATE TABLE IF NOT EXISTS `uczen` (
  `iducznia` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(15) COLLATE utf8_bin NOT NULL,
  `imie2` varchar(15) COLLATE utf8_bin NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8_bin NOT NULL,
  `data_urodzenia` date NOT NULL,
  `telefon` varchar(9) COLLATE utf8_bin NOT NULL,
  `idklasy` text COLLATE utf8_bin NOT NULL,
  `iduwagi` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iducznia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=86 ;

--
-- RELACJE TABELI `uczen`:
--   `idklasy`
--       `klasy` -> `idklasy`
--   `iduwagi`
--       `uwaga` -> `iduwagi`
--

--
-- Zrzut danych tabeli `uczen`
--

INSERT INTO `uczen` (`iducznia`, `imie`, `imie2`, `nazwisko`, `data_urodzenia`, `telefon`, `idklasy`, `iduwagi`) VALUES
(69, 'Stefan', '', 'Nowak', '2000-08-29', '658741236', '1A', ''),
(82, 'Marek', '', 'Nowicz', '1991-07-23', '798654212', '2C', ''),
(47, 'witold', 'kowal', 'kowalski', '1988-12-23', '524789666', '1A', '0'),
(71, 'marian', '', 'lewandowski', '1999-06-24', '896574123', '1A', ''),
(66, 'karol', 'indi', 'wojtyÅ‚a', '1996-02-15', '125487896', '5C', '0'),
(72, 'zdzisÅ‚awa', '', 'ulech', '2001-04-21', '555888777', '1B', ''),
(83, 'gustaw', 'aka', 'irecki', '1998-05-23', '456321789', '1A', ''),
(74, 'roman', '', 'dmowski', '1998-08-28', '789654123', '1B', ''),
(75, 'zygmunt', 'tzreci', 'walezy', '2001-08-29', '222556699', '1B', ''),
(76, 'karol', '', 'kanam', '2002-02-21', '777855566', '1C', ''),
(77, 'anna', '', 'sara', '1997-03-26', '777444111', '1C', ''),
(78, 'ula', 'henia', 'zamkowa', '2001-01-28', '666999888', '2A', ''),
(79, 'henryk', '', 'hadera', '1997-05-29', '221547788', '2A', ''),
(80, 'julian', 'ursyn', 'niemcewicz', '1998-04-22', '333665589', '2B', ''),
(81, 'mariusz', 'andrew', 'jankowski', '2000-05-22', '874521469', '2B', ''),
(84, 'iwona', 'agnieszka', 'nowacka', '1997-05-30', '569877744', '1A', ''),
(85, 'adelajda', '', 'gutwa', '1995-07-29', '336558741', '1A', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `uczen_srednia`
--
-- Utworzenie: 28 Sty 2013, 18:47
-- Ostatnia aktualizacja: 28 Sty 2013, 18:47
--

CREATE TABLE IF NOT EXISTS `uczen_srednia` (
  `iducznia` int(11) NOT NULL,
  `nr_semestru` int(11) NOT NULL,
  `srednia` float NOT NULL,
  `srednia_wazona` float NOT NULL,
  PRIMARY KEY (`iducznia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACJE TABELI `uczen_srednia`:
--   `iducznia`
--       `uczen` -> `iducznia`
--

--
-- Zrzut danych tabeli `uczen_srednia`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--
-- Utworzenie: 28 Sty 2013, 18:47
-- Ostatnia aktualizacja: 28 Sty 2013, 19:11
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `idnauczyciela` int(11) NOT NULL,
  `iducznia` int(11) NOT NULL,
  `iddyrektora` int(11) NOT NULL,
  `idoceny` int(11) NOT NULL,
  `idklasy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- RELACJE TABELI `users`:
--   `iddyrektora`
--       `dyrektor` -> `iddyrektora`
--   `idklasy`
--       `klasy` -> `idklasy`
--   `idnauczyciela`
--       `nauczyciel` -> `idnauczyciela`
--   `idoceny`
--       `oceny` -> `idoceny`
--   `iducznia`
--       `uczen` -> `iducznia`
--

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `idnauczyciela`, `iducznia`, `iddyrektora`, `idoceny`, `idklasy`) VALUES
(1, 'adam', 'ea150c49d4010a4082b877d5ad8e11ba', 'grzesikpiotr@op.pl', 0, 0, 0, 0, 0),
(2, 'admin', '9a52eb233dd56fecd2ba8a9cb3219bb3', 'sepultura@op.pl', 0, 0, 0, 0, 0),
(3, 'ola', 'a577bc9f473d4191c9af7531182040f1', 'alex-lis@o2.pl', 0, 0, 0, 0, 0),
(4, 'qqq', 'f7f9b9de0f2d75cef1f4593a7935dddc', 'qqq@op.pl', 0, 0, 0, 0, 0),
(5, '123', '6164d6e34fce9bfe0ffb17a5dbbca172', '123@op.pl', 0, 0, 0, 0, 0),
(6, 'jurek', '57bfa4070504313891fe111d07d7caa0', 'ws@op.pl', 0, 0, 0, 0, 0),
(7, 'janek', '7a2c76dc456c0cef244977487f7c50ba', 'janek@wp.pl', 0, 0, 0, 0, 0),
(8, 'zbyszek', '3dd631eaefc2f402c7f3e70564f56641', 'f@wp.pl', 0, 0, 0, 0, 0),
(9, 'dupek', '6020b36be75c139a95d1a6a850573ab6', 'd@op.pl', 0, 0, 0, 0, 0),
(10, 'hahaha', '58749f1f2db79a00cf82f4690a970a76', 'ha@op.pl', 0, 0, 0, 0, 0),
(11, '666', '666', '666@wp.pl', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `uwaga`
--
-- Utworzenie: 17 Lut 2013, 14:12
-- Ostatnia aktualizacja: 18 Lut 2013, 20:41
--

CREATE TABLE IF NOT EXISTS `uwaga` (
  `iduwagi` int(11) NOT NULL AUTO_INCREMENT,
  `idnauczyciela` text COLLATE utf8_bin NOT NULL,
  `uczen` text COLLATE utf8_bin NOT NULL,
  `idklasy` text COLLATE utf8_bin NOT NULL,
  `idprzedmiotu` text COLLATE utf8_bin NOT NULL,
  `tresc_uwagi` text COLLATE utf8_bin NOT NULL,
  `data_dodania` datetime NOT NULL,
  PRIMARY KEY (`iduwagi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- RELACJE TABELI `uwaga`:
--   `idnauczyciela`
--       `nauczyciel` -> `idnauczyciela`
--   `idprzedmiotu`
--       `przedmioty` -> `idprzedmiotu`
--

--
-- Zrzut danych tabeli `uwaga`
--

INSERT INTO `uwaga` (`iduwagi`, `idnauczyciela`, `uczen`, `idklasy`, `idprzedmiotu`, `tresc_uwagi`, `data_dodania`) VALUES
(5, 'Dariusz Kowalski', 'iwona nowacka', '1A', 'Historia', 'Brak ksiÄ…Å¼ek i brak przygotowania do lekcji.', '2013-02-18 14:55:34'),
(6, 'Dariusz Kowalski', 'Stefan Nowak', '1A', 'Historia', 'PyskowaÅ‚ na lekcji. Ordynarnie odnosiÅ‚ siÄ™ do nauczyciela!', '2013-02-18 14:58:59'),
(7, 'Dariusz Kowalski', 'adelajda gutwa', '1A', 'Historia', 'Brak sÅ‚Ã³w. Nie doÅ›Ä‡, Å¼e nic nie umie, to jeszcze tragicznie zachowuje siÄ™.', '2013-02-18 14:59:31'),
(8, 'Dariusz Kowalski', 'roman dmowski', '1B', 'Historia', 'pyskowaÅ‚ na leksji', '2013-02-18 20:32:20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `zajecia`
--
-- Utworzenie: 16 Lut 2013, 14:36
-- Ostatnia aktualizacja: 04 Mar 2013, 18:04
--

CREATE TABLE IF NOT EXISTS `zajecia` (
  `idzajecia` int(11) NOT NULL AUTO_INCREMENT,
  `idklasy` text COLLATE utf8_bin NOT NULL,
  `idprzedmiotu` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idzajecia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=86 ;

--
-- RELACJE TABELI `zajecia`:
--   `idklasy`
--       `klasy` -> `idklasy`
--   `idprzedmiotu`
--       `przedmioty` -> `idprzedmiotu`
--

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`idzajecia`, `idklasy`, `idprzedmiotu`) VALUES
(11, '2C', 'Informatyka'),
(85, '1A', '');
COMMIT;
