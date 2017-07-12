<?php
/*
 * 
 *  This file shows all the data from the guestbook
 * 
 */

echo "<meta charset ='utf-8'>";


// store connection to con variable
$con = connect();

/* 
 * List all messages from the database
 * 
 */
list_table("guestbook", $con);


