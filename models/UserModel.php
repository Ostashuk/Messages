<?php
/**
 * Description of UserModel
 *
 * @author Fake
 */
class UserModel extends Model
{
    
    private $_tableName = "users";
    public function __construct(){
        parent::__construct();
    }

    public function getUser($login, $password){
        $result =  $this->_database->query("SELECT login, password, nickname FROM
                $this->_tableName WHERE 
                login = '$login' AND password = '$password'");
        $user = mysqli_fetch_array($result);
        if($user){
            return $user;
        }else{
            throw new Exception("Користувача не існує.");
        }
    }
    
    public function addUser($login, $password, $nickname){
        $result = $this->_database->query("INSERT INTO 
                $this->_tableName(login, password, nickname)
                VALUES('$login', '$password', '$nickname')");
        if(!$result){
            throw new Exception("Такий нікнейм або логін зайнятий.");
        }
    }
     


    public function isValid($login, $password, $nickname){
        if(!preg_match("/^[a-z0-9_-]{3,16}$/", $login)){
            throw new Exception("Логін повинен складатися з латинських букв
                і знаків -, _, довжиною від 3 до 16 символів");
        }elseif(strlen($password)<3){
            throw new Exception("Пароль повинен містити не менше 3 символів");
        }elseif(strlen($nickname)<3){
            throw new Exception("Нікнейм повинен містити не менше 3 символів");
        }                   
    }
}

?>
