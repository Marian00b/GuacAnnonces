<?php
    include("bdd.php");

    $d = check_user();
    echo json_encode($d); 

?>
