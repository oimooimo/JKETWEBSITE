            <div class="tab box">

            <!-- FROM W3 SCHOOLS https://www.w3schools.com/howto/howto_css_modals.asp -->
            <!-- Trigger/Open The Modal -->
                        <a href="admin.php">
                        <img src="image/icon.png"></img> <!-- id="myBtn" href="search.php"-->
                        </a>
            <!-- The Modal -->
                        <div id="myModal" class="modal modal-dialog modal-dialog-centered"">

                            <!-- Modal content -->
                            <div class="modal-content">

                                <div class="modalheader">
                                    <span class="close">&times;</span>
                                </div>

                                <div class="modalaside">
                                    <div id="tabs">
                                        <a class="active" href="#Menu1">Book Addition</a> 
                                    </div>
                                </div>

                                <div id="tabcontent" class= "modalmain">
                                    <div id="Menu1">
                                        <?php include 'addentry.php'?>
                                    </div>

                                    <div id="Menu2">
                                        HI
                                    </div>
                                </div>

                    
                            </div><!-- MODAL CONTENT-->

                        </div><!--/MYMODAL-->
                    
        </div> <!-- end of tab-->

        <!-- javascript link for modal -->
        <script src="java/modal.js"></script>
