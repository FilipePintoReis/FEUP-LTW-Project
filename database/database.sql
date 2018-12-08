
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


INSERT INTO User VALUES (NULL, 'Jose', 'password');
INSERT INTO User VALUES (NULL, 'Jose1', 'password1');
INSERT INTO User VALUES (NULL, 'Jose2', 'password2');
INSERT INTO User VALUES (NULL, 'Jose3', 'password3');
INSERT INTO User VALUES (NULL, 'Jose4', 'password4');

INSERT INTO Channel VALUES (NULL, 'When you try your best, but dont succeed');
INSERT INTO Channel VALUES (NULL, 'Tech Support');
INSERT INTO Channel VALUES (NULL, 'Plane Weird');
INSERT INTO Channel VALUES (NULL, 'Food in hotels');
INSERT INTO Channel VALUES (NULL, 'Almost died');

INSERT INTO Story VALUES (NULL, 2, 2, 'I almost made it to the bus stop' , 'aa', 2015-06-15);
INSERT INTO Story VALUES (NULL, 3, 3, 'I almost made it to the bus stop' , 'aa2', 2015-06-12);
--A notação da data pode estar mal, confirmar isso
INSERT INTO Story VALUES (NULL, 1, 1, 'I almost made it to the bus stop', 'I almost made it, but a kid shoved me and I fell on the water. My phone was so hot that there was smoke on the water.', 2015-06-15);

--INSERT INTO Comment VALUES ();

--INSERT INTO StoryVote VALUES ();

--INSERT INTO CommentVote VALUES ();