/*var update_status = function() {
	if($("#main_status").is(":checked")) {
		$(".sub_status").prop("disabled", false);
	} else {
		$(".sub_status").prop("disabled", "disabled");
		$(".sub_status").prop("checked", false);
	}
}
$("#main_status").change(update_status);*/
$.ajax({
	url: "status.php",
	success: function(result)
	{
		$("#main_status").html(result);
	}
});

$.ajax({
	url: "type_fees.php",
	success: function(result)
	{
		$(".fee_type").html(result);
	}
});

$.ajax({
	url: "list_kmfee.php",
	success: function(result)
	{
		$("#km_price").html(result);
	}
});

$.ajax({
	url: "list_shipfee.php",
	success: function(result)
	{
		$("#ship_fee").html(result);
	}
});