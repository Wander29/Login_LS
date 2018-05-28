-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 28, 2018 alle 21:02
-- Versione del server: 5.7.17
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login441`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comuniterni`
--

CREATE TABLE `comuniterni` (
  `CodComune` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cap` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `comuniterni`
--

INSERT INTO `comuniterni` (`CodComune`, `nome`, `cap`) VALUES
(1, 'Terni', '05100'),
(2, 'Orvieto', '05018'),
(3, 'Narni', '05035'),
(4, 'Amelia', '05022'),
(5, 'Montecastrilli', '05026'),
(6, 'San Gemini', '05029');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_utente`
--

CREATE TABLE `tipo_utente` (
  `CodTipoUt` int(5) UNSIGNED NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `permessi` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tipo_utente`
--

INSERT INTO `tipo_utente` (`CodTipoUt`, `tipo`, `permessi`) VALUES
(1, 'admin', 'HOME_VIEW_INS_LOG'),
(2, 'utente', 'HOME_VIEW');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `CodUser` int(5) UNSIGNED NOT NULL,
  `email` varchar(200) NOT NULL,
  `psw` varchar(150) NOT NULL,
  `FkTipoUtente` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`CodUser`, `email`, `psw`, `FkTipoUtente`) VALUES
(1, 'stefano@admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'ludo@mail', '28fdcc190153c0fd2ff538ec18fcc113', 2),
(3, 'marco@pianta', '7e61fb9add27cf6844d35fd50b8a8707', 2),
(4, 'paolo@romano', '2e92d188dbdbd88e7c15831f4abfe1fc', 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comuniterni`
--
ALTER TABLE `comuniterni`
  ADD PRIMARY KEY (`CodComune`);

--
-- Indici per le tabelle `tipo_utente`
--
ALTER TABLE `tipo_utente`
  ADD PRIMARY KEY (`CodTipoUt`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CodUser`),
  ADD KEY `FkTipoUtente` (`FkTipoUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `comuniterni`
--
ALTER TABLE `comuniterni`
  MODIFY `CodComune` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `tipo_utente`
--
ALTER TABLE `tipo_utente`
  MODIFY `CodTipoUt` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `CodUser` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
