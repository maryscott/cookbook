<?php
echo '<div id="title" class="clearfix">';
		
		
	if (empty($_SESSION['logged_in'])){
		echo '<form action="login.php" id="login">
			<input type="submit" value="Log In" />
			</form>';
	} else {
		echo '<form action="logout_handler.php" id="login">
			<input type="submit" value="Log Out" />
			</form>';
	}	
		
echo '<img src="favicon.png" alt="book" style="float:left;width:60px" id="logo">
		<h1>Spindles Cookbook</h1>
	</div>

	<div>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="search.php">Search</a></li>
			<li><a href="browse.php">Browse</a></li>
			<li><a href="add_a_recipe.php">Add a Recipe</a></li>
			<li><a href="account.php">My Account</a></li>
			<li><a href="suggestions.php">Suggestions</a></li>
		</ul>
	</div>
';
