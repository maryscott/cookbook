CREATE TABLE users (
	email varchar(256) NOT NULL PRIMARY KEY,
	password varchar(64) NOT NULL,
	firstName varchar(64) NOT NULL,
	lastName varchar(64) NOT NULL,
);

CREATE TABLE URLListing (
	email varchar(256) NOT NULL,
	URL varchar(256) NOT NULL,
	picFilePath varchar(256),
	briefDescription varchar(512) NOT NULL,
	lastAccessed DATETIME DEFAULT GETDATE()
);

CREATE TABLE PictureListing (
	email varchar(256) NOT NULL,
	picFilePath1 varchar(256) NOT NULL,
	picFilePath2 varchar(256),
	picFilePath3 varchar(256),
	briefDescription varchar(512) NOT NULL,
	lastAccessed DATETIME DEFAULT GETDATE()
);

CREATE TABLE TextListing (
	email varchar(256) NOT NULL,
	textFilePath varchar(256) NOT NULL,
	picFilePath varchar(256),
	briefDescription varchar(512) NOT NULL,
	lastAccessed DATETIME DEFAULT GETDATE()
);