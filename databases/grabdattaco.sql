CREATE TABLE IF NOT EXISTS customers
	(customer_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name CHAR(50) NOT NULL,
	phone char(12) NULL,
	email CHAR(50) NOT NULL,
	address CHAR(100) NOT NULL,
	city CHAR(30) NOT NULL
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS reservations 
	(reservation_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	customer_id INT(6) UNSIGNED,
	reservation_date date NOT NULL,
	event_location char(100) NOT NULL,
	city char(50) NOT NULL,
	party_size char(30) NOT NULL,
	event_type char(50) NOT NULL,
	tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

	INDEX (customer_id),
	FOREIGN KEY (customer_id) 
	REFERENCES customers(customer_id)
	ON UPDATE CASCADE
	
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS customer_feedback
	( name CHAR(50) NOT NULL,
	email CHAR(50) NOT NULL,
	message text NOT NULL,
	tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP PRIMARY KEY,

	INDEX (email)
)ENGINE=INNODB;

-- CREATE TABLE IF NOT EXISTS completedOrders
-- 	( reservationid INT UNSIGNED NOT NULL PRIMARY KEY,
-- 	finalPrice float(5,2) UNSIGNED NOT NULL,
-- 	date TIMESTAMP(10) NOT NULL
-- 	);
