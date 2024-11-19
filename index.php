<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('accessibility-panel.php');

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

<!-- Library Stats Section Start -->
<div class="container" style="margin-top:-150px; margin-bottom:50px;">
  <h4 class="text-center" style="font-size: 2.5rem; font-weight: 600; color: #333;">Library Statistics</h4>
  <div class="row">
    <!-- Books in Collection -->
    <div class="col-md-4 col-sm-6 text-center mb-4">
      <div class="stat-card p-5 rounded shadow-lg" style="background-color: #e8f5e9; transition: transform 0.3s ease, box-shadow 0.3s ease; padding:20px; margin:10px;">
        <i class="fa fa-book" style="font-size: 4rem; color: #4CAF50;"></i>
        <h3 style="font-size: 3rem; color: #333; font-weight: 700;">500+</h3>
        <p style="font-size: 1.4rem; color: #555;">Books in Collection</p>
      </div>
    </div>
    
    <!-- Active Users -->
    <div class="col-md-4 col-sm-6 text-center mb-4">
      <div class="stat-card p-5 rounded shadow-lg" style="background-color: #e3f2fd; transition: transform 0.3s ease, box-shadow 0.3s ease; padding:20px; margin:10px;">
        <i class="fa fa-users" style="font-size: 4rem; color: #2196F3;"></i>
        <h3 style="font-size: 3rem; color: #333; font-weight: 700;">200+</h3>
        <p style="font-size: 1.4rem; color: #555;">Active Users</p>
      </div>
    </div>
    
    <!-- Daily Visitors -->
    <div class="col-md-4 col-sm-6 text-center mb-4">
      <div class="stat-card p-5 rounded shadow-lg" style="background-color: #fff3e0; transition: transform 0.3s ease, box-shadow 0.3s ease; padding:20px; margin:10px;">
        <i class="fa fa-calendar" style="font-size: 4rem; color: #FF5722;"></i>
        <h3 style="font-size: 3rem; color: #333; font-weight: 700;">50+</h3>
        <p style="font-size: 1.4rem; color: #555;">Daily Visitors</p>
      </div>
    </div>
  </div>
</div>
<!-- Library Stats Section End -->

<!-- CSS to improve hover effects -->
<style>
  .stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.1);
  }

  .stat-card i {
    transition: color 0.3s ease;
  }

  .stat-card:hover i {
    color: #333;
  }

  /* Making the cards responsive */
  @media (max-width: 768px) {
    .stat-card {
      padding: 4rem 3rem;
    }
    .stat-card i {
      font-size: 3.5rem;
    }
    .stat-card h3 {
      font-size: 2.5rem;
    }
  }
</style>





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
