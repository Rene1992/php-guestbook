<?php
/*
  
  This file includes database-functions
 */

/* connect() function takes connection to the database */

function connect() {

	$username = "php_form_app";
    $password = "php_form_app";
    $host = "localhost";
    $database = "php_form_app";

//mysqli_connect -function connects to database.

    $con = mysqli_connect($host, $username, $password) or die("Connection to the database could not be established<br>" . mysqli_error($con));

//mysqli_select_db -function is used to take cconnection to the database wanted.

    mysqli_select_db($con, $database) or die("Database selection failed<br>"
                    . mysqli_error($con));

    return $con;
}

function close($con) {
    mysqli_close($con);
}

/* list_table() gets all data from $table
  This function is very reuseable and can be used at any table. */

function list_table($table, $con) {

    //choose all data from table
    $sql = "SELECT username,time, msg FROM $table ORDER BY id";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    
    print "<table class='table table-striped' border='1' cellspacing='1' cellpadding='2'>";
    print "<tr>";
    print "<td>";
    print "<b>Username</b>";
    print "</td>";
    print "<td>";
    print "<b>Time</b>";
    print "</td>";
    print "<td>";
    print "<b>Message</b>";
    print "</td>";
    //fetch all rows from the table
    while ($row = mysqli_fetch_row($result)) {
        //count total columns
        $total_cols = count($row);
        $i = 0;
                   
        print "<tr>";                     
        //print all columns 
        while ($i < $total_cols) {            
            print "<td>";
            //print content to the row           
            print $row[$i];
            print "</td>";
            //take the id of the row
            $id = $row[0];
            $i++;
        }       
        print "</tr>";
    }
    print "</table>";
}

/* add_row_to_table() function to add data the database 
 * usernames and passwords  */

function add_row_to_table($table, $con) {

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    
    $sql = "INSERT INTO $table SET username='$username', 
  password='$password'";

    /* add data to database inserting sql-clause using 
      mysqli_query()-function.  */

    $result = mysqli_query($con, $sql) or die("Inserting data to database failed<br>"
                    . mysqli_error());
    /*direct to page that confirms that data insertion was successful.*/
    header('Location: notification.php');
}

/**
 * get_data gets specific data from database
 *
 * @param String $table - table where data is fetched
 * @param String $field - field where data is fetched
 * @param String $name - data that is wanted
 * @param Resource $con - database connection 
 * @return String $data - data that is fetched
 */

function get_data($table, $field, $name, $con) {

$sql = "SELECT $field FROM $table WHERE name='$name'";
$result = mysqli_query($con, $sql); //get results
$result_array = mysqli_fetch_row($result); //insert into array
$data = $result_array[0]; //insert into variable
    
return $data;

}

/**
 * add_msg inserts data to specific field
 *
 * @param String $table - table where data is fetched
 * @param Resource $con - database connection
 * @param int $date - date of the message
 * @param String $name2 - message sender
 * @param String $msg2 - the content of the message
 */

function add_msg($table, $con, $date, $name2, $msg2) {
    
    
    $sql = "INSERT INTO $table SET time='$date', 
  username='$name2', msg='$msg2'";
    
    $result = mysqli_query($con, $sql) or die("Data insertion failed.<br>"
                    . mysqli_error());
    
    
}





?>