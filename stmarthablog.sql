-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 06:54 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stmarthablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tposts`
--

CREATE TABLE IF NOT EXISTS `tposts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pDate` date NOT NULL,
  `pTitle` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pDesc` text CHARACTER SET utf8 COLLATE utf8_bin,
  `pContents` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pAuthor` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `tUsers_ID` (`pAuthor`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tposts`
--

INSERT INTO `tposts` (`ID`, `pDate`, `pTitle`, `pDesc`, `pContents`, `pAuthor`) VALUES
(1, '2015-11-01', 'Monday', '<p>Had to update this bad boy!</p>', '<div id="wrapper"><!--?php include(''menu.php'');?-->\r\n<p style="margin: 0px 0px 20px; padding: 0px; line-height: 17px; letter-spacing: 0px;">Lorem ipsum cras semper primis quisque dictumst nisl pellentesque, varius accumsan ad sit cras adipiscing suspendisse volutpat justo, nisi fringilla sagittis auctor venenatis volutpat rutrum.</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; line-height: 17px; letter-spacing: 0px;">In hendrerit blandit velit netus nec torquent vel iaculis, auctor ultricies gravida mollis purus massa ac, iaculis imperdiet lacinia semper faucibus quam sem.</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; line-height: 17px; letter-spacing: 0px;">Nam accumsan mollis sollicitudin nisi vulputate orci viverra inceptos commodo gravida, a fusce viverra nulla curae consectetur enim consectetur maecenas, senectus interdum placerat pharetra tellus posuere malesuada tempus nunc.</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; line-height: 17px; letter-spacing: 0px;">Lectus class ut mauris etiam cubilia vehicula non in faucibus massa, elit sociosqu duis fringilla tellus lectus ut facilisis iaculis felis vehicula cras scelerisque cubilia class nisi.</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; line-height: 17px; letter-spacing: 0px;">Pellentesque semper ut orci non ultrices mauris senectus conubia, est taciti per justo ac aliquam interdum nullam, vitae facilisis duis fermentum per condimentum orci aliquam risus potenti congue id ultricies velit sodales.</p>\r\n</div>', 'brianne'),
(2, '2015-11-05', 'Thursday', '<p>see if this works</p>', '<p>al;skdjfopaisudgopaisdpoias</p>', 'brianne'),
(3, '2015-11-05', 'smith1jason', '<p>Does picking by posts work via WHERE author?</p>', '<p>;alskjpofiaupoiwnea,.msn;blk</p>', 'smith1jason'),
(4, '2015-11-05', 'Success!', '<p>Here''s what I did.......</p>', '<p>Created a $user variable in admin/index.php like this:</p>\r\n<p>&nbsp;</p>\r\n<p>$user = $_SESSION[''author''];</p>\r\n<p>&nbsp;</p>\r\n<p>Then used this as a variable in the SELECT FROM call WHERE pAuthor = ''".$user."'' SORT BY ID DESC and now the currently logged in user only sees his/her posts in the admin page, this will prevent others from deleting your posts or editing them!</p>', 'smith1jason'),
(5, '2015-11-05', 'Dylan''s First Post', '<p>This is my first post, yipee!</p>', '<p style="box-sizing: border-box; margin: 0px 0px 24px; border: 0px; padding: 0px; vertical-align: baseline; color: #333333; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Bacon ipsum dolor amet chicken venison shankle chuck, shoulder jerky fatback meatloaf pig sausage. Picanha pork belly meatloaf pancetta andouille jerky capicola kielbasa swine biltong brisket turducken short loin beef ribs. Porchetta leberkas shank swine short loin pork belly spare ribs, landjaeger prosciutto shoulder. Leberkas sausage hamburger, prosciutto salami flank spare ribs shankle strip steak pork loin tongue pancetta. Tail spare ribs tenderloin, doner frankfurter beef jerky turducken bresaola turkey pork shoulder short ribs boudin kielbasa. Jowl pork loin pork belly prosciutto filet mignon kevin, strip steak drumstick chuck pastrami pancetta swine meatball kielbasa short loin. Picanha turkey swine, chicken ham hock sirloin boudin cow shoulder shankle brisket chuck.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 24px; border: 0px; padding: 0px; vertical-align: baseline; color: #333333; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Ball tip alcatra brisket, biltong swine doner pork chop spare ribs drumstick chuck turducken. Jerky capicola shank short ribs tail fatback pancetta corned beef shankle tongue shoulder beef ribs cupim. Beef ribs cow ball tip, doner pancetta meatball filet mignon sausage pastrami. Picanha pork pork chop, meatloaf boudin tri-tip ground round corned beef frankfurter drumstick pastrami. Meatloaf ball tip short loin tail pork belly tongue, doner ham hock.</p>', 'dylan'),
(6, '2015-11-05', 'Barebones', '<p>Joe''s first post</p>', '<p style="box-sizing: border-box; margin: 0px 0px 24px; border: 0px; padding: 0px; vertical-align: baseline; color: #333333; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Bacon ipsum dolor amet chicken venison shankle chuck, shoulder jerky fatback meatloaf pig sausage. Picanha pork belly meatloaf pancetta andouille jerky capicola kielbasa swine biltong brisket turducken short loin beef ribs. Porchetta leberkas shank swine short loin pork belly spare ribs, landjaeger prosciutto shoulder. Leberkas sausage hamburger, prosciutto salami flank spare ribs shankle strip steak pork loin tongue pancetta. Tail spare ribs tenderloin, doner frankfurter beef jerky turducken bresaola turkey pork shoulder short ribs boudin kielbasa. Jowl pork loin pork belly prosciutto filet mignon kevin, strip steak drumstick chuck pastrami pancetta swine meatball kielbasa short loin. Picanha turkey swine, chicken ham hock sirloin boudin cow shoulder shankle brisket chuck.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 24px; border: 0px; padding: 0px; vertical-align: baseline; color: #333333; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Ball tip alcatra brisket, biltong swine doner pork chop spare ribs drumstick chuck turducken. Jerky capicola shank short ribs tail fatback pancetta corned beef shankle tongue shoulder beef ribs cupim. Beef ribs cow ball tip, doner pancetta meatball filet mignon sausage pastrami. Picanha pork pork chop, meatloaf boudin tri-tip ground round corned beef frankfurter drumstick pastrami. Meatloaf ball tip short loin tail pork belly tongue, doner ham hock.</p>', 'jmudd'),
(7, '2015-11-09', 'Johnny Post', '<p>This is Johnny''s first post!</p>', '<p>Sum expectantes. Ego hodie expectantes. Expectantes, et misit unum de pueris Gus interficere. Et suus vos. Nescio quis, qui est bonus usus liberi ad Isai? Qui nosti ... Quis dimisit filios ad necem ... hmm? Gus! Est, ante me factus singulis decem gradibus. Et nunc ad aliud opus mihi tandem tollendum est puer ille consensus et nunc fugit. Ipse suus obtinuit eam. Non solum autem illa, sed te tractantur in se trahens felis.</p>\r\n<p>No! Hoc non credant? Gus habet cameras ubique placet. Audire te! Non, omnia novit, omnia simul. Ubi eras hodie? In Lab! Et vos nolite cogitare suus ''possible ut Tyrus de cigarette elevaverunt CAPSA vestris? Age! Tu non vides? Pompeius extrema partem es. Tu omne quod ille voluit.</p>\r\n<p>Tu nunc coci ejus. Tu autem cocus Lab et probavimus liceat mihi sine causa est nunc coci interficere. Reputo it! Suus egregie. Ut antecedat. Quod si putas me posse facere, ergo ante. Pone aute in caput, et nunc interficere. Faciat! Fac. Fac. Fac.</p>\r\n<p>Saule ... , ostendit quod hoc quidem ... hoc quod dixit, ... potuit adiutorium mihi, et educat me in tota vita nova facio certus ut Im ''non invenit. Ego quidem illius memini Saul. Gus sit amet interf&iacute;ciat mei tota familia. Nunc opus est mihi iste. Saul ... nunc Saule.</p>', 'Johnny');

