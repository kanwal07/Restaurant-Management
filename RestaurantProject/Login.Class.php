<?php
class Login {
    
    private $employeeId;
    private $username;
    private $password;
    /**
     * @return mixed
     */
    public function getEmpId()
    {
        return $this->employeeId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $empId
     */
    public function setEmpId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    function __construct($username=null,$password=null, $employeeId=null){
        $this->employeeId = $employeeId;
        $this->username = $username;
        $this->password = $password;
    }
    
   public function checkLogin($connection){
        
       
        $sqlStmt = "Select * from login where username=? and password=?";
        
        $prepare = $connection->prepare($sqlStmt);
        $prepare->execute([$this->username, $this->password]);
        $result = $prepare->fetchAll();
        
        $obj = "";
       foreach($result as $oneVal)
       
           if($result >0)
           {
               $employeeId= $oneVal["employeeId"];
               $username = $oneVal["username"];
               $password = $oneVal["password"];
               
               $obj = new Login($employeeId,$username,$password);
               
           }
       
        
        
        return $obj;
        
    }
    
    
    
    function fetchEmployeeType($empId){
        $sqlStmt = "Select employeeType from employee where employeeId = :eid";
        
        $prepare = $connection->prepare($sqlStmt);
        
        $prepare->bindValue(":uid", $username, PDO :: PARAM_STR);
        
        $prepare->execute();
        
        $result = $prepare->fetchAll();
        
        
        $empId = 0;
        
        if(sizeof($result) > 0)
        {
            $empId = $result[0]["employeeId"];
        }
        
        return $empId;
    }
    
    public function __toString() {
        $q= $this->empId;
        $w=$this->username;
        $r=$this->password;
        
        return $q.$w.$r;
    }
    
}




?>