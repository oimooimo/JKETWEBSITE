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
                        <h3>Username: <input class="modalinput" id="username" name="username"/></h3>
                        <h3>Password: <input class="modalinput" id="password" name ="password"/></h3>
                        <input class="loginbutton" type="submit" name="login" id="loginbutton" value="Login"/>
                        </form>
                    </div>                    

                </div><!-- end of tB CONTENT    -->

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->
    </div>

</body>
</html>
