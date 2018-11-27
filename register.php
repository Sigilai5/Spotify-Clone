<?php
include ("includes/config.php");
include ("includes/classes/Account.php");
include ("includes/classes/Constants.php");

$account = new Account($con);


include ("includes/handlers/register-handler.php");
include ("includes/handlers/login-handler.php");

function getInputValue($name){
    if (isset($_POST[$name])){
        echo $_POST[$name];
    }
}

?>

<html>
<head>
    <title>Jukwaa</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/js.js"></script>
</head>
<body>
<?php
if(isset($_POST['registerButton'])){
    echo '<script>
    $(document).ready(function() {
      $("#loginForm").hide();
      $("#registerForm").show();
    });
    </script>';
}
else{
    echo '<script>
    $(document).ready(function() {
      $("#loginForm").show();
      $("#registerForm").hide();
    });
    </script>';
}



?>




<div id="background">
    <div id="loginContainer">
<div id="inputContainer">
<form id="loginForm" action="register.php" method="POST">
    <h2>Login To your account!</h2>
    <p>
        <?php echo $account->getError(Constants::$loginFailed);?>
        <label for="loginUsername">Username</label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" value="<?php getInputValue('loginUsername')?>" required>

    </p>

    <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
    </p>

    <button type="submit" name="loginButton">LOG IN</button>

    <div class="hasAccountText">
        <span id="hideLogin">Don't have an account? Signup here.</span>
    </div>

</form>


    <form id="registerForm" action="register.php" method="POST">
        <h2>Register To your account!</h2>
        <p>
            <?php echo $account->getError(Constants::$usernameCharacters);?>
            <?php echo $account->getError(Constants::$usernameTaken);?>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username" value="<?php getInputValue('username')?>" required>

        </p>
        <p>
            <?php echo $account->getError(Constants::$firstNameCharacters);?>
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="First Name" value="<?php getInputValue('firstName')?>" required>

        </p>
        <p>
            <?php echo $account->getError(Constants::$lastNameCharacters);?>
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="Last Name" value="<?php getInputValue('username')?>" required>

        </p>
        <p>
            <?php echo $account->getError(Constants::$emailsDoNotMatch);?>
            <?php echo $account->getError(Constants::$emailInvalid);?>
            <?php echo $account->getError(Constants::$emailTaken);?>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Email" value="<?php getInputValue('username')?>" required>

        </p>
        <p>
            <label for="confirmEmail">Confirm Email</label>
            <input id="confirmEmail" name="email2" type="email" placeholder=" Confirm Email" value="<?php getInputValue('username')?>" required>

        </p>

        <p>
            <?php echo $account->getError(Constants::$passwordDoNotMatch);?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
            <?php echo $account->getError(Constants::$passwordCharacters);?>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="password" type="password" placeholder="Password" required>
        </p>
        <p>
            <label for="confirmPassword">Confirm Password</label>
            <input id="confirmPassword" name="password2" type="password" placeholder="Password" required>
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>

        <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Login here.</span>
        </div>

    </form>

</div>

        <div id="loginText">
            <h1>Jukwaa</h1>
        </div>

    </div>

</div>
</body>

</html>
