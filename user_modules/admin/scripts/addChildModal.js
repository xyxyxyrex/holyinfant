// Get the modal
var modal = document.getElementById("addChildModal");

// Get the button that opens the modal
var addChildBtn = document.getElementById("addChildBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
addChildBtn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Add event listener to the form submission
document.getElementById("addChildForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the form from submitting normally

  // Get the form data
  var formData = new FormData(event.target);

  // Send the form data to the server using fetch API
  fetch('insert_child.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    console.log(data); // Log the server response
    // Close the modal after successful submission
    modal.style.display = "none";
  })
  .catch(error => {
    console.error('Error:', error);
  });
});