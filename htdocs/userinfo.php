<?php // collect informaiton from db

    $userID= $_SESSION['userID'];

    $find_usersql = "SELECT * FROM `Users`
    WHERE `userID` = $userID
        ";
   $find_userquery = mysqli_query($dbconnect, $find_usersql);
    $find_userrs =  mysqli_fetch_assoc($find_userquery);
    $usercount = mysqli_num_rows($find_userquery)
    
    ?>
<?php include 'userresults.php' ?>
