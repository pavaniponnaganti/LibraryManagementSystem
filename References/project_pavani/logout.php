<?php
session_start();
unset($_SESSION["memid"]);
unset($_SESSION["username"]);
header("Location:index.php");
?>