CREATE TABLE Address
(
  Address_Nr INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  LastName VARCHAR(50) NOT NULL,
  FirstName VARCHAR(30),
  Street VARCHAR(255),
  ZIP INT(11),
  Place VARCHAR(255)
);
CREATE TABLE InformationType
(
  Information_Nr INT(11) PRIMARY KEY NOT NULL,
  InformationType VARCHAR(50) NOT NULL
);
CREATE TABLE JoinTable
(
  Information_Nr INT(11),
  Address_Nr INT(11),
  FOREIGN KEY (Information_Nr) REFERENCES InformationType(Information_Nr),
  FOREIGN KEY (Address_Nr) REFERENCES Address(Address_Nr)
);

INSERT INTO InformationType (Information_Nr, InformationType) VALUES ('1', 'E-Mail');
INSERT INTO InformationType (Information_Nr, InformationType) VALUES ('2', 'Newsletter');
INSERT INTO InformationType (Information_Nr, InformationType) VALUES ('3', 'Fax');
INSERT INTO InformationType (Information_Nr, InformationType) VALUES ('4', 'Letter');