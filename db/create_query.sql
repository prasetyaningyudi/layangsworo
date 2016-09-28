-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`ROLE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ROLE` ;

CREATE TABLE IF NOT EXISTS `mydb`.`ROLE` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_ROLE` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`USER` ;

CREATE TABLE IF NOT EXISTS `mydb`.`USER` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `USERNAME` VARCHAR(255) NOT NULL,
  `PASSWORD` VARCHAR(32) NOT NULL,
  `NAMA_USER` VARCHAR(255) NOT NULL,
  `STATUS_USER` VARCHAR(1) NOT NULL DEFAULT '1',
  `ROLE_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `USERNAME_UNIQUE` (`USERNAME` ASC),
  INDEX `fk_USER_ROLE_idx` (`ROLE_ID` ASC),
  CONSTRAINT `fk_USER_ROLE`
    FOREIGN KEY (`ROLE_ID`)
    REFERENCES `mydb`.`ROLE` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
