<!DOCTYPE html>
<html>
    <head>
        <title>Реєстрація</title>
        <link rel="stylesheet" type="text/css" href="/Messages/pub/css/Style.css" />
    </head>
    <body>
        <form action="/Messages/user/register" method="POST">
            <div><h1>Логін </h1><input id="inputText" name="login" type="text" required></div>
            <div><h1>Пароль </h1><input id="inputText" name="password" type="password" required></div>
            <div><h1>Нікнейм </h1><input id="inputText" name="nickname" type="text" required></div>
            <div><input id="submit" name="register" type="submit" value="Зареєструватися"></div>
        </form>
    </body>
</html>
