<?php
session_start();
include("connectionDB.php");

if(!($_SESSION['username']))
{
  header('Location: /fyp/login/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sales</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">CSCMS</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <a class="navbar" style="color:white">Hi <?php echo $_SESSION['username']; ?> </a>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="/fyp/supervisor/supervisor/SvDisplay.php">Your Profile</a>
          <a class="dropdown-item" href="/fyp/supervisor/activitylog/log.php">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Staff</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="/fyp/register/register.php">Register</a>
          <a class="dropdown-item" href="/fyp/supervisor/staff/StList.php">Staff List</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/fyp/supervisor/customer/list.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Customer</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/fyp/supervisor/service/list.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Service</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-tools"></i>
          <span>Spare Part</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="/fyp/supervisor/sparepart/SparePartList0.php">View All List</a>
          <a class="dropdown-item" href="/fyp/supervisor/sparepart/carpart.php">View By Part</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sales.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Sales</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Sales</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Total Service Sales</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Total Service Sales in Ringgit Malaysia (RM) for last 14 days</div>
        </div>

        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Spare Part Sales</div>
              <div class="card-body">
                <canvas id="myBarChart" width="100%" height="43"></canvas>
              </div>
              <div class="card-footer small text-muted">Total Spare Part Sales (Unit) for last 14 days</div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Payment</div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="95"></canvas>
              </div>
              <div class="card-footer small text-muted">Total Payment in Ringgit Malaysia (RM) for last 14 days</div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Car Service Center Management System 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure want to logout?</div>
        <div class="modal-footer justify-content-center">
          <form action="logout.php" method="POST">
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
          </form>
          <!-- <a class="btn btn-primary" href="/fyp/login/index.php?action=logout">Logout</a> -->
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <?php
  $connect = mysqli_connect("localhost","root","","carservicecenter");
  $query1 = "SELECT svc_date AS Date FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY Date(svc_date)";
  $query2 = "SELECT SUM(svc_totalfees) AS TotalSales FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY Date(svc_date)";
  $result1 = mysqli_query($connect, $query1);
  $result2 = mysqli_query($connect, $query2);
  ?>

  <script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // Area Chart
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [<?php while($row1 = mysqli_fetch_array($result1)) {echo '"'.$row1['Date'].'",';} ?>],
      datasets: [{
        label: "Service Sales",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.07)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: [<?php while ($row2= mysqli_fetch_array($result2)) {echo '"'.$row2['TotalSales'].'",';} ?>],
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 6000,
            maxTicksLimit: 5
          },
          gridLines: {
            color: "rgba(0, 0, 0, .125)",
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
  </script>

  <?php
  $connect = mysqli_connect("localhost","root","","carservicecenter");
  $query1 = "SELECT svc_date AS Date FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY Date(svc_date)";
  $query2 = "SELECT SUM(sp_used) AS TotalSparepart FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY Date(svc_date)";
  $result1 = mysqli_query($connect, $query1);
  $result2 = mysqli_query($connect, $query2);
  ?>

  <script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // Bar Chart
  var ctx = document.getElementById("myBarChart");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php while($row1 = mysqli_fetch_array($result1)) {echo '"'.$row1['Date'].'",';} ?>],
      datasets: [{
        label: "Spare Part Used",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: [<?php while ($row2= mysqli_fetch_array($result2)) {echo '"'.$row2['TotalSparepart'].'",';} ?>],
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 6
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 30,
            maxTicksLimit: 5
          },
          gridLines: {
            display: true
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
  </script>

  <?php
  $connect = mysqli_connect("localhost","root","","carservicecenter");
  $query1 = "SELECT svc_paymentstatus AS PaymentStatus FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY svc_paymentstatus='Paid'";
  $query2 = "SELECT SUM(svc_totalfees) AS TotalFees FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY svc_paymentstatus='Paid'";
  $query3 = "SELECT COUNT(svc_paymentstatus) AS TotalStatus FROM service WHERE svc_date >= DATE(NOW()) - INTERVAL 13 DAY GROUP BY svc_paymentstatus='Paid'";
  $result1 = mysqli_query($connect, $query1);
  $result2 = mysqli_query($connect, $query2);
  $result3 = mysqli_query($connect, $query3);
  ?>
  
  <script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [<?php while($row1 = mysqli_fetch_array($result1)) {echo '"'.$row1['PaymentStatus'].'",';} ?>],
      datasets: [{
        data: [<?php while ($row2= mysqli_fetch_array($result2)) {echo '"'.$row2['TotalFees'].'",';} ?>],
        backgroundColor: ['#1cc88a', '#36b9cc'],
      }],
    },
  });
  </script>

</body>

</html>