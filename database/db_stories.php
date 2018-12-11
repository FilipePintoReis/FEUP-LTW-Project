<?php
    function get_all_stories(){
        global $db;
        $stmt = $db->prepare('  SELECT Story.id AS id, name, username, title, date_posted
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = Channel.id) AND (Story.id_user == User.id));'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function get_all_channels(){
        global $db;
        $stmt = $db->prepare('  SELECT name
                                FROM Channel;'
                            );
        $stmt->execute();
        return $stmt->fetchAll();
    };

    function get_story_from_id($id_story){
        global $db;
        $stmt = $db->prepare('  SELECT Story.id AS id, name, username, title, content, date_posted
                                FROM Story, User, Channel
                                WHERE ((Story.id = ?) AND (Story.id_channel = Channel.id) AND (Story.id_user == User.id));'
                            );
        $stmt->execute(array($id_story));
        return $stmt->fetch();
    }

    function get_all_stories_from_user($id_user){
        global $db;
        $stmt = $db->prepare('  SELECT *
                                FROM Story, User, Channel
                                WHERE ((Story.id_user = User.id) AND (User.id_user = ?) AND (Story.id_channel = Channel.id));
                            ');
        $stmt->execute(array($id_user));
        return $stmt->fetchAll();
    }

    function get_all_comments_from_story($id_story){
        global $db;
        $stmt = $db->prepare('  SELECT *
                                FROM Story, Comment, User
                                WHERE ((Story.id = ?) AND (Story.id = Comment.id_story) AND (Comment.id_parent != NULL))'
                            );
        $stmt->execute(array($id_story));
        return $stmt->fetchAll();
    }

    function get_all_comments_from_comment($id_story, $id_comment){
        global $db;
        $stmt = $db->prepare('  SELECT *
                                FROM Story, Comment, User
                                WHERE ((Story.id = ?) AND (Story.id = Comment.id_story) AND (Comment.id_parent = ?))'
                            );
        $stmt->execute(array($id_story, $id_comment));
        return $stmt->fetchAll();
    }


    function get_all_stories_from_channel($id){
        global $db;
        $stmt = $db->prepare('  SELECT *
                                FROM Story, Channel, User
                                WHERE ((Story.id_channel = ?) AND (Channel.id = ?) AND (Story.id_user = User.id));
                            ');
        $stmt->execute(array($id, $id));
        return $stmt->fetchAll();
    };


?>
