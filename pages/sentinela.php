<?php
session_start();
if (isset($_SESSION["nome"])) {
    $teste = 123;
} else {
    header("Location: ../index.php");
}

?>
