 <?php 

if($count < 1) {

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
        
<!-- Results go here -->
<div class="results">

<!-- title and check in-->
<div class="flex-container">
        <div>
            <span class="sub_heading">
                <?php echo $find_rs['Title']; ?>
            </span>
        </div> 
    <!--/title-->

    <!--Availability-->
    
    <?php 
        if ($find_rs['CheckIn'] == 0) {?>
            <div class="checkin"> Available &#10004; </div>

        <?php
        } //end Check in if

        else {

        ?> <div class="checkout"> Checked out &#10060; </div>
        <?php
        } // end check in else

        ?>
    
    <!--/availability-->
</div> <!--/flexcontainer-->

<div>
    <b>Item:</b>
    <?php echo $find_rs['Item']; ?>

    <br />
    <b> Author:</b>
    <?php echo $find_rs['Author']; ?>

    <br />
    <b> Publisher:</b>
    <?php echo $find_rs['Pub']; ?>
</div> <!--- Sub information-->
    <hr />
        
<div>
    <b> Description:</b>
    <?php echo $find_rs['Description']; ?>
</div><!---Description-->

</div> <!-- end of results -->
<?php

    } // end results 'do'

    while
    ($find_rs=mysqli_fetch_assoc($find_query));
} // end else

?>
