<?php include 'topbit.php' ?>

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
		
		<div class="search box">
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
                </div>

                <div class= "modalmain">
                    <p>Some text in the Modal..</p>
                </div>
           
                </div><!-- MODAL CONTENT-->

            </div><!--/MYMODAL-->
        
        </div> <!-- end of tab-->

        <!-- javascript link for modal -->
        <script src="java/modal.js"></script>
		
		<div class="aside box">
        </div>

        <div class="content1 box">
        </div>

<?php include 'bottombit.php'?>
