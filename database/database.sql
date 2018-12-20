
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
	url			TEXT,
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

INSERT INTO Story VALUES (NULL, 1, 1, 'I almost made it to the bus stop',
	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in elit neque. Donec in fringilla lectus. Nulla mattis lectus a congue porta. Praesent tempor ultrices mauris a posuere. Quisque eu finibus neque, eu placerat mauris. Integer tellus nulla, pellentesque ut sapien aliquet, lacinia vulputate quam. Proin eget libero ut nibh blandit auctor. Suspendisse venenatis porta lorem, ut imperdiet dui rutrum luctus. Mauris at magna pretium, iaculis metus ut, ullamcorper nunc. Suspendisse malesuada fermentum ornare.
	Nunc commodo odio in tincidunt condimentum. Nunc risus velit, posuere ac rutrum nec, volutpat vitae massa. Nunc pellentesque lorem lacus, ut porttitor turpis imperdiet a. Quisque ac nunc felis. Sed vehicula risus mauris, ut laoreet ex euismod et. Vestibulum in nibh viverra, viverra diam id, lobortis arcu. Nullam orci quam, congue at lorem nec, pellentesque varius quam.',
 	'2015-06-15 00:00:00', '../post_images/avatar.jpg', 1, 0); --id_story id_user id_channel title content date_posted


INSERT INTO Story VALUES (NULL, 2, 2, 'My cat is better than yours' ,
	'Ut ut ultrices neque, eget tincidunt purus. Ut in lacus quis orci elementum consectetur. Aliquam erat volutpat. Sed ac risus interdum, dictum neque et, tincidunt leo. Praesent eget eros urna. Curabitur ac tempor nunc, eu faucibus eros. Mauris sed commodo eros, sit amet sodales massa. In sed enim quam. Proin id feugiat nunc. Nulla tincidunt enim at porttitor rutrum. Nullam ac arcu non orci laoreet laoreet et non diam. Nulla dolor diam, tempus id lobortis nec, eleifend efficitur est. Suspendisse potenti. Donec est tortor, venenatis non tellus quis, malesuada gravida felis. Phasellus ut ipsum vitae elit sagittis ultrices nec quis diam. Etiam pulvinar vel purus ac convallis.
	Duis turpis ante, lobortis sit amet risus in, tincidunt iaculis elit. Morbi iaculis vestibulum imperdiet. Nam congue in lorem eget venenatis. Pellentesque vitae pharetra diam, lacinia congue leo. Sed non porttitor purus, non tempus ligula. Donec nec ultrices leo. Nullam nec luctus leo, at iaculis risus. In hac habitasse platea dictumst. Nam ultrices ornare viverra.',
	'2016-06-15 00:00:00', '../post_images/avatar.jpg', 2, 0);

INSERT INTO Story VALUES (NULL, 3, 3, 'I lost the bus. Never had I ever lost something that big' ,
	'Vivamus posuere semper libero, pharetra rutrum augue sagittis id. Etiam et posuere mi. Fusce vitae nibh non ex malesuada dapibus. Pellentesque congue urna nec justo placerat aliquet. Sed pulvinar lobortis sapien vel eleifend. Fusce quis eros varius, vulputate dolor et, lacinia lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas ut pharetra ligula. Donec volutpat est vel lorem vulputate, non ornare libero malesuada. Ut a ipsum a dolor suscipit blandit quis a nulla. In hac habitasse platea dictumst. Pellentesque convallis tristique ante. Proin malesuada suscipit porta.
	Donec tristique lacus a erat rhoncus feugiat. Nullam luctus placerat nisi sit amet ullamcorper. Morbi bibendum diam in mi pellentesque, sed venenatis enim ultrices. In hac habitasse platea dictumst. Fusce rhoncus, ante et suscipit euismod, arcu tellus pretium turpis, id gravida nulla nisi in tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In faucibus tempus ex. Pellentesque ligula massa, aliquam vel ante id, laoreet imperdiet tellus. Proin mattis lectus volutpat metus viverra, at pharetra sem malesuada.
	Duis rutrum massa non neque tincidunt, vitae finibus metus accumsan. Nulla magna lorem, elementum id laoreet vel, pretium eget mauris. Nulla sed nulla velit. Nullam semper eros feugiat cursus vestibulum. Praesent pretium quis arcu at iaculis. Sed vel vulputate sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin justo enim, sagittis laoreet rutrum eu, gravida et quam. Nam ex ante, laoreet at fringilla sed, pretium non nisi.',
	'2018-12-10 00:00:00', '../post_images/avatar.jpg', 3, 1);

