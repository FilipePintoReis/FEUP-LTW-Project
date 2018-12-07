
DROP TABLE IF EXISTS Story;
CREATE TABLE Story (
	id_story	INTEGER PRIMARY KEY
				AUTOINCREMENT,
	id_user		INTEGER REFERENCES User(id_user)
				NOT NULL,
	id_channel 	INTEGER REFERENCES Channel(id_channel)
				NOT NULL,
	title 		TEXT,
	content 	TEXT,
	date_posted DATE
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
	id_comment  INTEGER PRIMARY KEY
				AUTOINCREMENT,
	id_story	INTEGER REFERENCES Story(id_story)
				NOT NULL,
	id_user		INTEGER REFERENCES User(id_user)
				NOT NULL,
	id_parent	INTEGER REFERENCES Comment(id_comment),
	content 	TEXT,
	datePosted 	DATE
);

DROP TABLE IF EXISTS User;
CREATE TABLE User (
	id_user		INTEGER PRIMARY KEY
				AUTOINCREMENT,
	username	TEXT,
	password 	TEXT
);

DROP TABLE IF EXISTS Channel;
CREATE TABLE Channel (
	id_channel 	INTEGER PRIMARY KEY
				AUTOINCREMENT,
	name		TEXT
);

DROP TABLE IF EXISTS StoryVote;
CREATE TABLE StoryVote (
	id_story	INTEGER REFERENCES Story(id_story)
				NOT NULL,
	id_user		INTEGER REFERENCES User(id_user)
				NOT NULL,
	value		INTEGER,
	CHECK 		(value in (-1, 0, 1)),
	PRIMARY KEY (id_story, id_user)
);

DROP TABLE IF EXISTS CommentVote;
CREATE TABLE CommentVote (
	id_comment	INTEGER REFERENCES Comment(id_comment)
				NOT NULL,
	id_user	INTEGER REFERENCES User(id_user)
				NOT NULL,
	value		INTEGER,
	CHECK 		(value in (-1, 0, 1)),
	PRIMARY KEY (id_comment, id_user)
);
