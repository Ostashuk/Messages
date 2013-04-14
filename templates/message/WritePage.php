<!DOCTYPE HTML>
<html>
    <head>
        <title>Написати</title>
        <link rel="stylesheet" type="text/css" href="/Messages/pub/css/Style.css" />
    </head>
    <body>
        <h2>Ви: <?php echo $_SESSION["nickname"] ?></h2>
        <form action="/Messages/message/list" method="GET">
            <div><input id="submit" type="submit" name="list" value="Список"></div>
        </form>
        <form action="/Messages/user/logout" method="GET">
            <div><input id="submit" type="submit" name="logout" value="Вийти"></div>
        </form>
        <form action="/Messages/message/write">
            <div id="div2">
                <h1>Тема: </h1><input id="inputText2" type="text" name="theme">
            </div>
        </form>
    </body>
</html>