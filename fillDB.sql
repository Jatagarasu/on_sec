DELETE FROM course_instructions;
DELETE From course_keywords;
DELETE FROM course_moderators;
DELETE FROM course_subscriber;
DELETE FROM instruction_keywords;
DELETE From instruction_moderators;
DELETE FROM instruction_questions;
DELETE FROM room_keywords;
DELETE FROM completed_instruction;
DELETE From user_roles;
DELETE FROM answer;
DELETE FROM course;
DELETE FROM instruction;
DELETE From keyword;
DELETE FROM question;
DELETE FROM role;
DELETE FROM room;
DELETE FROM user;

INSERT INTO `user` (`id`, `surname`, `firstname`, `email`, `notification_active`, `password`) VALUES
(1, 'Witte', 'Günther', 'witte@fh-duesseldorf.de', 1, '$2a$06$FeDwpvsMSYI268YtvsM1RuMq8okm/eg4uixhFd7YRSarmncfyA5ka'),
(2, 'Hiller', 'Helmut', 'helmut.hiller@fh-duesseldorf.de ', 0, '$2a$06$MbRirWMaJawkJ6Afy.lCs.qi2Y4lKLgtnFwxqw1g2AtN/WLriPHrq'),
(3, 'Emmerich', 'Lars-Arne', 'larsarne.emmerich@hs-duesseldorf.de', 0, '$2a$06$8eiubMKQ.mqmXOXwJvsEautxeVQW.VPrqIBmpn.LFrjgcTatT4IoK'),
(4, 'Pleß', 'Alexander', 'alexander.pless@study.hs-duesseldorf.de', 1, '$2a$06$coy8ZpUFjt9y6kwn/DINx.c3wr8Tq/SvjErKIzIgjch02MtnlEM1q'),
(5, 'Quessel', 'Tobias', 'tobias.qu@gmail.com', 0, '$2a$06$baqSMb68xB3OawNe7e/s7OWt2U7zXwBbW7BvdpzIzoBab3TNk1yH2'),
(6, 'Schneider', 'Caroline', 'coco-schneider@gmx.de', 1, '$2a$06$.mr6AxyrIomveSiix/8lp.//emV.t7g40RBoDo3cfXdwiCgr4Y1NG'),
(7, 'Vogelskamp', 'Daniel', 'daniel.vogelskamp@gmail.com', 1, '$2a$06$6.W74Mg8NYtzV5KHoQkN6uQ1UUpT9.Gqzwa7dp0xHixHsoFzuiEvO'),
(8, 'Holl', 'Markus', 'JimKnopf182@web.de', 1, '$2a$06$I6xU79d.j7X9TBQTss2HVuzeGMctvJADSjhz6QF3rrSKoez2lkoCe'),
(9, 'Landry', 'David', 'bimse110@gmail.com', 0, '$2a$06$AWsGrEAr4dWHpstipghF4OOK35Bmxelo7waOwi.rbPXLS2Q/k1wAK');

INSERT INTO `instruction` (`id`, `description`, `pdf_link`, `owner_id`, `expiretime`) VALUES
(1, 'Abfall ABC', 'abfall.pdf', 1, 2017),
(2, 'Brandschutz', 'Brandschutzunterweisung.pdf', 2, 123),
(3, 'Laser', 'Lasersicherheit.pdf', 2, 23),
(4, 'Leiter', 'leiter.pdf', 2, 300),
(5, 'Sicherheitsunterweisung Beschäftigte', 'Sicherheitsunterweisung_HSD-Beschaeftigte.pdf', 1, 25),
(6, 'Sicherheitsunterweisung Studierende', 'Sicherheitsunterweisung_HSD-Studierende.pdf', 1, 200);

