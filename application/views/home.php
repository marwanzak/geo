<html>
<head>
<title>Home page</title>
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script src="<?= base_url() ?>js/home.js"></script>
<link
	href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"
	rel="stylesheet" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link href="<?= base_url() ?>css/home.css" rel="stylesheet" />

</head>
<body>
	<ul class="main_ul">
		<?php foreach($catagories as $cat){ ?>
		<li class="cat_li"><div class="cat_div">
				<label><?= $cat->cat ?> </label>
			</div>
			<ul class="cat_ul">
				<?php foreach($products as $prod){ 
				 if($cat->id == $prod->cat){?>
				<li class="prod_li"><div id="<?= $prod->id ?>" class="prod_div">
						<label class="product_label"><?= $prod->product ?> </label><label
							class="salary_label"><?= $prod->salary ?> </label>
					</div></li>
				<?php } 
}?>
			</ul></li>
		<?php }?>
	</ul>
	<div class="dialog_div" id="add_cart_dialog">
		<label>Product: </label><input type="text" disabled id="add_cart_prod" />
		<label>Salary: </label><input type="text" disabled
			id="add_cart_salary" /> <label>Description </label>
		<textarea disabled id="add_cart_desc"></textarea>
		<label>Quantity: </label><input type="text" id="add_cart_quantity"
			onkeypress="return isNumberKey(event)" /> <input type="button"
			class="add_cart_but" value="add to cart" />
	</div>
	<div id="cart_div">
		<table id="cart_table">
			<thead>
				<th>Product</th>
				<th>Quantity</th>
				<th>Total Salary</th>
			</thead>
		</table>
	</div>
</body>
</html>
