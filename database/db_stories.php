<?php

    include_once(dirname(__DIR__) . '/includes/database.php');

    function get_all_stories(){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT Story.id AS id, Story.url AS url, name, username, title, date_posted
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = Channel.id) AND (Story.id_user = User.id))
                                ORDER BY Story.date_posted DESC;'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function get_all_stories_by_upvotes(){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT Story.id AS id, Story.url AS url, name, username, title, date_posted
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = Channel.id) AND (Story.id_user = User.id))
                                ORDER BY Story.n_upvotes DESC;'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function get_all_stories_by_downvotes(){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT Story.id AS id, Story.url AS url, name, username, title, date_posted
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = Channel.id) AND (Story.id_user = User.id))
                                ORDER BY Story.n_downvotes DESC;'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function search_story($search){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT Story.id AS id, Story.url AS url, name, username, title, date_posted
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = Channel.id) AND (Story.id_user = User.id) AND (Story.title LIKE ?));'
                            );
        $stmt->execute(array($search));
        return $stmt->fetchAll();
    };

    function get_all_channels(){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT name
                                FROM Channel;'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function get_story_from_id($id_story){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT Story.id AS id, Story.url AS url, name, username, title, content, date_posted
                                FROM Story, User, Channel
                                WHERE ((Story.id = ?) AND (Story.id_channel = Channel.id) AND (Story.id_user == User.id));'
                            );
        $stmt->execute(array($id_story));
        return $stmt->fetch();
    }

    function get_all_stories_from_user($id_user){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT *
                                FROM Story, User, Channel
                                WHERE ((Story.id_user = User.id) AND (User.id = ?) AND (Story.id_channel = Channel.id));
                            ');
        $stmt->execute(array($id_user));
        return $stmt->fetchAll();
    }

    function get_all_comments_from_story($id_story){
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT Comment.id, username, content, datePosted, n_upvotes, n_downvotes
                                FROM Comment JOIN User ON Comment.id_user = User.id
                                WHERE id_story = ? and id_parent is null;');
        $stmt->execute(array($id_story));
        return $stmt->fetchAll();
    }

    function get_all_comments_from_comment($id_comment){
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT Comment.id, username, content, datePosted, n_upvotes, n_downvotes
                                FROM Comment JOIN User ON Comment.id_user = User.id
                                WHERE id_parent = ?;');
        $stmt->execute(array($id_comment));
        return $stmt->fetchAll();
    }


    function get_all_stories_from_channel($id){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT *
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = ?) AND (Channel.id = ?) AND (Story.id_user = User.id));
                            ');
        $stmt->execute(array($id, $id));
        return $stmt->fetchAll();
    };

    function insert_story($id_user, $id_channel, $title, $content, $date_posted, $url){
        $db = Database::instance()->db();
        $stmt = $db->prepare('INSERT INTO Story VALUES (NULL, ?, ?, ?, ?, ?, ?, 0, 0);
                            ');
        $stmt->execute(array($id_user, $id_channel, $title, $content, $date_posted, $url));
        return true;
    };

    function add_comment($id_story, $id_user, $id_parent, $content, $date_posted){
        $db = Database::instance()->db();
        $stmt = $db->prepare('INSERT INTO Comment VALUES (NULL, ?, ?, ?, ?, ?, 0, 0);
                            ');
        $stmt->execute(array($id_story, $id_user, $id_parent, $content, $date_posted));
        return true;
    }

    function update_picture_story($id_story, $picture) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Story SET picture = ? WHERE id = ?');
        $stmt->execute(array($picture, $id_story));
        return true;
    }

    function get_channel_id_from_name($channel_name){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT Channel.id FROM Channel
                                WHERE Channel.name = ?;
                            ');
        $stmt->execute(array($channel_name));
        return $stmt->fetch();
    }

    function get_username_from_user_id($id_user){
        $db = Database::instance()->db();
        $stmt = $db->prepare('  SELECT User.username FROM User
                                WHERE User.id = ?;
                            ');
        $stmt->execute(array($id_user));
        return $stmt->fetch();
    }





    /* *****   STORY VOTES   ***** */

    function add_story_vote($id_story, $id_user, $value) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('INSERT INTO StoryVote VALUES (?, ?, ?);');
        $stmt->execute(array($id_story, $id_user, $value));
        return true;
    }

    function update_story_vote($id_story, $id_user, $value) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('UPDATE StoryVote SET value = ? WHERE ((id_story = ?) AND (id_user = ?));');
        $stmt->execute(array($value, $id_story, $id_user));
        return true;
    }

    function delete_story_vote($id_story, $id_user) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('DELETE FROM StoryVote WHERE ((id_story = ?) AND (id_user = ?));');
        $stmt->execute(array($id_story, $id_user));
        return true;
    }

    function get_story_vote($id_story, $id_user) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM StoryVote WHERE ((id_story = ?) AND (id_user = ?));');
        $stmt->execute(array($id_story, $id_user));
        return $stmt->fetch();
    }

    function get_story_upvotes($id_story) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT n_upvotes FROM Story WHERE id = ?;');
        $stmt->execute(array($id_story));
        return $stmt->fetch();
    }

    function get_story_downvotes($id_story) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT n_downvotes FROM Story WHERE id = ?;');
        $stmt->execute(array($id_story));
        return $stmt->fetch();
    }

    /* *****   COMMENT VOTES   ***** */

    function add_comment_vote($id_comment, $id_user, $value) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('INSERT INTO CommentVote VALUES (?, ?, ?);');
        $stmt->execute(array($id_comment, $id_user, $value));
        return true;
    }

    function update_comment_vote($id_comment, $id_user, $value) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('UPDATE CommentVote SET value = ? WHERE ((id_comment = ?) AND (id_user = ?));');
        $stmt->execute(array($value, $id_comment, $id_user));
        return true;
    }

    function delete_comment_vote($id_comment, $id_user) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('DELETE FROM CommentVote WHERE ((id_comment = ?) AND (id_user = ?));');
        $stmt->execute(array($id_comment, $id_user));
        return true;
    }

    function get_comment_vote($id_comment, $id_user) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT value FROM CommentVote WHERE ((id_comment = ?) AND (id_user = ?));');
        $stmt->execute(array($id_comment, $id_user));
        return $stmt->fetch();
    }
?>
