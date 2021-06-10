-- database
DROP DATABASE IF EXISTS website_unijui;
CREATE DATABASE website_unijui;
USE website_unijui;

-- database user
CREATE USER IF NOT EXISTS 'dbuser'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON website_unijui.* TO 'dbuser'@'localhost';

-- users
CREATE TABLE IF NOT EXISTS `users` (
  `PK_user_id` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(45) UNIQUE NOT NULL,
  `email` varchar(60) UNIQUE NOT NULL,
  `password` varchar(60) NOT NULL,
   PRIMARY KEY(PK_user_id)
);


-- games
CREATE TABLE IF NOT EXISTS `games` (
  PK_game_id int(10) NOT NULL AUTO_INCREMENT,
  `FK_author` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(300),
  `upload_date`date,
   PRIMARY KEY(PK_game_id)
);

ALTER TABLE `games`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`FK_author`) REFERENCES `users` (`PK_user_id`);


-- categories
CREATE TABLE IF NOT EXISTS `categories` (
  `PK_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
   PRIMARY KEY(PK_cat_id)
);


-- game categories
CREATE TABLE IF NOT EXISTS `game_categories` (
  `FK_cat_id` int(10) NOT NULL,
  `FK_game_id` int(10) NOT NULL,
   PRIMARY KEY(FK_cat_id, FK_game_id)
);

ALTER TABLE `game_categories`
  ADD CONSTRAINT `game_cat_ibfk_1` FOREIGN KEY (`FK_cat_id`) REFERENCES `categories` (`PK_cat_id`);
  
  ALTER TABLE `game_categories`
  ADD CONSTRAINT `game_cat_ibfk_2` FOREIGN KEY (`FK_game_id`) REFERENCES `games` (`PK_game_id`);

-- player messages
CREATE TABLE IF NOT EXISTS `player_messages` (
  `PK_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
`email` varchar(60) NOT NULL,
  `message` varchar(300) NOT NULL,
   PRIMARY KEY(PK_id)
);

-- automatic game creation data
ALTER TABLE `games` CHANGE `upload_date` `upload_date` DATE NULL DEFAULT CURRENT_TIMESTAMP;

-- categories data
 INSERT INTO `categories` (`PK_cat_id`, `name`) VALUES
(1, 'Shooter'),
(2, 'Clicker'),
(3, 'Plataforma'),
(4, 'Luta');

-- users data
INSERT INTO `users` (`PK_user_id`, `nickname`, `email`, `password`) VALUES
(1, 'Kafael Ruhn', 'rafa.faelk@gmail.com', '$2y$10$k.6gLAXTwsZFvjzaETvEsOCqh2J9irEAkqfUe/72qcd3TbiyaJq4i'),
(2, 'Sodrigo Ronego', 'rodrigoasonego@gmail.com', '$2y$10$sLf6mWQU3LaQhwnpdmRRA.4BCIJ7ZbSUNEZ/dAXE9IzOp5e1bRMCC');

-- games data
INSERT INTO `games` (`PK_game_id`, `FK_author`, `title`, `description`, `upload_date`) VALUES
(1, 1, 'Star Clicker', 'Você deve clicar em todas as estrelas antes do amanhecer!<br>\r\nNa noite seguinte as estrelas nascerão novamente, e você terá que começar do zero!', '2021-05-29'),
(2, 2, 'Sphere Shooter', 'Atire com o mouse nas esferas que se aproximam e atinja a maior pontuação possível!', '2021-06-06');

-- first player message
INSERT INTO `player_messages` (`PK_id`, `name`, `email`, `message`) VALUES (NULL, 'Jogador Rafadrigo', 'rafa.sonego@drigo.conto.com', 'Opa! Mande sua mensagem lá que ela aparecerá aqui junto da minha!');

-- categories of the games
INSERT INTO `game_categories` (`FK_cat_id`, `FK_game_id`) VALUES ('2', '1'), ('1', '2');