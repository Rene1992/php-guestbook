<?php
/*
 *
 * this file inserts a new message to the database
 *
 */
include 'dbfunctions.php';

if (isset($_POST['msg']) && (isset($_POST['username']))) {

    /*store the data from the form into variables.*/


    $msg=$_POST['msg'];

    /*
     * clean the form data using strip_tags function and store it into variables
     */
    $nimi2 = strip_tags($_POST['username']);
    $msg2 = strip_tags($msg);

    // set the correct timezone
    date_default_timezone_set('Europe/Helsinki');

    // srore current time in the date variable
    $date = date('H:i:sa');

    /*
     * store the connection to con variable
     */
    $con = connect();

    /*
     * add message to the guestbook
     * using function in the dbfunctions.php
     */
    add_msg("guestbook", $con, $date, $nimi2, $msg2);

    // ohjataan takaisin vieraskirjaan
    header('Location:guestbook.php');
  } else {

}
