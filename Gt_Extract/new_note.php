<?php
include('config/dbconn.php');
include('function/function_room.php');
if(isset($_GET['knowcode']))
{
	$knowcode = $_GET['knowcode'];
  mysqli_set_charset($con, 'utf8mb4');
	$sql = "SELECT * FROM note_to WHERE know_code = '$knowcode'";
	$results = mysqli_query($con, $sql);

	if(mysqli_num_rows($results) > 0)
	{
		$row = mysqli_fetch_assoc($results);
			
			$privateKey = '1f4276388ad3214c873428dbef42888A' ; //some random hex characters

			$recipient = decrypt($row['recipient'], $privateKey);
			$from = decrypt($row['from_who'], $privateKey);
			$note_DITS = decrypt($row['note'], $privateKey);

			$note_ITS = str_replace('<br>', "\n", $note_DITS);

	}
	else
	{
		header("location: hmmPage.php?Invalid request");
		exit(0);	
	}
}
else {
	header("location: hmmPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="GreetPulse">
<meta property="og:description" content="Send a note of appreciation, encouragement, apologies, and so many more - to Parents, Siblings, Friends, colleagues...">
<meta property="og:image" content="https://images.unsplash.com/photo-1527345931282-806d3b11967f?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
<meta property="og:url" content="https://greetpulse.000webhostapp.com">
<meta property="og:type" content="website">
<title>Note_to_you_for_you</title>
<link rel="stylesheet" href="assets/css/note.css">
</head>
<body>
<div id="wrap" class="wrapper">
<header>
		<div class="note_title">
			<p>A note to <?php echo $recipient ?></p>
		</div>
</header>
<main>
	<div class="main-note">
		<span>
				<h4 class="recipient to" data-rich = "Dear <?php echo $recipient ?>, "></h4>
				<p class="note_itself" data-rich="<?php echo $note_ITS; ?>"></p>
				<!-- <p class="">I hope this letter brings you joy and excitement for the New Year. As we welcome another year of possibilities, I want to express my gratitude for the wonderful friendship we share. May the upcoming year be filled with prosperity, laughter, and all the happiness life has to offer.<p>

				<p class="">In the spirit of the New Year, I pray for an overflow of God's love in our lives, guiding us with wisdom, sparking creativity, and enhancing our productivity in everything we do.</p>

				<p class="">Wishing you a Happy New Year, Fanny! Looking forward to the adventures and moments we'll create together.</p>

				<p class="">Warm regards,</p>-->

				<p class="from" data-rich="<?php echo $from; ?>."></p>
		</span>
	</div>
</main>
<footer>
	<div class="h">
		<p><span>from</span>gT_Extract.</p>
	</div>
	<div class="f">
		<p>GT <?php echo date('Y'); ?></p>
	</div>
</footer>
</div>
<script src="assets/js/typingEffect.js"></script>
</body>
</html>