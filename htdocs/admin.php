<?php 
    session_start();
    if(($_SESSION["login"]) == "admin"){
    include ("topbit.php");
?>
     
    <link rel="stylesheet" href="/css/loginstyle.css">
<div class="wrapper">
<div class="search">
        <img src="image/search.JPG" alt="searchphoto" style="height: 200px;" class="center"/>

        </div>
            <div class="menu box">
                        
                        <a href="logout.php"> Logout </a>

                        <a href="search.php">
                        <img src="image/icon.png" id="myBtn" href="search.php"></img>
                        </a>
            </div>		
            <div class="maincontent">

            <div class="aside box">
                <div id="tabs">
                <a class="tabs" href="#Menu1">Book Addition</a>
                <a class="tabs" href="#Menu2">User Addition</a>
                <a class="tabs" href="#Menu3">User List</a>
                <a class="tabs" href="#Menu4">Delete</a>

                </div><!--tabs-->
            </div> <!--/aside box-->

            <div class="content1 box">
                <div id="tabcontent">
                    <div class="tabcontent active" id="Menu1">
                    <?php include 'addentry.php'?>
                    </div>
                    <div class="tabcontent" id="Menu2">
                        <?php include 'adduser.php' ?>
                    </div>

                    <div class="tabcontent" id="Menu3">
                        <?php include 'userlist.php' ?>
                    </div>
                </div><!-- end of tB CONTENT    -->

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->
    </div>

</body>
</html>
<?
    }// end of Admin session if
    else{
        header('Location:login.php');
         exit;

    }
    ?>
