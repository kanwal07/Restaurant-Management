<?php
class menuDishes{
    private $dishID;
    private $dishName;
    private $description;
    private $price;
    private $image;
    /**
     * @return mixed
     */
    public function getDishID()
    {
        return $this->dishID;
    }

    /**
     * @return mixed
     */
    public function getDishName()
    {
        return $this->dishName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $dishID
     */
    public function setDishID($dishID)
    {
        $this->dishID = $dishID;
    }

    /**
     * @param mixed $dishName
     */
    public function setDishName($dishName)
    {
        $this->dishName = $dishName;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    
    
    function __construct($dishId = null, $dishName = null, $description = null, $price = null, $image = null)
    {
        $this->dishId = $dishId;
        $this->dishName = $dishName;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }
    
    public function __toString(){
        //$counter =0;
        //$data="<tr id=row".$counter++."><td>$this->dishName</td><td><img style='height:100px;width:100px;' src= './Images/DishImages/$this->image'/></td>";
        //$data.="<td>$this->description</td><td>$this->price</td><td id=td".$counter++."></td></tr>";
        $data = $this->dishId.$this->name.$this->description.$this->price.$this->image;
        return $data;
    }
    
    public function getHeader()
    {
        $data = "<table border= '1'><tr><th>Name</th>";
        $data.="<th>Image</th>";
        $data.="<th>Description</th>";
        $data.="<th>Price</th><th>Quantity</th></tr>";
        return $data;
    }
    
    public function getFooter()
    {
        return "</table>";
    }

    
    public function getAllDishes($connection){
        $counter=0;
        $sqlStmt= "SELECT * from dish";
        
        foreach($connection->query($sqlStmt) as $oneRow)
        {
            $dishObj = new menuDishes();
            $dishObj->setDishId($oneRow['dishId']);
            $dishObj->setdishName($oneRow['name']);
            $dishObj->setDescription($oneRow['description']);
            $dishObj->setPrice($oneRow['price']);
            $dishObj->setImage($oneRow['image']);
            
            $listOfDishes[$counter++]= $dishObj;
        }
        
        return $listOfDishes;
    }
    
    public function displayAllDishes($listOfDishes)
    {
        echo menuDishes::getHeader();
        foreach($listOfDishes as $oneDish)
        {
            echo $oneDish;
            
        }
        echo menuDishes::getFooter();
    }
}

?>