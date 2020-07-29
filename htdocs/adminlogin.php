<?php

if(isset ($_REQUEST['login'])){
    $username = $_POST['username'];
    $login_sql="SELECT * FROM `Users` WHERE Username='".$_POST['username']."' AND Password='".$_POST['password']."'";
    $login_query=mysqli_query($dbconnect,$login_sql);

    // if user is admin then take them to admin panel and give their session admin
    if((mysqli_num_rows($login_query)>0))
    {
        if($username === "Admin"){
        $_SESSION['admin'];
        header('location:admin.php');
        }
        //if user is not an admin then give them a user session and take them to user panel
        else{
            echo "No";
        }
    }

        
    else{
        echo "Error";
    }
}

?>
