<?php 

//initialise form variables

$book_title="";
$author="";
$AuthorID="";
$Pub="";
$item_type="";
$pubyear="";
$description="";
$isbn="";
$check_in= 1;

$has_errors = "no";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "you pushed the button";}
?>

        <div class="add-entry">

            <h3>Add An Entry</h3>

                <form method="post" enctype="multipart/form-data" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                <!-- Book Name (Required) -->
                <input class="add-field" type="text" name="book_title" value="<?php echo $app_name; ?>" required placeholder="Book Title (required)..."/>
                <!-- Author dropdown Name (Required) -->
                    <select class="adv" required name="author">
                    <!-- first/selected option-->
                        <option value="" selected>Author (choose something....)</option>
                    <!-- getting options from the database -->
                    <?php
                    do{
                        ?>

                    <option value="<?php echo $author_rs['AuthorID'];?>"><?php echo $author_rs['Author'];?></option>

                    <?php
                    }
                    while ($author_rs=mysqli_fetch_assoc($author_query))
                    ?>
                    </select>
                    
                <!-- Publisher Name dropdown (Required) -->
                  <select class="adv" required name="publisher">
                <!-- first/selected option-->
                    <option value="" selected>Publisher (choose something....)</option>
                <!-- getting options from the database -->
                <?php
                do{
                    ?>

                <option value="<?php echo $publisher_rs['PubID'];?>"><?php echo $publisher_rs['Pub'];?></option>

                <?php
                }
                while ($publisher_rs=mysqli_fetch_assoc($pub_query))
                ?>
                </select>
                <!-- Item Name dropdown (Required) -->
                      <select class="adv" required name="item">
                    <!-- first/selected option-->
                    <!-- first/selected option-->
                    <option value="" selected>item type (choose something....)</option>
                    <!-- getting options from the database -->
                    <?php
                    do{
                        ?>

                    <option value="<?php echo $item_rs['itemID'];?>"><?php echo $item_rs['item'];?></option>

                    <?php
                    }
                    while ($item_rs=mysqli_fetch_assoc($item_query))
                    ?>
                    </select>
                <!-- Published Year (Required) -->
                <input class="add-field" type="number" name="pubyear" value="<?php echo $pubyear; ?>" required minlength="4" maxlength="4" placeholder="Pub Year (required)..."/>
                
                <!-- ISBN  (Required) -->
                <input class="add-field" type="number" name="isbn" value="<?php echo $isbn; ?>" required minlength="13" maxlength="13" minvalue="9780000000000" maxvalue="9800000000000" placeholder="ISBN 13 number"/>

                <!-- SUbmit Button-->
                <p> 
                <input class="submit advanced-button" type="submit" value="Submit"/>
                </p>
            
        </form>
        </div>  <!---/addentry-->
