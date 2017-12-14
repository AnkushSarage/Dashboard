    <?php
require_once("db.php");
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="css/main.css"  media="screen,projection" />

   
    <style>
body{width:auto;font-family:arial;letter-spacing:1px;line-height:20px;}
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
</style>
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home.php">Update or Add Here</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">All Entries</span>
          </a>
         </li>

       <!--   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">All Tables</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="#">Table Login</a>
            </li>
            <li>
              <a href="#">YearEnder</a>
            </li>
          </ul>
        </li> -->

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="add.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Add Entry</span>
          </a>
        </li>
  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Other Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="index.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       
        
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">


<!-- webpage content goes here in the body -->

  <div id="page">
    <div id="logo">
      <h1><a href="/" id="logoLink">Welcome to ACEE</a></h1>
    </div>
    <div id="nav">
      <ul>
        <li><a href="#" id="home"><strong>Home</strong></a></li>
        <li><a href="http://acee-thethirdeye.net/page2.php?page=About" id="about"><strong>About</strong></a></li>
        <li><a href="http://acee-thethirdeye.net/contact-us.php" id="contact"><strong>Contact</strong></a></li>
      </ul> 
    </div>

      
      <?php 
     $pdo_statement = $pdo_conn->prepare("SELECT * FROM yearenderdata ORDER BY id DESC");
        $pdo_statement->execute();
      $result = $pdo_statement->fetchAll();
      ?>


<table class="tbl-qa">
  <thead>
  <tr>
    <th class="table-header" width="18%">Title</th>
    <th class="table-header" width="18%">Aothor Name</th> 
    <th class="table-header" width="18%">Author Discription</th>
    <th class="table-header" width="18%">Artical Image</th>
    <th class="table-header" width="18%">Registration Date</th>
    <th class="table-header" width="10%">Actions</th>
  </tr>
  </thead>  
  <tbody id="table-body">
  <?php
  if(!empty($result)) { 
    foreach($result as $row) {
  ?>
    <tr class="table-row">
    <td><?php echo $row["title"]; ?></td>
    <td><?php echo $row["Authorname"]; ?></td>
    <td><?php echo $row["Authodiscrition"]; ?></td>
    <td><?php echo $row["Articalimage"]; ?></td>
    <td><?php echo $row["reg_date"]; ?></td>
    <td><a class="ajax-action-links" href='edit.php?id=<?php echo $row['id']; ?>'><img style="width: 40px; height: 30px; align-items: center;" src="images/update.png" title="Update"  /></a> <a class="ajax-action-links"  onclick='return confirmDelete()' href='delete.php?id=<?php echo $row['id']; ?>'><img style="width: 40px; height: 30px; align-items: center;" src="images/delete.png" title="Delete" /></a></td>
    </tr>
    <?php
    }
  }
  ?>
  </tbody>
</table>

    <div id="footer">
      <hr>
  </div>
   </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.html">Logout</a>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
