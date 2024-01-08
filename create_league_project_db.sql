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
CREATE SCHEMA IF NOT EXISTS `league` DEFAULT CHARACTER SET utf8 ;
USE `league` ;

-- -----------------------------------------------------
-- Table `mydb`.`Origin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`Origin` (
  `OriginID` INT NOT NULL,
  `Region` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`OriginID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Playstyle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`Playstyle` (
  `PlaystyleID` INT NOT NULL,
  `Playstyle` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`PlaystyleID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Champions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`Champions` (
  `ChampionID` INT NOT NULL,
  `Name` VARCHAR(255) NOT NULL,
  `ReleaseDate` DATE NULL,
  `BECost` INT NOT NULL,
  `FrequentItems` VARCHAR(255) NULL,
  `OriginID` INT NOT NULL,
  `PlaystyleID` INT NOT NULL,
  PRIMARY KEY (`ChampionID`, `OriginID`, `PlaystyleID`),
  CONSTRAINT `fk_Champions_Origin`
    FOREIGN KEY (`OriginID`)
    REFERENCES `league`.`Origin` (`OriginID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Champions_Playstyle`
    FOREIGN KEY (`PlaystyleID`)
    REFERENCES `league`.`Playstyle` (`PlaystyleID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Champions_Origin_idx` ON `league`.`Champions` (`OriginID` ASC) VISIBLE;

CREATE INDEX `fk_Champions_Playstyle_idx` ON `league`.`Champions` (`PlaystyleID` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`Skins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`Skins` (
  `SkinID` INT NOT NULL,
  `SkinName` VARCHAR(255) NOT NULL,
  `SkinCost` INT NULL,
  `SkinTierID` INT NOT NULL,
  `Skinscol` VARCHAR(45) NULL,
  `ChampionID` INT NOT NULL,
  PRIMARY KEY (`SkinID`, `SkinTierID`, `ChampionID`),
  CONSTRAINT `fk_Skins_Champions1`
    FOREIGN KEY (`ChampionID`)
    REFERENCES `league`.`Champions` (`ChampionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Skins_Champions1_idx` ON `league`.`Skins` (`ChampionID` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`SkinTier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`SkinTier` (
  `SkinID` INT NOT NULL,
  `SkinTier` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`SkinID`, `SkinTier`),
  CONSTRAINT `fk_SkinTier_Skins1`
    FOREIGN KEY (`SkinID`)
    REFERENCES `league`.`Skins` (`SkinID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_SkinTier_Skins1_idx` ON `league`.`SkinTier` (`SkinID` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `mydb`.`Items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`Items` (
  `ItemID` VARCHAR(255) NOT NULL,
  `ItemCost` INT NOT NULL,
  PRIMARY KEY (`ItemID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PlaystyleItems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `league`.`PlaystyleItems` (
  `PlaystyleID` INT NOT NULL,
  `ItemID` VARCHAR(255) NOT NULL,
  `PreferItems` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`PlaystyleID`, `ItemID`),
  CONSTRAINT `fk_Playstyle_has_Items_Playstyle`
    FOREIGN KEY (`PlaystyleID`)
    REFERENCES `league`.`Playstyle` (`PlaystyleID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Playstyle_has_Items_Items`
    FOREIGN KEY (`ItemID`)
    REFERENCES `league`.`Items` (`ItemID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Playstyle_has_Items_Items_idx` ON `league`.`PlaystyleItems` (`ItemID` ASC) VISIBLE;

CREATE INDEX `fk_Playstyle_has_Items_Playstyle_idx` ON `league`.`PlaystyleItems` (`PlaystyleID` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
