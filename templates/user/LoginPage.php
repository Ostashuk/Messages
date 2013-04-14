<!DOCTYPE html>
<html>
    <head>
        <title>Вхід</title>
        <link rel="stylesheet" type="text/css" href="/Messages/pub/css/Style.css" />
    </head>
    <body>
        <form action="/Messages/user/login" method="POST">
            <div><h1>Логін </h1><input id="inputText" name="login" type="text" required></div>
            <div><h1>Пароль </h1><input id="inputText" name="password" type="password" required></div>
            <div><input id="submit" name="signin" type="submit" value="Ввійти"></div>
        </form>
        <form action="/Messages/user/register" method="GET">
            <div><input id="submit" name="registration" type="submit" value="Зареєструватися"></div>
        </form>
    </body>
</html>