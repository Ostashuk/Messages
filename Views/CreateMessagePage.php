<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Send message</title>
    </head>

    <body>
        <form action="http://localhost/Messages/Controllers/MessagesController.php" method="GET">
                <input type="submit" name="showMessages" value="Show messages">
        </form>
        <form action="http://localhost/Messages/Controllers/MessagesController.php" method="POST">
            <p><b>Message name</b><br>
                <input type="text" name="name" size="30"></p>
            <p><b>Message text</b><br>
                <textarea name="messageText" cols="30" rows="5" required></textarea></p>
            <p><input type="submit" name="sendMessage" value="Send">
                <input type="reset" value="Clear"></p>
        </form>
     </body>
</html>