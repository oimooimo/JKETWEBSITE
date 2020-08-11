<?php 

// Get Genre list database
$author_sql="SELECT * FROM `Author` ORDER BY `Author`.`Author` ";
$author_query=mysqli_query($dbconnect, $author_sql);
$author_rs=mysqli_fetch_assoc($author_query);

// Get item list database
$pub_sql="SELECT * FROM `Publisher` ORDER BY `Publisher`.`Pub` ";
$pub_query=mysqli_query($dbconnect, $pub_sql);
$publisher_rs=mysqli_fetch_assoc($pub_query);

// Get item list database
$item_sql="SELECT * FROM `Item` ORDER BY `Item`.`Item` ";
$item_query=mysqli_query($dbconnect, $item_sql);
$item_rs=mysqli_fetch_assoc($item_query);

//initialise form variables

$book_title="";
$AuthorID="";
$PubID="";
$ItemID="";
$pubyear="";
$description="";
$isbn="";
$check_in= 1;

$has_errors = "no";

// set up error field colours /visibility (no eroors at first)
$title_error = $pub_error = $author_error = $item_error =  $date_error = $isbn_error = $drop_error = $desc_error = "no-error";

$title_error = $pub_error = $author_error = $item_error =  $date_error = $isbn_error = $drop_error = $desc_error = "form-ok";

//code executes below when the form is submited
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     //Get values from form
    $book_title=mysqli_real_escape_string($dbconnect,$_POST['book_title']);

    $AuthorID=mysqli_real_escape_string($dbconnect,$_POST['author']);

    //if AuthorID is not blank, get the author so that the genre box does not lose its value if there are rrors

    if($AuthorID != ""){
        $Authoritem_sql ="SELECT * FROM `Author` WHERE `AuthorID` = $AuthorID ";
        $Authoritem_query= mysqli_query($dbconnect, $Authoritem_sql);
        $Authoritem_rs=mysqli_fetch_assoc($Authoritem_query);

        $Author = $Authoritem_rs['Author'];

    } //End AuthorID if

    $PubID=mysqli_real_escape_string($dbconnect,$_POST['publisher']);

    //if AuthorID is not blank, get the author so that the genre box does not lose its value if there are rrors

    if($PubID != ""){
        $Pubitem_sql ="SELECT * FROM `Publisher` WHERE `PubID` = $PubID ";
        $Pubitem_query= mysqli_query($dbconnect, $Pubitem_sql);
        $Pubitem_rs=mysqli_fetch_assoc($Pubitem_query);

        $publisher = $Pubitem_rs['Pub'];

    } //End PublisherrID if

    $ItemID=mysqli_real_escape_string($dbconnect,$_POST['item']);

    //if AuthorID is not blank, get the author so that the genre box does not lose its value if there are rrors

    if($ItemID != ""){
        $itemitem_sql ="SELECT * FROM `Item` WHERE `ItemID` = $ItemID ";
        $itemitem_query= mysqli_query($dbconnect, $itemitem_sql);
        $itemitem_rs=mysqli_fetch_assoc($itemitem_query);

        $item = $itemitem_rs['Item'];

    } //End ItemID if

    $pubyear=mysqli_real_escape_string($dbconnect,$_POST['pubyear']);
    $isbn=mysqli_real_escape_string($dbconnect,$_POST['isbn']);
    $description=mysqli_real_escape_string($dbconnect,$_POST['description']);
    $check_in=mysqli_real_escape_string($dbconnect,$_POST['checkIn']);

    //error cehcking will go here..

    // check book isnt empty
    if($book_title == ""){
        $has_errors ="yes";
        $title_error = "error-text";
        $title_field="form-error";
    }

    // check that item isnt empty
    if($ItemID == "" ){
        $has_errors ="yes";
        $item_error = "error-text";
        $item_field="form-error";
    }

    //check that pub isnt empty
    if($PubID == "" ){
        $has_errors ="yes";
        $pub_error = "error-text";
        $pub_field="form-error";
    }
    
    //check that author isnt empty
    if($AuthorID ==""){
        $has_errors ="yes";
        $author_error = "error-text";
        $author_field="form-error";
    }
    
    // check that Pub Year is a valid reasonable date (no larger than 5 numbers long)
    if(!ctype_digit($pubyear)||strlen($pubyear)>5||strlen($pubyear)<4){
        $has_errors ="yes";
        $date_error = "error-text";
        $date_field="form-error";
    }
    // Check that ISBN is 13 digits long  and remove - from string and check if already exist
    $isbntest= str_replace("-","","$isbn");
    $isbncheck=mysqli_query($dbconnect, "SELECT ISBN FROM book_data where ISBN = '$isbntest' ");

    if(!ctype_digit($isbntest)||strlen($isbntest)!=13||mysqli_num_rows($isbncheck) > 0){
        $has_errors ="yes";
        $isbn_error = "error-text";
        $isbn_field="form-error";
    }

    //Check that Description isnt empty
    if($description ==""){
        $has_errors ="yes";
        $desc_error = "error-text";
        $desc_field="form-error";
        $description = "";
    }
 
    //if there are no errors
    if($has_errors =="no") {
        
        header('location: add_success.php');

    // hide error text
       // add entry to database
    $addentry_sql="INSERT INTO `book_data` (`ISBN`, `Title`, `AuthorID`, `PubID`, `ItemID`, `PubYear`,  `Description`, `CheckIn`) VALUES ('$isbntest', '$book_title', '$AuthorID', '$PubID', '$ItemID', '$pubyear', '$description', '$check_in');";
    $addentry_query=mysqli_query($dbconnect,$addentry_sql);

    // get od fpr mext page
    $getid_sql = "SELECT * FROM `book_data` WHERE
     `ISBN` = $isbn
    ";
    $getid_query=mysqli_query($dbconnect,$getid_sql);
    $getid_rs=mysqli_fetch_assoc($getid_query);

    $ISBN = $getid_rs['ISBN'];
    $_SESSION['ISBN']=$ISBN;

    }// end of no errors if

 }
