<?php

function conectar(){
    $con = mysqli_connect("localhost", "root", "", "paguma");
    return $con;
}
?>