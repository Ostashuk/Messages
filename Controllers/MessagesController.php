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
        
    }elseif($_POST["deleteMessage"]){
        
        require_once '../Models/MessagesModel.php';
        
        $messageModel = new MessagesModel();
        
        $messageModel->setId($_POST["messageId"]);
        
        echo $messageModel->deleteMessage();
        
    }

}elseif(!empty ($_GET)){
    if(isset($_GET["createMessage"])){
        header("Location: http://localhost/Messages/Views/CreateMessagePage.php");
    }elseif(isset($_GET["showMessages"])){
        header("Location: http://localhost/Messages/Views/MessagesView.php");
    }elseif (isset($_GET["editMessage"])) {
        header("Location: http://localhost/Messages/Views/EditMessagePage.php");
    }
}


?>
