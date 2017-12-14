<?php
if(!empty($_POST["add_record"])) {
	require_once("db.php");
	$sql = "INSERT INTO yearenderdata ( title, Authorname, Authodiscrition, Articalimage, reg_date) VALUES ( :title, :Authorname, :Authodiscrition, :Articalimage, :reg_date )";
	$pdo_statement = $pdo_conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':title'=>$_POST['title'], ':Authorname'=>$_POST['Authorname'], ':Authodiscrition'=>$_POST['Authodiscrition'], ':Articalimage'=>$_POST['Articalimage'], ':reg_date'=>$_POST['reg_date'] ) );
	if (!empty($result) ){
	  header('location:home.php');

	}
}
?>
<html>
<head>
<title> Add Record</title>
<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.frm-add {border: #c3bebe 1px solid;
    padding: 30px;}
.demo-form-heading {margin-top:0px;font-weight: 500;}	
.demo-form-row{margin-top:20px;}
.demo-form-field{width:300px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
</style>
</head>
<body>
<div style="margin:20px 0px;text-align:right;"><a href="home.php" class="button_link">Back to List</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Add New Record</h1>
<form name="frmAdd" action="" method="POST">
  <div class="demo-form-row">
	  <label>Title: </label><br>
	  <input type="text" name="title" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <label>Description: </label><br>
	  <textarea name="Authorname" class="demo-form-field" rows="5" required ></textarea>
  </div>
  <div class="demo-form-row">
	  <label>Author Discrition: </label><br>
	  <input type="text" name="Authodiscrition" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <label>Artical Image: </label><br>
	  <input type="text" name="Articalimage" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <label>Date: </label><br>
	  <input type="date" name="reg_date" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <input name="add_record" type="submit" value="Add" class="demo-form-submit">
  </div>
  </form>
</div> 
</body>
</html>