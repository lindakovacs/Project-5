<?php
    header('content-type: text/json');
    include_once("../classes/Db.class.php");

    if(!empty($_POST["username"]))
    {
        $conn = Db::getInstance();
        $username = $_POST["username"];
        $allEmails = $conn->query("SELECT gids_id FROM gids WHERE gids_email='$username'");

        $rows = $allEmails->fetchAll();
        if(count($rows) > 0) {
            $arr_response = [
                'status' => true
            ];
        } else {
            $arr_response = [
                'status' => false
            ];
        }
        echo json_encode($arr_response);
    } 
?>