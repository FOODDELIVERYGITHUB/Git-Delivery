CREATE TABLE drivers(
	Driver_ID VARCHAR2(6) PRIMARY KEY,
	vehicle_type VARCHAR2(10) NOT NULL,
	license_number NUMBER(25) unique
);

CREATE SEQUENCE RESTRAURANT_PK
START WITH 1
INCREMENT BY 1;

CREATE TABLE restraurants(
	email VARCHAR2(25) NOT NULL,
	location varchar2(12) not null, 
	restaurant_type VARCHAR2(25) not null,
	res_id number(10) DEFAULT RESTRAURANT_PK.NEXTVAL PRIMARY KEY
);

CREATE TABLE Theusers(
	full_name VARCHAR2(6),
	address varchar(255),
	postcode varchar2(7),
	email varchar2(25) PRIMARY KEY,
	password varchar2(255) not null,
	Phonenumber varchar2(15) unique
);

CREATE TABLE Schedule(
	First_order_date DATE DEFAULT SYSDATE NOT NULL CONSTRAINT dt_format CHECK (First_order_date = TO_DATE(First_order_date, 'yyyy-MM-DD')),
	Driver_ID VARCHAR2(6),
	Res_ID NUMBER(10),
	email varchar2(25),
	FOREIGN KEY (Driver_ID) REFERENCES drivers(Driver_ID),
	FOREIGN KEY (Res_ID) REFERENCES restraurants(Res_ID),
	FOREIGN KEY (email) REFERENCES Theusers(email)	
);

CREATE TABLE User_table_changes(
	email VARCHAR2(25),
	password_changed_date DATE
	);
	
CREATE OR REPLACE TRIGGER password_change_trigger
AFTER UPDATE OF password ON Theusers
FOR EACH ROW
BEGIN
  IF :OLD.password <> :NEW.password THEN
    INSERT INTO User_table_changes (email, password_changed_date)
    VALUES (:OLD.email, SYSDATE);
  END IF;
END;
/
