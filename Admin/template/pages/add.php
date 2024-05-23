<?php 
require('function.php');
if(!isset($_SESSION['login'])){
  header('Location: sign-in.php');
}
?>
<?php
require_once ('../../../config/dbhelper.php');

$id = $name = '';
if(!empty($_POST)) {
	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$name = str_replace('"', '\\"', $name);
	}
	if(isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if(!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//luu vao database
		if($id == '') {
			$sql = 'insert into category(name, created_at, updated_at) 
		    values ("'.$name.'", "'.$created_at.'", "'.$updated_at.'")'
		    ;
		} else {
			$sql = 'update category set name = "'.$name.'", updated_at = "'.$u.'" where id = '.$id;
		}
		
		    execute($sql);

		    header('Location: index.php');
		    die();
	}

}


if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = 'select * from category where id = '.$id;
	$category = executeSingleResult($sql);
	if($category != null) {
		$name = $category['name'];
	}
}
?>

<?php 
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <title>
   Thêm danh mục
  </title>
	<div class="container" style="margin-top:110px;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Danh Mục:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>				
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>						
		</div>
	</div>
  </div>
</body>
<?php 
include ('footer.php');
?>
</html>