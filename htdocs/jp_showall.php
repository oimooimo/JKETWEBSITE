<?php include ("jp_topbit.php");

    $result = TRIM($_POST['searchbasic']);
    
    $find_sql = "SELECT * FROM `book_data`
    JOIN Author ON (book_data.AuthorID = Author.AuthorID)
    JOIN Item ON (book_data.ItemID = Item.ItemID)
    JOIN Publisher ON (book_data.PubID = Publisher.PubID)

    WHERE `Title` LIKE '%$result%' OR
    `Description` LIKE '%$result%' OR
    `Author` LIKE '%$result%' OR
    `KatAuthor` LIKE '%$result%' OR
    `RomAuthor` LIKE '%$result%' OR
    `Pub` LIKE '%$result%' OR
    `KatPub` LIKE '%$result%' OR
    `RomPub` LIKE '%$result%' OR
    `Item` LIKE '%$result%' OR
    `RomItem` LIKE '%$result%' OR
    `KatItem` LIKE '%$result%'

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

            <form class="searchform" method="post" action="jp_showall.php" enctype="multipart/form-data">
                <div class="basicsearch">
                <input class="searchbox" type="text" name="searchbasic" size="80" value="" required placeholder=""/>
                <input class="submit" type="submit" name="findsearch" value="&#8981;"/>
                </div><!-- /basic search--->
		    </form>	
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
            <h2>Advanced Search</h2>

            <div class="advanced-frame">
            
            <form class="searchform" method="post" action="advanced.php" encytype="multipart/form-data">
            <p> form goes here<p>
            <input class="submit advanced-button" type="submit" name="advanced" value="Search &#8981;" />
            </form>
            </div> <!--advanced frame-->
            </div> <!--/aside box-->
            
            <div class="content1 box">
                <h2> リザルト </h2>

               <?php include 'jp_results.php'?>

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->

<?php include 'jp_bottombit.php'?>
