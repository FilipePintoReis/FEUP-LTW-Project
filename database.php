<?php
    function get_all_stories(){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story');
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