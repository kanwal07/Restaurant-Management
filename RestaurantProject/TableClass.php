<?php
class Table{
    private $tableNum;
    private $reservationId;
    private $tableType;
    private $time;
    
    function __construct($tableNum = null, $reservationId = null, $tableType= null, $time=null){
        $this->reservationId = $reservationId;
        $this->tableNum = $tableNum;
        $this->tableType= $tableType;
        $this->time = $time;
    }
    /**
     * @return string
     */
    public function getTableNum()
    {
        return $this->tableNum;
    }

    /**
     * @return string
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * @return string
     */
    public function getTableType()
    {
        return $this->tableType;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $tableNum
     */
    public function setTableNum($tableNum)
    {
        $this->tableNum = $tableNum;
    }

    /**
     * @param string $reservationId
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }

    /**
     * @param string $tableType
     */
    public function setTableType($tableType)
    {
        $this->tableType = $tableType;
    }

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
    
    public function getAllTables($connection)
    {
        //check datetime now,
        //show only those tables which don't have date time now---
        //if now datetime found-take the reservation id,  match into table_reservation table
        //if matches-don't show that table by fetching that table number
        
        
        
        //show all tables and match dateTime now, the one wwith which it matches, disable them but still show them
        $sqlStmt = "SELECT * from table";
    }
    
    

}


?>