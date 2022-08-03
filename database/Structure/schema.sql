CREATE DATABASE IF NOT EXISTS `ficticho_fict` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ficticho_fict`;
SET NAMES 'utf8mb4';

CREATE TABLE `ACCOUNTING`(
	`ac_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, -- ID
    `ac_ct` VARCHAR(12), -- Concepto
    `ac_am` DECIMAL(11,2), -- Cantidad
    `ac_dt` DATETIME,  -- Fecha de cambio
    `ac_md` CHAR(4) -- Modo de Pago
) ENGINE = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `ADDRESS`(
	`ad_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`ad_us` INT UNSIGNED NOT NULL, -- FK a usuarios
    `ad_nb` SMALLINT, -- Exterior number
    `ad_st` VARCHAR(25), -- Street
    `ad_ps` SMALLINT UNSIGNED, -- Postal Code
    `ad_zn` VARCHAR(25), -- Zone/Colony
    `ad_cy` VARCHAR(16), -- City
    `ad_ct` CHAR(2), -- Country
    `ad_pf` TINYINT UNSIGNED -- Preferred Address
) ENGINE=InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `EMAIL`(
	`em_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`em_us` INT UNSIGNED NOT NULL,
    `em_em` VARCHAR(128),
    CONSTRAINT `UQ_EM` UNIQUE (`em_em`)
) ENGINE=InnoDB CHARACTER SET utf8mb4;

-- Tabla muchos a muchos
-- Tabla de órdenes e items
CREATE TABLE `it_or`(
	`or_id` int UNSIGNED NOT NULL,
    `it_id` int UNSIGNED NOT NULL,
    `io_am` TINYINT -- Cantidad
) ENGINE = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `ITEM`(
	`it_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, -- IDENTIFIER
	`it_nm` VARCHAR(30), -- NAME
    `it_ds` VARCHAR(255), -- DESCRIPTION
	`it_in` FLOAT(10,2), -- PRICE BUY
	`it_br` VARCHAR(12), -- BRAND FOREIGN KEY
	`it_cl` CHAR(5), -- WHITE,BLACK,RED,BLUE,GREEN,YELLW,ORANG,PURPL,BROWN
	`it_tp` CHAR(7), -- Bota,Clogs,Loafer,Atlético,Trabajo,Mocasin,Vestir,Tacones
	`it_wh` CHAR(4), -- Niño, Niña, Infa, Unsx, Homb, Mujr
	`it_rd` DATE, -- RELEASE DATE
    `it_of` INT UNSIGNED NOT NULL, -- Oferta
    `it_tx` DECIMAL(6,2), -- Impuestos
    `it_ft` BOOL -- Si es promovido
) ENGINE = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `OFFERS`(
	`of_id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `of_st` DATE, -- Start  Date
    `of_ed` DATE, -- End
    `of_am` TINYINT, -- % Decrease
    `of_ds` VARCHAR(255) -- Description
) ENGINE = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `ORDERS`(
	`or_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, -- Identifier PK
    `or_us` int UNSIGNED NOT NULL , -- User who owns this, foreign key
    `or_in` DATETIME, -- Date the order was made
    `or_fl` DATETIME, -- Date order was fulfilled
    `or_cu` VARCHAR(5), -- Currency
    `or_sp` FLOAT(10,2) UNSIGNED, -- Shipping
    `or_fe` FLOAT(10,2) UNSIGNED, -- Paypal Fee
    `or_py` SMALLINT UNSIGNED, -- Order price
    `or_pd` BOOL, -- If the order's been paid. Not sure.
    `or_ad` DATETIME, -- When the order was paid
    `or_dv` INT UNSIGNED
) ENGINE=InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `PHONE`(
	`ph_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`ph_us` INT UNSIGNED NOT NULL,
    `ph_nm` VARCHAR(15),
    CONSTRAINT `UQ_PH` UNIQUE (`PH_NM`)
) ENGINE=InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `PROVIDER`(
	`pr_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, -- Identifier
    `pr_nm` VARCHAR(20), -- Name
    `pr_wb` VARCHAR(64), -- Website
    CONSTRAINT `UQ_WB` UNIQUE (`PR_WB`)
) ENGINE = InnoDB CHARACTER SET utf8mb4;

create table `SCORE`(
	`sc_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,-- ID
	`sc_it` INT UNSIGNED NOT NULL,-- FK ITEM
	`sc_us` INT UNSIGNED NOT NULL,-- FK USER
	`sc_se` TINYINT UNSIGNED-- SCORE?
)engine = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `STOCK`(
	`st_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, -- IDENTIFIER
    `st_it` int UNSIGNED NOT NULL, -- FK ITEM ID
    `st_st` TINYINT UNSIGNED, -- Amount of shoes in this stock position
    `st_lc` TINYINT UNSIGNED, -- Where the item is currently OUTOFSTOCK,TRANSITIN,TRANSITOUT,FRONT,STORE,WAREHOUSE
    `st_sz` VARCHAR(5) -- Hexadecimal Operation DETERMINES SHOE SIZE 00 TO FF Only the first 
) ENGINE = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `USERS`(
	`us_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, -- Identifier
    `us_an` VARCHAR(16), -- Account name <> Display Name
    `us_dn` VARCHAR(32), -- Display name <> Account Name
    `us_nm` VARCHAR(16), -- Name
    `us_ln` VARCHAR(32), -- Last Name
    `us_pw` VARCHAR(100), -- Password Encrypted with ARGON2I in PHP
    `us_cs` VARCHAR(32), -- Checksum, unique ID, used for email verification.
    `us_vf` BOOL DEFAULT NULL, -- Si el usuario está verificado
    `us_pr` INT UNSIGNED, -- FK Proveedor 
    `us_al` INT UNSIGNED, -- Nivel de acceso al sitio
    CONSTRAINT `UQ_USAN` UNIQUE (`us_an`),
    CONSTRAINT `UQ_USDN` UNIQUE (`us_dn`),
    CONSTRAINT `UQ_USCS` UNIQUE (`us_cs`)
) ENGINE = InnoDB CHARACTER SET utf8mb4;

CREATE TABLE `pay_info` (
  `pi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ur_id` int(11) UNSIGNED NOT NULL,
  `pi_type` tinyint(2) UNSIGNED NOT NULL,
  `num_credits` int(11) NOT NULL,
  `price_per_credits` float NOT NULL,
  `payment_time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `contact`(
	`cn_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `cn_nm` VARCHAR(20),
    `cn_ln` VARCHAR(30),
    `cn_em` VARCHAR(128),
    `cn_is` TINYINT UNSIGNED,
    `cn_ph` VARCHAR(15),
    `cn_ms` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- FOREIGN KEYS
ALTER TABLE `ADDRESS`
ADD CONSTRAINT `FK_ADUS00`
FOREIGN KEY (`ad_us`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `EMAIL`
ADD CONSTRAINT `FK_EMUS00`
FOREIGN KEY (`EM_US`)
REFERENCES `USERS`(`US_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `it_or`
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

alter table `SCORE`
add constraint `FK_SCIT00`
foreign key (`sc_it`)
references `ITEM` (`IT_ID`)
on delete cascade
on update cascade;

alter table `SCORE`
add constraint `FK_SCUS00`
foreign key (`sc_us`)
references `USERS` (`US_ID`)
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

delimiter $$PROVIDER
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