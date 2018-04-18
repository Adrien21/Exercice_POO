-- MySQL Script generated by MySQL Workbench
-- Wed Apr 18 15:35:12 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema site_JV
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema site_JV
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `site_JV` DEFAULT CHARACTER SET utf8 ;
USE `site_JV` ;

-- -----------------------------------------------------
-- Table `site_JV`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `pseudo` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `type` ENUM('journaliste', 'membre') NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_JV`.`Test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`Test` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(50) NOT NULL,
  `date` DATETIME NOT NULL,
  `texte` TEXT NOT NULL,
  `note` INT NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Test_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_Test_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `site_JV`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_JV`.`JeuDlc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`JeuDlc` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `editeur` VARCHAR(50) NOT NULL,
  `dev` VARCHAR(50) NOT NULL,
  `dateSortie` DATE NOT NULL,
  `prix` DECIMAL NOT NULL,
  `pegi` ENUM('3', '7', '12', '16', '18') NOT NULL,
  `idJeuParent` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jeuDlc_jeuDlc1_idx` (`idJeuParent` ASC),
  CONSTRAINT `fk_jeuDlc_jeuDlc1`
    FOREIGN KEY (`idJeuParent`)
    REFERENCES `site_JV`.`JeuDlc` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_JV`.`Console`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`Console` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `constructeur` VARCHAR(50) NOT NULL,
  `dateSortie` DATE NOT NULL,
  `prix` DECIMAL NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_JV`.`Lien`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`Lien` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idTest` INT NULL,
  `idJeuDlc` INT NOT NULL,
  `idConsole` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_lien_Test1_idx` (`idTest` ASC),
  INDEX `fk_lien_jeuDlc1_idx` (`idJeuDlc` ASC),
  INDEX `fk_lien_console1_idx` (`idConsole` ASC),
  CONSTRAINT `fk_lien_Test1`
    FOREIGN KEY (`idTest`)
    REFERENCES `site_JV`.`Test` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lien_jeuDlc1`
    FOREIGN KEY (`idJeuDlc`)
    REFERENCES `site_JV`.`JeuDlc` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lien_console1`
    FOREIGN KEY (`idConsole`)
    REFERENCES `site_JV`.`Console` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_JV`.`Avis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`Avis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `note` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `texte` TEXT NOT NULL,
  `idLien` INT NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_avis_lien1_idx` (`idLien` ASC),
  INDEX `fk_avis_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_avis_lien1`
    FOREIGN KEY (`idLien`)
    REFERENCES `site_JV`.`Lien` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avis_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `site_JV`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_JV`.`News`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_JV`.`News` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(50) NOT NULL,
  `date` DATETIME NOT NULL,
  `texte` TEXT NOT NULL,
  `idUser` INT NOT NULL,
  `idLien` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_news_lien1_idx` (`idLien` ASC),
  INDEX `fk_news_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_news_lien1`
    FOREIGN KEY (`idLien`)
    REFERENCES `site_JV`.`Lien` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `site_JV`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;





SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
