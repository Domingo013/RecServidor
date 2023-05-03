<?php
    //$sql = $_POST['consulta'];

    if(isset($_POST['ejecutar'])){      // Si existe el botón ejecutar, realiza un header location a consulta_select.php
        header('location: consulta_select.php?sql='.$_POST["consulta"]);
    }elseif(isset($_POST['actualizar'])){       // Si existe el botón actualizar, realiza un header location a consulta_actualizar.php
        header('location: consulta_actualizar.php?sql='.$_POST["consulta"]);
    }
?>