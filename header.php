<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Course Notes Share</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="University Course Notes" content="">
    <meta name="YaYNotes, UBC" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Course Notes Share</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="noteshare.php">Home</a></li>
              <li><a href="search.php">Search</a></li>
              <li><a href="add_course.php">Add Course</a></li>
              <li><a href="document.php">Document</a></li>
              <li><a href="doc_upload.php">Document Upload</a></li>
            </ul>
            <p class="navbar-text pull-right">
            Logged in as <a href="settings.php"><?php print(" " . $_SESSION['username']); ?></a>
            |<a href="logout.php"> Logout</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>