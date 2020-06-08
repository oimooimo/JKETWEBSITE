  <!-- link to css poetry style sheet -->
    <link rel="stylesheet" href="css/stylesheet.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:900%7cSawarabi+Gothic&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="wrapper">
		
        <header class="box">
            <div class="button_group box">
				<a href="index.php" class="button_1">ENGLISH</a>
				<a href="jp_donation.php" class="button_2">ご寄付</a>
				<a href="jp_volunteerform.php" class="button_2">ボランティア募集！</a>
			</div>
			
            <div class="header_item box">
                <?php include'headeritem.php' ?>
            </div>
        </header>


        <nav class="box">
		    <a href="index.php"> <img src="image/logo.png"  class="center" alt="JKET logo" style="width:120px"/> </a>
           	<h1> JKET </h1>
			<p>Japan Kauri Education Trust</p>
			
			<!-- side menu start https://www.w3schools.com/howto/howto_js_dropdown_sidenav.asp -->
			<div class="sidenav">
				<a href="jp_heritagecentre.php">日本語継承センター</a>
					<!-- Dropdown container start-->
				<a class="dropdown-btn">Japanese Children's<br> Library</a> 
					<div class="dropdown-container">
						<a href="/jp_library.php">情報</a>
						<a href="jp_search.php">本探し</a>
					</div>
				<a href="jp_parentalsupport.php">育児支援</a>
				<a href="jp_contact.php">連絡先</a>
				<a href="jp_donation.php">ドネーション</a>
			</div>
        </nav> <!-- end navigation-->

        <?php include'mobileheader.php' ?>
            <div> <a href="jp_index.php" class="button_1 box">日本語</a></div>

         </div><!-- mobile header div close-->