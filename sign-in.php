<?php
/*
 * This file checks the credential that user submitted.
 * 
 * 
 */

// include dbfunctions 
include 'dbfunctions.php';

// start a session
session_start();


echo "<meta charset='utf-8'>";

if (isset($_POST['sign-in'])){
    
    
    //check if username and password was submitted
    if ($_POST['username'] == "" || $_POST['password'] == "") {  
       
        
    /* if fields are empty the alert user  */        
    echo '<script>alert("Please fill all fields !")</script>';
    
    /*
     *  and redirect to login page.
     */
    echo '<script>window.location.href="index.php"</script>';
}
    /*
	 * if fields are submitted then connect the database 
	 * and check if username and password is correct    
     */
elseif (isset($_POST['username']) && isset($_POST['password'])) {
    
	// take connection using connect() function in dbfunctions.php
    $con = connect();
    // take username from the form and insert it into username variable
    $username = ($_POST['username']);
    // take password from the form and insert it into password variable
    $password = ($_POST['password']);
        /*
         * Do a sql query where you check if database contains correct data 
         */
       $query = "SELECT * FROM credentials WHERE username='$username' AND password='$password'";
       
    // take mysqli_query to a result variable
    $result = mysqli_query($con,$query);
    
    //store results into count variable
    $count = mysqli_num_rows($result);
    
    /*
     * 
	 * if-clause where you check if count has the right value
     */
    if($count==1) { 
        
        /* 
		 * if count value is 1 the alert the user that login was successful.
         */
        echo '<script>alert("Login succeeded!")</script>';  
        
        /* put username variable into a session variable
         */        
        $_SESSION['username'] = $username;
        
        // direct to the guestbook
        echo '<script>window.location.href="guestbook.php"</script>';
        
    } else {
        
        // if login failed alert the user
        echo '<script>alert("Login failed!")</script>';
        
        //  direct to 
        echo '<script>window.location.href="index.php"</script>';
    }
    
    
} 
}

