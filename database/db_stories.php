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

    function get_all_comments_from_story($id){
        global $db;


    }

    function get_all_stories_from_channel($id){
        global $db;
        $stmt = $dbh->prepare("SELECT * FROM Story, Channel WHERE Story.id_channel = ?");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    };


?>
