<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holy Infant Nursery</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="form-wrapper">
            <div class="header">
                <img id="logo" src="assets/logo.png" alt="">
                <h2 id="title">Holy Infant Nursery Foundation</h2>
            </div>
            <div class="login-wrapper">
                <form action="login_process.php" method="post">
                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="splash-wrapper">
            <img src="assets/splash/1.jpg" alt="">
            <img src="assets/splash/2.jpg" alt="">
            <img src="assets/splash/3.jpg" alt="">
        </div>
        <script>
            const splashWrapper = document.querySelector('.splash-wrapper');
            const images = document.querySelectorAll('.splash-wrapper img');

            let currentIndex = 0;

            function showImage(index) {
                const offset = index * -100;
                images.forEach((img) => {
                    img.style.transform = `translateX(${offset}%)`;
                });
            }

            function nextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                showImage(currentIndex);
            }

            setInterval(() => {
                nextImage();
            }, 3000);
        </script>
    </div>
</body>

</html>