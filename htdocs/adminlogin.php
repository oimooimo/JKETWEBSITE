<?php

//define variables
$username = $_POST['username'];
$password = $_POST['password'];
$has_errors = "no";
$passerror = "";

    //check that username isnt empty
    if($username == "" ){
        $has_errors ="yes";
        $user_error = "error-text";
        $user_field="form-error";
    }
    
    //check that password isnt empty
    if($password ==""){
        $has_errors ="yes";
        $pass_error = "error-text";
        $pass_field="form-error";
    }

if(isset ($_REQUEST['login'])){

    $login_sql="SELECT * FROM `Users` WHERE Username='".$_POST['username']."' AND Password='".$_POST['password']."'";
    $login_query=mysqli_query($dbconnect,$login_sql);

    // if user is admin then take them to admin panel and give their session admin
    if((mysqli_num_rows($login_query)>0)&& ($has_errors=="no"))
    {
        if($username === "Admin"){
        $_SESSION['admin'];
        header('location:admin.php');
        }// end of if

        //if user is not an admin then give them a user session and take them to user panel
        else{
            $_SESSION['user'];
            echo "No";
        }// end of else

    }//end of main if

    else{ //pasword error
      $passerror="incorrect username and/or password";
    }
}

?>
