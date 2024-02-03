
// var copy_btn = document.getElementById('copyBtn');

// copy_btn.addEventListener('click', function()  {
//      var texttcopy = document.getElementById('texttcopy').innerText;
//      navigator.clipboard.writeText(texttcopy)
//      .then(function() {
//             alert('The link has been copied to the clipboard😂😂');
//      })
//      .catch(function() {
//             alert('An error occured when copying the link to the clipboard😂😂');
//      });
// });

// var copier = document.querySelector('.copier');

// copier.addEventListener('click', function() {
//     var shareLink = copier.getAttribute('data-link');
    
//     // Create a temporary input element
//     var tempInput = document.createElement('input');
//     tempInput.value = shareLink;
    
//     // Append the input to the DOM
//     document.body.appendChild(tempInput);
    
//     // Select the input's content
//     tempInput.select();
    
//     // Execute the copy command
//     document.execCommand('copy');
    
//     // Remove the input from the DOM
//     document.body.removeChild(tempInput);

//     alert('The link has been copied to the clipboard😂😂.');
// });



const sharingButton = document.querySelector('.sharing');

if (sharingButton) {
  sharingButton.addEventListener('click', async () => {
    try {
      if (navigator.share) {
        await navigator.share({
          title: 'Title',
          text: 'Text',
          url: sharingButton.getAttribute('data-link'),
        });
      } else {
        throw new Error('Web Share API not supported');
      }
    } catch (err) {
       document.querySelector(
              'pre'
            ).textContent += `${err.name}: ${err.message}\n`;
          }
        });
}        
