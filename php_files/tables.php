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
  <title>Home Page</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
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
    <a class="navbar-brand" href="home.php">Add or Edit Record Here</a>
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
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
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
        <li class="breadcrumb-item active">Table</li>
      </ol>

      <div class="row">
  
      <!-- Example DataTables Card-->

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table </div>
        <div class="card-body">
          <div class="table-responsive">
             <?php 
     $pdo_statement = $pdo_conn->prepare("SELECT * FROM yearender_site ORDER BY id DESC");
        $pdo_statement->execute();
      $result = $pdo_statement->fetchAll();
      ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          
            <thead>
  <tr>
    <th class="table-header" width="4%" >id</th>
    <th class="table-header" width="18%">Title</th> 
    <th class="table-header" width="10%">Background Color</th>
    <th class="table-header" width="10%">Heading Color</th>
    <th class="table-header" width="8%">Artical Image</th>
    <th class="table-header" width="12%">Meta Description</th>
    <th class="table-header" width="10%">Registration Date</th>
    
  </tr>
  </thead>  
  <tbody id="table-body">
  <?php
  if(!empty($result)) { 
    foreach($result as $row) {
  ?>
    <tr class="table-row">
    <td><?php echo $row["Id"]; ?></td>
    <td><?php echo $row["title"]; ?></td>
    <td><?php echo $row["backgndcolor"]; ?></td>
     <td><?php echo $row["headingcolor"]; ?></td>
    
    <td><?php echo '<img height="100px" width="100px" src="../images/'.$row['images']. '">'; ?></td>
    <td><?php echo substr($row["metadescription"], 0, 50); ?></td>
    <td><?php echo $row["datetime"]; ?></td>
    </tr>
    <?php
    }
  }
  ?>
      </tbody>
      </table>


          </div>
        </div>
    
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
            <a class="btn btn-primary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
