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


</head>

<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php');?>
  <!-- MENU SECTION END-->
  <marquee behavior="scroll" direction="left" style="background-color: #EBEAFF; padding: 10px; font-size: 20px; font-weight: bold;">
  Welcome to FEC Central Library - Your gateway to knowledge and innovation. Open 9 AM to 9 PM on all working days.
  </marquee>


  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <!-- Left Column -->
        <div class="col-md-8">
          <!--Slider-->
          <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <img src="assets/img/1.jpg" alt="" />
              </div>
              <div class="item">
                <img src="assets/img/2.jpg" alt="" />
              </div>
              <div class="item">
                <img src="assets/img/3.jpg" alt="" />
              </div>
            </div>
            <!--INDICATORS-->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example" data-slide-to="1"></li>
              <li data-target="#carousel-example" data-slide-to="2"></li>
            </ol>
            <!--PREVIOUS-NEXT BUTTONS-->
            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4">
          <div class="right-column-content" style="background-color: #2b3e50; color: white; padding: 15px; border-radius: 8px;">
            <h4>Welcome to Faridpur Engineering College Library</h4>
            <p>The library is transitioning to a fully automated system using Koha, with a collection of the latest engineering books, journals, and newspapers. It accommodates 72 users at a time and serves over 50 users daily.</p>
            <p><strong>Services:</strong></p>
            <ul>
              <li>Library Membership</li>
              <li>Lending Books</li>
              <li>Renewal Books</li>
              <li>Internet Service</li>
              <li>Thesis Papers</li>
            </ul>
            <p><strong>Library Hours:</strong></p>
            <p>Open 9:00 am - 5:00 pm (Lunch Break: 1:00 pm - 2:00 pm) on working days. Closed on Fridays & national holidays.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
  <!-- FOOTER SECTION END-->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>

</body>

</html>
