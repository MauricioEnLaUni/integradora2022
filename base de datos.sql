CREATE DATABASE IF NOT EXISTS Proyecto_BD1;
USE Proyecto_BD1;
SET NAMES 'utf8mb4';

CREATE TABLE `ACCOUNTING`(
	`ac_id` int NOT NULL,
    `ac_ct` VARCHAR(12), -- Why did the change happen
    `ac_am` DECIMAL(11,2),
    `ac_dt` DATETIME,  -- Date the row was added.
    `ac_od` int, -- Account of procedence or destiny
    `ac_md` CHAR(4), -- Modo de Pago
    CONSTRAINT `PK_ACC` PRIMARY KEY (`ac_id`),
    INDEX `IX_ACAM`(`ac_am`)
) ENGINE = InnoDB;

CREATE TABLE `ADDRESS`(
	`ad_id` int NOT NULL,
	`ad_us` int, -- FK
    `ad_nb` SMALLINT, -- Exterior number
    `ad_st` VARCHAR(25), -- Street
    `ad_ps` SMALLINT UNSIGNED, -- Postal Code
    `ad_zn` VARCHAR(25), -- Zone/Colony
    `ad_cy` VARCHAR(16), -- City
    `ad_ct` CHAR(2), -- Country
    CONSTRAINT `PK_AD` PRIMARY KEY (`ad_id`),
    INDEX `IX_PS`(`ad_ps`,`ad_cy`),
    INDEX `IX_CY`(`AD_CY`)
) ENGINE=InnoDB;

CREATE TABLE `BANK`(
	`bk_id` int,
	`bk_us` int,
    `bk_nm` VARCHAR(16), -- Account number
	CONSTRAINT `PK_BK` PRIMARY KEY (`bk_id`),
    CONSTRAINT `UQ_NM` UNIQUE (`bk_nm`)
) ENGINE=InnoDB;

CREATE TABLE `CART`(
	`ct_id` int,
    `ct_us` int,
    `ct_ds` TINYINT, -- Destino del carro, compra, inactividad, cancelacion
    CONSTRAINT `PK_CT` PRIMARY KEY (`CT_ID`),
    INDEX `IX_CT`(`ct_ds`)
) ENGINE = InnoDB;

-- Tabla muchos a muchos
CREATE TABLE `CT_IT`(
	`ct_id` int,
	`it_id` int,
    `ct_am` TINYINT -- Amount
) ENGINE = InnoDB;

CREATE TABLE `EMAIL`(
	`em_id` int NOT NULL,
	`em_us` int,
    `em_em` VARCHAR(128),
	CONSTRAINT `PK_EM` PRIMARY KEY (`em_id`),
    CONSTRAINT `UQ_EM` UNIQUE (`em_em`),
    INDEX `IX_EM`(`em_em`)
) ENGINE=InnoDB;

-- Tabla muchos a muchos
CREATE TABLE `it_or`(
	`or_id` int,
    `it_id` int,
    `io_am` TINYINT
) ENGINE = InnoDB;

CREATE TABLE `ITEM`(
	`it_id` INT NOT NULL, -- IDENTIFIER
	`it_nm` VARCHAR(30), -- NAME
    `it_ds` VARCHAR(255), -- DESCRIPTION
	`it_in` FLOAT, -- PRICE BUY
    `it_ot` FLOAT, -- PRICE SALE
	`it_br` int, -- BRAND FOREIGN KEY
	`it_mt` SMALLINT, -- LEAT, CANV, TEXT, RUBR, SYNT, FOAM, DENM
	`it_cl` SMALLINT, -- WHITE,BLACK,RED,BLUE,GREEN,YELLW,ORANG,PURPL,BROWN
	`it_tp` TINYINT, -- Bote,Bota,Clogs,Loafer,Sandalia,Slipper,Atlético,Trabajo,Mocasin,Vestir,Tacones,Mary Janes,Ortopédico
	`it_wh` TINYINT, -- Niño, Niña, Infa, Unsx, Homb, Mujr
	`it_rd` DATE, -- RELEASE DATE
    `it_of` int,
    `br_nm` CHAR(20), -- Name
    `br_ct` VARCHAR(20), -- Country of origin
    INDEX `IX_BR`(`br_nm`),
    CONSTRAINT `UQ_NM` UNIQUE (`br_nm`),
    CONSTRAINT `PK_IT` PRIMARY KEY (`it_id`),
    INDEX `IX_NM`(`it_nm`),
    INDEX `IX_IN`(`IT_IN`),
    INDEX `IX_WH`(`IT_WH`),
    UNIQUE `UQ_ITNM`(`IT_NM`)
) ENGINE = InnoDB;

