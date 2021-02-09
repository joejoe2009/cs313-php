DROP TABLE IF EXISTS persons;
CREATE TABLE persons (
    personid SERIAL,
    lastname varchar(255),
    firstname varchar(255),
    address varchar(255),
    city varchar(255)
);
INSERT INTO persons (lastname, firstname, address, city)
VALUES ('Wilcox', 'Chase', '123 st', 'Los Angeles');