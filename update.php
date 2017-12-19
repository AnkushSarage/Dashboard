<?php
require_once("db.php");                             //include DB connction
if(!empty($_POST["save_record"])) {
  $pdo_statement=$pdo_conn->prepare("update yearenderdata set title='" . $_POST[ 'title' ] . "', Authorname='" . $_POST[ 'Authorname' ]. "', Authodiscrition='" . $_POST[ 'Authodiscrition' ]. "' , Articalimage='" . $_POST[ 'Articalimage' ]. "', reg_date='" . $_POST[ 'reg_date' ]. "' where id=" . $_GET["id"]);
  $result = $pdo_statement->execute();
  if($result) {
    header('location:home.php');
  }
}                                                   //query for update data
$pdo_statement = $pdo_conn->prepare("SELECT * FROM yearenderdata where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Add Record</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
body{width:auto;font-family:arial;letter-spacing:1px;line-height:20px;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.frm-add {border: #c3bebe 1px solid;
    padding: 50px;}
.demo-form-heading {margin-top:0px;font-weight: 500;} 
.demo-form-row{margin-top:10px;}
.demo-form-field{width:700px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav"> 
    <a class="navbar-brand" href="#">Add or Edit Record Here</a>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="add.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Add Record</span>
          </a>
        </li>                       <!-- On click add button it redirect to add.php-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>                       <!-- On click table button it redirect to table.php-->
      
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
      
        <!-- <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>    
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
      <!-- Area Chart Example-->
      <div style="margin:20px 0px;text-align:right;"><a href="home.php" class="button_link">Back to List</a></div>                <!--   this button redirect to home page -->
<div class="frm-add">
<h1 class="demo-form-heading">Update Record</h1>
<form name="frmAdd" action="" method="POST">
  <div class="demo-form-row">
    <label>Title: </label><br>
    <input type="text" name="title" class="demo-form-field table table-bordered" value="<?php echo $result[0]['title']; ?>" required  />
  </div>
  <div class="demo-form-row">
    <label>Author Name: </label><br>
    <textarea name="Authorname" class="demo-form-field table table-bordered"  required ><?php echo $result[0]['Authorname']; ?></textarea>
  </div>
  <div class="demo-form-row">
    <label>Author Discrition: </label><br>
    <input type="text" name="Authodiscrition" class="demo-form-field table table-bordered" value="<?php echo $result[0]['Authodiscrition']; ?>" required  />
  </div>
  <div class="demo-form-row">
    <label>Artical Image: </label><br>
    <input type="text" name="Articalimage" class="demo-form-field table table-bordered" value="<?php echo $result[0]['Articalimage']; ?>" required  />
  </div>
  <div class="demo-form-row">
    <label>Date: </label><br>
    <input type="date" name="reg_date" class="demo-form-field table table-bordered" value="<?php echo $result[0]['reg_date']; ?>" required />
  </div>
  <div class="demo-form-row">
    <input name="save_record" type="submit" value="Save" class="demo-form-submit">
  </div>
  </form>
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
            <a class="btn btn-primary" href="index.php">Logout</a>
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
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
