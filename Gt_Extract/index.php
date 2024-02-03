<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to gt_Extract</title>
	<link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
	<main>
				<div class="img_spin">
							<img src="assets/img/5vyH_JOA.gif" alt="Nothing here">
				</div>
				<div class="all_text">
							<p class="h_text">Nothing here 😉</p> 
							<p>To use '<i>Gt_Extract</i>' a custom link must be shared to you or you can create a note also.</p>
				</div>
				<div class="c_btn">
					<button class="to_entry">Create a new note</button>
				</div>
	</main>

	<script>
		var btn_to_click =  document.querySelector('.to_entry');

		btn_to_click.addEventListener('click', async () => {
			window.location.href = 'entry.php';
		});
	</script>
</body>
</html>