<?php
session_start();
include ("topbit.php");

// retrieves information...
$userID = $_SESSION['userID'];

$find_usersql = "SELECT * FROM `Users`
WHERE `userID` = $userID
";
$find_userquery = mysqli_query($dbconnect, $find_usersql);
$find_userrs = mysqli_fetch_assoc($find_userquery);
$usercount = mysqli_num_rows($find_userquery);
    
?>
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

            </div> <!--/aside box-->

            <div class="content1 box">
                <div id="tabcontent" class= "modalmain">
                    <div class="active" id="Menu1">
                <h2>Congratulations おめでとう</h2>
                 You have succesfully submited an entry into the Database.
                 </br>
                エントリーをデータベースに送信しました
                 <?php include ("userresults.php")
                 ?>
                <a href="admin.php">Please click here to go back <br> 戻るにはここをクリックしてください</a> 
            </div> <!-- end of content1 -->

        </div> <!-- end of main-->
    </div>

</body>
</html>
