<!DOCTYPE html>
<html lang="en">
<head>
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<link
	href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"
	rel="stylesheet" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?= base_url() ?>js/home.js"></script>
<link href="<?= base_url() ?>css/home.css" rel="stylesheet"/>
<meta charset="utf-8">
<title>Admin page</title>
</head>
<body>
	<?php 
	$tmpl = array ( 'table_open'  => '<table class = "content_table"
			cellpadding = "8" cellspacing = "3" align = "center">'
	);
	$this->table->set_template($tmpl);
	$this->table->set_heading($headings);

	if(count($rows)==0)
		$this->table->add_row("No inputs");
	foreach($rows as $row){
		$this->table->add_row($row);
	}
	echo $this->table->generate();
	if($table == "products"){
	?>
	<input type="button" id="add_product_but" value="add product" />
	<div id="add_product_dialog" class="dialog_div">
		<form id="product_add_form" method="POST"
			action="/geo/home/insertProduct">
			Catagory: <select id="product_catagories_select" name="catagory">
				<option value="">Choose catagory</option>
				<?php 
				foreach($catagories as $catagory){
	?>
				<option value="<?= $catagory->id?>">
					<?= $catagory->cat ?>
				</option>
				<?php }?>
			</select> Product: <input type="text" name="product" id="add_product_name" />
			Salary: <input type="number" name="salary" id="add_product_salary" onkeypress="return isNumberKey(event)" /> <input
				type="submit" value="add" class="add_but" />
		</form>
	</div>
	<?php }
	if($table == "catagories"){
		?>
	<input type="button" id="add_catagory_but" value="add catagory" />

	<div id="add_catagory_dialog" class="dialog_div">
		<form id="catagory_add_form" method="POST"
			action="/geo/home/insertCatagory">
			Catagory: <input type="text" name="catagory" id="add_catagory_name" /> <input
				type="submit" value="add" class="add_but" />
		</form>
	</div>
	<?php }?>
</body>
</html>
