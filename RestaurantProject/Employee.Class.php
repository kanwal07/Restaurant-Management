<?php
class Employee {
    private $employeeId;
    private $employeeType;
    private $name;
    
    
    /**
     * @return string
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @return string
     */
    public function getEmployeeType()
    {
        return $this->employeeType;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    

    /**
     * @param string $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @param string $employeeType
     */
    public function setEmployeeType($employeeType)
    {
        $this->employeeType = $employeeType;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    

    function __construct($employeeId=null, $employeeType=null, $name=null){
        $this->employeeId = $employeeId;
        $this->employeeType = $employeeType;
        $this->name = $name;
     
    }
    
    
    public function create($connection)
    {
        $employeeId = $this->employeeId;
        $employeeType = $this->employeeType;
        $name = $this->name;
        
        $sqlStmt = "INSERT into employee VALUES($employeeId,'$employeeType','$name')";
        $result = $connection->exec($sqlStmt);
        
        return $result;
    }
    
    public function update($connection)
    {
        $employeeId = $this->employeeId;
        $employeeType = $this->employeeType;
        $name = $this->name;
        
        $sqlStmt = "UPDATE employee SET employeeType= '$employeeType', name = '$name' where employeeId = $employeeId";
        $result = $connection->exec($sqlStmt);
        
        return $result;
    }
    
    public function delete($connection){
        $employeeId = $this->employeeId;
        
        $sqlStmt = "DELETE from employee where employeeId = $employeeId";
        
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
    public static function getHeader()
    {
        
        $data = "<div class='container' class='col-sm-4'><table border='2'>";
        $data.="<tr class='white' style='background-color:black;'><th>Employee Id</th><th>Employee Type</th><th>Name</th></tr>";
        return $data;
    }
    
    
    function __toString() {
        
        $data="<tr style='background-color:lightgreen'><td>$this->employeeId</td><td>$this->employeeType</td><td>$this->name</td></tr>";
        
        return $data;
    }
    
    public static function getFooter()
    {
        
        $data= "</table></div>";
        
        return $data;
    }
    
    public function getAllEMployees($connection)
    {
        $counter=0;
        $sqlStmt= "SELECT * from employee";
        
        foreach($connection->query($sqlStmt) as $oneRow)
        {
            
            $empObj = new Employee();
            $empObj->setEmployeeId($oneRow['employeeId']);
            $empObj->setName($oneRow['name']);
            $empObj->setEmployeeType($oneRow['employeeType']);
            
            
            $listOfEmployees[$counter++]= $empObj;
        }
        
        return $listOfEmployees;
    }
    
    public function displayAllEmployees($listOfEmployees)
    {
        echo Employee::getHeader();
        foreach($listOfEmployees as $oneEmp)
        {
            echo $oneEmp;
        }
        echo Employee::getFooter();
    }
}

?>