const listViewBtn = document.getElementById('listView');
        const cardViewBtn = document.getElementById('cardView');
        const itemContainer = document.querySelector('.item-container');
        const previewImage = document.getElementById('previewImage');
        const childPictureInput = document.getElementById('childPicture');

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
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        showListView();