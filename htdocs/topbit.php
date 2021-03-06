<!DOCTYPE html>
<!-- declares that the document is in html -->
<html lang="en">

<?php

    session_start(); //to allow variable transfer between pages....
    include("config.php");
    //connect to the database...
    $dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if(mysqli_connect_errno()) {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }

    mysqli_set_charset($dbconnect, 'utf8mb4'); // sets the database output to utf8mb4
    ?>
    
<head>
    <!-- meta information -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content ="width=device-width, initial=scale=1.0"/>
    
    <meta name="description" content="The website for the Japan Kauri Education Trust"/>
    <meta name="keywords" content="JKET, New Zealand,Japan Kauri Education Trust, Japan Heritage center, Japanese Childrens library, Japan, Japanese Classes"/>
    <meta name="author" content="Hannah Garnell"/>

    <title> Japan Kauri Education Trust </title>
    <!-- Javascript from https://www.w3schools.com/howto/howto_js_dropdown_sidenav.asp for drop down button -->
    <script src="java/dropdown.js" async></script>
    <!-- Java script for the slide -->
    <script src="java/slide.js" async></script>
    <!-- end of Javascript-->
    
