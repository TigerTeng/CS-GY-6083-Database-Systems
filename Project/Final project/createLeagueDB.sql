/********************************************************
* This script creates the database named u204255896_leagueproject 
*********************************************************/

DROP DATABASE IF EXISTS u204255896_leagueproject;
CREATE DATABASE u204255896_leagueproject;
USE u204255896_leagueproject;

-- create the tables for the database
CREATE TABLE icons (
    iconID           INT            PRIMARY KEY   AUTO_INCREMENT,
    releaseDate      DATE           NOT NULL      DEFAULT '9999-12-31',
    iconName         VARCHAR(255)   NOT NULL      UNIQUE
);

CREATE TABLE items (
    itemID             INT            PRIMARY KEY   AUTO_INCREMENT,
    itemName           VARCHAR(255)   NOT NULL      UNIQUE,
    itemCost           INT            NOT NULL      DEFAULT '0',
    itemAD             INT            NOT NULL      DEFAULT '0',
    itemCR             INT            NOT NULL      DEFAULT '0',
    itemAS             INT            NOT NULL      DEFAULT '0',
    itemAPEN           INT            NOT NULL      DEFAULT '0',
    itemLE             INT            NOT NULL      DEFAULT '0',
    itemAP             INT            NOT NULL      DEFAULT '0',
    itemMP             INT            NOT NULL      DEFAULT '0',
    itemMPEN           INT            NOT NULL      DEFAULT '0',
    itemHP             INT            NOT NULL      DEFAULT '0',
    itemAR             INT            NOT NULL      DEFAULT '0',
    itemMR             INT            NOT NULL      DEFAULT '0',
    itemAH             INT            NOT NULL      DEFAULT '0',
    itemMOVE           INT            NOT NULL      DEFAULT '0',
    itemLS             DECIMAL(11,2)  NOT NULL      DEFAULT '0.00'
);

CREATE TABLE items_audit (
    id                 INT            PRIMARY KEY   AUTO_INCREMENT,
    itemID             INT            NOT NULL,
    itemName           VARCHAR(255)   NOT NULL,
    itemCost           INT            NOT NULL      DEFAULT '0',
    itemAD             INT            NOT NULL      DEFAULT '0',
    itemCR             INT            NOT NULL      DEFAULT '0',
    itemAS             INT            NOT NULL      DEFAULT '0',
    itemAPEN           INT            NOT NULL      DEFAULT '0',
    itemLE             INT            NOT NULL      DEFAULT '0',
    itemAP             INT            NOT NULL      DEFAULT '0',
    itemMP             INT            NOT NULL      DEFAULT '0',
    itemMPEN           INT            NOT NULL      DEFAULT '0',
    itemHP             INT            NOT NULL      DEFAULT '0',
    itemAR             INT            NOT NULL      DEFAULT '0',
    itemMR             INT            NOT NULL      DEFAULT '0',
    itemAH             INT            NOT NULL      DEFAULT '0',
    itemMOVE           INT            NOT NULL      DEFAULT '0',
    itemLS             DECIMAL(11,2)  NOT NULL      DEFAULT '0.00'
    changedate         DATETIME                     DEFAULT NULL,
    action             VARCHAR(50)                  DEFAULT NULL
);

CREATE TRIGGER before_items_update 
    BEFORE UPDATE ON items
    FOR EACH ROW 
    INSERT INTO items_audit
    SET action = 'update',
        itemID  = OLD.itemID,
        itemName= OLD.itemName,
        itemCost= OLD.itemCost,
        itemAD  = OLD.itemAD,
        itemCR  = OLD.itemCR,
        itemAS  = OLD.itemAS,
        itemAPEN= OLD.itemAPEN,
        itemLE  = OLD.itemLE,
        itemAP  = OLD.itemAP,
        itemMP  = OLD.itemMP,
        itemMPEN= OLD.itemMPEN,
        itemHP  = OLD.itemHP,
        itemAR  = OLD.itemAR,
        itemMR  = OLD.itemMR,
        itemAH  = OLD.itemAH,
        itemMOVE= OLD.itemMOVE,
        itemLS  = OLD.itemLS,
        changedate = NOW();

