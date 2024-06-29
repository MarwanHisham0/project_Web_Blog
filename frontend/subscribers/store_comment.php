<?php
session_start();
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);
if (!empty($_REQUEST["comment"])) {
    $user->store_comment($_REQUEST["comment"], $user->id, $_REQUEST["post_id"]);
    header("location:profile.php?msg=succsess comment add");
} else {
    header("location:profile.php?msg=required_comment");
}
