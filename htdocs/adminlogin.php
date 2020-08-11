<?php
session_start();
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

    if(isset ($_REQUEST['loginbutton'])){

        $login_sql="SELECT * FROM `Users` WHERE Username='$username' AND Password='$password'";
        $login_query=mysqli_query($dbconnect,$login_sql);

        // if user is admin then take them to admin panel and give their session admin // mrs greenwood from here  https://stackoverflow.com/questions/22340304/how-to-make-login-form-with-admin-and-user-in-php/22340649
        if((mysqli_num_rows($login_query)>0)&& ($has_errors=="no")){

                $login_row=mysqli_fetch_array($login_query);
                    if ($login_row['Account'] == 1){
                    $_SESSION["login"]= "admin";
                    header('location:admin.php');
                    }// end of if

                //if user is not an admin then give them a user session and take them to user panel
                else{
                    $_SESSION['login']= "user";
                    $_SESSION['userID']= ($login_row['userID']);
                    header('location:user.php');
                }// end of else

        }//end of main if

        else{ //pasword error
        $passerror="incorrect username and/or password ユーザー名またはパスワードが正しくありません";
        }
    }




?>
