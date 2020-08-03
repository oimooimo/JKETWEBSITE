<?php 
    session_start();
        if($_SESSION['login']==='admin'){
            header('Location:admin.php');
        }

        elseif($_SESSION['login']==='user'){
            header('Location:user.php');
        }

        else{
?>

<?php include ("topbit.php");?>
<?php include ('adminlogin.php');?>

    <link rel="stylesheet" href="css/loginstyle.css">
<div class="wrapper">
<div class="search">
        <img src="image/search.JPG" alt="searchphoto" class="center"/>

        </div>
            <div class="menu box">

                        <a href="search.php">
                        <img src="image/icon.png" id="myBtn" href="search.php"></img>
                        </a>
            </div>		
            <div class="maincontent">

            <div class="aside box">
                <div id="tabs">
               
                </div><!--tabs-->
            </div> <!--/aside box-->

            <div class="content1 box">
                <div id="tabcontent">
                    <div class="tabcontent active" id="Menu1">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" >

                        <!-- username error-->
                            <div class="<?php echo $user_error; ?> ">
                                Please enter a username!
                            </div>
                        <h3>Username: <input class="modalinput <?php echo $user_field;?> " id="username" name="username"/></h3>
                         <!-- password error-->
                            <div class="<?php echo $pass_error; ?> ">
                                Please enter a password!
                            </div>
                        <h3>Password: <input class="modalinput  <?php echo $pass_field;?> " id="password" name ="password"/></h3>

                        <!-- error for inccorect password -->
                            <div class="error-text">  
                                <?php echo $passerror; ?>
                                <br>
                            </div>              
                                      
                            <input class="loginbutton" type="submit" name="login" id="loginbutton" value="Login"/>
                        </form>
                    </div>                    

                </div><!-- end of tB CONTENT    -->

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->
    </div>

</body>
</html>
<?php
        }//end if else
?>
