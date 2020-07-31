<?php 

//initialise form variables

$userID="";
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

$has_errors = "no";

// set up error field colours /visibility (no eroors at first)
$user_error = $pass_error = $address_error = $name_error  = $account_error = $email_error = $phone_error= $rom_error = $jpn_error = "no-error";

$reg_error  = $account_error = $email_error = $phone_error = "form-ok";

//code executes below when the form is submited
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     //Get values from form
    $Username=mysqli_real_escape_string($dbconnect,$_POST['Username']);

    $Password=mysqli_real_escape_string($dbconnect,$_POST['Password']);

    $Account=mysqli_real_escape_string($dbconnect,$_POST['Password']);

    $Email=mysqli_real_escape_string($dbconnect,$_POST['Password']);

    $Phone=mysqli_real_escape_string($dbconnect,$_POST['Password']);

    $Address=mysqli_real_escape_string($dbconnect,$_POST['Password']);

    $Romfirst=mysqli_real_escape_string($dbconnect,$_POST['Romfirst']);

    $Romlast=mysqli_real_escape_string($dbconnect,$_POST['Romfirst']);

    $First= mysqli_real_escape_string($dbconnect,$_POST['First']);

    $Last= mysqli_real_escape_string($dbconnect,$_POST['Last']);
                             
    //error cehcking will go here..

    // check username isnt empty
    if($Username == ""){
        $has_errors ="yes";
        $user_error = "error-text";
        $user_field="form-error";
    }

    // check that password isnt empty
    if($Password == "" ){
        $has_errors ="yes";
        $pass_error = "error-text";
        $pass_field="form-error";
    }

    //check that account isnt empty
    if($Account == "" ){
        $has_errors ="yes";
        $account_error = "error-text";
        $account_field="form-error";
    }
    
    //check that email isnt empty and is a valid email
    if($Email ==""){
        $has_errors = "yes";
        $email_error = "error-text";
        $email_field="form-error";
    }
    
    // check that Pub Year is a valid reasonable date (no larger than 5 numbers long)
    if(!ctype_digit($phone)||strlen($phone)>9||strlen($pubyear)<9){
        $has_errors ="yes";
        $phone_error = "error-text";
        $phone_field="form-error";
    }

    //Check that address isnt empty
    if($Address ==""){
        $has_errors ="yes";
        $address_error = "error-text";
        $address_field="form-error";
        $description = "";
    }

    // CHeck that names are not empyty

    if($Romfirst == ""){
        $has_errors ="yes";
        $rom_error = "error-text";
        $rom_field="form-error";
    }
    
    if($Romlast == "" ){
        $has_errors ="yes";
        $rom_error = "error-text";
        $rom_field="form-error";
    }
    
    if($First == ""){
        $has_errors ="yes";
        $jpn_error = "error-text";
        $jpn_field="form-error";
    }
    
    if($Last == ""){
        $has_errors ="yes";
        $rom_error = "error-text";
        $jpn_field="form-error";
    }
    

    //if there are no errors
    if($has_errors =="no") {
        
        header('location: user_success.php');

    // hide error text
       // add entry to database
    $addentry_sql="INSERT INTO `Users` (`userID`, `Username`, `Password`, `Account`, `Email`, `Phone`, `Address`, `Romfirst`, `Romlast`, `First`, `Last`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '');";
    $addentry_query=mysqli_query($dbconnect,$addentry_sql);

    // get od fpr mext page
    $getuserid_sql = "SELECT * FROM `User` WHERE
     `userID` = $userID
    ";
    $getuserid_query=mysqli_query($dbconnect,$getuserid_sql);
    $getuserid_rs=mysqli_fetch_assoc($getuserid_query);

    $userID = $getuserid_rs['userID'];
    $_SESSION['userID']=$userID;

    }// end of no errors if

 }
?>

        <div class="add-entry">

            <h3>Add An Entry</h3>

                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="form">
                

                <!-- User Name (Required) -->
                    <!--error message-->
                    <div class="<?php echo $user_error; ?> ">
                        Please fill in the 'Book Title' field
                    </div>
                <input class="add-field <?php echo $user_field;?>  p" type="text" name="Username" value="<?php echo $Username; ?>"  placeholder="Username (required)..." />
                
                
                <!-- SUbmit Button-->

               <button class="submit tabs advanced-button" type="submit" value="Submit" id="Submit"  > Submit </button>
            
        </form>
        </div>  <!---/addentry-->
