<?php
session_start();
include('includes/function.php');
unset($_SESSION['sid']);
session_destroy();
redirect('index.php');
?>