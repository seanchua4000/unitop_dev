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
			});
		});
$.ajax({
	url: "list_province.php",
	success: function(result)
	{
		$("#locations").html(result);
		$(".plus_icon").click(function() {
			var id = $("input.plus_icon[type=hidden]").val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "list_municipality.php",
				data: dataString,
				cache: false,
				success: function(result)
				{
					$("#locations").html(result);
				}
			})

		});
	}
})
