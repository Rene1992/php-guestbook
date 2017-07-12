<?php
/* 
 * 
 * ends the session and logs users out and directs to login page
 */

session_destroy();
header("Location: index.php");
?>

