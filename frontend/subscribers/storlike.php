<?php
session_start();
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);
if (!empty($_REQUEST["like"])) {
    $user->like_posts($_REQUEST["like"], $user->id, $_REQUEST["post_id"]);
}