<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page.css">
</head>
<body>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content">
		<div class="clearfix">
			<form action="demo_form.asp" id="search">
				<input type="text" name="fname"><br>
				<input type="submit" value="Search">
			</form>
		</div>
		
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
