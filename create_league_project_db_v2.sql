-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Origin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Origin` (
  `OriginID` INT NOT NULL,
  `Region` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`OriginID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Playstyle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Playstyle` (
  `PlaystyleID` INT NOT NULL,
  `Playstyle` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`PlaystyleID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Champions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Champions` (
  `ChampionID` INT NOT NULL,
  `Name` VARCHAR(255) NOT NULL,
  `ReleaseDate` DATE NULL,
  `BECost` INT NOT NULL,
  `FrequentItems` VARCHAR(255) NULL,
  `OriginID` INT NOT NULL,
  `PlaystyleID` INT NOT NULL,
  PRIMARY KEY (`ChampionID`, `OriginID`, `PlaystyleID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Skins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Skins` (
  `SkinID` INT NOT NULL,
  `SkinName` VARCHAR(255) NOT NULL,
  `SkinCost` INT NULL,
  `SkinTierID` INT NOT NULL,
  `Skinscol` VARCHAR(45) NULL,
  `ChampionID` INT NOT NULL,
  PRIMARY KEY (`SkinID`, `SkinTierID`, `ChampionID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SkinTier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`SkinTier` (
  `SkinID` INT NOT NULL,
  `SkinTier` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`SkinID`, `SkinTier`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Items` (
  `ItemID` VARCHAR(255) NOT NULL,
  `ItemCost` INT NOT NULL,
  PRIMARY KEY (`ItemID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PlaystyleItems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PlaystyleItems` (
  `PlaystyleID` INT NOT NULL,
  `ItemID` VARCHAR(255) NOT NULL,
  `PreferItems` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`PlaystyleID`, `ItemID`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
