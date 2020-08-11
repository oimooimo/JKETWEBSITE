    <?php 

if($usercount < 1) {

    ?>

<div class="error">

    Sorry! There are no results that match your search. Please use the search box in the right for a more detailed search!<br>
ごめんなさい！検索に一致する結果はありません。右側の検索ボックスを使用して、より詳細な検索を行ってください

</div><!-- end error -->

<?php
} // end no results if

else {
    do
    {
        ?>
        

<!-- title and check in-->
    <div class="results">

        <div class="flex-container">
                <div>
                    <span class="sub_heading">
                        <?php echo $find_userrs['Last']; ?>
                        <?php echo $find_userrs['First']; ?>
                        |
                        <?php echo $find_userrs['Romfirst']; ?>
                        <?php echo $find_userrs['Romlast']; ?>
                    </span>
                </div> 
            <!--/title-->
            
            <?php 
                if ($find_userrs['Account'] == 1) {?>
                    <div style="color:red;"> Admin・アドミン </div>

                <?php
                } //end Check in if

                elseif ($find_userrs['Account'] == 2){

                ?> <div style="color:green;"> Regular member・普通メンバー </div>
                <?php
                } // end check in else

                elseif($find_userrs['Account'] == 3){

                ?> <div style="color:darkgreen;"> Playgroup member・プレイグループメンバー </div>
                <?php
                } // end ch

                ?>
                 <!--/availability-->
        </div> <!--/flexcontainer-->

        <div>
            <b>Username・ユーザーネーム:</b>
            <?php echo $find_userrs['Username']; ?>

            <br />
            <b> Email・メール:</b>
            <?php echo $find_userrs['Email']; ?>

            <br />
            <b> Phone number・電話番号:</b>
            <?php echo $find_userrs['Phone']; ?>

            <br />
            <b> Address・住所:</b>
            <?php echo $find_userrs['Address']; ?>
        </div> <!--- Sub information-->
     
</div> <!-- end of results -->

<?php

    } // end results 'do'

    while
    ($find_userrs=mysqli_fetch_assoc($find_userquery));
} // end else

?>
