<?php
	require_once "database.php";

	function resetDatabase() {
		global $con;
		
		$sql = "
			-- MySQL Workbench Forward Engineering

			SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
			SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
			SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

			-- -----------------------------------------------------
			-- Schema sqlinjection
			-- -----------------------------------------------------
			DROP SCHEMA IF EXISTS `sqlinjection` ;

			-- -----------------------------------------------------
			-- Schema sqlinjection
			-- -----------------------------------------------------
			CREATE SCHEMA IF NOT EXISTS `sqlinjection` DEFAULT CHARACTER SET utf8 ;
			USE `sqlinjection` ;

			-- -----------------------------------------------------
			-- Table `sqlinjection`.`creditcard`
			-- -----------------------------------------------------
			DROP TABLE IF EXISTS `sqlinjection`.`creditcard` ;

			CREATE TABLE IF NOT EXISTS `sqlinjection`.`creditcard` (
			  `id` INT NOT NULL,
			  `number` VARCHAR(45) NOT NULL,
			  `secret_code` VARCHAR(45) NOT NULL,
			  `person_id` INT NOT NULL,
			  PRIMARY KEY (`id`),
			  INDEX `FK_creditcard_person_idx` (`person_id` ASC),
			  CONSTRAINT `FK_creditcard_person`
				FOREIGN KEY (`person_id`)
				REFERENCES `sqlinjection`.`person` (`id`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)
			ENGINE = InnoDB;

			-- -----------------------------------------------------
			-- Table `sqlinjection`.`person`
			-- -----------------------------------------------------
			DROP TABLE IF EXISTS `sqlinjection`.`person` ;

			CREATE TABLE IF NOT EXISTS `sqlinjection`.`person` (
			  `id` INT NOT NULL AUTO_INCREMENT,
			  `name` VARCHAR(45) NOT NULL,
			  `address` VARCHAR(45) NOT NULL,
			  `email` VARCHAR(100) NULL,
			  PRIMARY KEY (`id`))
			ENGINE = InnoDB;
			

			SET SQL_MODE=@OLD_SQL_MODE;
			SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
			SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

			-- -----------------------------------------------------
			-- Data for table `sqlinjection`.`person`
			-- -----------------------------------------------------
			START TRANSACTION;
			USE `sqlinjection`;
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (1, 'Pietje', 'Boslaan', 'pietje@boslaan.nl');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (2, 'Klaasje', 'Iepenstraat', 'klaasje@iepenstraat.nl');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (3, 'Koosje', 'Slotlaan', 'koosje@securenet.nl');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (4, 'Miranda', 'Walk of steen', 'miranda@holiday.net');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (5, 'Cindy', 'Brug 11', 'cindy@geenidee.com');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (6, 'Justin Case', '5th avenue', 'cs@justincase.org');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (7, 'Super Mario', 'Mario Land 10', 'sm@donkeykong.se');
			INSERT INTO `sqlinjection`.`person` (`id`, `name`, `address`, `email`) VALUES (8, 'Xeno', 'Zolaan 11', 'x@xyz.no');

			COMMIT;

			-- -----------------------------------------------------
			-- Data for table `sqlinjection`.`creditcard`
			-- -----------------------------------------------------
			START TRANSACTION;
			USE `sqlinjection`;
			INSERT INTO `sqlinjection`.`creditcard` (`id`, `number`, `secret_code`, `person_id`) VALUES (1, '123456789', 'geheim123', 1);
			INSERT INTO `sqlinjection`.`creditcard` (`id`, `number`, `secret_code`, `person_id`) VALUES (2, '987654321', 'mijncode321', 2);
			INSERT INTO `sqlinjection`.`creditcard` (`id`, `number`, `secret_code`, `person_id`) VALUES (3, '132435466', 'code123geheim', 3);
			INSERT INTO `sqlinjection`.`creditcard` (`id`, `number`, `secret_code`, `person_id`) VALUES (4, '555666777', 'ikbenveilig', 4);
			INSERT INTO `sqlinjection`.`creditcard` (`id`, `number`, `secret_code`, `person_id`) VALUES (5, '999881100', 'geencenttemakken', 5);

			COMMIT;";
	
		$con->exec($sql);
	}
	
?>