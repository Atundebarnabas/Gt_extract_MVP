<?php
include ('config/dbconn.php');

$recipient = '';
// Get the value of know_code from the URL parameters
$knowcode = isset($_GET['know_code']) ? trim($_GET['know_code']) : '';

// Get the value of time_generated from the URL parameters
$time_generated = isset($_GET['time_generated']) ? trim($_GET['time_generated']) : '';

$sql = "SELECT * FROM note_to WHERE know_code = '$knowcode'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
while($row=mysqli_fetch_assoc($result)) {
	$recipient = $row['recipient'];
	
}
}
else
{
header("Location: hmmPage.php?No page like this ohhh👍👍👍👍");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkPage</title>
<link rel="stylesheet" href="assets/css/linkpage.css">
<script type="module" src="assets/js/copyVanilla.js"></script>
</head>
<body>
		<iframe id="myIframe" src="views/linkPageView.php?know_code=<?php echo $knowcode; ?>&<?php echo $time_generated; ?>" allow="web-share"></iframe>
		<script>
					var myIframe = document.getElementById('myIframe');
myIframe.addEventListener('load', function () {
    // Handle the received message
    window.addEventListener('message', function (event) {
        try {
            var response = JSON.parse(event.data);

            if (response.status === 'error') {
                window.location.href = 'hmmPage.php?' + response.message;
            }
        } catch (error) {
            console.log('Error:', error);
        }
    });

    // Trigger the iframe content to send the JSON response
    myIframe.contentWindow.postMessage('sendResponse', '*');
});

    </script>
</body>
</html>