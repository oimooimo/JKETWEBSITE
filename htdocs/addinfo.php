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
$ISBN="";
$check_in= 1;

$has_errors = "no";

//form variables for user entry
$Username="";
$Password="";
$Account="";
$Email="";
$Phone="";
$Address="";
$Romfirst= "";
$Romlast= "";
$First= "";
$Last= "";

$has_usererrors = "no";

// set up error field colours /visibility (no eroors at first)
$title_error= $item_error = $pub_error = $date_error = $isbn_error = $author_error = $desc_error = "no-error";
$title_error= $item_error = $pub_error = $date_error = $isbn_error = $author_error = $desc_error= "form-ok";


// set up error field colours /visibility (no eroors at first)
$user_error = $pass_error = $address_error = $name_error  = $account_error = $email_error = $phone_error= $rom_error = $jpn_error = $has_usererrors = "no-error";

$user_error = $pass_error = $address_error = $name_error  = $account_error = $email_error = $phone_error= $rom_error = $jpn_error = $has_usererrors = "form-ok";
//code executes below when the form is submited
 if (isset($_POST['submitentry'])) {
    
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

    //error cehcking will go here.

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
        
        //header('location: add_success.php');

    // hide error text
       // add entry to database
    $addentry_sql="INSERT INTO `book_data` (`ISBN`, `Title`, `AuthorID`, `PubID`, `ItemID`, `PubYear`,  `Description`, `CheckIn`) VALUES ('$isbntest', '$book_title', '$AuthorID', '$PubID', '$ItemID', '$pubyear', '$description', '$check_in');";
    $addentry_query=mysqli_query($dbconnect,$addentry_sql);

    // get od fpr mext page
    $getid_sql = "SELECT * FROM `User` WHERE
     `ISBN` = $isbn
    ";
    $getid_query=mysqli_query($dbconnect,$getid_sql);
    $getid_rs=mysqli_fetch_assoc($getid_query);

    $ISBN = $getid_rs['ISBN'];
    $_SESSION['ISBN']=$ISBN;
    echo "isbn:".$ISBN;
    }// end of no errors if
    exit();
 }

 
//code executes below when the form is submited
 if (isset($_POST['submituser'])) {
    
     //Get values from form
    $Username=mysqli_real_escape_string($dbconnect,$_POST['Username']);

    $Password=mysqli_real_escape_string($dbconnect,$_POST['Password']);

    $Account=mysqli_real_escape_string($dbconnect,$_POST['Account']);

    $Email=mysqli_real_escape_string($dbconnect,$_POST['Email']);

    $Phone=mysqli_real_escape_string($dbconnect,$_POST['Phone']);

    $Address=mysqli_real_escape_string($dbconnect,$_POST['Address']);

    $Romfirst=mysqli_real_escape_string($dbconnect,$_POST['Romfirst']);

    $Romlast=mysqli_real_escape_string($dbconnect,$_POST['Romfirst']);

    $First= mysqli_real_escape_string($dbconnect,$_POST['First']);

    $Last= mysqli_real_escape_string($dbconnect,$_POST['Last']);
                             
    //error cehcking will go here..

    // check username isnt empty
    if($Username == ""){
        $has_usererrors ="yes";
        $user_error = "error-text";
        $user_field="form-error";
    }

    //check that username doeesnt already exist
    $usercheck=mysqli_query($dbconnect, "SELECT Username FROM Users where Username = '$Username' ");
        if(mysqli_num_rows($usercheck) > 0){
        $has_usererrors ="yes";
        $user_dupeerror = "error-text";
        $user_dupefield="form-error";
    }

    // check that password isnt empty
    if($Password == "" ){
        $has_usererrors ="yes";
        $pass_error = "error-text";
        $pass_field="form-error";
    }

    //check that account isnt empty
    if($Account == "" ){
        $has_usererrors ="yes";
        $account_error = "error-text";
        $account_field="form-error";
    }
    
    //check that email isnt empty and is a valid email
    if($Email ==""){
        $has_usererrors = "yes";
        $email_error = "error-text";
        $email_field="form-error";
    }
    
    // check that phone Year is a valid rnumber ||strlen($Phone) = 9
    if(!ctype_digit($Phone) ){
        $has_usererrors ="yes";
        $phone_error = "error-text";
        $phone_field="form-error";
    }

    //Check that address isnt empty
    if($Address ==""){
        $has_usererrors ="yes";
        $address_error = "error-text";
        $address_field="form-error";
        $description = "";
    }

    // CHeck that names are not empyty

    if($Romfirst == ""){
        $has_usererrors ="yes";
        $rom_error = "error-text";
        $rom_field="form-error";
    }
    
    if($Romlast == "" ){
        $has_usererrors ="yes";
        $rom_error = "error-text";
        $rom_field="form-error";
    }
    
    if($First == ""){
        $has_usererrors ="yes";
        $jpn_error = "error-text";
        $jpn_field="form-error";
    }
    
    if($Last == ""){
        $has_usererrors ="yes";
        $jpn_error = "error-text";
        $jpn_field="form-error";
    }
 }//end of $_post

 //code executes below when the form is submited
 elseif(isset($_POST['submitentry'])) {
    
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

    //error cehcking will go here.

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
 }//end of $_post

?>

<?
    //if there are no errors
    if($has_usererrors =="no") {
    header('location:add_usersuccess.php');

    // hide error text
       // add entry to database
    $adduserentry_sql="INSERT INTO `Users` ( `userID`, `Username`, `Password`, `Account`, `Email`, `Phone`, `Address`, `Romfirst`, `Romlast`, `First`, `Last`) VALUES (NULL, '$Username', '$Password', '$Account', '$Email', '$Phone', '$Addresss', '$Romfirst', '$Romlast', '$First', '$Last');";
    $adduserentry_query=mysqli_query($dbconnect,$adduserentry_sql);

    // get ID fpr mext page
    $getuserid_sql = "SELECT * FROM `User` WHERE
    `Username` LIKE '$Username' AND
    `Password` LIKE '$Password' AND
    `Account` = '$Account' AND
    `Email` LIKE '$Email' AND
    `Phone` = '$Account' AND
    `Address` LIKE '$Address' AND
    `Romfirst` LIKE '$Romfirst' AND
    `Romlast` LIKE '$Romlast' AND
     `First` LIKE '$First' AND
     `Last` LIKE '$Last'
    ";
    $getuserid_query=mysqli_query($dbconnect,$getuserid_sql);
    $getuserid_rs=mysqli_fetch_assoc($getuserid_query);

    $userID = $getuserid_rs['userID'];
    $_SESSION['userID']=$userID;
    }// end of no errors if



    //if there are no errors
    elseif($has_errors =="no") {
    header('location:add_success.php');

        //header('location: add_success.php');

    // hide error text
       // add entry to database
    $addentry_sql="INSERT INTO `book_data` (`ISBN`, `Title`, `AuthorID`, `PubID`, `ItemID`, `PubYear`,  `Description`, `CheckIn`) VALUES ('$isbntest', '$book_title', '$AuthorID', '$PubID', '$ItemID', '$pubyear', '$description', '$check_in');";
    $addentry_query=mysqli_query($dbconnect,$addentry_sql);

    // get od fpr mext page
    $getid_sql = "SELECT * FROM `User` WHERE
     `ISBN` = $isbn
    ";
    $getid_query=mysqli_query($dbconnect,$getid_sql);
    $getid_rs=mysqli_fetch_assoc($getid_query);

    $ISBN = $getid_rs['ISBN'];
    $_SESSION['ISBN']=$ISBN;
    echo "isbn:".$ISBN;
    }// end of no errors if


 ?>
