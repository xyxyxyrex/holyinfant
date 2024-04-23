document.addEventListener("DOMContentLoaded", function() {
    const listViewBtn = document.getElementById('listView');
    const cardViewBtn = document.getElementById('cardView');
    const itemContainer = document.querySelector('.item-container');
    const childPictureInput = document.getElementById('profileImage'); // Corrected to select the input element
    const childPicture = document.getElementById('childPicture'); // Added to select the img element for preview

    listViewBtn.addEventListener('click', showListView);
    cardViewBtn.addEventListener('click', showCardView);
    childPictureInput.addEventListener('change', previewChildImage);

    function showListView() {
        listViewBtn.classList.add('active');
        cardViewBtn.classList.remove('active');
        itemContainer.classList.remove('card-view');
    }

    function showCardView() {
        cardViewBtn.classList.add('active');
        listViewBtn.classList.remove('active');
        itemContainer.classList.add('card-view');
    }

    function previewChildImage() {
        const file = childPictureInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                childPicture.src = e.target.result; // Set the source of the img element
                childPicture.style.display = 'block'; // Make sure the img element is visible
            };
            reader.readAsDataURL(file);
        }
    }

    showListView();
});
