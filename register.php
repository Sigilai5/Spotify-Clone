<?php
include ("includes/classes/Account.php");

    $account = new Account();


include ("includes/handlers/register-handler.php");
include ("includes/handlers/login-handler.php");

?>

<html>
<head>
    <title>Welcome to Spotify</title>
</head>
<body>

<div id="inputContainer">
<form id="loginForm" action="register.php" method="POST">
    <h2>Login To your account!</h2>
    <p>

        <label for="loginUsername">Username</label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>

    </p>

    <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" name="loginPassword" type="password" required>
    </p>

    <button type="submit" name="loginButton">LOG IN</button>

</form>


    <form id="registerForm" action="register.php" method="POST">
        <h2>Register To your account!</h2>
        <p>
            <?php echo $account->getError("Username must be between 5 to 25 characters");?>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username" required>

        </p>
        <p>
            <?php echo $account->getError("First Name must be between 2 to 25 characters");?>
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="First Name" required>

        </p>
        <p>
            <?php echo $account->getError("Last Name must be between 2 to 25 characters");?>
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="Last Name" required>

        </p>
        <p>
            <?php echo $account->getError("Your Emails don't match!");?>
            <?php echo $account->getError("Email is invalid!");?>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Email" required>

        </p>
        <p>
            <label for="confirmEmail">Confirm Email</label>
            <input id="confirmEmail" name="email2" type="email" placeholder=" Confirm Email" required>

        </p>

        <p>
            <?php echo $account->getError("Your Passwords don't match!");?>
            <?php echo $account->getError("Your Password can only contain numbers and letters");?>
            <?php echo $account->getError("Your password should contain 5 and 30 characters");?>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="password" type="password" placeholder="Password" required>
        </p>
        <p>
            <label for="confirmPassword">Confirm Password</label>
            <input id="confirmPassword" name="password2" type="password" placeholder="Password" required>
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>

    </form>

</div>


</body>

</html>
