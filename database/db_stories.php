<?php
    function get_all_stories(){
        global $db;
        $stmt = $db->prepare('SELECT name as channel_name, username, title, content, date_posted
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = Channel.id_channel) AND (Story.id_user == User.id_user));'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function get_all_stories_from_user($id_user){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, User, Channel WHERE ((Story.id_user = User.id_user) AND (User.id_user = ?) AND (Story.id_channel = Channel.id_channel));');
        $stmt->execute(array($id_user));
        return $stmt->fetchAll();
    }

    function get_all_comments_from_story($id_story){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, Comment, User WHERE ((Story.id_story = ?) AND (Story.id_story = Comment.id_story) AND (Comment.id_parent != NULL))');
        $stmt->execute(array($id_user));
        return $stmt->fetchAll();
    }

    function get_all_comments_from_comment($id_story, $id_comment){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, Comment, User WHERE ((Story.id_story = ?) AND (Story.id_story = Comment.id_story) AND (Comment.id_parent = ?))');
        $stmt->execute(array($id_user, $id_comment));
        return $stmt->fetchAll();
    }


    function get_all_stories_from_channel($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, Channel, User WHERE ((Story.id_channel = ?) AND (Channel.id_channel = ?) AND (Story.id_user = User.id_user));');
        $stmt->execute(array($id, $id));
        return $stmt->fetchAll();
    };


?>
