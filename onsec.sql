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
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`keywords`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`keywords` (
  `key_id` INT NOT NULL AUTO_INCREMENT,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`key_id`),
  UNIQUE INDEX `key_id_UNIQUE` (`key_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`raum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`raum` (
  `raum_nr` VARCHAR(12) NOT NULL,
  `bezeichnung` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`raum_nr`),
  UNIQUE INDEX `raum_nr_UNIQUE` (`raum_nr` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`raum_keywords`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`raum_keywords` (
  `raum` VARCHAR(12) NOT NULL,
  `keyword` INT NOT NULL,
  PRIMARY KEY (`raum`, `keyword`),
  INDEX `key_id_idx` (`keyword` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`kurs`
-- -----------------------------------------------------
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
CREATE TABLE IF NOT EXISTS `onsec`.`user_rechte_kurs` (
  `rechte_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `kurs_id` INT NOT NULL,
  PRIMARY KEY (`rechte_id`, `user_id`, `kurs_id`),
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `kurs_id_idx` (`kurs_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`kurs_keywords`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`kurs_keywords` (
  `keyword` INT NOT NULL,
  `kurs` INT NOT NULL,
  PRIMARY KEY (`keyword`, `kurs`),
  INDEX `kurs_id_idx` (`kurs` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`unterweisung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`unterweisung` (
  `unterweisung_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `bezeichnung` VARCHAR(45) NOT NULL,
  `ablaufdatum` DATETIME NOT NULL,
  `pdf_link` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`unterweisung_id`),
  UNIQUE INDEX `unterweisung_id_UNIQUE` (`unterweisung_id` ASC),
  INDEX `user_id_idx` (`user_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`kurs_unterweisung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`kurs_unterweisung` (
  `kurs_id` INT NOT NULL,
  `unterweisung_id` INT NOT NULL,
  PRIMARY KEY (`kurs_id`, `unterweisung_id`),
  INDEX `unterweisung_id_idx` (`unterweisung_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`user_unterweisung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`user_unterweisung` (
  `user_id` INT NOT NULL,
  `unterweisung_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `unterweisung_id`),
  INDEX `unterweisung_id_idx` (`unterweisung_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`untwerweisung_keywords`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`untwerweisung_keywords` (
  `unterweisung_id` INT NOT NULL,
  `key_id` INT NOT NULL,
  PRIMARY KEY (`unterweisung_id`, `key_id`),
  INDEX `key_id_idx` (`key_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`frage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`frage` (
  `frage_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `unterweisung_id` INT NULL,
  `frage_text` VARCHAR(255) NOT NULL,
  `bild_link` VARCHAR(255) NULL,
  PRIMARY KEY (`frage_id`),
  UNIQUE INDEX `frage_id_UNIQUE` (`frage_id` ASC),
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `unterweisung_id_idx` (`unterweisung_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onsec`.`antwort`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onsec`.`antwort` (
  `antwort_id` INT NOT NULL,
  `frage_id` INT NULL,
  `antwort_text` VARCHAR(255) NOT NULL,
  `richtigkeit` TINYINT(1) NULL,
  PRIMARY KEY (`antwort_id`),
  UNIQUE INDEX `antwort_id_UNIQUE` (`antwort_id` ASC),
  INDEX `frage_id_idx` (`frage_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
