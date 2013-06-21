$(document).ready(function(){
	$("#add_catagory_but").on("click", function(){
		openDialog("add_catagory_dialog", 400);
	});
	$("#add_product_but").on("click", function(){
		openDialog("add_product_dialog", 400);
	});
	$(".cat_div").on("click", function(){
		$(this).parent().parent().find("ul").hide("fade");
		$(this).parent().find("ul").show("fade");
	});
	$(".prod_div").on("click", function(){
		$.ajax({
			url:"/geo/home/getProduct",
			dataType:"json",
			type:"post",
			data:{id:this.id}
		})
		.done(function(data){
			$("#add_cart_prod").val(data.product);
			$("#add_cart_desc").val(data.desc);
			$("#add_cart_salary").val(data.salary);
			openDialog("add_cart_dialog", 400);

		});
		
	});
	
	$(".add_cart_but").on("click", function(){
		$("<tr></tr>").appendTo("#cart_table");
		$("<td></td>").appendTo("#cart_table tr:last");
		$("#cart_table td:last").html($("#add_cart_prod").val());
		$("<td></td>").appendTo("#cart_table tr:last");
		$("#cart_table td:last").html($("#add_cart_quantity").val());
		$("<td></td>").appendTo("#cart_table tr:last");
		$("#cart_table td:last").html($("#add_cart_quantity").val()*$("#add_cart_salary").val());
		
	});
	
	$(".add_cart_but").on("click", function(){

	});

});
//open dialog function.
function openDialog(dialog,dwidth){
	$( "#"+dialog ).dialog({ autoOpen: false, draggable: true,
		modal: true, resizable: false,
		show: { effect: 'drop', direction: "up" } ,
		width: dwidth } );	
	$("#"+dialog).dialog("open");
}

//function to make input text type only numbers.
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

	return true;
}