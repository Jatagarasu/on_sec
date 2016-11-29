-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema onsec
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema onsec
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `onsec` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `onsec` ;

-- -----------------------------------------------------
-- Table `onsec`.`rechte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`rechte` ;

CREATE TABLE IF NOT EXISTS `onsec`.`rechte` (
  `rechte_id` INT NOT NULL AUTO_INCREMENT,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`rechte_id`),
  UNIQUE INDEX `rechte_id_UNIQUE` (`rechte_id` ASC),
  UNIQUE INDEX `bezeichnung_UNIQUE` (`bezeichnung` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`rolle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`rolle` ;

CREATE TABLE IF NOT EXISTS `onsec`.`rolle` (
  `rolle_id` INT NOT NULL AUTO_INCREMENT,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`rolle_id`),
  UNIQUE INDEX `rolle_id_UNIQUE` (`rolle_id` ASC),
  UNIQUE INDEX `bezeichnung_UNIQUE` (`bezeichnung` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`user` ;

CREATE TABLE IF NOT EXISTS `onsec`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `rolle_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `vorname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `benachrichtigung` TINYINT(1) NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
  INDEX `rolle_id_idx` (`rolle_id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `usr_rolle_id`
  FOREIGN KEY (`rolle_id`)
  REFERENCES `onsec`.`rolle` (`rolle_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`keywords`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`keywords` ;

CREATE TABLE IF NOT EXISTS `onsec`.`keywords` (
  `key_id` INT NOT NULL AUTO_INCREMENT,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`key_id`),
  UNIQUE INDEX `key_id_UNIQUE` (`key_id` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`raum`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`raum` ;

CREATE TABLE IF NOT EXISTS `onsec`.`raum` (
  `raum_nr` VARCHAR(12) NOT NULL,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`raum_nr`),
  UNIQUE INDEX `raum_nr_UNIQUE` (`raum_nr` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`raum_keywords`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`raum_keywords` ;

CREATE TABLE IF NOT EXISTS `onsec`.`raum_keywords` (
  `raum_id` VARCHAR(12) NOT NULL,
  `keyword_id` INT NOT NULL,
  PRIMARY KEY (`raum_id`, `keyword_id`),
  INDEX `key_id_idx` (`keyword_id` ASC),
  CONSTRAINT `raumkey_raum_id`
  FOREIGN KEY (`raum_id`)
  REFERENCES `onsec`.`raum` (`raum_nr`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `raumkey_keyword_id`
  FOREIGN KEY (`keyword_id`)
  REFERENCES `onsec`.`keywords` (`key_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`kurs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`kurs` ;

CREATE TABLE IF NOT EXISTS `onsec`.`kurs` (
  `kurs_id` INT NOT NULL AUTO_INCREMENT,
  `raum_nr` VARCHAR(12) NOT NULL,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`kurs_id`),
  UNIQUE INDEX `kurs_id_UNIQUE` (`kurs_id` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`user_rechte_kurs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`user_rechte_kurs` ;

CREATE TABLE IF NOT EXISTS `onsec`.`user_rechte_kurs` (
  `rechte_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `kurs_id` INT NOT NULL,
  PRIMARY KEY (`rechte_id`, `user_id`, `kurs_id`),
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `kurs_id_idx` (`kurs_id` ASC),
  CONSTRAINT `usrrechtkrs_rechte_id`
  FOREIGN KEY (`rechte_id`)
  REFERENCES `onsec`.`rechte` (`rechte_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `usrrechtkrs_user_id`
  FOREIGN KEY (`user_id`)
  REFERENCES `onsec`.`user` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `usrrechtkrs_kurs_id`
  FOREIGN KEY (`kurs_id`)
  REFERENCES `onsec`.`kurs` (`kurs_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`kurs_keywords`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`kurs_keywords` ;

CREATE TABLE IF NOT EXISTS `onsec`.`kurs_keywords` (
  `keyword_id` INT NOT NULL,
  `kurs_id` INT NOT NULL,
  PRIMARY KEY (`keyword_id`, `kurs_id`),
  INDEX `kurs_id_idx` (`kurs_id` ASC),
  CONSTRAINT `krskey_keyword_id`
  FOREIGN KEY (`keyword_id`)
  REFERENCES `onsec`.`keywords` (`key_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `krskey_kurs_id`
  FOREIGN KEY (`kurs_id`)
  REFERENCES `onsec`.`kurs` (`kurs_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`unterweisung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`unterweisung` ;

CREATE TABLE IF NOT EXISTS `onsec`.`unterweisung` (
  `unterweisung_id` INT NOT NULL AUTO_INCREMENT,
  `bezeichnung` VARCHAR(45) NOT NULL,
  `ablaufdatum` DATETIME NOT NULL,
  `pdf_link` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`unterweisung_id`),
  UNIQUE INDEX `unterweisung_id_UNIQUE` (`unterweisung_id` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`kurs_unterweisung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`kurs_unterweisung` ;

CREATE TABLE IF NOT EXISTS `onsec`.`kurs_unterweisung` (
  `kurs_id` INT NOT NULL,
  `unterweisung_id` INT NOT NULL,
  PRIMARY KEY (`kurs_id`, `unterweisung_id`),
  INDEX `unterweisung_id_idx` (`unterweisung_id` ASC),
  CONSTRAINT `krsunt_kurs_id`
  FOREIGN KEY (`kurs_id`)
  REFERENCES `onsec`.`kurs` (`kurs_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `krsunt_unterweisung_id`
  FOREIGN KEY (`unterweisung_id`)
  REFERENCES `onsec`.`unterweisung` (`unterweisung_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`user_unterweisung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`user_unterweisung` ;

CREATE TABLE IF NOT EXISTS `onsec`.`user_unterweisung` (
  `user_id` INT NOT NULL,
  `unterweisung_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `unterweisung_id`),
  INDEX `unterweisung_id_idx` (`unterweisung_id` ASC),
  CONSTRAINT `usrunt_user_id`
  FOREIGN KEY (`user_id`)
  REFERENCES `onsec`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usrunt_unterweisung_id`
  FOREIGN KEY (`unterweisung_id`)
  REFERENCES `onsec`.`unterweisung` (`unterweisung_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`untwerweisung_keywords`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`untwerweisung_keywords` ;

CREATE TABLE IF NOT EXISTS `onsec`.`untwerweisung_keywords` (
  `unterweisung_id` INT NOT NULL,
  `key_id` INT NOT NULL,
  PRIMARY KEY (`unterweisung_id`, `key_id`),
  INDEX `key_id_idx` (`key_id` ASC),
  CONSTRAINT `untkey_unterweisung_id`
  FOREIGN KEY (`unterweisung_id`)
  REFERENCES `onsec`.`unterweisung` (`unterweisung_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `untkey_key_id`
  FOREIGN KEY (`key_id`)
  REFERENCES `onsec`.`keywords` (`key_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`frage`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`frage` ;

CREATE TABLE IF NOT EXISTS `onsec`.`frage` (
  `frage_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `unterweisung_id` INT NULL,
  `frage_text` VARCHAR(255) NOT NULL,
  `bild_link` VARCHAR(255) NULL,
  PRIMARY KEY (`frage_id`),
  UNIQUE INDEX `frage_id_UNIQUE` (`frage_id` ASC),
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `unterweisung_id_idx` (`unterweisung_id` ASC),
  CONSTRAINT `frg_user_id`
  FOREIGN KEY (`user_id`)
  REFERENCES `onsec`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `frg_unterweisung_id`
  FOREIGN KEY (`unterweisung_id`)
  REFERENCES `onsec`.`unterweisung` (`unterweisung_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`antwort`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`antwort` ;

CREATE TABLE IF NOT EXISTS `onsec`.`antwort` (
  `antwort_id` INT NOT NULL,
  `frage_id` INT NULL,
  `antwort_text` VARCHAR(255) NOT NULL,
  `richtigkeit` TINYINT(1) NULL,
  PRIMARY KEY (`antwort_id`),
  UNIQUE INDEX `antwort_id_UNIQUE` (`antwort_id` ASC),
  INDEX `frage_id_idx` (`frage_id` ASC),
  CONSTRAINT `ant_frage_id`
  FOREIGN KEY (`frage_id`)
  REFERENCES `onsec`.`frage` (`frage_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`user_rechte_unterweisung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`user_rechte_unterweisung` ;

CREATE TABLE IF NOT EXISTS `onsec`.`user_rechte_unterweisung` (
  `rechte_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `unterweisung_id` INT NOT NULL,
  PRIMARY KEY (`rechte_id`, `user_id`, `unterweisung_id`),
  INDEX `usrrechtunt_user_id_idx` (`user_id` ASC),
  INDEX `usrrechtunt_unterweisung_id_idx` (`unterweisung_id` ASC),
  CONSTRAINT `usrrechtunt_rechte_id`
  FOREIGN KEY (`rechte_id`)
  REFERENCES `onsec`.`rechte` (`rechte_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `usrrechtunt_user_id`
  FOREIGN KEY (`user_id`)
  REFERENCES `onsec`.`user` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `usrrechtunt_unterweisung_id`
  FOREIGN KEY (`unterweisung_id`)
  REFERENCES `onsec`.`unterweisung` (`unterweisung_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`user_kurs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onsec`.`user_kurs` ;

CREATE TABLE IF NOT EXISTS `onsec`.`user_kurs` (
  `kurs_id` INT NOT NULL,
  `teilnehmer_id` INT NOT NULL,
  PRIMARY KEY (`kurs_id`, `teilnehmer_id`),
  INDEX `usrkrs_teilnehmer_id_idx` (`teilnehmer_id` ASC),
  CONSTRAINT `usrkrs_kurs_id`
  FOREIGN KEY (`kurs_id`)
  REFERENCES `onsec`.`kurs` (`kurs_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `usrkrs_teilnehmer_id`
  FOREIGN KEY (`teilnehmer_id`)
  REFERENCES `onsec`.`user` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `onsec`.`rechte`
-- -----------------------------------------------------
START TRANSACTION;
USE `onsec`;
INSERT INTO `onsec`.`rechte` (`rechte_id`, `bezeichnung`) VALUES (1, 'Nutzer');
INSERT INTO `onsec`.`rechte` (`rechte_id`, `bezeichnung`) VALUES (2, 'Eigentümer');
INSERT INTO `onsec`.`rechte` (`rechte_id`, `bezeichnung`) VALUES (3, 'Bearbeiter');

COMMIT;


-- -----------------------------------------------------
-- Data for table `onsec`.`rolle`
-- -----------------------------------------------------
START TRANSACTION;
USE `onsec`;
INSERT INTO `onsec`.`rolle` (`rolle_id`, `bezeichnung`) VALUES (1, 'Student');
INSERT INTO `onsec`.`rolle` (`rolle_id`, `bezeichnung`) VALUES (2, 'Beschäftigter');

COMMIT;

