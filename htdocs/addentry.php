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

    } //End AuthorID if

    $ItemID=mysqli_real_escape_string($dbconnect,$_POST['item']);

    //if AuthorID is not blank, get the author so that the genre box does not lose its value if there are rrors

    if($ItemID != ""){
        $itemitem_sql ="SELECT * FROM `Item` WHERE `ItemID` = $ItemID ";
        $itemitem_query= mysqli_query($dbconnect, $itemitem_sql);
        $itemitem_rs=mysqli_fetch_assoc($itemitem_query);

        $item = $itemitem_rs['Item'];

    } //End AuthorID if

    $pubyear=mysqli_real_escape_string($dbconnect,$_POST['pubyear']);
    $isbn=mysqli_real_escape_string($dbconnect,$_POST['isbn']);
    $description=mysqli_real_escape_string($dbconnect,$_POST['description']);
    $check_in=mysqli_real_escape_string($dbconnect,$_POST['checkIn']);

    //error cehcking will go here..

    //if there are no errors
    if($has_errors =="no") {
    }
            echo "you pushed the button";} //end of button submited code
?>

        <div class="add-entry">

            <h3>Add An Entry</h3>

                <form method="post" enctype="multipart/form-data" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                <!-- Book Name (Required) -->
                <input class="add-field p" type="text" name="book_title" value="<?php echo $app_name; ?>"  placeholder="Book Title (required)..."/>
                <!-- Author dropdown Name (Required) -->
                    <select class="adv p"  name="author">
                    <!-- first/selected option-->
                        <?php
                        if($AuthorID==""){
                            ?>
                            <option value="" selected>Author (choose something....)</option>
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
                    <select class="adv p"  name="publisher">
                    <!-- first/selected option-->
                         <?php
                        if($PubID==""){
                            ?>
                            <option value="" selected>Publisher (choose something....)</option>
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
                        <select class="adv p"  name="item">
                        <!-- first/selected option-->

                        <<?php
                        if($ItemID==""){
                            ?>
                            <option value="" selected>Item (choose something....)</option>
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
                <input class="add-field p" type="number" name="pubyear" value="<?php echo $pubyear; ?>"  size="4" max="9999" placeholder="Pub Year (required)..."/>
                
                <!-- ISBN  (Required) -->
                <input class="add-field p" type="number" name="isbn" value="<?php echo $isbn; ?>"  size="13"  maxlength="13" min="9780000000000" max="9800000000000" placeholder="ISBN 13 number"/>

                <!-- Description  (Required) https://www.dummies.com/web-design-development/site-development/how-to-create-a-drop-down-list-in-an-html5-form/ -->
                <textarea class="add-field desc p" type="text" name="description" value="<?php echo $description; ?>"  placeholder="Description" rows = "3" cols = "80"></textarea>
                
                <!-- SUbmit Button-->
                <p> 
                <input class="submit advanced-button" type="submit" value="Submit"/>
                </p>
            
        </form>
        </div>  <!---/addentry-->
