<?php
session_start();
if (!empty($_GET['id'])) {
    if (!empty($_SESSION['custom_user_select'])) {
        if (in_array($_GET['id'], $_SESSION['custom_user_select'], true)) {
            $id = $_GET['id'];
            $id = 0;
            $newarray = $_SESSION['custom_user_select'];
            $_SESSION['custom_user_select'] = [];
            foreach ($newarray as $element) {
                if ($element === $_GET['id']) {
                } else {
                    array_push($_SESSION['custom_user_select'], $element);
                }
            }
        } else {
            array_push($_SESSION['custom_user_select'], $_GET['id']);
        }
    } else {
        $_SESSION['custom_user_select'] = [];
        array_push($_SESSION['custom_user_select'], $_GET['id']);
    }
}
//print_r($_SESSION['custom_user_select']);
?>