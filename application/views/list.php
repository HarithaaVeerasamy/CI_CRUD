<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;

	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}


	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.table{
		width: 80% !important;
		margin-left: 100px;
	}
	</style>
</head>
<body>

<div id="container">
	<h1> Employee List</h1>
	<a href="<?php echo site_url('Welcome/add'); ?>" class="btn btn-primary pull-right">Add Emp</a>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Date of Birth</th>
				<th>Age</th>
				<th>CV</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php  foreach ($list as $value) {
			?>
			<tr>
				<td><?= $value['id'] ?></td>
				<td><?= $value['name'] ?></td>
				<td><?= $value['age'] ?></td>
				<td><?= $value['date_of_birth'] ?></td>
				<td><a href="<?=base_url ()."index.php/Welcome/download/".$value['cv']?>">Resume Download</td>
				<td><a href="<?=base_url ()."index.php/Welcome/edit/".$value['id']?>" class="btn btn-default">Edit</a>
					<a href="<?=base_url ()."index.php/Welcome/delete/".$value['id']?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			} ?>
		</tbody>
	</table>
</div>

</body>
</html>