<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holy Infant Nursery</title>
</head>

<body>
    <div id="myModal" class="modal">

        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Forgot Account?</h1>
            <h3>Enter your Account Information:</h3>

            <form action="">
                <div class="form-group">
                    <label for="forgot-username">USERNAME</label>
                    <input type="text" placeholder="Username" name="forgot-username" required>
                </div>
                <div class="form-group">
                    <label for="forgot-email">EMAIL</label>
                    <input type="text" placeholder="Email" name="forgot-email" required>
                </div>
                <div class="form-group">
                    <button class="forgot-button">OK</button>
                </div>
            </form>
        </div>

    </div>
    <div class="main-wrapper">
        <div class="form-wrapper">
            <div class="header">
                <img id="logo" src="assets/logo.png" alt="">
                <h2 id="title">Holy Infant Nursery Foundation</h2>
            </div>
            <div class="login-wrapper">
                <form action="login_process.php" method="POST">
                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" placeholder="Password" name="password" required>
                        <div class="forgotpass">
                            <p id="forgotpass" class="forgot" onclick="forgotPassword()">FORGOT PASSWORD?</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
            <a href="register.php" class="reglink">
                <h3 id="create-account_label">CREATE AN ACCOUNT</h3>
            </a>
        </div>
        <div class="splash-wrapper">
            <img src="assets/splash/1.jpg" alt="">
            <img src="assets/splash/2.jpg" alt="">
            <img src="assets/splash/3.jpg" alt="">
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("forgotpass");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
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
    </script>
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