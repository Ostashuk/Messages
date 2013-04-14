<!DOCTYPE html>
<html>
    <head>
        <title>Головна сторінка</title>
        <link rel="stylesheet" type="text/css" href="/Messages/pub/css/Style.css" />
    </head>
    <body>
        <h2>Ви: <?php echo $_SESSION["nickname"] ?></h2>
        <form action="/messages/message/write" method="GET">
            <div><input id="submit" type="submit" name="write" value="Написати"></div>
        </form>
        <form action="/Messages/message/list" method="GET">
            <div><input id="submit" type="submit" name="list" value="Список"></div>
        </form>
        <form action="/Messages/user/logout" method="GET">
            <div><input id="submit" type="submit" name="logout" value="Вийти"></div>
        </form>
    </body>
</html>
