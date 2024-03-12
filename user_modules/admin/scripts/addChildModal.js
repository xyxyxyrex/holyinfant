var modal = document.getElementById("addChildModal");

var addChildBtn = document.getElementById("addChildBtn");

var span = document.getElementsByClassName("close")[0];

addChildBtn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementById("addChildForm").addEventListener("submit", function(event) {
  event.preventDefault(); 
  var formData = new FormData(event.target);

  fetch('insert_child.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    console.log(data); 
 
    modal.style.display = "none";
  })
  .catch(error => {
    console.error('Error:', error);
  });
});