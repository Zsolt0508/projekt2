-- MySQL Script generated by MySQL Workbench
-- Fri Apr 14 10:41:23 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema projekt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projekt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci ;
USE `projekt` ;

-- -----------------------------------------------------
-- Table `projekt`.`etelek`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projekt`.`etelek` (
  `etelid` INT NOT NULL AUTO_INCREMENT,
  `hamburger` VARCHAR(45) NOT NULL,
  `pizza` VARCHAR(45) NOT NULL,
  `szendvics` VARCHAR(45) NOT NULL,
  `deszert` VARCHAR(45) NOT NULL,
  `saláta` VARCHAR(45) NOT NULL,
  `italok` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`etelid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projekt`.`kosar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projekt`.`kosar` (
  `idkosar` INT NOT NULL AUTO_INCREMENT,
  `mennyiseg` INT NOT NULL,
  `etelek_etelid` INT NOT NULL,
  `italok_italid` INT NOT NULL,
  `menu_idmenu` INT NOT NULL,
  PRIMARY KEY (`idkosar`),
  INDEX `fk_kosar_etelek1_idx` (`etelek_etelid` ASC) VISIBLE,
  CONSTRAINT `fk_kosar_etelek1`
    FOREIGN KEY (`etelek_etelid`)
    REFERENCES `projekt`.`etelek` (`etelid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projekt`.`regisztracio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projekt`.`regisztracio` (
  `regid` INT NOT NULL AUTO_INCREMENT,
  `felnev` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `jelszo` VARCHAR(45) NOT NULL,
  `kosar_idkosar` INT NOT NULL,
  PRIMARY KEY (`regid`),
  INDEX `fk_regisztracio_kosar1_idx` (`kosar_idkosar` ASC) VISIBLE,
  CONSTRAINT `fk_regisztracio_kosar1`
    FOREIGN KEY (`kosar_idkosar`)
    REFERENCES `projekt`.`kosar` (`idkosar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
