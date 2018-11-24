DROP TABLE Story;
DROP TABLE Comment;
DROP TABLE User;

CREATE TABLE Story (
	ID  INT NOT NULL AUTO_INCREMENT,
	title TEXT,
	datePosted Date,
	content TEXT,
	imagem TEXT,
	tags TEXT,
	cathegories TEXT,
	PRIMARY KEY (ID)
)

CREATE TABLE Comment (
	ID  INT NOT NULL AUTO_INCREMENT,
	ID_story INT,
	ID_user INT,
	datePosted Date,
	content TEXT,
	FOREIGN KEY (ID_story) REFERENCES Story(ID_story),
	FOREIGN KEY (ID_user) REFERENCES User(ID_user),
	PRIMARY KEY (ID)
)

CREATE TABLE User (
	ID  INT NOT NULL AUTO_INCREMENT,
	UserName TEXT,
	Password TEXT
)