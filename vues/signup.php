<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
    <?php
     include("../header/headerco.php");

     ?>

    <div class="overlay">
        <form method="POST">
            <div class="con">
                <header class="head-form">
                    <h2>Signup</h2>
                    <p>Inscrivez-vous pour accéder à votre espace personnel</p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input class="form-input" id="txt-input" type="text" name="pseudosign" placeholder="Username" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input class="form-input" type="email" name="emailsign" placeholder="Email" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input class="form-input" type="password" placeholder="Password" id="pwd" name="passwordsign" required>
                    <span>
                        <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                    </span>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input class="form-input" type="password" name="confirmpasswordsign" placeholder="Confirm Password" id="confpwd" name="confirmpassword" required>
                    <span>
                    </span>
                    <br>
                    <button class="log-in" name="loginsign">Signup</button>
                </div>

                <div class="other">
                    <button class="btn submits sign-up" name="signup" onclick="window.location.href='../'">Login
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </button>
                </div>
                <?php if (isset($message)) { echo "<p class='error'>$message</p>"; } ?>
            </div>
        </form>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>