CREATE TABLE `OFFERS`(
	`of_id` int,
    `of_st` DATE, -- Start  Date
    `of_ed` DATE,
    `of_am` TINYINT, -- % Decrease
    `of_ds` VARCHAR(255), -- Description
    CONSTRAINT `PK_OF` PRIMARY KEY (`of_id`),
    UNIQUE `UQ_OF`(`of_st`),
    INDEX `IX_OFDT`(`of_st`,`of_ed`)
) ENGINE = InnoDB;

CREATE TABLE `ORDERS`(
	`or_id` int NOT NULL, -- Identifier PK
    `or_us` int, -- User who owns this, foreign key
    `or_in` DATETIME, -- Date the order was made
    `or_fl` DATETIME, -- Date order was fulfilled
    `or_is` TINYINT, -- Issues with the order
    `or_py` SMALLINT, -- Order price
    `or_pd` BOOL, -- If the order's been paid. Not sure.
    CONSTRAINT `PK_OR` PRIMARY KEY (`or_id`),
    INDEX `IX_ORPY`(`OR_PY`)
) ENGINE=InnoDB;

CREATE TABLE `PHONE`(
	`ph_id` int NOT NULL,
	`ph_us` int,
    `ph_nm` VARCHAR(15),
	CONSTRAINT `PK_PH` PRIMARY KEY (`ph_id`),
    CONSTRAINT `UQ_PH` UNIQUE (`PH_NM`),
    INDEX `IX_PH`(`ph_nm`)
) ENGINE=InnoDB;

CREATE TABLE `PROVIDER`(
	`pr_id` int NOT NULL, -- Identifier
    `pr_nm` VARCHAR(20), -- Name
    `pr_wb` VARCHAR(64), -- Website
    CONSTRAINT `PK_PR` PRIMARY KEY (`pr_id`),
    CONSTRAINT `UQ_WB` UNIQUE (`PR_WB`),
    INDEX `IX_WBNM`(`PR_NM`)
) ENGINE = InnoDB;

create table `SCORE`(
`sc_id` int,
`sc_it` int,
`sc_us` int,
`sc_se` int,
constraint `PK_SC` primary key (`sc_id`)
)engine = InnoDB;

CREATE TABLE `STOCK`(
	`st_id` int NOT NULL, -- IDENTIFIER
    `st_it` int, -- ITEM ID FOREIGN
    `st_st` TINYINT, -- Amount of shoes in this stock position
    `st_lc` TINYINT, -- Where the item is currently OUTOFSTOCK,TRANSITIN,TRANSITOUT,FRONT,STORE,WAREHOUSE
    `st_sz` TINYINT, -- Hexadecimal Operation DETERMINES SHOE SIZE 00 TO FF Only the first 
    CONSTRAINT `PK_ST` PRIMARY KEY (`st_id`),
    INDEX `IX_STSZ`(`ST_SZ`)
) ENGINE = InnoDB;

CREATE TABLE `USERS`(
	`us_id` int NOT NULL, -- Identifier
    `us_an` VARCHAR(16), -- Account name <> Display Name
    `us_dn` VARCHAR(32), -- Display name <> Account Name
    `us_nm` VARCHAR(16), -- Name
    `us_ln` VARCHAR(32), -- Last Name
    `us_pw` VARCHAR(60), -- Password Encrypted with bcrypt$2b$ Pepper is added locally
    `us_pr` varchar(150), -- If the user is a provider, foreign key 
    CONSTRAINT `PK_UR` PRIMARY KEY (`us_id`),
    CONSTRAINT `UQ_USAN` UNIQUE (`US_AN`),
    INDEX `IX_USPR`(`US_PR`)
) ENGINE = InnoDB;

