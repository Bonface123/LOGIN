<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Forgot Password</h1>
    <form action="reset_password.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html>
