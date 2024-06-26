<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <style>
        .back-button{
            top: 10px;
            left: 10px;
            font-size: 40px;
            cursor: pointer;
            margin-right:20px;
        }
        .back-button:hover{
            transition:0.2s;
            color:#00ccff;

        }
        a{
            text-decoration:none;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <meta charset="utf-8">
    <a href="index.php"><span class="back-button"> < </span></a>
    <title>Create an Account</title>
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <header>Create an Account</header>
        <div class="progress-bar">
            <div class="step">
                <p>
                    Name
                </p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Contact
                </p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Birth
                </p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Submit
                </p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="form-outer">
            <form action="register_process.php" method="POST" enctype="multipart/form-data">
                <div class="page slide-page">
                    <div class="title">
                        Basic Info:
                    </div>
                    <div class="field">
                        <div class="label">
                            First Name
                        </div>
                        <input type="text" name="firstname" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            Last Name
                        </div>
                        <input type="text" name="lastname" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            User Role
                        </div>
                        <select name="user_role" required>
                            <option value="director">Director</option>
                            <option value="bookkeeper">Bookkeeper</option>
                            <option value="housekeeper">Housekeeper</option>
                        </select>
                    </div>
                    <div class="field">
                        <button class="firstNext next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Contact Info:
                    </div>
                    <div class="field">
                        <div class="label">
                            Email Address
                        </div>
                        <input type="text" name="email" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            Address
                        </div>
                        <input type="text" name="address" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            Phone Number
                        </div>
                        <input type="number" name="contact_number" required>
                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Date of Birth:
                    </div>
                    <div class="field">
                        <div class="label">
                            Date
                        </div>
                        <input type="date" name="birthdate" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            Gender
                        </div>
                        <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev">Previous</button>
                        <button class="next-2 next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Login Details:
                    </div>
                    <div class="field">
                        <div class="label">
                            Username
                        </div>
                        <input type="text" name="username" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            Password
                        </div>
                        <input type="password" name="password" required>
                    </div>
                    <div class="field">
                        <div class="label">
                            Profile Picture
                        </div>
                        <input type="file" accept="image/*" name="profile_picture" required>
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev">Previous</button>
                        <button class="submit">Submit</button>
                    </div>
                </div>

        </div>
        </form>
    </div>
    </div>
    <script src="scripts/script.js"></script>
</body>

</html>