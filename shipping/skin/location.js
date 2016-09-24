$(document).ready(function()
		{
			$("#province").change(function()
			{
				var id=$(this).val();
				var dataString = 'id='+ id;
				
				$.ajax
				({
					type: "POST",
					url: "municipality_location.php",
					data: dataString,
					cache: false,
					success: function(html)
					{	
						$("#CM").html(html);
						if($('.subplace #CM').find(':selected').length==0)
						{
							$('#BR option').remove();
						}
					}
				});
			});
			$("#CM").change(function()
			{
				var id=$(this).val();
				var dataString = 'id='+ id;
				
				$.ajax
				({
					type: "POST",
					url: "calculate_distance.php",
					data: dataString,
					cache: false,
					success: function(html)
					{	
						$("#distance").html(html);
						var id=$("#distance").val();
						var dataString = 'id='+ id;
				
						$.ajax
						({
							type: "POST",
							url: "calculate_fee.php",
							data: dataString,
							cache: false,
							success: function(html)
							{	
								$("#s_fee").html(html);
							}
						});
					}
				});
			});
			/*
			$("#CM").change(function()
			{
				var id=$(this).val();
				var dataString = 'id='+ id;
				
				$.ajax
				({
					type: "POST",
					url: "barangay_location.php",
					data: dataString,
					cache: false,
					success: function(html)
					{	
						$("#BR").html(html);
					}
				});
			});
			
			$("#BR").change(function()
			{
				var id=$("#CM").val();
				var dataString = 'id='+ id;
				
				$.ajax
				({
					type: "POST",
					url: "calculate_distance.php",
					data: dataString,
					cache: false,
					success: function(html)
					{	
						$("#distance").html(html);
						var id=$("#distance").val();
						var dataString = 'id='+ id;
				
						$.ajax
						({
							type: "POST",
							url: "calculate_fee.php",
							data: dataString,
							cache: false,
							success: function(html)
							{	
								$("#s_fee").html(html);
							}
						});
					}
				});
			}); */
		});

$.ajax({
	url: "list_province.php",
	success: function(result)
	{
		$("#provinces").html(result);
	}
})
