<?php
     
if (!empty($_POST)){
    
    if(isset($_POST["sendMessage"])){
        
        require_once('../Models/MessagesModel.php');
        
        $messageModel = new MessagesModel();
        
        $messageModel->setName($_POST["name"]);
        $messageModel->setFullText($_POST["messageText"]);
        $messageModel->setShortText();
        
        echo $messageModel->saveMessage();
                
    }elseif ($_POST["saveMessage"]){
        
        require_once '../Models/MessagesModel.php';
         
        $messageModel = new MessagesModel();
        
        $messageModel->setId($_POST["messageId"]);
        $messageModel->setName($_POST["name"]);
        $messageModel->setFullText($_POST["messageText"]);
        $messageModel->setShortText();
        
        echo $messageModel->editMessage();
        
    }elseif (isset($_POST["editMessage"])) {
        
        require_once '../Database/DatabaseComponent.php';
        //local instance for database
        $database = DatabaseComponent::getInstance();
        //initialize message id
        $messageId = $_POST["messageId"];
        //array of arrays of rows from database
        $message = $database->select($messageId, array("name", "full_text"));

        require_once '../Views/EditMessagePage.php';
        
    }

}elseif(!empty ($_GET)){
    if(isset($_GET["createMessage"])){
        
        require_once '../Views/CreateMessagePage.php';
        
    }elseif(isset($_GET["showMessages"])){ 
        
        require_once '../Database/DatabaseComponent.php';
        //local instance for database
        $database = DatabaseComponent::getInstance();
        //takes array of arrays of rows from database
        $messages = $database->selectAll(array("id", "name", "short_text", "creating_date", "editing_date"));
        
        require_once '../Views/MessagesView.php';
        
    }elseif($_GET["deleteMessage"]){
        
        require_once '../Database/DatabaseComponent.php';
        //local instance for database
        $database = DatabaseComponent::getInstance();
        //delete message with appropriate id
        $database->delete($_GET["messageId"]);
        //takes array of arrays of rows from database
        $messages = $database->selectAll(array("id", "name", "short_text", "creating_date", "editing_date"));
        
        require_once '../Views/MessagesView.php';
        
    }
}

?>