INSERT INTO Story VALUES (NULL, 4, 3, 'How can you be nice when someone is in front of you?' ,
	'Vivamus posuere semper libero, pharetra rutrum augue sagittis id. Etiam et posuere mi. Fusce vitae nibh non ex malesuada dapibus. Pellentesque congue urna nec justo placerat aliquet. Sed pulvinar lobortis sapien vel eleifend. Fusce quis eros varius, vulputate dolor et, lacinia lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas ut pharetra ligula. Donec volutpat est vel lorem vulputate, non ornare libero malesuada. Ut a ipsum a dolor suscipit blandit quis a nulla. In hac habitasse platea dictumst. Pellentesque convallis tristique ante. Proin malesuada suscipit porta.
	Donec tristique lacus a erat rhoncus feugiat. Nullam luctus placerat nisi sit amet ullamcorper. Morbi bibendum diam in mi pellentesque, sed venenatis enim ultrices. In hac habitasse platea dictumst. Fusce rhoncus, ante et suscipit euismod, arcu tellus pretium turpis, id gravida nulla nisi in tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In faucibus tempus ex. Pellentesque ligula massa, aliquam vel ante id, laoreet imperdiet tellus. Proin mattis lectus volutpat metus viverra, at pharetra sem malesuada.
	Duis rutrum massa non neque tincidunt, vitae finibus metus accumsan. Nulla magna lorem, elementum id laoreet vel, pretium eget mauris. Nulla sed nulla velit. Nullam semper eros feugiat cursus vestibulum. Praesent pretium quis arcu at iaculis. Sed vel vulputate sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin justo enim, sagittis laoreet rutrum eu, gravida et quam. Nam ex ante, laoreet at fringilla sed, pretium non nisi.',
	'2018-12-10 00:00:00', '../post_images/avatar.jpg', 0, 2);

INSERT INTO Story VALUES (NULL, 3, 1, 'Feeling like a fish underwater lmao' ,
	'Vivamus posuere semper libero, pharetra rutrum augue sagittis id. Etiam et posuere mi. Fusce vitae nibh non ex malesuada dapibus. Pellentesque congue urna nec justo placerat aliquet. Sed pulvinar lobortis sapien vel eleifend. Fusce quis eros varius, vulputate dolor et, lacinia lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas ut pharetra ligula. Donec volutpat est vel lorem vulputate, non ornare libero malesuada. Ut a ipsum a dolor suscipit blandit quis a nulla. In hac habitasse platea dictumst. Pellentesque convallis tristique ante. Proin malesuada suscipit porta.
	Donec tristique lacus a erat rhoncus feugiat. Nullam luctus placerat nisi sit amet ullamcorper. Morbi bibendum diam in mi pellentesque, sed venenatis enim ultrices. In hac habitasse platea dictumst. Fusce rhoncus, ante et suscipit euismod, arcu tellus pretium turpis, id gravida nulla nisi in tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In faucibus tempus ex. Pellentesque ligula massa, aliquam vel ante id, laoreet imperdiet tellus. Proin mattis lectus volutpat metus viverra, at pharetra sem malesuada.
	Duis rutrum massa non neque tincidunt, vitae finibus metus accumsan. Nulla magna lorem, elementum id laoreet vel, pretium eget mauris. Nulla sed nulla velit. Nullam semper eros feugiat cursus vestibulum. Praesent pretium quis arcu at iaculis. Sed vel vulputate sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin justo enim, sagittis laoreet rutrum eu, gravida et quam. Nam ex ante, laoreet at fringilla sed, pretium non nisi.',
	'2018-12-10 00:30:00', '../post_images/avatar.jpg', 0, 0);

INSERT INTO Comment VALUES (NULL, 1, 1, NULL,'Jose commented something', '2015-06-15 00:00:00', 1, 0); --id_comment id_story id_user	id_parent content datePosted
INSERT INTO Comment VALUES (NULL, 1, 2, NULL, 'Jose1 commented Jose comment', '2015-06-15 00:00:00', 1, 0);

INSERT INTO Comment VALUES (NULL, 2, 2, NULL,'Jose1 said something', '2015-06-15 00:00:00', 0, 1);
INSERT INTO Comment VALUES (NULL, 2, 3, NULL, 'Jose2 said Jose1 said', '2015-06-15 00:00:00', 0, 1);

INSERT INTO Comment VALUES (NULL, 3, 3, NULL,'Moms spaghetti', '2015-06-15 00:00:00', 0, 0);
INSERT INTO Comment VALUES (NULL, 3, 3, NULL, 'I broke my nose at aquashow', '2015-06-15 00:00:00', 0, 0);

INSERT INTO Comment VALUES (NULL, 3, 3, 6,'Jose2 heard something', '2015-06-15 00:00:00', 0, 0);
INSERT INTO Comment VALUES (NULL, 3, 3, 6, 'Jose2 heard Jose2 hearing', '2015-06-15 00:00:00', 0, 0);
INSERT INTO Comment VALUES (NULL, 3, 3, 8,'Jose2 heard something', '2015-06-15 00:00:00', 0, 0);



INSERT INTO StoryVote VALUES (0, 1, 1); -- id_story id_user value
INSERT INTO StoryVote VALUES (1, 1, 1);
INSERT INTO StoryVote VALUES (1, 4, 1);
INSERT INTO StoryVote VALUES (2, 2, 1);
INSERT INTO StoryVote VALUES (2, 3, 1);
INSERT INTO StoryVote VALUES (2, 4, 1);
INSERT INTO StoryVote VALUES (2, 1, -1);
INSERT INTO StoryVote VALUES (3, 4, -1);
INSERT INTO StoryVote VALUES (3, 2, -1);

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
