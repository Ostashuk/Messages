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
class DatabaseComponent 
{
    /**
     * Name of table used in database
     * 
     * @var string 
     */
    private $tableName;
    /**
     * Local copy of instance DatabaseComponent
     *  
     * @var DatabaseComponent Contains instance of DatabaseComponent
     */
    private static $DatabaseComponent;

    /**
     * Constructor
     * Require configuration of mysql and database like:
     * host, user, password, database name, table, name and it's fields
     * 
     * for application Messages
     */
    private function __construct() 
    {
       require_once '../Database/DatabaseConfig.php';
       $this->tableName = $tableName;
    }
    
    /**
     * Protect instance of cloning
     * If instance missing, call constructor
     * 
     * @return DatabaseComponent Object of class
     */
    public static function getInstance() {    
        if (is_null(self::$DatabaseComponent)) {
            self::$DatabaseComponent = new DatabaseComponent();
        }
        return self::$DatabaseComponent;
    }
             
    /**
     * Send query to database
     * 
     * @param string $sqlQuery Contains MySQL command
     * @return string Returns query result  
     */
    public static function query($sqlQuery)
    {
        return mysql_query($sqlQuery) or die("Incorrect MySQL syntax.");
    }
    
    /**
     * Returns last MySQL error text
     * 
     * @return string
     */
    public static function error()
    {
        return mysql_error();
    }
    
    /**
     * Select column from table of appropriate id
     * 
     * @param string $id
     * @param array $column
     */
    public function select($id, $columns = array())
    {
        $sqlQuery = "SELECT " . implode(", ", $columns) . " FROM " . $this->tableName;
        $sqlQuery .= " WHERE id=" . $id;
        
        return mysql_fetch_array(mysql_query($sqlQuery));
    }
    
    /**
     * Takes array of columns and select all rows from table
     * 
     * @param array $columns
     * @return array Array of arrays of all rows in table
     */
    public function selectAll($columns = array())
    {
        $sqlQuery = "SELECT " . implode(", ", $columns) . " FROM " . $this->tableName;
        $arrayValues = array();
        $res = mysql_query($sqlQuery);

        while ($row = mysql_fetch_array($res)) {
            $arrayValues[] = $row;
        }
        
        return $arrayValues;
    }
    /**
     * Takes array with key => value
     * and insert row to database 
     * 
     * @param string $values
     * @return string 
     */
    public function insert($values = array())
    {
        $sqlQuery = "INSERT INTO " . $this->tableName;
        $sqlQuery .= "(" . implode(", ", array_keys($values)) . ", creating_date)";
        $sqlQuery .= " VALUES('" . implode("', '", array_values($values)) . "', NOW())";
        
        return mysql_query($sqlQuery) or die($sqlQuery . mysql_error());
    }
    
    /**
     * Takes array with key => value
     * and update row in table by id
     * 
     * @param string $id
     * @param string $values
     * @return string result of query
     */
    public function update($id, $values = array())
    {   
        $index = 0;
        $elementsNum = count($values);
        
        $sqlQuery = "UPDATE " . $this->tableName;
        $sqlQuery .= " SET ";
        foreach ($values as $key => $value) 
        {
            $index++;
            $sqlQuery .= $key . "='" . $value . "'";
            if($index != $elementsNum)
                $sqlQuery .= ", ";
        }
        $sqlQuery .= " WHERE id=" . $id;
        
        return mysql_query($sqlQuery);
    }
    
    /**
     * Delete row in table by id
     * 
     * @param string $id
     * @return string result of query
     */
    public function delete($id)
    {
        $sqlQuery = "DELETE FROM " . $this->tableName . " WHERE id=" . $id;
        
        return mysql_query($sqlQuery);
    }
    
}

?>
