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

               <?php include 'results.php'?>

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->

<?php include 'jp_bottombit.php'?>
