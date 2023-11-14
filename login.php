<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" />
    <title>Login</title>
</head>
<body>
    <div class="login-area">
        <form action="proseslogin.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br><br>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <br><br>
            <button class="btn-login" type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>