
DROP TABLE IF EXISTS User;
CREATE TABLE User (
	id			INTEGER PRIMARY KEY
				AUTOINCREMENT,
	username	TEXT UNIQUE,
	password 	TEXT,
	fullname	TEXT,
	email 		TEXT,
	bio			TEXT,
	url 		VARCHAR
);

DROP TABLE IF EXISTS Channel;
CREATE TABLE Channel (
	id	 	INTEGER PRIMARY KEY
			AUTOINCREMENT,
	name	TEXT
);

DROP TABLE IF EXISTS Story;
CREATE TABLE Story (
	id			INTEGER PRIMARY KEY
				AUTOINCREMENT,
	id_user		INTEGER REFERENCES User(id)
				NOT NULL,
	id_channel 	INTEGER REFERENCES Channel(id)
				NOT NULL,
	title 		TEXT,
	content 	TEXT,
	date_posted DATETIME,
	url			VARCHAR,
	n_upvotes 	INTEGER,
	n_downvotes INTEGER
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
	id			INTEGER PRIMARY KEY
				AUTOINCREMENT,
	id_story	INTEGER REFERENCES Story(id)
				NOT NULL,
	id_user		INTEGER REFERENCES User(id)
				NOT NULL,
	id_parent	INTEGER REFERENCES Comment(id),
	content 	TEXT,
	datePosted 	DATETIME,
	n_upvotes 	INTEGER,
	n_downvotes INTEGER
);

DROP TABLE IF EXISTS StoryVote;
CREATE TABLE StoryVote (
	id_story	INTEGER REFERENCES Story(id)
				NOT NULL,
	id_user		INTEGER REFERENCES User(id)
				NOT NULL,
	value		INTEGER,
	CHECK 		(value in (-1, 0, 1)),
	PRIMARY KEY (id_story, id_user)
);

DROP TABLE IF EXISTS CommentVote;
CREATE TABLE CommentVote (
	id_comment	INTEGER REFERENCES Comment(id)
				NOT NULL,
	id_user	INTEGER REFERENCES User(id)
				NOT NULL,
	value		INTEGER,
	CHECK 		(value in (-1, 0, 1)),
	PRIMARY KEY (id_comment, id_user)
);

CREATE TRIGGER IF NOT EXISTS Update_StoryVote_AfterInsert
AFTER INSERT ON StoryVote
FOR EACH ROW
BEGIN
	UPDATE Story SET n_upvotes = (SELECT count(*) FROM Story, StoryVote WHERE (StoryVote.value = 1 AND Story.id = new.id_story AND StoryVote.id_story = Story.id)) WHERE Story.id = new.id_story;
	UPDATE Story SET n_downvotes = (SELECT count(*) FROM Story, StoryVote WHERE (StoryVote.value = -1 AND Story.id = new.id_story AND StoryVote.id_story = Story.id)) WHERE Story.id = new.id_story;
END;

CREATE TRIGGER IF NOT EXISTS Update_StoryVote_AfterDelete
AFTER DELETE ON StoryVote
FOR EACH ROW
BEGIN
	UPDATE Story SET n_upvotes = (SELECT count(*) FROM Story, StoryVote WHERE (StoryVote.value = 1 AND Story.id = old.id_story AND StoryVote.id_story = Story.id)) WHERE Story.id = old.id_story;
	UPDATE Story SET n_downvotes = (SELECT count(*) FROM Story, StoryVote WHERE (StoryVote.value = -1 AND Story.id = old.id_story AND StoryVote.id_story = Story.id)) WHERE Story.id = old.id_story;
END;

CREATE TRIGGER IF NOT EXISTS Update_StoryVote_AfterUpdate
AFTER UPDATE ON StoryVote
FOR EACH ROW
BEGIN
	UPDATE Story SET n_upvotes = (SELECT count(*) FROM Story, StoryVote WHERE (StoryVote.value = 1 AND Story.id = new.id_story AND StoryVote.id_story = Story.id)) WHERE Story.id = new.id_story;
	UPDATE Story SET n_downvotes = (SELECT count(*) FROM Story, StoryVote WHERE (StoryVote.value = -1 AND Story.id = new.id_story AND StoryVote.id_story = Story.id)) WHERE Story.id = new.id_story;
END;


