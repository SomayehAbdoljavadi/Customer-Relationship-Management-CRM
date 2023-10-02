<?php
require_once('actions/config.php');
if(!empty($_SESSION['user_info'])) {
    include('pages/home.php');
} else {
	include('pages/login.php');
}
?>