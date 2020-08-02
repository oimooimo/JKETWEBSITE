<?php 
    session_start();
    //if(($_SESSION["login"]) == "admin"){
    //include ("topbit.php");
?>
     
<?php include ("topbit.php");?>
    <link rel="stylesheet" href="/css/loginstyle.css">
<div class="wrapper">
<div class="search">
        <img src="image/search.JPG" alt="searchphoto" class="center"/>

        </div>
            <div class="menu box">
                        <a href="<?php logout.php ?>"> Logout </a>
                        <a href="search.php">
                        <img src="image/icon.png" id="myBtn" href="search.php"></img>
                        </a>
            </div>		
            <div class="maincontent">

            <div class="aside box">
                <div id="tabs">
                <a class="tabs" href="#Menu1">Checked outs</a>
                <a class="tabs" href="#Menu2">Account Details</a>
                </div><!--tabs-->
            </div> <!--/aside box-->

            <div class="content1 box">
                <div id="tabcontent">
                    <div class="tabcontent active" id="Menu1">
                    </div>
                    <div class="tabcontent" id="Menu2">
                        <?php include 'userinfo.php' ?>
                    </div>
                </div><!-- end of tB CONTENT    -->

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->
    </div>

</body>
</html>
