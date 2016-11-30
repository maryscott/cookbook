$(document).ready(function(){
	$("input[name$='recipeType']").click(function(){
		var test = $(this).val();
		
		$("span.desc").hide();
		$("#recipeType" + test).show();
	});
});