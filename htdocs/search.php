<?php include ("topbit.php");
    $find_sql = "SELECT * FROM `book_data`";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);
 ?>
    <link rel="stylesheet" href="css/searchstyle.css">

 <?php include 'regheader.php' ?>
       <div> <a href="jp_search.php" class="button_1 box">日本語</a></div>
    </div><!--closing for mobileheader--> 
        
        <header class="box">

            <div class="button_group box">
				<a href="/jp_search.php" class="button_1">日本語</a>
				<a href="/donation.php" class="button_2">Donate!</a>
				<a href="/volunteerform.php" class="button_2">Volunteer!</a>
			</div><!-- end of button_group-->


            <div class="header_item box">
                <?php include'headeritem.php' ?>
            </div><!-- end of header_item-->
            
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
                you have results
                </div> <!-- end of results -->
                <?php

                    } // end results 'do'

                    while
                    ($find_rs=mysqli_fetch_assoc($find_query));
                } // end else

                ?>

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->

<?php include 'bottombit.php'?>
