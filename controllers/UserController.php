<?php

/**
 * Description of UserController
 *
 * @author Fake
 */
class UserController extends Controller
{
    public function __construct($model, $view){
        parent::__construct($model, $view);
    }
    
    public function loginAction(){
        if(isset($_COOKIE["userName"]) && isset($_COOKIE["password"])){
            try{
                session_start();
                $user = $this->_model->getUser($_COOKIE["userName"], $_COOKIE["password"]);
                
                $_SESSION["nickname"] = $user["nickname"];
                
                $this->_view->generate("Main");
            }catch(Exception $e){
                echo $e->getMessage();                
            }

        }elseif(!empty($_POST)){
            try{
                session_start();
                
                $login = htmlspecialchars($_POST["login"]);
                $password = htmlspecialchars(substr(crypt($_POST["password"], CRYPT_BLOWFISH), 0, 32));
                $user = $this->_model->getUser($login, $password);
                
                $_SESSION["nickname"] = $user["nickname"];
                $time = 60*60*24;
                setcookie("userName", $user["login"], time()+$time, "/");
                setcookie("password", $user["password"], time()+$time, "/");

                $this->_view->generate("Main");
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
            $this->_view->generate("Login");
        }
    }
    
    public function logoutAction(){
        
        $time = 60*60*24;
        setcookie("userName", "", time()-$time, "/");
        setcookie("password", "", time()-$time, "/");

        session_unset();
        $this->_view->generate("Login");
    }
    public function registerAction(){
        if(!empty($_POST)){
            try{
                session_start();

                $login = htmlspecialchars($_POST["login"]);
                $password = htmlspecialchars(substr(crypt($_POST["password"], CRYPT_BLOWFISH), 0, 32));
                
                $nickname = $_POST["nickname"];
                $this->_model->isValid($login, $password, $nickname);
                $this->_model->addUser($login, $password, $nickname);

                $_SESSION["userNickname"] = $nickname;
                $time = 60*60*24;
                setcookie("username", $login, time()+$time, "/"); 
                setcookie("password", $password, time()+$time, "/");
                
                $this->_view->generate("Main");
            }catch(Exception $e){
                die($e->getMessage());
            }
        }else{
            $this->_view->generate("Registration");
        }
    }
}

?>
