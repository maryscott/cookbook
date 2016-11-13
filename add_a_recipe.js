$(document).ready(function(){
	$("input[type=radio]").on('change',function(){
		var n = $(this).val();
		switch(n)
		{
			case '1':
				$('#show').html("URL: <input type="url" name="homepage"><br>");
				break;
			case '2':
				$('#show').html("Select a file: <input type="file" name="img"><br>");
				break;
			case '3'
				$('#show').html("Recipe: <textarea rows="10" cols="100" name="recipeInput">Type in your recipe here.</textarea><br>");
				break;
		}
		
	});
});