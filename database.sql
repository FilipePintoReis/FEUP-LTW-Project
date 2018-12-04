
DROP TABLE IF EXISTS Story;
CREATE TABLE Story (
	id_story	INT PRIMARY KEY
				UNIQUE
				NOT NULL
				AUTO_INCREMENT,
	id_user		INT REFERENCES User(id_user)
				NOT NULL,
	id_channel 	INT REFERENCES Channel(id_channel)
				NOT NULL,
	title 		TEXT,
	content 	TEXT,
	date_posted DATE
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
	id_comment  INT PRIMARY KEY
				UNIQUE
				NOT NULL
				AUTO_INCREMENT,
	id_story	INT REFERENCES Story(id_story)
				NOT NULL,
	id_user		INT REFERENCES User(id_user)
				NOT NULL,
	id_parent	INT REFERENCES Comment(id_comment),
	content 	TEXT,
	datePosted 	DATE
);

DROP TABLE IF EXISTS User;
CREATE TABLE User (
	id_user		INT PRIMARY KEY
				UNIQUE
				NOT NULL
				AUTO_INCREMENT,
	username	TEXT,
	password 	TEXT
);

DROP TABLE IF EXISTS Channel;
CREATE TABLE Channel (
	id_channel 	INT PRIMARY KEY
				UNIQUE
				NOT NULL
				AUTO_INCREMENT,
	name		TEXT,
);

DROP TABLE IF EXISTS StoryVote;
CREATE TABLE StoryVote (
	id_story	INT REFERENCES Story(id_story)
				NOT NULL,
	id_user		INT REFERENCES User(id_user)
				NOT NULL,
	value		INT,
	CHECK 		(value in (-1, 0, 1)),
	PRIMARY KEY (id_story, id_user)
);

DROP TABLE IF EXISTS CommentVote;
CREATE TABLE CommentVote (
	id_comment	INT REFERENCES Comment(id_comment)
				NOT NULL,
	id_user	INT REFERENCES User(id_user)
				NOT NULL,
	value		INT,
	CHECK 		(value in (-1, 0, 1)),
	PRIMARY KEY (id_comment, id_user)
);