INSERT INTO User VALUES (NULL, 'Jose', 'password', 'Jose Manel', 'jose@manel.com', 'I dread snakes', '../avatar_images/avatar.jpg'); -- id_user username password bio url
INSERT INTO User VALUES (NULL, 'Jose1', 'password1', 'Jose1 Manel', 'jose1@manel.com', 'Fudge with bread is life', '../avatar_images/avatar.jpg');
INSERT INTO User VALUES (NULL, 'Jose2', 'password2', 'Jose2 Manel', 'jose2@manel.com', 'Love throwing darts', '../avatar_images/avatar.jpg');
INSERT INTO User VALUES (NULL, 'Jose3', 'password3', 'Jose3 Manel', 'jose3@manel.com', 'Monkey see monkey do', '../avatar_images/avatar.jpg');
INSERT INTO User VALUES (NULL, 'Jose4', 'password4', 'Jose4 Manel', 'jose4@manel.com', 'Pringles', '../avatar_images/avatar.jpg');

INSERT INTO Channel VALUES (NULL, 'When you try your best, but dont succeed'); -- id_channel name
INSERT INTO Channel VALUES (NULL, 'Tech Support');
INSERT INTO Channel VALUES (NULL, 'Plane Weird');
INSERT INTO Channel VALUES (NULL, 'Food in hotels');
INSERT INTO Channel VALUES (NULL, 'Almost died');

--A notação da data está mal é preciso mudar para o que era preciso

INSERT INTO Story VALUES (NULL, 1, 1, 'I almost made it to the bus stop', 'aa', '2015-06-15 00:00:00', '../post_images/avatar.jpg', 3, 0); --id_story id_user id_channel title content date_posted
INSERT INTO Story VALUES (NULL, 2, 2, 'story2' , 'aa2', '2016-06-15 00:00:00', '../post_images/avatar.jpg', 0, 3);
INSERT INTO Story VALUES (NULL, 3, 3, 'story3' , 'I almost made it, but a kid shoved me and I fell on the water. My phone was so hot that there was smoke on the water.', '2018-12-10 00:00:00', '../post_images/avatar.jpg', 0, 0);

INSERT INTO Comment VALUES (NULL, 1, 1, NULL,'Jose commented something', '2015-06-15 00:00:00', 1, 0); --id_comment id_story id_user	id_parent content datePosted
INSERT INTO Comment VALUES (NULL, 1, 2, NULL, 'Jose1 commented Jose comment', '2015-06-15 00:00:00', 1, 0);

INSERT INTO Comment VALUES (NULL, 2, 2, NULL,'Jose1 said something', '2015-06-15 00:00:00', 0, 1);
INSERT INTO Comment VALUES (NULL, 2, 3, NULL, 'Jose2 said Jose1 said', '2015-06-15 00:00:00', 0, 1);

INSERT INTO Comment VALUES (NULL, 3, 3, NULL,'Moms spaghetti', '2015-06-15 00:00:00', 0, 0);
INSERT INTO Comment VALUES (NULL, 3, 3, NULL, 'I broke my nose at aquashow', '2015-06-15 00:00:00', 0, 0);

INSERT INTO Comment VALUES (NULL, 3, 3, 6,'Jose2 heard something', '2015-06-15 00:00:00', 0, 0);
INSERT INTO Comment VALUES (NULL, 3, 3, 6, 'Jose2 heard Jose2 hearing', '2015-06-15 00:00:00', 0, 0);
INSERT INTO Comment VALUES (NULL, 3, 3, 8,'Jose2 heard something', '2015-06-15 00:00:00', 0, 0);



INSERT INTO StoryVote VALUES (1, 1, 1); -- id_story id_user value
INSERT INTO StoryVote VALUES (1, 2, 1);
INSERT INTO StoryVote VALUES (1, 3, 1);
INSERT INTO StoryVote VALUES (2, 1, -1);
INSERT INTO StoryVote VALUES (2, 2, -1);

INSERT INTO CommentVote VALUES (1, 1, 1); --id_comment id_user value
INSERT INTO CommentVote VALUES (1, 2, 1);
INSERT INTO CommentVote VALUES (2, 1, -1); --id_comment id_user value
INSERT INTO CommentVote VALUES (2, 2, -1);

--Some queries
-- select * from Story
-- ... get all stories
-- select * from Story, Channel where (Story.id_channel = Channel.id_channel);
-- ... get all stories that belong to some channel
-- select * from StoryVote where (StoryVote.id_story == 1);
-- ...get all StoryVote from Story.id_story == 1
-- select Story.id_story from Story, StoryVote where (StoryVote.id_story == Story.id_story);
-- ...gets a id_story for each vote
-- select Story.id_story, count(Story.id_story) AS a1 from Story, StoryVote where (StoryVote.id_story == Story.id_story) group by Story.id_story order by a1 DESC limit 1;
-- ... gets most voted story (it's not considering if the votes are yes or no)
--
--
--
--
