<?php // collect informaiton from db
 $find_usersql = "SELECT * FROM `Users`
    ";
    $find_userquery = mysqli_query($dbconnect, $find_usersql);
    $usercount = mysqli_num_rows($find_userquery)

    ?>
 <?php 

if($usercount < 1) {

    ?>

<div class="error">

    Sorry! There are no results that match your search. Please use the search box in the right for a more detailed search!

</div><!-- end error -->

<?php
} // end no results if

else {
    do
    {
        ?>
        

<!-- title and check in-->
    <div class="results">
    <div class="flex-container">
            <div>
                <span class="sub_heading">
                    <?php echo $find_userrs['First']; ?>
                    <?php echo $find_userrs['Last']; ?>
                    /
                    <?php echo $find_userrs['Romfirst']; ?>
                    <?php echo $find_userrs['Romlast']; ?>
                </span>
            </div> 
        <!--/title-->

        <!--Availability-->
        
        <?php 
            if ($find_userrs['Account'] == 1) {?>
                <div class="checkin"> Admin </div>

            <?php
            } //end Check in if

            elseif ($find_userrs['Account'] == 2){

            ?> <div class="checkin"> Regular member </div>
            <?php
            } // end check in else

            else{

            ?> <div class="checkin"> Playgroup member </div>
            <?php
            } // end ch

            ?>
        
        <!--/availability-->
    </div> <!--/flexcontainer-->

    <div>
        <b>Username:</b>
        <?php echo $find_rs['Username']; ?>

        <br />
        <b> Email:</b>
        <?php echo $find_rs['Author']; ?>

        <br />
        <b> Phone number:</b>
        <?php echo $find_rs['Pub']; ?>

         <br />
        <b> Address:</b>
        <?php echo $find_rs['Pub']; ?>
    </div> <!--- Sub information-->
     
</div> <!-- end of results -->

<?php

    } // end results 'do'

    while
    ($find_userrs=mysqli_fetch_assoc($find_userquery));
} // end else

?>
