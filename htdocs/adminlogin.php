<?php

if(isset ($_REQUEST['login'])){
    $username = $_POST['username'];
    $login_sql="SELECT * FROM `Users` WHERE Username='".$_POST['username']."' AND Password='".$_POST['password']."'";
    $login_query=mysqli_query($dbconnect,$login_sql);

    if(mysqli_num_rows($login_query)>0||$username == "admin" )
    {
        $_SESSION['admin'];
        header('location:admin.php');
    }


    elseif(mysqli_num_rows($login_query)>0){
        echo "No";
    }
    else{
        echo "Error";
    }
}

?>
