<?php
    include("bdd.php");
    $d = get_all_messages();
    echo json_encode($d); 
?>
