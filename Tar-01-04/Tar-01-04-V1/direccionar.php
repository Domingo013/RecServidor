<?php
    $sql = $_POST['consulta'];

    if(isset($_POST['ejecutar'])){
        header('location: consulta_select.php?sql='.$_POST["consulta"]);
    }elseif(isset($_POST['actualizar'])){
        header('location: consulta_actualizar.php?sql='.$_POST["consulta"]);
    }
?>