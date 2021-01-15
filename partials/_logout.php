<?php
echo "logging you out. Please wait...";

session_start();

session_unset();
session_destroy();

header("location: /forumV1/");
exit;
?>

?>