-- --------------------------------------------------------

--
-- Table structure for table `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tusers`
--

INSERT INTO `tusers` (`user_id`, `username`, `password`, `email`) VALUES
(8, 'brianne', '$2y$10$BPG1R9lmW4neXfGwj9J1h.ziH1wSezTP0XqSOaquSFLGxB/Ic6G9S', 'brianne'),
(10, 'smith1jason', '$2y$10$ti37TFLM3jESi.fTjcccWOnmNAq.tcUy/HvKecxbS9saoCh6X.PQG', 'smith1jason@yahoo.com'),
(11, 'dylan', '$2y$10$AHYvFlzQXYNbyoO9Oc36PuP/fIgOjlQk4LgiaB4ByxaHRJxsTOmhu', 'dylanjsmith@aol.com'),
(12, 'candice', '$2y$10$lI2jhZu2uiFNx.iTaN7QaeM638JSn8dPGynWs.opm9LZ7ZXWX3LOe', 'candice@aol.com'),
(13, 'jmudd', '$2y$10$s/OyVfPBrHAatv2/RPKgC.gHd28ftPB2tREzU2hGam.pVi3IAhQ3a', 'joe@aol.com'),
(14, 'Johnny', '$2y$10$r5l8vr6cwpHKHNoqyk4uKe34T0iKvwk1pzlM7tmEewsSBi2GvvEPO', 'jon@johnny.com'),
(15, 'melissa', '$2y$10$iP0n7O1LPx0qw8ZBPSPg2uiP0dSY5I/MJ4hfH/nLltDAxAy2dK/Uu', 'mel@aol.com'),
(16, 'jayberry', '$2y$10$CXsWFHM9s7RpM72pgwumfONtpga2aq.KlqcTxdnV8Agk7mXmLFpx2', 'dudu@aol.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
