<?php

/**
 * Description of Messages_DB
 *
 * @author Andriy Ostashuk
 */

 /**
 * @package Messages
 * @subpackage Database
 */
class Database 
{

    /**
     * Local copy of instance DatabaseComponent
     *  
     * @var DatabaseComponent Contains instance of DatabaseComponent
     */
    private static $_database;
    
    private $_link;
    

    /**
     * Constructor
     * Require configuration of mysql and database like:
     * host, user, password, database name, table, name and it's fields
     * 
     * for application Messages
     */
    private function __construct(){
        $this->_link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    }
    
    /**
     * Protect instance of cloning
     * If instance missing, call constructor
     * 
     * @return DatabaseComponent Object of class
     */
    public static function getInstance() {    
        if (is_null(self::$_database)) {
            self::$_database = new Database();
        }
        return self::$_database;
    }
             
    /**
     * Send query to database
     * 
     * @param string $sqlQuery Contains MySQL command
     * @return string Returns query result  
     */
    public function query($sqlQuery){
            return mysqli_query($this->_link, $sqlQuery);
    }
    
    /**
     * Returns last MySQL error text
     * 
     * @return string
     */
    public function error(){
        return mysqli_error($this->_link);
    }
}

?>
