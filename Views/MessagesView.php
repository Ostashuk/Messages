<?php

require_once '../Database/DatabaseComponent.php';
$database = DatabaseComponent::getInstance();
$messages = $database->selectAll(array("id", "name", "short_text", "creating_date", "editing_date"));

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Message list</title>
    </head>
    <body>
        <form action="http://localhost/Messages/Controllers/MessagesController.php" method="GET">
            <input name="createMessage" type="submit" value="Create message">
        </form><br>
        <table border="1">
            <?php foreach ($messages as $row){?>
            <tr>
                <td>
                    <p><b>Name: </b><?php echo $row["name"] ?><br>
                    <b>Text: </b><?php echo $row["short_text"] ?><br>
                    <b>Creating date: </b><?php echo $row["creating_date"] ?><br>
                    <b>Last editing date: </b><?php echo $row["editing_date"] ?></p>
                </td>
                <td>
                    <form action="http://localhost/Messages/Views/EditMessagePage.php" method="POST">
                        <input type="submit" name="editMessage" value="Edit"><br>
                        <input type="hidden" name="messageId" value="<?php echo $row["id"] ?>"> 
                    </form>
                    <form action="http://localhost/Messages/Controllers/MessagesController.php" method="POST">
                        <input type="submit" name="deleteMessage" value="Delete">
                        <input type="hidden" name="messageId" value="<?php echo $row["id"] ?>"> 
                    </form>
                </td>
            </tr>
            <?php
                }

            ?>
        </table>
    </body>
</html>
