  <!-- link to css poetry style sheet -->
    <link rel="stylesheet" href="css/stylesheet.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:900%7cSawarabi+Gothic&display=swap" rel="stylesheet">
  
</head>
<body>
    
    <div class="wrapper">
		 <header class="box">

			<div class="box button_group">
				<a href="/jp_index.php" class="button_1">日本語</a>
				<a href="/donation.php" class="button_2">Donate!</a>
				<a href="/volunteerform.php" class="button_2">Volunteer!</a>
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
				<a href="heritagecentre.php">Japanese Heritage<br> Centre</a>
				<!-- Dropdown container start-->
				<button class="dropdown-btn">Japanese Children's <br> Library</button>
					<div class="dropdown-container">
					<a href="library.php">Information</a>
					<a href="search.php">Book Search</a>
					</div>
				<a href="parentalsupport.php">Parental Support</a>
				<a href="contact.php">Contact</a>
				<a href="donation.php">Donate</a>
			</div>
        </nav> <!-- end navigation-->

        <?php include'mobileheader.php' ?>
            <div> <a href="jp_index.php" class="button_1 box">日本語</a></div>

         </div><!-- mobile header div close-->