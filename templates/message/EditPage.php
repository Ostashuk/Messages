<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit message</title>
    </head>
    <body>
        <form action="http://localhost/Messages/Controllers/MessagesController.php" method="GET">
            <input name="createMessage" type="submit" value="Create message">
            <input name="showMessages" type="submit" value="Show messages">
        </form>
        <form action="http://localhost/Messages/Controllers/MessagesController.php" method="POST">
            <p><b>Message name</b><br>
                <input type="text" name="name" size="30" value="<?php echo $message["name"] ?>"></p>
            <p><b>Message text</b><br>
                <textarea name="messageText" cols="30" rows="5"><?php echo $message["full_text"] ?></textarea></p>
            <p><input type="submit" name="saveMessage" value="Save">
                <input type="hidden" name="messageId" value="<?php echo $messageId ?>">
                <input type="reset" value="Cancel"></p>
        </form>
     </body>
</html>