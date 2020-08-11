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

$has_usererrors = "no";

// set up error field colours /visibility (no eroors at first)
$user_error = $pass_error = $address_error = $name_error  = $account_error = $email_error = $phone_error= $rom_error = $jpn_error = $user_dupeerror = "no-error";

$user_error = $pass_error = $address_error = $name_error  = $account_error = $email_error = $phone_error= $rom_error = $jpn_error  = $user_dupeerror = "form-ok";

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
    

    // check that phone Year is a valid rnumber  and is 9 digits long
    if(!ctype_digit($Phone) || strlen($Phone) == 9 ){
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
    //ctype checks what character set the variables are if not ctype then it means its not alphanumeric.

    if($Romfirst == "" ||!ctype_alnum($Romfirst)){
        $has_usererrors ="yes";
        $rom_error = "error-text";
        $rom_field="form-error";
    }
    
    if($Romlast == ""||!ctype_alnum($Romlast) ){
        $has_usererrors ="yes";
        $rom_error = "error-text";
        $rom_field="form-error";
    }
    
    if($First == ""||ctype_alnum($First)){
        $has_usererrors ="yes";
        $jpn_error = "error-text";
        $jpn_field="form-error";
    }
    
    if($Last == ""||ctype_alnum($Last)){
        $has_usererrors ="yes";
        $jpn_error = "error-text";
        $jpn_field="form-error";
    }

    //if there are no errors
    if($has_usererrors =="no") {
    header('location: add_usersuccess.php');

    // hide error text
       // add entry to database
    $adduserentry_sql="INSERT INTO `Users` ( `userID`,`Username`, `Password`, `Account`, `Email`, `Phone`, `Address`, `Romfirst`, `Romlast`, `First`, `Last`) VALUES (NULL, '$Username', '$Password', '$Account', '$Email', '$Phone', '$Address', '$Romfirst', '$Romlast', '$First', '$Last');";
    $adduserentry_query=mysqli_query($dbconnect,$adduserentry_sql);

    // get ID fpr mext page
    $getuserid_sql = "SELECT * FROM `Users` WHERE
    `Username` LIKE '$Username' 
    ";
    $getuserid_query=mysqli_query($dbconnect,$getuserid_sql);
    $getuserid_rs=mysqli_fetch_assoc($getuserid_query);

    $userID = $getuserid_rs['userID'];
    $_SESSION['userID']=$userID;
    }// end of no errors if

 }
?>
        <div class="add-entry">

            <h3>Add A User・ユーザーいり</h3>

                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="form">
                

                <!-- User Name (Required) -->
                    <!--error message-->
                    <div class="<?php echo $user_error; ?> ">
                       Please enter a username!ユーザーネームをえらんでください！
                    </div>
                    <!--error message-->
                    <div class="<?php echo $user_dupeerror; ?> ">
                        This username already exists, please enter a different username!そのユーザネームがもう使ってあります。違うのネームをえらんでください！
                    </div>
                <input class="add-field <?php echo $user_field;?>  p" type="text" name="Username" value="<?php echo $Username; ?>"  placeholder="Username・ユーザーネーム(required・必要)..." />
                
                 <!-- Password (Required) -->
                    <!--error message-->
                    <div class="<?php echo $pass_error; ?> ">
                        Please fill in the Password field!パースワードを入れてください！
                    </div>
                <input class="add-field <?php echo $pass_field;?>  p" type="text" name="Password" value="<?php echo $Password; ?>"  placeholder="Password・パースワード (required・必要)..." />

                 <!-- Accounttype (Required) -->
                    <!--error message-->
                    <div class="<?php echo $account_error; ?> ">
                        Please select an account type </br>
                        ください
                    </div>

                <select class="adv <?php echo $account_field;?>  p" name="Account" value="<?php echo $Account; ?>" >
                    <option value="">Select Account Type・アカウント種類を選んで...</option>
                    <option value="1">Admin・アドミン</option>
                    <option value="2">Regular Member・普通うのメンバー</option>
                    <option value="3">Playgroup Member・プレイグループメンバー</option>
                </select>

                 <!-- Email (Required) -->
                    <!--error message-->
                    <div class="<?php echo $email_error; ?> ">
                        Please fill in the Email・メールアドレスを入れてください
                    </div>
                <input class="add-field <?php echo $email_field;?>  p" type="text" name="Email" value="<?php echo $Email; ?>"  placeholder="Email ・メールアドレス(required・必要)..." />

                 <!-- Phone Number (Required) -->
                    <!--error message-->
                    <div class="<?php echo $phone_error; ?> ">
                        Please fill in the phone number・電話番号を入れてください
                    </div>
                <input class="add-field <?php echo $user_field;?>  p" type="text" name="Phone" value="<?php echo $Phone; ?>"  placeholder="Phone number・電話番号 (required・必要)..." />

                 <!--Address (Required) -->
                    <div class="<?php echo $address_error; ?> ">
                        Please enter and Address・住所を入れてください
                    </div>
                <textarea class="add-field <?php echo address_field?> address p" type="text" name="Address" value="<?php echo $Address; ?>"  placeholder="Address・住所" rows = "2" cols = "40"></textarea>
                    
                    
                <div>
                 <!-- Romfirst (Required) -->
                    <!--error message-->
                    <div class="<?php echo $rom_error; ?> ">
                        Please enter a English First name</br>
                        ローマ字ファーストネームを入れてください
                    </div>
                <input class="add-field  add-rom <?php echo $rom_field;?>  p" type="text" name="Romfirst" value="<?php echo $Romfirst; ?>"  placeholder="English first name・ローマ字ファーストネー・ (required)..." />

                 <!-- Romlast (Required) -->
                    <!--error message-->
                    <div class="<?php echo $rom_error; ?> ">
                        Please enter a English Last name</br>
                        ローマ字ラストネームを入れてください
                    </div>
                <input class="add-field add-rom <?php echo $rom_field;?>  p" type="text" name="Romlast" value="<?php echo $Romlast; ?>"  placeholder="English last name・ ローマ字ラストネーム・ (required)..." />
                </div>
                
                
                <div>
                 <!-- First (Required) -->
                    <!--error message-->
                    <div class="<?php echo $jpn_error; ?> ">
                        Please enter a Japanese First name</br>
                        ファーストネームを入れてください
                    </div>
                <input class="add-field add-jpn <?php echo $jpn_field;?>  p" type="text" name="First" value="<?php echo $First; ?>"  placeholder="Japanese first name・ファーストネーム・(required)..." />

                 <!-- Last (Required) -->
                    <!--error message-->
                    <div class="<?php echo $jpn_error; ?> ">
                        Please enter a Japanese Last name</br>
                        ラストネームを入れてください
                    </div>
                <input class="add-field add-jpn <?php echo $jpn_field;?>  p" type="text" name="Last" value="<?php echo $Last; ?>"  placeholder="Japanese Last name・ラストネーム(required)..." />
                <!-- SUbmit Button-->
                </div>

                
               <button class="submit tabs advanced-button" type="submit" value="submituser" name="submituser"> Submit・出す </button>
            
        </form>
        </div>  <!---/addentry-->
