
<?php 

//initialise form variables

$book_title="";
$author="";
$pub="";
$item_type="";
$pubyear="";
$description="";
$isbn="";
$check_in= 1;

$has_errors = "no";

?>

        <div class="add-entry">

            <h3>Add An Entry</h3>

                <form method="post" enctype="multipart/form-data" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                <!-- Book Name (Required) -->
                <input class="add-field" type="text" name="book_title" value="<?php echo $app_name; ?>" required placeholder="Book Title (required)..."/>
                <!-- Author Name (Required) -->
                <!-- Publisher Name (Required) -->
                <!-- Item Name (Required) -->
                <!-- Published Year (Required) -->
                <!-- ISBN  (Required) -->
                <!-- Book Name (Required) -->
                <!-- SUbmit Button-->
                <p> 
                <input class="submit advanced-button" type="submit" value="Submit"/>
                </p>
            
        </form>
        </div>  <!---/addentry-->
