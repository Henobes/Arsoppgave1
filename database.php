<?php

    $server = "localhost";
    $user = "root";
    $pw = "Admin";
    $db = "teknotoppen";

    $conn = mysqli_connect($server, $user, $pw, $db);

    if(!$conn) {
        echo "Connection failed!";        
    }
    ?>