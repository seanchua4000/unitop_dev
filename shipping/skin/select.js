$("#select_all").change(function(){
	$(".checkbox").prop('checked', $(this).prop("checked"));
});

$('.checkbox').change(function(){
	if(false == $(this).prop("checked")){
		$("#select_all").prop('checked', false);
	}

	if($('.checkbox:checked').length == $('.checkbox').length){
		$("#select_all").prop('checked', true);
	}
});