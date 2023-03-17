CREATE TABLE Theusers(
	full_name VARCHAR2(6),
	email VARCHAR2(25) NOT NULL primary key,
	address varchar(255),
	postcode varchar2(7),
	password varchar2(255) not null,
	phonenumber varchar2(255) unique
);

CREATE TABLE drivers(
	driver_id NUMBER(4) PRIMARY KEY,
	vehicle_type VARCHAR2(3) NOT NULL,
	email VARCHAR2(25),
	license_number NUMBER(25),
	foreign key (email) references Theusers(email)	
);

CREATE TABLE restaraunts(
	location varchar2(12),
	email VARCHAR2(25) primary key,
	restaraunt_type VARCHAR2(25),
	foreign key (email) references Theusers(email)
);