CREATE TRIGGER before_items_delete 
    BEFORE DELETE ON items
    FOR EACH ROW 
    INSERT INTO items_audit
    SET action = 'delete',
        itemID = OLD.itemID,
        itemName = OLD.itemName,
        changedate = NOW();

CREATE TABLE playstyles (
    playstyleID        INT            PRIMARY KEY   AUTO_INCREMENT,
    playstyle          VARCHAR(255)   NOT NULL      UNIQUE
);

CREATE TABLE preferitems (
    winRateID          INT            PRIMARY KEY   AUTO_INCREMENT,
    playstyleID        INT            NOT NULL,
    itemID             INT            NOT NULL,
    winRate            DECIMAL(11,4)  NOT NULL      DEFAULT '0.5000',
    CONSTRAINT preferitems_fk_playstyles
        FOREIGN KEY (playstyleID)
        REFERENCES playstyles (playstyleID)
        ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT preferitems_fk_items
        FOREIGN KEY (itemID)
        REFERENCES items (itemID)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE origins (
    originID           INT            PRIMARY KEY   AUTO_INCREMENT,
    originID_disp      INT            NOT NULL,
    region             VARCHAR(255)   NOT NULL      UNIQUE
);

CREATE TABLE champions (
    championID         INT            PRIMARY KEY  AUTO_INCREMENT,
    championName       VARCHAR(255)   NOT NULL     UNIQUE,
    releaseDate        DATE           NOT NULL     DEFAULT '9999-12-31', 
    championCost       INT            NOT NULL     DEFAULT '7800',
    originID           INT            NOT NULL     DEFAULT '14',
    playstyleID        INT            NOT NULL     DEFAULT '7',
    CONSTRAINT champions_fk_origins
        FOREIGN KEY (originID_disp)
        REFERENCES origins (originID_disp)
        ON UPDATE CASCADE ON DELETE CASCADE,

    CONSTRAINT champions_fk_playstyles
        FOREIGN KEY (playstyleID)
        REFERENCES playstyles (playstyleID)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE skinsTiers(
    skinTierID       INT            PRIMARY KEY AUTO_INCREMENT,
    skinTier         VARCHAR(255)   NOT NULL,
    skinCost         INT          NOT NULL     DEFAULT '9999'
);

CREATE TABLE skins (
    skinID             INT            PRIMARY KEY  AUTO_INCREMENT,
    championName       VARCHAR(255)   NOT NULL,
    skinName           VARCHAR(255)   NOT NULL     UNIQUE,
    releaseDate        DATE           NOT NULL     DEFAULT '9999-12-31',
    skinTierID         INT            NOT NULL,
    CONSTRAINT skins_fk_champions
        FOREIGN KEY (championName)
        REFERENCES champions (championName)
        ON UPDATE CASCADE ON DELETE CASCADE,

    CONSTRAINT skins_fk_tiers  
        FOREIGN KEY (skinTierID)
        REFERENCES skinsTiers (skinTierID)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE users(
    id                 INT           PRIMARY KEY   AUTO_INCREMENT,
    username           VARCHAR(255)  NOT NULL      UNIQUE,
    password           VARCHAR(255)  NOT NULL,
    usertype           INT           NOT NULL
);


--------------------------------Insert data into the tables--------------------------------
INSERT INTO icons (iconID, iconName) VALUES
();

INSERT INTO users (username, password, usertype) VALUES 
('teemo', SHA1('teemo12345'), '0'),
('katarina', SHA1('k@tar!n@'), '1');

INSERT INTO items 
(`itemID`, `itemName`, `itemCost`, `itemAD`, `itemCR`, `itemAS`, `itemAPEN`, `itemLE`, `itemAP`, `itemMP`, `itemMPEN`, `itemHP`, `itemAR`, `itemMR`, `itemAH`, `itemMOVE`, `itemLS`) VALUES 
('1', 'Crown of the Shattered Queen', '2800', '', '', '', '', '', '70', '600', '', '250', '', '', '20', '6', ''),
('2', 'Divine Sunderer', '3300', '40', '', '', '18', '', '', '', '18', '300', '', '', '20', '', ''),
('3', 'Duskblade of Draktharr', '3100', '60', '', '', '', '18', '', '', '', '', '', '', '50', '30', '2.5'),
('4', 'Eclipse', '3100', '60', '', '', '24', '12', '', '', '', '', '', '', '15', '30', '2.5'),
('5', 'Evenshroud', '2500', '', '', '', '', '', '', '', '', '200', '60', '60', '20', '', ''),
('6', 'Everfrost', '2800', '', '', '', '', '', '70', '600', '', '250', '', '', '20', '', ''),
('7', 'Galeforce', '3400', '60', '20', '20', '', '', '', '', '', '', '', '', '', '12', ''),
('8', 'Goredrinker', '3300', '55', '', '', '', '', '', '', '', '600', '', '', '38', '', '8'),
('9', 'Jak''SHO, The Protean','3200', '', '', '', '', '', '', '', '', '400', '60', '60', '20', '', ''),
('10', 'Hextech Rocketbelt', '3200', '', '', '', '', '', '90', '', '36', '250', '', '', '15', '', ''),
('11', 'Heartsteel', '3200', '', '', '', '', '', '', '', '', '2000', '', '', '20', '', '')
ON DUPLICATE KEY UPDATE
itemID = VALUES(itemID);
-- ('4', 'Doran''s Blade', 'cost', 'ad', 'cr', 'as', 'apen', 'le', 'ap', 'mp', 'mpen', 'hp', 'ar', 'mr', 'ah', 'move', '2.5'),


INSERT INTO origins (originID_disp, region) VALUES
('1', 'Bandle City'),
('2', 'Bilgewater'),
('3', 'Demacia'),
('4', 'Ionia'),
('5', 'Ixtal'),
('6', 'Noxus'),
('7', 'Piltover'),
('8', 'Shadow Isles'),
('9', 'Shurima'),
('10', 'Targon'),
('11', 'The Frelijord'),
('12', 'The Void'),
('13', 'Zaun'),
('14', 'N/A')
ON DUPLICATE KEY UPDATE
region = VALUES(region);

INSERT INTO playstyles (playstyleID, playstyle) VALUES
('1', 'Controller'),
('2', 'Fighter'),
('3', 'Mage'),
('4', 'Marksman'),
('5', 'Slayer'),
('6', 'Tank'),
('7', 'N/A')
ON DUPLICATE KEY UPDATE
playstyle = VALUES(playstyle);

INSERT INTO champions (championName, releaseDate, championCost, originID_disp, playstyleID) VALUES
('Teemo', '2023-04-12', '630', '2', '4'),
('Garen', '2010-04-27', '450', '1', '4'),
('Morgana', '2009-02-21', '1350', '14', '2'),
('Amumu', '2009-06-26', '450', '1', '2'),
('Veigar', '2009-07-24', '1350', '4', '2'),
('Riven', '2011-09-14', '4800', '5', '1'),
('Katarina', '2009-09-19', '3150', '6', '5'),
('Lux', '2010-10-19', '450', '3', '3'),
('Kai''sa', '2020-10-09', '6300', '12', '4'),
('Miss Fortune', '2018-10-06', '3150', '2', '4')
ON DUPLICATE KEY UPDATE
championName = VALUES(championName);

INSERT INTO skinsTiers (skinTierID, skinCost, skinTier) VALUES
('1', '290', 'Chromas'),
('2', '390', 'Timeworn'),
('3', '460', 'Timeworn'),
('4', '520', 'Timeworn'),
('5', '750', 'Budget'),
('6', '975', 'Standard'),
('7', '1350', 'Epic'),
('8', '1820', 'Legendary'),
('9', '2775', 'Ultimate'),
('10', '3250', 'Ultimate')
ON DUPLICATE KEY UPDATE
skinCost = VALUES(skinCost);

INSERT INTO skins (skinID, championName, skinName, releaseDate, skinTierID) VALUES
('1', 'Teemo', 'Beemo', '2023-04-12', '4'),
('2', 'Garen', 'Dark Knight Garen', '2010-04-27', '4'),
('3', 'Morgana', 'Bewitching Morgana', '2023-04-12', '6'),
('4', 'Amumu', 'Almost Prom King Amumu', '2010-04-27', '3'),
('5', 'Veigar', 'Final Boss Veigar', '2023-04-12', '5'),
('6', 'Riven', 'Battle Bunny Riven', '2010-04-27', '4'),
('7', 'Katarina', 'High Noon Katarina', '2023-04-12', '6'),
('8', 'Katarina', 'Battle Queen Katarina', '2010-04-27', '8'),
('9', 'Teemo', 'Badger Teemo', '2023-04-12', '4'),
('10', 'Lux', 'Star Guardian Lux', '2010-04-27', '4'),
('11', 'Miss Fortune', 'Gun Goddess Miss Fortune', '2018-03-22', '9')
ON DUPLICATE KEY UPDATE
championName = VALUES(championName);

INSERT into preferitems (playstyleID, itemID, winRate) VALUES
('1', '1', RAND()*(0.6-0.3)+0.3),
('2', '1', RAND()*(0.6-0.3)+0.3),
('3', '1', RAND()*(0.6-0.3)+0.3),
('4', '1', RAND()*(0.6-0.3)+0.3),
('5', '1', RAND()*(0.6-0.3)+0.3),
('6', '1', RAND()*(0.6-0.3)+0.3),
('1', '2', RAND()*(0.6-0.3)+0.3),
('2', '2', RAND()*(0.6-0.3)+0.3),
('3', '2', RAND()*(0.6-0.3)+0.3),
('4', '2', RAND()*(0.6-0.3)+0.3),
('5', '2', RAND()*(0.6-0.3)+0.3),
('6', '2', RAND()*(0.6-0.3)+0.3),
('1', '3', RAND()*(0.6-0.3)+0.3),
('2', '3', RAND()*(0.6-0.3)+0.3),
('3', '3', RAND()*(0.6-0.3)+0.3),
('4', '3', RAND()*(0.6-0.3)+0.3),
('5', '3', RAND()*(0.6-0.3)+0.3),
('6', '3', RAND()*(0.6-0.3)+0.3),
('1', '4', RAND()*(0.6-0.3)+0.3),
('2', '4', RAND()*(0.6-0.3)+0.3),
('3', '4', RAND()*(0.6-0.3)+0.3),
('4', '4', RAND()*(0.6-0.3)+0.3),
('5', '4', RAND()*(0.6-0.3)+0.3),
('6', '4', RAND()*(0.6-0.3)+0.3),
('1', '5', RAND()*(0.6-0.3)+0.3),
('2', '5', RAND()*(0.6-0.3)+0.3),
('3', '5', RAND()*(0.6-0.3)+0.3),
('4', '5', RAND()*(0.6-0.3)+0.3),
('5', '5', RAND()*(0.6-0.3)+0.3),
('6', '5', RAND()*(0.6-0.3)+0.3),
('1', '6', RAND()*(0.6-0.3)+0.3),
('2', '6', RAND()*(0.6-0.3)+0.3),
('3', '6', RAND()*(0.6-0.3)+0.3),
('4', '6', RAND()*(0.6-0.3)+0.3),
('5', '6', RAND()*(0.6-0.3)+0.3),
('6', '6', RAND()*(0.6-0.3)+0.3),
('1', '7', RAND()*(0.6-0.3)+0.3),
('2', '7', RAND()*(0.6-0.3)+0.3),
('3', '7', RAND()*(0.6-0.3)+0.3),
('4', '7', RAND()*(0.6-0.3)+0.3),
('5', '7', RAND()*(0.6-0.3)+0.3),
('6', '7', RAND()*(0.6-0.3)+0.3),
('1', '8', RAND()*(0.6-0.3)+0.3),
('2', '8', RAND()*(0.6-0.3)+0.3),
('3', '8', RAND()*(0.6-0.3)+0.3),
('4', '8', RAND()*(0.6-0.3)+0.3),
('5', '8', RAND()*(0.6-0.3)+0.3),
('6', '8', RAND()*(0.6-0.3)+0.3),
('1', '9', RAND()*(0.6-0.3)+0.3),
('2', '9', RAND()*(0.6-0.3)+0.3),
('3', '9', RAND()*(0.6-0.3)+0.3),
('4', '9', RAND()*(0.6-0.3)+0.3),
('5', '9', RAND()*(0.6-0.3)+0.3),
('6', '9', RAND()*(0.6-0.3)+0.3),
('1', '10', RAND()*(0.6-0.3)+0.3),
('2', '10', RAND()*(0.6-0.3)+0.3),
('3', '10', RAND()*(0.6-0.3)+0.3),
('4', '10', RAND()*(0.6-0.3)+0.3),
('5', '10', RAND()*(0.6-0.3)+0.3),
('6', '10', RAND()*(0.6-0.3)+0.3)
ON DUPLICATE KEY UPDATE
winRate = VALUES(winRate);

-------------------------------- Create Procedures --------------------------------
DELIMITER //
CREATE PROCEDURE allCount()
BEGIN
    SELECT
        (SELECT COUNT(championID) FROM champions) as championCount, 
        (SELECT COUNT(originID) FROM origins) as originCount,
        (SELECT COUNT(skinID) FROM skins) as skinCount,
        (SELECT COUNT(itemID) FROM items) as itemCount,
        (SELECT COUNT(playstyleID) FROM playstyles) as playstyleCount,
        (SELECT COUNT(skinTierID) FROM skinsTiers) as skintierCount;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE skinInsert(IN championName, IN skinName, IN releaseDate, IN skinTier, OUT status)
BEGIN
	SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
	if skinLimit(championName) < 4 THEN
    	INSERT INTO skins (championName, releaseDate, skinName, skinTierID) VALUES
        (championName, releaseDate, skinName, skinTier);
        SET status = 'skin added';
    ELSE 
    	SET status = 'This champion has too many skins';
    END IF;
    COMMIT;
END;
DELIMITER ;


-------------------------------- Create Functions --------------------------------
DELIMITER //
CREATE FUNCTION itemTier(
	cost INT
) 
RETURNS VARCHAR(20)
DETERMINISTIC
BEGIN
    DECLARE itemTier VARCHAR(20);

    IF cost >= 1600 THEN
		SET itemTier = 'LEGENDARY/MYTHIC';
    ELSEIF (cost < 1600 AND 
			cost >= 700) THEN
        SET itemTier = 'EPIC';
    ELSEIF cost < 700 THEN
        SET itemTier = 'BASIC';
    END IF;
	RETURN (itemTier);
END//
DELIMITER ;

DELIMITER //

CREATE FUNCTION skinLimit(skinchampionName VARCHAR(255)) RETURNS INT
BEGIN
    DECLARE skinlimit INT;
	
    SET skinlimit = (SELECT count(*) FROM skins WHERE skinchampionName = championName);
    RETURN skinlimit;

END//
DELIMITER ; 

-------------------------------- Create Views --------------------------------
CREATE VIEW itemsWinrate AS
SELECT `preferitems`.`winRate`, `items`.`itemID`, `items`.`itemName`, `items`.`itemCost`, `playstyles`.`playstyleID`, `playstyles`.`playstyle`
FROM `preferitems` 
	LEFT JOIN `items` ON `preferitems`.`itemID` = `items`.`itemID` 
	LEFT JOIN `playstyles` ON `preferitems`.`playstyleID` = `playstyles`.`playstyleID`
ORDER BY `preferitems`.`winRate` DESC;

CREATE VIEW championsInfo AS
SELECT c.championID, c.championName, c.releaseDate, c.championCost, c.originID_disp, c.playstyleID, o.region, p.playstyle
FROM `champions` AS `c` 
	LEFT JOIN `playstyles` AS `p` ON `c`.`playstyleID` = `p`.`playstyleID` 
	LEFT JOIN `origins` AS `o` ON `c`.`originID_disp` = `o`.`originID_disp`
ORDER BY `c`.`championID` ASC;
/* 

CREATE VIEW itemsWinrate AS
SELECT `preferitems`.`winRate`, `items`.`itemID`, `items`.`itemName`, `items`.`itemCost`, `playstyles`.`playstyleID`, `playstyles`.`playstyle`
FROM `preferitems` 
	LEFT JOIN `items` ON `preferitems`.`itemID` = `items`.`itemID` 
	LEFT JOIN `playstyles` ON `preferitems`.`playstyleID` = `playstyles`.`playstyleID`
ORDER BY `preferitems`.`winRate` DESC;

CREATE VIEW championsInfo AS
SELECT c.championID, c.championName, c.releaseDate, c.championCost, c.originID_disp, c.playstyleID, o.region, p.playstyle
FROM `champions` AS `c` 
	LEFT JOIN `playstyles` AS `p` ON `c`.`playstyleID` = `p`.`playstyleID` 
	LEFT JOIN `origins` AS `o` ON `c`.`originID_disp` = `o`.`originID_disp`
ORDER BY `c`.`championName` ASC;

ALTER TABLE champions
DROP FOREIGN KEY champions_fk_origins;
ALTER TABLE champions
ADD CONSTRAINT champions_fk_origins
FOREIGN KEY (originID_disp)
REFERENCES origins (originID_disp)
ON UPDATE CASCADE ON DELETE CASCADE


ALTER TABLE skins
DROP FOREIGN KEY skins_fk_tiers;
ALTER TABLE skins
DROP FOREIGN KEY skins_fk_champions;

ALTER TABLE skins
ADD CONSTRAINT skins_fk_champions
FOREIGN KEY (championName) 
REFERENCES champions(championName)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE skins
ADD CONSTRAINT skins_fk_tiers
FOREIGN KEY (skinTierID) 
REFERENCES skinsTiers(skinTierID)
ON UPDATE CASCADE ON DELETE RESTRICT; 

ALTER TABLE preferitems
DROP FOREIGN KEY preferitems_fk_playstyles;
ALTER TABLE preferitems
DROP FOREIGN KEY preferitems_fk_items;

ALTER TABLE preferitems
ADD CONSTRAINT preferitems_fk_playstyles
FOREIGN KEY (playstyleID) 
REFERENCES playstyles(playstyleID)
ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE preferitems
ADD CONSTRAINT preferitems_fk_items
FOREIGN KEY (itemID) 
REFERENCES items(itemID)
ON UPDATE CASCADE ON DELETE CASCADE; 

SELECT 
  TABLE_NAME,COLUMN_NAME,CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
FROM
  INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
  REFERENCED_TABLE_SCHEMA = 'u204255896_leagueproject';
  

  ALTER TABLE champions
DROP FOREIGN KEY champions_fk_origins;

ALTER TABLE champions
DROP FOREIGN KEY champions_fk_playstyles;

ALTER TABLE champions
ADD CONSTRAINT champions_fk_origins
        FOREIGN KEY (originID_disp)
        REFERENCES origins (originID_disp)
        ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE champions
ADD CONSTRAINT champions_fk_playstyles
        FOREIGN KEY (playstyleID)
        REFERENCES playstyles (playstyleID)
        ON UPDATE CASCADE ON DELETE CASCADE;



*/