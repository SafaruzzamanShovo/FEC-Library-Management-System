<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
  $_SESSION['login']='';
}
if(isset($_POST['login']))
{
  $email=$_POST['emailid'];
  $password=md5($_POST['password']);
  $sql ="SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);

  if($query->rowCount() > 0)
  {
    foreach ($results as $result) {
      $_SESSION['stdid']=$result->StudentId;
      if($result->Status==1)
      {
        $_SESSION['login']=$_POST['emailid'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
      } else {
        echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
      }
    }
  } 
  else {
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>FEC Central Library </title>
  <!-- BOOTSTRAP CORE STYLE  -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONT AWESOME STYLE  -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLE  -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>

    .library-header {
    background-color: #002b5c; /* Blue color */
    color: white;
    padding: 20px 0;
    }

    .library-header .container {
    max-width: 1200px;
    margin: 0 auto;
    }

    .header-logo {
    max-width: 100px;
    margin-bottom: 10px;
    }

    .library-title {
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 5px;
    }

    .library-subtitle,
    .library-address {
    font-size: 1.2em;
    }

    .library-details {
    margin-top: 10px;
    font-size: 0.9em;
    }

    .library-fec-link {
    color: #cce4ff;
    }

    .library-fec-link:hover {
    text-decoration: underline;
    }

    .library-footer {
        background-color: #2b3e50; /* Blue color */
        color: white;
        padding: 20px 0;
    }

    .library-footer .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .library-footer a {
        color: #cce4ff; /* Light blue for links */
        text-decoration: none;
    }

    .library-footer a:hover {
        text-decoration: underline;
    }

    .library-footer p {
        margin: 5px 0;
    }

    .library-footer .mt-3 {
        margin-top: 15px;
    }

    .library-footer .footer-logo {
        width: 120px; /* Adjust the size as needed */
        margin-bottom: 10px;
    }

    </style>

</head>
<header class="library-header">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Logo -->
      <div class="col-md-2 col-sm-3 text-center">
        <img src="./assets/img/feccl.png" alt="FEC Logo" class="header-logo">
      </div>

      <!-- Center Text -->
      <div class="col-md-8 col-sm-6 text-center">
        <h1 class="library-title">FEC Central Library</h1>
        <p class="library-subtitle">Faridpur Engineering College Central Library</p>
        <a href="http://www.fec.ac.bd"  class="library-fec-link" target="_blank">www.fec.ac.bd</a><br>
      </div>

      <!-- Right Logo -->
      <div class="col-md-2 col-sm-3 text-center">
        <img src="./assets/img/feccl.png" alt="FEC Logo" class="header-logo">
      </div>
    </div>
  </div>
</header>

<body>
  <!------MENU SECTION START-->
  <?php if($_SESSION['login']) { ?>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <img src="assets/img/logo.png" />
                </a>
            </div>
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>
    </div>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                            <li><a href="issued-books.php">Issued Books</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php } else { ?>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                            <li><a href="index.php">Home</a></li>
                            <li><a href="signin.php">User Login</a></li>
                            <li><a href="signup.php">User Signup</a></li>
                            <li><a href="adminlogin.php">Admin Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php } ?>
  <!-- MENU SECTION END-->