?>

        <div class="add-entry">

            <h3>Add A Book・本いり</h3>

                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="form">
                

                <!-- Book Name (Required) -->
                    <!--error message-->
                    <div class="<?php echo $title_error; ?> ">
                        Please fill in the 'Book Title' field・本タイトルを入れてください
                    </div>
                <input class="add-field <?php echo $title_field;?>  p" type="text" name="book_title" value="<?php echo $book_title; ?>"  placeholder="Book Title・タイトル (required・必要)..." />
                
                
                <!-- Author dropdown Name (Required) -->
                 <!--error message-->
                    <div class="<?php echo $author_error; ?> ">
                        Please select something・何かをえらんでください
                    </div>
                    <select class="adv  <?php echo $author_field;?>  p"  name="author">
                    <!-- first/selected option-->
                        <?php
                        if($AuthorID==""){
                            ?>
                            <option value="" selected>Author・作者 (choose something....)</option>
                        <?php 
                        }

                        else{
                            ?>
                        <option value="<?php echo $AuthorID; ?>" selected><?php echo $Author;?></option>
                        <?php
                        }
                        ?>

                        <!-- getting options from the database -->
                        <?php 

                        do{
                            ?>
                        <option value="<?php echo $author_rs['AuthorID']; ?>"><?php echo $author_rs['Author']; ?></option>

                        <?php
                        }
                        while ($author_rs=mysqli_fetch_assoc($author_query))
                        ?>

                    </select>
                    
                <!-- Publisher Name dropdown (Required) -->
                  <!--error message-->
                    <div class="<?php echo $pub_error; ?> ">
                       Please select something・何かをえらんでください
                    </div>

                    <select class="adv <?php echo $pub_field;?>  p"  name="publisher">
                    <!-- first/selected option-->
                         <?php
                        if($PubID==""){
                            ?>
                            <option value="" selected>Publisher・出版社 (choose something....)</option>
                        <?php 
                        }

                        else{
                            ?>
                        <option value="<?php echo $PubID; ?>" selected><?php echo $publisher;?></option>
                        <?php
                        }
                        ?>

                        <!-- getting options from the database -->
                        <?php 

                        do{
                            ?>
                        <option value="<?php echo $publisher_rs['PubID']; ?>"><?php echo $publisher_rs['Pub']; ?></option>

                        <?php
                        }
                        while ($publisher_rs=mysqli_fetch_assoc($pub_query))
                        ?>

                    </select>
                <!-- Item Name dropdown (Required) -->
                  <!--error message-->
                    <div class="<?php echo $item_error; ?> ">
                    Please select something・何かをえらんでください
                    </div>

                        <select class="adv <?php echo $item_field;?>  p"  name="item">
                        <!-- first/selected option-->

                        <?php
                        if($ItemID==""){
                            ?>
                            <option value="" selected>Item・種類(choose something....)</option>
                        <?php 
                        }

                        else{
                            ?>
                        <option value="<?php echo $ItemID; ?>" selected><?php echo $item;?></option>
                        <?php
                        }
                        ?>

                    <!-- getting options from the database -->

                        <?php

                        do{
                            ?>
                        <option value="<?php echo $item_rs['ItemID'];?>"><?php echo $item_rs['Item'];?></option>

                        <?php
                        }
                        while ($item_rs=mysqli_fetch_assoc($item_query))
                        ?>
                        </select>

                <!-- Published Year (Required) -->
                 <!--error message-->
                    <div class="<?php echo $date_error; ?> ">
                        Are you sure you have a correct date? Please enter the year in a 4 digit formatE.g 0000, 1999</br>
                        年を合ってますか　例： 0000, 1999
                    </div>

                <input class="add-field <?php echo $date_field; ?>  p" type="number" name="pubyear" value="<?php echo $pubyear; ?>"  placeholder="Pub Year・出版年(required)..."/>
                
                <!-- ISBN  (Required) -->
                    <!--error message-->
                    <div class="<?php echo $isbn_error; ?> ">
                        Please type in a valid ISBN-13 Number or if entering a DVD please enter the JAN code</br>
                        ISBN13かDVDのJANコードを入れてください
                    </div>

                <input class="add-field <?php echo $isbn_field; ?> p" type="text" name="isbn" value="<?php echo $isbn; ?>"  size="13" placeholder="ISBN 13 number・ISBN 13番号"/>

                <!-- Description  (Required) https://www.dummies.com/web-design-development/site-development/how-to-create-a-drop-down-list-in-an-html5-form/ -->
                 <!--error message-->
                    <div class="<?php echo $desc_error; ?> ">
                    Please select something・何かをえらんでください
                    </div>
                <textarea class="add-field <?php echo desc_field?> desc p" type="text" name="description" value="<?php echo $description; ?>"  placeholder="Description・描写" rows = "3" cols = "80"></textarea>
                
                <!-- SUbmit Button-->

               <button class="submit tabs advanced-button" type="submit" value="Submit" id="Submit"  > Submit・出す </button>
            
        </form>
        </div>  <!---/addentry-->
