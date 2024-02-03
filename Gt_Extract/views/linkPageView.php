<?php

include ('../config/dbconn.php');
include('../function/function_room.php');
// Initialize recipient variable
$recipient = '';
// Get the value of know_code from the URL parameters
$knowcode = isset($_GET['know_code']) ? trim($_GET['know_code']) : '';

//echo "know_code: " . $_GET['know_code'];

// Get the value of time_generated from the URL parameters
$time_generated = isset($_GET['time_generated']) ? trim($_GET['time_generated']) : '';

$sql = "SELECT * FROM `note_to` WHERE know_code = '$knowcode'";
$result = mysqli_query($con, $sql);


if(mysqli_num_rows($result) > 0)
{
	while($row=mysqli_fetch_assoc($result)) {
		$privateKey = '1f4276388ad3214c873428dbef42888A' ; //some random hex characters

		$recipient = decrypt($row['recipient'], $privateKey);
	}
}

else {
	$response = array(
			'status' => 'error',
			'message' => 'No page like this ohhh👍👍👍👍',
			'knowcode' => $recipient
	);
	echo json_encode($response, JSON_UNESCAPED_UNICODE);
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkPage</title>
<link rel="stylesheet" href="../assets/css/linkpage.css">
<script type="module" src="../assets/js/copyVanilla.js"></script>
<script>
    // Send JSON response to the parent window using postMessage
    var response = <?php echo json_encode($response); ?>;
    window.parent.postMessage(JSON.stringify(response), '*');
</script>
</head>
<body>
	<div class="modal">
			<main>
						<div class="just_note">
									This is the link to share with <?php echo $recipient; ?>
						</div>
						<div class="link_itself">
									<p>'<span id="texttcopy">https://greetpulse.000webhostapp.com/new_note.php?knowcode=<?php echo $knowcode; ?></span>'</p>
						</div>

						<div class="copy_button">
							<button id="copyBtn" class="copier"><p>Copy link</p></button>
							<button id="copyBtn" class="sharing" to-who="<?php echo $recipient; ?>" data-link="https://greetpulse.000webhostapp.com/new_note.php?knowcode=<?php echo $knowcode; ?>">
								<div class="iconvg">
									<!-- Title: “Share 2 SVG Vector”
											Author: “Software Mansion“— https://www.svgrepo.com/author/Software%20Mansion/
											Source: “svgrepo.com“— https://www.svgrepo.com/
											License: “CC Attribution License”— https://www.svgrepo.com/page/licensing/#CC%20Attribution -->
											<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M20 13V17.5C20 20.5577 16 20.5 12 20.5C8 20.5 4 20.5577 4 17.5V13M12 3L12 15M12 3L16 7M12 3L8 7" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
								</div>
								<p>Share</p>
							</button>
						</div>
						<!-- <pre></pre> -->
			</main>
	</div>

</body>
</html>