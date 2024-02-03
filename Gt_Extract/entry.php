<!-- Share API -->
<!-- Submit entry data, with loader -->
<!-- encrypt data, add encrypt message -->
<!-- finish index page, button and look -->

<!-- ALL BY GOD'S GRACE AND DOING -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Note_entry_room</title>
	<link rel="stylesheet" href="assets/css/entry.css">
</head>
<body>
	<div class="wrapper">

		<div class="head">
			<div class="page_info">
				<p></p>
			</div>
			<div class="page_title">
				<p>Write a note</p>
			</div>
			<div class="icon">
				<div class="vg" id="sharewebsite">
						<!-- Title: “Share 2 SVG Vector”
								Author: “Software Mansion“— https://www.svgrepo.com/author/Software%20Mansion/
								Source: “svgrepo.com“— https://www.svgrepo.com/
								License: “CC Attribution License”— https://www.svgrepo.com/page/licensing/#CC%20Attribution -->
								<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20 13V17.5C20 20.5577 16 20.5 12 20.5C8 20.5 4 20.5577 4 17.5V13M12 3L12 15M12 3L16 7M12 3L8 7" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
				</div>
			</div>
		</div>
		<div class="body">
			<form action="#" id="form_multi_step" method="post">
				<div class="form_step first active" id="step1" count-data = "1">
					<div class="input_description IDecriptanime">
						<p>Enter the <span>Recipient's</span> name.</p>
					</div>
					<div class="input_box IBoxanime">
						<input class="mandatoryInput" name="recipient" type="text" placeholder="Recipient's name">
					</div>
					<div class="foot">
						<div class="buttons_to_prev first">
							<div class="btn_onThego first BNanime">
								<button class="nextBtn mandatoryBtn" onclick="nextStep()" type="button">Next</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form_step second" id="step2" count-data = "2">
					<div class="input_description IDecriptanime">
						<p>Type in your <span>Note</span> here📝.</p>
					</div>
					<div class="input_box textareaing IBoxanime">
						<textarea class="mandatoryInput" name="note" id="" placeholder="Note in here...."></textarea>
					</div>
					<div class="foot">
						<div class="buttons_to_prev second">
							<div class="btn_onThego BNanimes">
								<button class="prevBtn" onclick="prevStep()" type="button">Back</button>
							</div>
							<div class="btn_onThego BNanime">
								<button class="nextBtn mandatoryBtn" onclick="nextStep()" type="button">Next</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form_step third" id="step3" count-data = "3">
					<div class="input_description IDecriptanime">
						<p>Type in your <span>Name</span> 🫡.</p>
					</div>
					<div class="input_box IBoxanime">
						<input type="text" name="from_who" placeholder="Your name (Optional)....">
					</div>
					<div class="foot">
						<div class="buttons_to_prev third">
							<div class="btn_onThego BNanime">
								<button class="prevBtn" onclick="prevStep()" type="button">Back</button>
							</div>
							<div class="btn_onThego BNanimes">
								<button class="nextBtn" name="submit_note" id="doneBtn">Done</button>
							</div>
						</div>
					</div>
				</div>

				<div class="form_error_place">
					<p></p>
				</div>
			</form>
		</div>
		</div>
	</div>
	<div class="done-loader" id="done_loader">
		<div class="content_modal">
				<div class="up">
					<div class="loader_spin">
						<img src="assets/img/9US9_JOA.gif" alt="Typewriting_effect">
					</div>
				</div>
				<div class="down">
					<p>Hurray!, Putting everything together!</p>
				</div>
				<div class="foot">
					<div class="encrypt_message">
						<p> The 'Name', 'Note' and 'Recipient' data collected are all encrypted for <span>privacy</span> reasons.</p>
					</div>
					<div class="copyright">
						<p>&copy; GreetPulse <?php echo date('Y'); ?></p>
					</div>
				</div>
		</div>
	</div>
	<script>
		// Gabriel Atunde it is a new LIFE in Christ JESUS, Hallelujah; JESUS has taken over your life completely, we would all see GOD'S good work in all things that concerns us all and our live, PEACE,JOY,LOVE and FELLOWSHIP with the HOLYSPIRIT.
		var textAreaParent = document.querySelector('.textareaing');
		var textArea = document.querySelector('.textareaing textarea');

		textArea.addEventListener('input', function() {
			textArea.style.height = 'auto'; // Set height of the textarea to auto , this is 'default'
			textArea.style.height = (textArea.scrollHeight) + 'px'; // Set the height of the textarea to scroll height
			textAreaParent.style.height = (textArea.scrollHeight) + 'px';
		})


   
		// Multi step logic
		let currentStep = 1;
		const formMulti = document.getElementById('form_multi_step');
		const FormStep = document.querySelectorAll('.form_step');
		const countingElement = document.querySelector('.page_info p');
		const formError = document.querySelector('.form_error_place');
		const formErrorText = document.querySelector('.form_error_place p');

		window.addEventListener('popstate', function(event) {
			const state = event.state;
			if(state)
			{
				currentStep = state.step;
				updateStep();
			}
		})
		function nextStep()
		{
			
			if(currentStep < 3)
			{
					currentStep++;
					updateStep();
					// Update the browser's history state
					history.pushState({ step: currentStep}, null, null);
			}
		}

		function prevStep()
		{
			if(currentStep > 1)
			{
					currentStep--;
					updateStep();
					// Update the browser's history state
					history.pushState({ step: currentStep}, null, null);
			}
		}

		updateStep();

		function updateStep()
		{
			const FormStep = document.querySelectorAll('.form_step');
			FormStep.forEach(step => {
				step.classList.remove('active');
			});

			const currentStepElement = document.getElementById(`step${currentStep}`);
			currentStepElement.classList.add('active');
			countingElement.innerHTML = (currentStep + " / 3");
		}

		// Update the browser's history state
		history.replaceState({ step: currentStep}, null, null);


		// Share website to people as GOD wills
		const sharing = document.getElementById('sharewebsite');
		sharing.addEventListener('click', shareWebsite); 

		function shareWebsite()
		{
			if(navigator.share)
			{
				navigator.share({
					title: 'GreetPulse',
					text: 'Send a note of appreciation, encouragement, apologies, and so many more - to Parents, Siblings, Friends, colleagues...',
					url : 'https://greetpulse.000webhostapp.com/entry.php'
				})
				.then(() => console.log('Link has been shared successfuly'))
				.catch((error) => console.error('Error Shraing:', error));
			}
			else
			{
				alert('Web Share API not supported on this browser');
			}
		}

		// Mandatory inputs - btn


	document.addEventListener('DOMContentLoaded', function() {

    const FormStep = document.querySelectorAll('.form_step');
		FormStep.forEach((step, index, array) => {
        const mandatoryInputs = step.querySelectorAll('.input_box .mandatoryInput');
        const mandatoryJInputs = step.querySelectorAll('.input_box input.mandatoryInput');
        const mandatoryButtons = step.querySelectorAll('.btn_onThego .mandatoryBtn');

        mandatoryInputs.forEach(manInputs => {
            manInputs.addEventListener('input', function (e) {
                var val = e.target.value;
                updateButtonState(val, mandatoryButtons);
            });

            updateButtonState(manInputs.value, mandatoryButtons);
        });

						// Add event listener for Enter key press
						step.addEventListener('keydown', function (e) {
    						const focusedElement = document.activeElement;

								if (e.key === 'Enter' && focusedElement.tagName === 'TEXTAREA') {
									e.preventDefault();

									// Handle the 'Enter' key within the textarea
									const cursorPosition = focusedElement.selectionStart;
									const textBeforeCursor = focusedElement.value.substring(0, cursorPosition);
									const textAfterCursor = focusedElement.value.substring(cursorPosition);

									focusedElement.value = textBeforeCursor + '\n' + textAfterCursor;

									// Optionally adjust the cursor position if needed
									focusedElement.setSelectionRange(cursorPosition + 1, cursorPosition + 1);
										textArea.style.height = 'auto'; // Set height of the textarea to auto , this is 'default'
										textArea.style.height = (textArea.scrollHeight) + 'px'; // Set the height of the textarea to scroll height
										textAreaParent.style.height = (textArea.scrollHeight) + 'px';

										// Scroll to the bottom of the textarea
										focusedElement.scrollTop = focusedElement.scrollHeight;
								} 
								else if (e.key === 'Enter' && focusedElement.tagName === 'INPUT' && focusedElement.type !== 'textarea') {
									// Handle the 'Enter' key for form navigation
									e.preventDefault();

									const currentIndex = Array.from(array).indexOf(step);

									// Check if at least one mandatory input in the current step is filled
									const isAnyMandatoryInputFilled = Array.from(mandatoryJInputs).some(input => input.value.trim() !== '');

									if (isAnyMandatoryInputFilled) {
											if (currentIndex < array.length - 1) {
													const nextStep = array[currentIndex + 1];
													const nextStepInputs = nextStep.querySelectorAll('.input_box .mandatoryInput');

													nextStep.classList.add('active');
													step.classList.remove('active');
													nextStepInputs[0].focus(); // Focus on the first input of the next step
											} else {
													// If it's the last step, submit the form
													submitForm(e);
											}
									} else {
											alert('Please fill in at least one mandatory input before proceeding.');
									}
								}
						});
    });


		// Submit entry
		const formMulti = document.getElementById('form_multi_step');
		const dBtn = document.getElementById('doneBtn');
		dBtn.addEventListener('click', submitForm);

		function submitForm(event)
		{
			 event.preventDefault();
			
			 showLoader();

		 setTimeout(function() {
			
			// Get FORM data
			var formData = new FormData(formMulti);

			// Explicitly append the 'submit_note' parameter
			formData.append('submit_note', 'submit_data');

			// Send data via ajax (vanilla javascript)
			var jis = new XMLHttpRequest();
			jis.open('POST', 'function/entrySend.php',true);

			jis.addEventListener('readystatechange', function() {
				  if(jis.readyState == 4)
					{
						// Hide the loader(submitting form)
						hideLoader();


						//Check status code
						if(jis.status == 200)
						{

							// Handle the response from the server.
							var response = JSON.parse(jis.responseText);
							console.log("Submitting data: ", response);

							if(response.status === 'Success')
							{
										// Reload to linkpage.php, to copy generated custom link
										window.location.replace('linkpage.php?know_code='+response.know_code+'&time_generated='+response.time_generated);
										console.log('Message: ', response.message);
							}
							else
							{
										console.log('Error ', response.message);

										formError.classList.add('active');
										formErrorText.innerHTML = response.message;

										setTimeout(function(){
												formError.classList.remove('active');
										}, 3000);
							}
						}
						else
						{
							console.error('Error', jis.status, jis.statusText);
						}
					}
			});
			    // Log if there's an error opening the request
					jis.addEventListener('error', function () {
        			console.error('Error opening the request.');
					});

					// Log if the request times out
					jis.addEventListener('timeout', function () {
							console.error('Request timed out.');
					});

					// Set a timeout for the request (adjust as needed)
					jis.timeout = 10000; // 10 seconds

				jis.send(formData);
		  }, 4000)
		}


		function showLoader()
		{
			document.getElementById('done_loader').style.display = 'flex';
		}

		function hideLoader()
		{
			document.getElementById('done_loader').style.display = 'none';
		}
			
		});

		function updateButtonState(value, buttons)
		{
				
			buttons.forEach(button => {
						if(value === "")
						{
							button.classList.add('disabled');
							button.disabled = true;
						}
						else
						{
							button.classList.remove('disabled');
							button.disabled = false;
						}
			});
		}
	</script>
</body>
</html>