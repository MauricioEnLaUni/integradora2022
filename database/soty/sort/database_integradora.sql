CREATE DATABASE IF NOT EXISTS INTEGRADORA;
USE INTEGRADORA;
SET NAMES 'utf8mb4';

CREATE TABLE `ITEM`(
	`it_id` CHAR(6) NOT NULL, -- IDENTIFIER
	`it_nm` VARCHAR(30), -- NAME
    `it_ds` VARCHAR(255), -- DESCRIPTION
	`it_in` FLOAT, -- PRICE BUY
    `it_ot` FLOAT, -- PRICE SALE
	`it_br` CHAR(6), -- BRAND FOREIGN KEY
	`it_mt` SMALLINT, -- LEAT, CANV, TEXT, RUBR, SYNT, FOAM, DENM
	`it_cl` SMALLINT, -- WHITE,BLACK,RED,BLUE,GREEN,YELLW,ORANG,PURPL,BROWN
	`it_tp` TINYINT, -- Bote,Bota,Clogs,Loafer,Sandalia,Slipper,Atlético,Trabajo,Mocasin,Vestir,Tacones,Mary Janes,Ortopédico
	`it_wh` TINYINT, -- Niño, Niña, Infa, Unsx, Homb, Mujr
	`it_rd` DATE, -- RELEASE DATE
    CONSTRAINT `PK_IT` PRIMARY KEY (`it_id`)
) ENGINE = InnoDB;

CREATE TABLE `STOCK`(
	`st_id` CHAR(6) NOT NULL, -- IDENTIFIER
    `st_it` CHAR(6), -- ITEM ID FOREIGN
    `st_st` TINYINT, -- Amount of shoes in this stock position
    `st_lc` TINYINT, -- Where the item is currently OUTOFSTOCK,TRANSITIN,TRANSITOUT,FRONT,STORE,WAREHOUSE
    `st_sz` TINYINT, -- Hexadecimal Operation DETERMINES SHOE SIZE 00 TO FF Only the first 
    CONSTRAINT `PK_ST` PRIMARY KEY (`st_id`)
) ENGINE = InnoDB;

CREATE TABLE `ORDERS`(
	`or_id` CHAR(6) NOT NULL, -- Identifier PK
    `or_ur` CHAR(6), -- User who owns this, foreign key
    `or_in` DATETIME, -- Date the order was made
    `or_fl` DATETIME, -- Date order was fulfilled
    `or_is` TINYINT, -- Issues with the order
    `or_py` BOOL, -- Order price
    `or_pd` BOOL, -- If the order's been paid. Not sure.
    CONSTRAINT `PK_OR` PRIMARY KEY (`or_id`)
) ENGINE=InnoDB;

CREATE TABLE `it_or`(
	`it_id` VARCHAR(6),
    `or_id` VARCHAR(6)
) ENGINE = InnoDB;

CREATE TABLE `BRAND`(
	`br_id` CHAR(6) NOT NULL, -- Identifier
    `br_nm` CHAR(20), -- Name
    `br_ct` VARCHAR(20), -- Country of origin
    CONSTRAINT `PK_BR` PRIMARY KEY (`br_id`)
) ENGINE = InnoDB;

CREATE TABLE `PROVIDER`(
	`pr_id` CHAR(6) NOT NULL, -- Identifier
    `pr_nm` VARCHAR(20), -- Name
    `pr_wb` VARCHAR(64), -- Website
    CONSTRAINT `PK_PR` PRIMARY KEY (`pr_id`)
) ENGINE = InnoDB;

CREATE TABLE `USERS`(
	`ur_id` VARCHAR(6) NOT NULL, -- Identifier
    `ur_an` VARCHAR(16), -- Account name <> Display Name
    `ur_dn` VARCHAR(32), -- Display name <> Account Name
    `ur_nm` VARCHAR(16), -- Name
    `ur_ln` VARCHAR(32), -- Last Name
    `ur_pw` VARCHAR(60), -- Password Encrypted with bcrypt$2b$ Pepper is added in another database.
    `ur_pr` VARCHAR(5), -- If the user is a provider, foreign key 
    CONSTRAINT `PK_UR` PRIMARY KEY (`ur_id`)
) ENGINE = InnoDB;

