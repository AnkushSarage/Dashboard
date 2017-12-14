<?php
require_once("db.php");
if(!empty($_POST["save_record"])) {
	$pdo_statement=$pdo_conn->prepare("update yearenderdata set title='" . $_POST[ 'title' ] . "', Authorname='" . $_POST[ 'Authorname' ]. "', Authodiscrition='" . $_POST[ 'Authodiscrition' ]. "' , Articalimage='" . $_POST[ 'Articalimage' ]. "', reg_date='" . $_POST[ 'reg_date' ]. "' where id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:home.php');
	}
}
$pdo_statement = $pdo_conn->prepare("SELECT * FROM yearenderdata where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<html>
<head>
<title>Update Record</title>
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
<h1 class="demo-form-heading">Update Record</h1>
<form name="frmAdd" action="" method="POST">
  <div class="demo-form-row">
	  <label>Title: </label><br>
	  <input type="text" name="title" class="demo-form-field" value="<?php echo $result[0]['title']; ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Author Name: </label><br>
	  <textarea name="Authorname" class="demo-form-field"  required ><?php echo $result[0]['Authorname']; ?></textarea>
  </div>
  <div class="demo-form-row">
	  <label>Author Discrition: </label><br>
	  <input type="text" name="Authodiscrition" class="demo-form-field" value="<?php echo $result[0]['Authodiscrition']; ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Artical Image: </label><br>
	  <input type="text" name="Articalimage" class="demo-form-field" value="<?php echo $result[0]['Articalimage']; ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Date: </label><br>
	  <input type="date" name="reg_date" class="demo-form-field" value="<?php echo $result[0]['reg_date']; ?>" required />
  </div>
  <div class="demo-form-row">
	  <input name="save_record" type="submit" value="Save" class="demo-form-submit">
  </div>
  </form>
</div>
</body>
</html>