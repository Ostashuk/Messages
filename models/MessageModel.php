<?php

/**
 * Description of MessagesModel
 *
 * @author Andriy Ostashuk  
 * @package Messages
 * @subpackage Models
 */
class MessageModel
{
    
    /**
     * Instance of database
     * 
     * @var string 
     */
    private $database;
    /**
     * Id number of message
     * 
     * @var string 
     */
    private $id;
    /**
     * Name of recipient
     * 
     * @var string
     */
    private $name;
     /**
     * Full message text
      * 
     * @var string 
     */
    private $fullText;
    /**
     * View text of message
     * 
     * @var string 
     */
    private $shortText;
       
    /**
     * Constructor
     * Initialize database instance
     */
    public function __construct() 
    {
        //require_once '../Database/DatabaseComponent.php';
        //$this->database = DatabaseComponent::getInstance();
        
    }
    
    /**
     * Save message to database
     * 
     * @return string Result of operation
     */
    public function saveMessage()
    {
        $values = array(
            "name" => $this->name,
            "full_text" => $this->fullText,
            "short_text" => $this->shortText
        );
        
        if($this->database->insert($values))
            return "Message sent successfully.";
        else
            return "Failed sending message.";
    }
    
    /**
     * Editing message
     * Save to database with new data
     * 
     * @return string Result of operation
     */
    public function editMessage()
    {
        $values = array(
            "name" => $this->name,
            "full_text" => $this->fullText,
            "short_text" => $this->shortText    
        );
        if($this->database->update($this->id, $values))
            return "Message edit successfully.";
        else
            return "Failed editing message.";
            
    }
    
    /**
     * Delete message
     * 
     * @return string Result of operation
     */
    public function deleteMessage()
    {
        if($this->database->delete($this->id))
            return "Message deleted.";
        else
            return "Failed deleting message.";
    }


    /**
     * Set id of messae
     * 
     * @param string $id
     */
    public function setId($id) 
    {
        $this->id = $id;
    }
    /**
     * Set name of recipient
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * Set full text of message
     * 
     * @param string $fullText
     */
    public function setFullText($fullText)
    {
        $this->fullText = $fullText;
    }
    /**
     * Set short text of message
     * 
     * @param string $shortText
     */
    public function setShortText()
    {
        if(strlen ($this->fullText)>=30)
            $this->shortText = substr($this->fullText, 0, 27) . "...";
        else                
            $this->shortText = $this->fullText;
    }
    
    /**
     * Return id of message
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Returns name of recipient
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Returns full text of message
     * 
     * @return string
     */
    public function getFullText()
    {
        return $this->fullText;
    }
    /**
     * Returns short text of message
     * 
     * @return string
     */
    public function getShortText()
    {
        return $this->shortText;
    }
    
    /**
     * Returns creation date of message
     * 
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    /**
     * Retunf editing date of message
     * 
     * @return string
     */
    public function getEditingDate()
    {
        return $this->editingDate;
    }
    
}

?>
