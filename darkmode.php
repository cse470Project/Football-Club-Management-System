
<style>
	
		button {
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 18px;
			font-weight: bold;
			cursor: pointer;
			margin-right: 10px;
		}

		.light-mode {
			background-color: #fff;
			color: #333;
		}

		.dark-mode {
			background-color: #333;
			color: #fff;
		}
	</style>
	
	<form method="post" action="">
		<button type="submit" name="mode" value="light">Light Mode</button>
		<button type="submit" name="mode" value="dark">Dark Mode</button>
	</form>
	
	<?php
		if (isset($_POST['mode'])) {
			if ($_POST['mode'] == 'light') {
				setcookie('mode', 'light', time() + (86400 * 30), "/"); // 30 days
			} else {
				setcookie('mode', 'dark', time() + (86400 * 30), "/"); // 30 days
			}
			header("Refresh:0"); // Reload the page
		}
	?>

