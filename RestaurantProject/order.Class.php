<?php 
class Orders {
    private $orderId;
    private $dishId;
    private $quantity;
    private $tableNumber;
    private $price;
    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @return mixed
     */
    public function getDishId()
    {
        return $this->dishId;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getTableNumber()
    {
        return $this->tableNumber;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * @param mixed $dishId
     */
    public function setDishId($dishId)
    {
        $this->dishId = $dishId;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $tableNumber
     */
    public function setTableNumber($tableNumber)
    {
        $this->tableNumber = $tableNumber;
    }

    function __construct($orderId = null,$dishId=null, $quantity=null, $tableNumber=null, $price=null)
    {
        $this->orderId = $orderId;
        $this->disId = $dishId;
        $this->quantity = $quantity;
        $this->tableNumber = $tableNumber;
        $this->price = $price;
    }
 
    public function create($connection)
    {
        $orderId = $this->orderId;
        $dishId = $this->dishId;
        $quantity = $this->quantity;
        $tableNumber = $this->tableNumber;
        $price = $this->price;
        
        $sqlStmt = "INSERT into orders VALUES($orderId,$dishId,$quantity,$tableNumber,$price)";
        $result = $connection->exec($sqlStmt);
        
        return $result;
    }
    
    public function remove($connection){
        $dishId = $this->dishId;
        
        $sqlStmt = "DELETE from orders where orderId = $orderId";
        
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
}

?>