CREATE TABLE `ADDRESS`(
	`ad_id` VARCHAR(6) NOT NULL,
	`ad_usr` VARCHAR(6), -- FK
    `ad_pro` VARCHAR(6),
    `ad_number` SMALLINT, 
    `ad_street` VARCHAR(25),
    `ad_postal` SMALLINT,
    `ad_zone` VARCHAR(25),
    `ad_city` VARCHAR(16),
    `ad_country` CHAR(2),
    CONSTRAINT PK_AD PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB;

CREATE TABLE `PHONE`(
	`ph_id` INT NOT NULL,
	`ph_usr` VARCHAR(6),
    `ph_num` VARCHAR(15),
	CONSTRAINT PK_PH PRIMARY KEY (`ph_id`)
) ENGINE=InnoDB;

CREATE TABLE `EMAIL`(
	`em_id` INT NOT NULL,
	`em_usr` VARCHAR(6),
    `em_pro` VARCHAR(6),
    `em_mail` VARCHAR(128),
	CONSTRAINT `PK_EM` PRIMARY KEY (`em_id`)
) ENGINE=InnoDB;

CREATE TABLE `BANK`(
	`bk_id` CHAR(6),
	`bk_usr` VARCHAR(6),
    `bk_num` VARCHAR(16), -- Account number
	CONSTRAINT `PK_BK` PRIMARY KEY (`bk_id`)
) ENGINE=InnoDB;

CREATE TABLE `ACCOUNTING`(
	`ac_id` CHAR(6) NOT NULL,
    `ac_concept` VARCHAR(12), -- Why did the change happen
    `ac_ammount` DECIMAL(11,2),
    `ac_od` CHAR(6), -- Account of procedence or destiny
    `ac_md` CHAR(6), -- Modo de Pago
    CONSTRAINT `PK_ACC` PRIMARY KEY (`ac_id`)
) ENGINE = InnoDB;

CREATE TABLE `OFFERS`(
	`of_id` CHAR(6),
    `of_st` DATE, -- Start  Date
    `of_ed` DATE,
    `of_am` TINYINT,
    `of_desc` VARCHAR(255),
    CONSTRAINT `PK_OF` PRIMARY KEY (`of_id`)
) ENGINE = InnoDB;

CREATE TABLE `ID_OF`(
	`it_id` CHAR(6),
    `of_id` CHAR(6)
) ENGINE = InnoDB;

CREATE TABLE `ID_OR`(
	`it_id` CHAR(6),
    `or_id` CHAR(6),
    `or_am` TINYINT
) ENGINE = InnoDB;

CREATE TABLE `CART`(
	`ct_id` CHAR(6),
    `ct_ur` CHAR(6),
    `ct_ds` TINYINT -- Destino del carro, compra, inactividad, cancelacion
) ENGINE = InnoDB;

CREATE TABLE `CT_IT`(
	`ct_id` CHAR(6),
	`it_id` CHAR(6),
    `ct_am` TINYINT, -- Amount
    `ct_pr` DECIMAL(8,2) -- Item Price
) ENGINE = InnoDB;

ALTER TABLE `ITEM` ADD CONSTRAINT `FK_ITBR00` FOREIGN KEY (`it_brand`) REFERENCES `BRAND`(`br_id`);
ALTER TABLE `STOCK` ADD CONSTRAINT `FK_STIT00` FOREIGN KEY (`st_item`) REFERENCES `ITEM`(`it_id`);
ALTER TABLE `ORDERS` ADD CONSTRAINT `FK_ORPR00` FOREIGN KEY (`or_provider`) REFERENCES `PROVIDER`(`pr_id`);
ALTER TABLE `it_or` ADD CONSTRAINT `FK_ITOR00` FOREIGN KEY (`it_id`) REFERENCES `ITEM`(`it_id`);
ALTER TABLE `it_or` ADD CONSTRAINT `FK_ITOR01` FOREIGN KEY (`or_id`) REFERENCES `ORDERS`(`or_id`);
ALTER TABLE `ADDRESS` ADD CONSTRAINT `FK_ADUS00` FOREIGN KEY (`ad_usr`) REFERENCES `USERS`(`ur_id`);
ALTER TABLE `PHONE` ADD CONSTRAINT `FK_PHUS01` FOREIGN KEY (`ph_usr`) REFERENCES `USERS`(`ur_id`);
ALTER TABLE `EMAIL` ADD CONSTRAINT `FK_EMUS01` FOREIGN KEY (`em_usr`) REFERENCES `USERS`(`ur_id`);
ALTER TABLE `BANK` ADD CONSTRAINT `FK_BKUS01` FOREIGN KEY (`bk_usr`) REFERENCES `USERS`(`ur_id`);
ALTER TABLE `BANK` ADD CONSTRAINT `FK_BKPR01` FOREIGN KEY (`bk_pro`) REFERENCES `PROVIDER`(`pr_id`);