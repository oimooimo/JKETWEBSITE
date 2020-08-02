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
                        <?php echo $find_userrs['Last']; ?>
                        <?php echo $find_userrs['First']; ?>
                        |
                        <?php echo $find_userrs['Romfirst']; ?>
                        <?php echo $find_userrs['Romlast']; ?>
                    </span>
                </div> 
            <!--/title-->
            
            <?php 
                if ($find_userrs['Account'] == 1) {?>
                    <div style="color:red;"> Admin </div>

                <?php
                } //end Check in if

                elseif ($find_userrs['Account'] == 2){

                ?> <div style="color:green;"> Regular member </div>
                <?php
                } // end check in else

                elseif($find_userrs['Account'] == 3){

                ?> <div style="color:darkgreen;"> Playgroup member </div>
                <?php
                } // end ch

                ?>
                 <!--/availability-->
        </div> <!--/flexcontainer-->

        <div>
            <b>Username:</b>
            <?php echo $find_userrs['Username']; ?>

            <br />
            <b> Email:</b>
            <?php echo $find_userrs['Email']; ?>

            <br />
            <b> Phone number:</b>
            <?php echo $find_userrs['Phone']; ?>

            <br />
            <b> Address:</b>
            <?php echo $find_userrs['Address']; ?>
        </div> <!--- Sub information-->
     
</div> <!-- end of results -->

<?php

    } // end results 'do'

    while
    ($find_userrs=mysqli_fetch_assoc($find_userquery));
} // end else

?>
