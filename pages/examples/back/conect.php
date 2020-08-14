<?php

require "conf.php";
//conexão com o bd

    $con = mysqli_connect("$host","$user","$pass","$bd") or die (mysqli_error($con));


    ?>