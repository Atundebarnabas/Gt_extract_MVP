
var to = document.querySelector('.to');
var note = document.querySelector('.note_itself');
var from_who = document.querySelector('.from');
var r = 0;
var n = 0;
var s = 0;
var recipient = to.getAttribute('data-rich');
var noteITS = note.getAttribute('data-rich');
var from = from_who.getAttribute('data-rich');
var rspeed = 100;
var nspeed = 80; //80
var sspeed = 100;


// Replace <br> tags with newline characters
const decryptedText = noteITS.replace(/\\r\\n/g, "\n");

function typeWriter()
{
if(r < recipient.length)
{
      to.innerHTML += recipient.charAt(r);
      r++;
      setTimeout(typeWriter, rspeed);
}
else if(n < decryptedText.length)
{
      note.innerHTML += decryptedText.charAt(n);
      n++;
      setTimeout(typeWriter, nspeed);
}
else if(s < from.length)
{
      from_who.innerHTML += from.charAt(s);
      s++;
      setTimeout(typeWriter, sspeed);
}
}


typeWriter();



var lastContentHeight = document.getElementById('wrap').scrollHeight;

    // Function to scroll to the bottom of the page
    function scrollToBottom() {
        window.scrollTo(0, document.getElementById('wrap').scrollHeight);
    }

    // Test: Add content dynamically every 2 seconds
    setInterval(function () {
        var wrap = document.getElementById('wrap');

        // Record the previous content height
        var previousContentHeight = lastContentHeight;

        // Add new content
        
        // Update the last content height
        lastContentHeight = wrap.scrollHeight;

        // Check if new content was added (height increased)
        if (wrap.scrollHeight > previousContentHeight) {
            // Scroll to the bottom of the page
            scrollToBottom();
        }
    }, 2000);