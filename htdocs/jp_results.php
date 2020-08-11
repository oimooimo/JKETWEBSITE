 <?php 

if($count < 1) {

    ?>

<div class="error">

    ごめんなさい！検索に一致する結果はありません。右側の検索ボックスを使用して、より詳細な検索を行ってください

</div><!-- end error -->

<?php
} // end no results if

else {
    do
    {
        ?>
        
<!-- Results go here -->
<div class="results">

<!-- title and check in-->
<div class="flex-container">
        <div>
            <span class="sub_heading">
                <?php echo $find_rs['Title']; ?>
            </span>
        </div> 
    <!--/title-->

    <!--Availability-->
    
    <?php 
        if ($find_rs['CheckIn'] == 0) {?>
            <div class="checkin"> 借りる &#10004; </div>

        <?php
        } //end Check in if

        else {

        ?> <div class="checkout"> 貸出中 &#10060; </div>
        <?php
        } // end check in else

        ?>
    
    <!--/availability-->
</div> <!--/flexcontainer-->

<div>
    <b>種類:</b>
    <?php echo $find_rs['Item']; ?>

    <br />
    <b> 作者:</b>
    <?php echo $find_rs['Author']; ?>

    <br />
    <b> 出版社:</b>
    <?php echo $find_rs['Pub']; ?>
</div> <!--- Sub information-->
    <hr />
        
<div>
    <b> 説明:</b>
    <?php echo $find_rs['Description']; ?>
</div><!---Description-->

</div> <!-- end of results -->
<?php

    } // end results 'do'

    while
    ($find_rs=mysqli_fetch_assoc($find_query));
} // end else

?>
