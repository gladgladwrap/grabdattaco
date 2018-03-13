CREATE TABLE reservations 
	(reservation_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	customer_id INT(6) UNSIGNED,
	reservation_date date NOT NULL,
	event_location char(100) NOT NULL,
	city char(50) NOT NULL,
	party_size char(30) NOT NULL,
	event_type char(50) NOT NULL,
	tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
) ENGINE = INNODB;