-- FOREIGN KEYS
ALTER TABLE `ACCOUNTING`
ADD CONSTRAINT `FK_ACBK00`
FOREIGN KEY (`ac_od`) 
REFERENCES `BANK`(`bk_id`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `ADDRESS`
ADD CONSTRAINT `FK_ADUS00`
FOREIGN KEY (`ad_us`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `BANK`
ADD CONSTRAINT `FK_BKUS00`
FOREIGN KEY (`bk_us`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `CART`
ADD CONSTRAINT `FK_CTUS00`
FOREIGN KEY (`ct_us`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `CT_IT`
ADD CONSTRAINT `FK_CTIT00`
FOREIGN KEY (`IT_ID`)
REFERENCES `ITEM`(`IT_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `CT_IT`
ADD CONSTRAINT `FK_CTIT01`
FOREIGN KEY (`CT_ID`)
REFERENCES `CART`(`CT_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `EMAIL`
ADD CONSTRAINT `FK_EMUS00`
FOREIGN KEY (`EM_US`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `IT_OR`
ADD CONSTRAINT `FK_ITOR01`
FOREIGN KEY (`OR_ID`)
REFERENCES `ORDERS`(`OR_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `ITEM`
ADD CONSTRAINT `FK_ITOF`
FOREIGN KEY (`it_of`)
REFERENCES `OFFERS`(`of_id`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `ORDERS`
ADD CONSTRAINT `FK_ORUS00`
FOREIGN KEY (`or_us`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `PHONE`
ADD CONSTRAINT `FK_PHUS00`
FOREIGN KEY (`ph_us`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table `score`
add constraint `FK_SCIT00`
foreign key (`sc_it`)
references `item` (`IT_ID`)
on delete cascade
on update cascade;

alter table `score`
add constraint `FK_SCUS00`
foreign key (`sc_us`)
references `users` (`US_ID`)
on delete cascade
on update cascade;

ALTER TABLE `STOCK`
ADD CONSTRAINT `FK_STIT00`
FOREIGN KEY (`st_it`)
REFERENCES `ITEM`(`IT_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `USERS`
ADD CONSTRAINT `FK_USPR00`
FOREIGN KEY (`US_PR`)
REFERENCES `PROVIDER`(`PR_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

delimiter $$
create procedure users_bank (id int)
begin
select address.ad_nb,address.ad_st,address.ad_ps,address.ad_zn,address.ad_cy,address.ad_ct,bank.bk_nm,cart.ct_ds,email.em_em,orders.or_in,orders.or_fl,orders.or_is,orders.or_py,orders.or_pd,phone.ph_nm,users.us_an,users.us_dn,users.us_nm,users.us_ln,users.us_pw,users.us_pr from users 
inner join address on users.us_id=ad_us
inner join bank on users.us_id=bk_us
inner join cart on users.us_id=ct_us
inner join email on users.us_id=em_us
inner join orders on users.us_id=or_us
inner join phone on users.us_id=ph_us where users.us_id=id;
end; $$
Delimiter ; 

delimiter $$
create procedure new_users ( -- Identifier
    `us_A_name` VARCHAR(16), -- Account name <> Display Name
    `us_D_name` VARCHAR(32), -- Display name <> Account Name
    `us_name` VARCHAR(16), -- Name
    `us_Last_Name` VARCHAR(32), -- Last Name
    `us_password` VARCHAR(60)-- Password Encrypted with bcrypt$2b$ Pepper is added locally
    )
begin
insert into users values (null,us_A_name,us_D_name,us_name,us_Last_Name,us_password,null);
end; $$
Delimiter ; 

-- admin
CREATE USER 'admin'@'localhost' IDENTIFIED BY '@135';
GRANT ALL PRIVILEGES ON  proyecto_bd1.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;


-- usuario logiado
CREATE USER 'user_log'@'localhost' IDENTIFIED BY '@086';   
GRANT EXECUTE ON procedure proyecto_bd1.users_bank TO 'user_log'@'localhost';  
FLUSH PRIVILEGES;
SHOW GRANTS FOR 'user_log'@'localhost';
drop user 'user_log'@'localhost';

-- invitado
CREATE USER 'invitado'@'localhost' IDENTIFIED BY '@135';
grant execute on procedure proyecto_bd1.new_users to 'invitado'@'localhost';
FLUSH PRIVILEGES;

SHOW GRANTS FOR 'invitado'@'localhost';



-- CREATE USER 'provider'@'localhost' IDENTIFIED BY '@135';
-- GRANT select ON  proyecto_bd1.accounting TO 'provider'@'localhost';
-- GRANT select,update,delete,insert ON  proyecto_bd1.address TO 'provider'@'localhost';
-- GRANT select,update,delete,insert ON  proyecto_bd1.bank TO 'provider'@'localhost';
-- GRANT select,update,delete,insert ON  proyecto_bd1.cart TO 'provider'@'localhost';
-- GRANT select,update,delete,insert ON  proyecto_bd1.email TO 'provider'@'localhost';
-- GRANT select ON  proyecto_bd1.item TO 'provider'@'localhost';
-- GRANT select ON  proyecto_bd1.offers TO 'provider'@'localhost';
-- GRANT select,update,delete,insert ON  proyecto_bd1.phone TO 'provider'@'localhost';
-- GRANT select,delete,update ON  proyecto_bd1.provider TO 'provider'@'localhost';
-- GRANT select ON  proyecto_bd1.stock TO 'provider'@'localhost';
-- GRANT select,update,delete ON  proyecto_bd1.users TO 'provider'@'localhost';
-- FLUSH PRIVILEGES;