INSERT INTO `question` (`id`, `owner_id`, `question_text`, `image_path`, `created_on`, `updated_on`) VALUES
(3, 1, 'Was für Abfallstoffe gibt es?', 'images/muell.jpg', '2017-03-20 00:00:00', '2017-03-20 00:00:00'),
(5, 2, 'Welche Abfallstoffe gibt es nicht?', 'images/muell.jpg', '2017-03-19 00:00:00', '2017-03-21 00:00:00'),
(6, NULL, 'Was macht man bei größeren Mengen Styropor?', 'images/styropor.jpg', '2017-03-18 00:00:00', '2017-03-30 00:00:00'),
(7, NULL, 'Welche Ansprechpartner gibt es an der HSD?', 'images/HSD_Marke.png', NULL, NULL),
(8, NULL, 'Was sind Sonderabfälle?', 'images/abfall.png', NULL, NULL),
(9, NULL, 'Welche Schutzinteressen verfolgt der Bandschutz?', NULL, '2017-03-15 00:00:00', NULL),
(10, NULL, 'Wie muss man sich im Brandfall verhalten?', 'images/brandfall.jpg', '2017-03-22 00:00:00', '2017-03-30 00:00:00'),
(11, NULL, 'Welches Rettungszeichen ist hier zu sehen?', 'images/fluchtwegschild.jpg', '2017-03-22 00:00:00', '2017-03-30 00:00:00'),
(12, NULL, 'Welche Gefahren entstehen durch Brandgase?', NULL, '2017-03-31 00:00:00', NULL),
(13, NULL, 'Welche Laserklassen gibt es?', 'images/laser.png', NULL, NULL),
(14, NULL, 'Aus welcher Laserklasse ist ein Laserstrahl für das Auge schädlich?', NULL, '2017-03-16 00:00:00', NULL),
(15, NULL, 'Was ist der EGW?', NULL, NULL, NULL),
(16, NULL, 'Welches Zeichen steht für die Wellenlänge?', 'images/wellenlaenge.gif', '2017-03-16 00:00:00', NULL),
(17, NULL, 'Leitern mit welchem Sigel sollte man verwenden?', NULL, '2017-03-22 00:00:00', '2017-03-22 00:00:00'),
(18, NULL, 'Welche Aussagen stimmen?', NULL, NULL, NULL),
(19, NULL, 'Wie groß sollte der Anstellwinkel bei Anlegeleitern sein?', 'images/leiter.jpg', NULL, NULL),
(20, NULL, 'Was sollte man bei Tritten beachten?', 'images/trittleiter.jpg', NULL, NULL),
(21, NULL, 'Wann wird der Defibrillator ausschließlich eingesetzt?', 'images/Defi_Lebensretter.jpg', NULL, NULL),
(22, NULL, 'Wo trifft man sich im Brandfall?', 'images/brandfall.jpg', NULL, NULL),
(23, NULL, 'Was ist bei einem Amoklauf zu beachten?', NULL, NULL, NULL),
(24, NULL, 'Wann wird erste Hilfe benötigt?', NULL, NULL, NULL),
(25, NULL, 'Was ist im Brandfall zu beachten?', 'images/brandfall.jpg', '2017-03-21 00:00:00', '2017-03-22 00:00:00');

