<?php
    include("bdd.php");

    $d = get_messages();
    echo json_encode($d); 

?>
