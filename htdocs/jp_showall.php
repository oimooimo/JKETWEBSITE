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
		
      <?php include "modal.php" ?>

        <div class="maincontent">
           <div class="aside box">
            <h2>アドバンストサーチ</h2>

            <div class="advanced-frame">
            
            <form class="searchform" method="post" action="advanced.php" enctype="multipart/form-data">

            <input class="adv" type="text" name="book_title" size="40" value="" placeholder="題名"/>

            <input class="adv" type="text" name="ISBN_num" size="40" value="" placeholder="ISBN-13 e.g 980000000000000"/>

            <!--genre dropdown-->
            <select class="search adv" name="author_name">
            <option value="" disabled selected>作者</option>
            <?php 
            $Author_sql="SELECT * FROM `Author` ORDER BY `Author`.`Author` ASC";
            $Author_query = mysqli_query($dbconnect, $Author_sql);
            $Author_rs=mysqli_fetch_assoc($Author_query);

            do{
                ?>
                <option value="<?php echo $Author_rs['Author'] ?>"><?php echo $Author_rs['Author'];?></option>
            <?php

            } // end genre do loop

            while ($Author_rs=mysqli_fetch_assoc($Author_query))
            ?>
            </select>
            <!--/genre dropdown-->
 
            <!--Publisher dropdown-->
            <select class="search adv" name="pub_name">
            <option value="" disabled selected>出版社</option>
            <?php 
            $Pub_sql="SELECT * FROM `Publisher` ORDER BY `Publisher`.`Pub` ASC ";
            $Pub_query = mysqli_query($dbconnect, $Pub_sql);
            $Pub_rs=mysqli_fetch_assoc($Pub_query);

            do{
                ?>
                <option value="<?php echo $Pub_rs['Pub'] ?>"><?php echo $Pub_rs['Pub'];?></option>
            <?php

            } // end Publisher do loop

            while ($Pub_rs=mysqli_fetch_assoc($Pub_query))
            ?>
            </select>
            <!--/Pub dropdown-->

            <!--Item dropdown-->
            <select class="search adv" name="item_type">
            <option value="" disabled selected>種類</option>
            <?php 
            $Item_sql="SELECT * FROM `Item` ORDER BY `Item`.`Item` ASC";
            $Item_query = mysqli_query($dbconnect, $Item_sql);
            $Item_rs=mysqli_fetch_assoc($Item_query);

            do{
                ?>
                <option value="<?php echo $Item_rs['Item'] ?>"><?php echo $Item_rs['Item'];?></option>
            <?php

            } // end Item do loop

            while ($Item_rs=mysqli_fetch_assoc($Item_query))
            ?>
            </select>
            <!--/Item dropdown-->

            <input class="adv" type="text" name="PubYear" size="40" value="" placeholder="刊年"/>

            <!--check box for check in-->
            <input class="adv-txt" type="checkbox" name="check_in" value="0">借りる
            <input class="submit advanced-button" type="submit" name="advanced" value="探す &#8981;" />
            </form>
            </div> <!--advanced frame-->
            </div> <!--/aside box-->

            <div class="content1 box">
                <h2> けっか </h2>

               <?php include 'jp_results.php'?>

            </div> <!-- end of content1 -->

        </div> <!-- end of main-->

<?php include 'jp_bottombit.php'?>
