<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sign.php" method="post">
        <input type="text" name="user" placeholder="Username" />
        <input type="password" name="pass" placeholder="Password" />
        <button type="submit" name="submit"></button>
    </form>

    <form action="signup.php" method="post">
        <input type="text" name="user" placeholder="Username" />
        <input type="email" name="email" placeholder="Username" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="repeat" placeholder="Repita el Password" />
        <button type="submit" name="submit"></button>
    </form>
</body>
</html>