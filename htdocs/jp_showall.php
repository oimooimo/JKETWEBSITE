<?php include ("jp_topbit.php");
    $find_sql = "SELECT * FROM `book_data`
    JOIN Author ON (book_data.AuthorID = Author.AuthorID)
    JOIN Item ON (book_data.ItemID = Item.ItemID)
    JOIN Publisher ON (book_data.PubID = Publisher.PubID)
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);
 ?>

    <link rel="stylesheet" href="css/searchstyle.css">

 <?php include 'jp_regheader.php' ?>
  <div> <a href="search.php" class="button_1 box">ENGLISH</a></div>
    </div><!--closing for mobileheader--> 
        
        <header class="box">

            <div class="button_group box">
				<a href="/search.php" class="button_1">ENGLISH</a>
				<a href="jp_donation.php" class="button_2">ご寄付</a>
				<a href="jp_volunteerform.php" class="button_2">ボランティア募集！</a>
			</div>

            <div class="header_item box">
                <?php include'headeritem.php' ?>
            </div>

        </header>
		
		<div class="search">
			<img src="image/search.JPG" alt="searchphoto" class="center"/>
        </div>
		
       <div class="tab box">

            <!-- FROM W3 SCHOOLS https://www.w3schools.com/howto/howto_css_modals.asp -->
            <!-- Trigger/Open The Modal -->
            <img src="image/icon.png" id="myBtn"></img>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">

                <div class="modalheader">
                    <span class="close">&times;</span>
                </div>

                <div class="modalaside">
                d
                </div>

                <div class= "modalmain">
                    <p>Some text in the Modal..</p>
                </div>
           
                </div><!-- MODAL CONTENT-->

            </div><!--/MYMODAL-->
        
        </div> <!-- end of tab-->

        <!-- javascript link for modal -->
        <script src="java/modal.js"></script>

        <div class="maincontent">
            <div class="aside box">
            </div>

            <div class="content1 box">
                <h2> Results </h2>

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

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->

<?php include 'jp_bottombit.php'?>
