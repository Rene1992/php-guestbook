<?php
/*
 * 
 * This file puts a new user into database
 * and checks if there is already a con 
 * with same credentials
 * 
 */
include 'dbfunctions.php';

echo '<meta charset="UTF-8">';

// check if regist button was used
if (isset($_POST['register'])){
    
    //check if username and password are filled
    if ($_POST['username'] == "" || $_POST['password'] == "") { 
    
    /* if not then use alert to inform the user  */ 
    echo '<script>alert("Please, fill all fields!")</script>';
    
    /*
     *  direct to registration page
     */
    echo '<script>window.location.href="registration.php"</script>';
    
    //  
	// check if username and password are submitted
    } elseif (isset($_POST['username']) && isset($_POST['password'])) {
    
    // store connection to con variable   
    $con = connect();
    
    // store username to a variable
    $username = ($_POST['username']);  

    /* 
     * do a sql-query
     */
       $query = "SELECT * FROM credentials WHERE username='$username'";
    
    // store result to a result variable   
    $result = mysqli_query($con,$query);
    
    // store results to count variable 
    $count = mysqli_num_rows($result);
    
    // check if count variable is larger than one
    if($count>0) {     
        
        /* if count variable is larger than 0 alert user
         */
        echo '<script>alert("Username is already used!")</script>';  
        
        // and direct to registration page
        echo '<script>window.location.href="registration.php"</script>';
        
    } else {
        
        /*
         * if there are no hits from the database then credential 
		 * to database
         */
        add_row_to_table("credentials", $con);
        
        // close the database connection
        close($con);
    }
    
    
} 
}