INSERT INTO `answer` (`id`, `question_id`, `answer_text`, `is_correct`, `created_on`, `updated_on`) VALUES
(1, 8, 'Spraydosen', 1, NULL, NULL),
(2, 8, 'Farben und Lacke', 1, NULL, NULL),
(3, 8, 'Holz', 0, '2017-03-21 00:00:00', '2017-03-22 00:00:00'),
(4, 8, 'Altöle', 1, NULL, NULL),
(5, 8, 'Styropor', 0, NULL, NULL),
(6, 7, 'Klaus Freimuth', 1, NULL, NULL),
(7, 7, 'Günther Witte', 0, NULL, NULL),
(8, 7, 'Helmut Hiller', 0, NULL, NULL),
(9, 7, 'Jürgen Bons', 1, NULL, NULL),
(10, 6, 'an das Team 4.1 wenden', 1, NULL, NULL),
(11, 6, 'andere Studierende Informieren', 0, NULL, NULL),
(12, 6, 'Mail an gebaeudeservice@hs-duesseldorf.de bzw. neubau@hs-duesseldorf.de', 1, NULL, NULL),
(13, 6, 'Mail an geier@hs-duesseldorf.de', 0, NULL, NULL),
(14, 6, 'Abfallsammelraum des jeweiligen Gebäudes suchen', 1, NULL, NULL),
(15, 3, 'Sperrmüll', 1, NULL, NULL),
(16, 3, 'Kühlschränke', 1, '2017-03-15 00:00:00', '2017-03-22 00:00:00'),
(17, 3, 'Verpackungen', 1, NULL, NULL),
(18, 5, 'Restmüll', 0, NULL, NULL),
(19, 5, 'Filter', 0, NULL, NULL),
(20, 5, 'Reifen', 1, NULL, NULL),
(21, 9, 'Tiere', 1, NULL, NULL),
(22, 9, 'Menschenleben', 1, NULL, NULL),
(23, 9, 'Autoindustrie', 0, NULL, NULL),
(24, 9, 'Umwelt', 1, NULL, NULL),
(25, 9, 'wirtschaftliche Interessen', 1, NULL, NULL),
(26, 9, 'politische Interessen', 0, NULL, NULL),
(27, 10, 'nach Hause gehen', 0, NULL, NULL),
(28, 10, 'panisch umherlaufen', 0, NULL, NULL),
(29, 10, 'Menschen retten', 1, NULL, NULL),
(30, 10, 'Feuer löschen', 1, NULL, NULL),
(31, 10, 'Feuerwehr alarmieren', 1, NULL, NULL),
(32, 11, 'Notruftelefon', 0, NULL, NULL),
(33, 11, 'Feuerlöschgerät', 0, NULL, NULL),
(34, 11, 'Notausgang', 1, NULL, NULL),
(35, 11, 'Erste Hilfe', 0, NULL, NULL),
(36, 12, 'Vergiftung', 1, NULL, NULL),
(37, 12, 'Kälte', 0, NULL, NULL),
(38, 12, 'Qualm', 1, NULL, NULL),
(44, 16, 'µ', 0, NULL, NULL),
(45, 16, 'm²', 0, NULL, NULL),
(46, 16, 'λ', 1, NULL, NULL),
(47, 16, 'J', 0, NULL, NULL),
(48, 15, 'Eigentumswohnung', 0, NULL, NULL),
(49, 15, 'Expositionsgrenzwerte', 1, NULL, NULL),
(50, 15, 'Explosionsgrauwert', 0, NULL, NULL),
(51, 15, 'Extremwert', 0, NULL, NULL),
(52, 14, '1', 0, NULL, NULL),
(53, 14, '2', 0, NULL, NULL),
(54, 14, '3', 1, NULL, NULL),
(55, 14, '4', 1, NULL, NULL),
(56, 13, 'Klasse 3B', 1, NULL, NULL),
(57, 13, 'Klasse 1N', 0, NULL, NULL),
(58, 13, 'Klasse 2M', 1, NULL, NULL),
(59, 13, 'Klasse 4B', 0, NULL, NULL),
(60, 20, 'Ausklappbare Tritte gegen Zusammenklappen sichern', 1, NULL, NULL),
(61, 20, 'Tritte nur auf rutschigem Untergrund verwenden', 0, NULL, NULL),
(62, 20, 'Tritte können problemlos auf Tischen verwendet werden', 0, NULL, NULL),
(63, 20, 'Ausziehbare Tritte gegen verschieben sichern', 1, NULL, NULL),
(64, 19, '58-67°', 0, NULL, NULL),
(65, 19, '68°-75°', 1, NULL, NULL),
(66, 19, '76°-88°', 0, NULL, NULL),
(67, 17, 'TÜV', 0, NULL, NULL),
(68, 17, 'GS', 1, NULL, NULL),
(69, 17, 'LTE', 0, NULL, NULL),
(70, 17, 'DGUV', 1, NULL, NULL),
(71, 17, 'VBG', 0, NULL, NULL),
(72, 17, 'BuT', 0, NULL, NULL),
(73, 18, 'Leitern nicht an unverschlossenen Türen, Spanndrähten oder ähnlichen Stützpunkten anlegen.', 1, NULL, NULL),
(74, 18, 'Anlegeleitern dürfen höchstens 1 m über die Aus-/Übertrittsstelle hinausragen.', 0, NULL, NULL),
(75, 18, 'Stehleitern bis zur obersten Sprosse besteigen.', 0, NULL, NULL),
(76, 18, 'Stehleitern nicht als Anlegeleitern verwenden.', 1, NULL, NULL),
(77, 25, 'Ruhe bewahren ', 1, NULL, NULL),
(78, 25, 'Notruf 123 wählen', 0, NULL, NULL),
(79, 25, 'HSD Sicherheitszentrale informieren ', 1, NULL, NULL),
(80, 25, 'Gebäude schnellstmöglich verlassen', 0, NULL, NULL),
(81, 24, 'wenn jemand hunger hat', 0, NULL, NULL),
(82, 24, 'in den Vorlesungspausen', 0, NULL, NULL),
(83, 24, 'wenn eine oder mehrere Personen verletzt sind', 1, NULL, NULL),
(84, 24, 'wenn Personen sich nicht selbst helfen können', 1, NULL, NULL),
(85, 23, 'Feueralarm auslösen', 0, NULL, NULL),
(86, 23, 'Verstecken/Verbarrikadieren', 1, NULL, NULL),
(87, 23, 'Verdächtige Gegenstände unbedingt liegen lassen!', 1, NULL, NULL),
(88, 23, 'Notruf 110 wählen', 1, NULL, NULL),
(89, 23, 'Warten, bis sich Rettungskräfte oder Polizei melden', NULL, NULL, NULL),
(90, 22, 'Cafeteria', 0, NULL, NULL),
(91, 22, 'Dach des Gebäudes', 0, NULL, NULL),
(92, 22, 'Sammelplatz', 1, NULL, NULL),
(93, 22, 'nächste Frittenbude', 0, NULL, NULL),
(94, 22, 'am nächsten Feuerlöscher', 0, NULL, NULL),
(95, 22, 'in der Tiefgarage', 0, NULL, NULL),
(96, 21, 'bei Schwindelgefühlen', 0, NULL, NULL),
(97, 21, 'ausschließlich bei Bewusstlosigkeit, keine Atmung und kein Puls', 1, NULL, NULL),
(98, 21, 'bei weichen Knien', 0, NULL, NULL);

INSERT INTO `keyword` (`id`, `description`) VALUES
(1, 'Licht'),
(2, 'Kamera'),
(3, 'Leiter'),
(4, 'Mülleimer'),
(5, 'Abfall'),
(6, 'Dreck'),
(7, 'Hochschule'),
(8, 'Feuer');

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'ROLE_MODERATOR'),
(2, 'ROLE_ADMIN'),
(3, 'ROLE_SUPERADMIN');

INSERT INTO `room` (`id`, `description`) VALUES
(1, 'Lichtlabor'),
(2, 'Müllraum'),
(3, 'Hörsaal');

INSERT INTO `course` (`id`, `room`, `owner_id`, `description`) VALUES
(1, 1, 1, 'Lichttechnik für Medieninformatiker'),
(2, 2, 2, 'Mülltrennung für Medientechniker');

INSERT INTO `course_instructions` (`course_id`, `instruction_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(2, 1),
(2, 6);

INSERT INTO `course_keywords` (`course_id`, `keyword_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6);

INSERT INTO `course_moderators` (`course_id`, `user_id`) VALUES
(1, 3),
(2, 1),
(2, 3);

INSERT INTO `course_subscriber` (`id`, `course_id`, `user_id`, `subscribtion_date`) VALUES
(1, 1, 4, '2017-03-07 00:00:00'),
(2, 1, 5, '2017-03-06 00:00:00'),
(3, 1, 6, '2017-03-05 00:00:00'),
(4, 1, 7, '2017-03-04 00:00:00'),
(5, 2, 4, '2017-03-03 00:00:00'),
(6, 2, 5, '2017-03-02 00:00:00'),
(7, 2, 8, '2017-01-01 00:00:00'),
(8, 2, 9, '2017-02-01 00:00:00');


INSERT INTO `instruction_keywords` (`instruction_id`, `keyword_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(2, 8),
(3, 2),
(4, 3),
(5, 7),
(6, 7);

INSERT INTO `instruction_moderators` (`instruction_id`, `user_id`) VALUES
(1, 3),
(2, 1),
(2, 3),
(4, 1),
(5, 3),
(6, 3);

INSERT INTO `instruction_questions` (`instruction_id`, `question_id`) VALUES
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(6, 25);

INSERT INTO `room_keywords` (`room_id`, `keyword_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7);

INSERT INTO `completed_instruction` (`id`, `instruction_id`, `user_id`, `expire_date`, `completion_date`) VALUES
  (1, 1, 5, '2017-05-19 00:00:00', '2017-03-01 00:00:00'),
  (2, 4, 4, '2017-07-15 00:00:00', '2017-02-01 00:00:00'),
  (3, 5, 6, '2017-09-15 00:00:00', '2017-03-10 00:00:00'),
  (6, 1, 8, '2017-04-15 00:00:00', '2017-03-13 00:00:00'),
  (7, 6, 8, '2017-03-24 00:00:00', '2017-01-16 00:00:00'),
  (8, 2, 9, '2017-05-19 00:00:00', '2017-01-17 00:00:00');

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `instruction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `keyword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `course_subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

