<?php
class Dishes {
    private $dishId;
    private $name;
    private $description;
    private $price;
    private $image;
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
    public function getName()
    {
        return $this->name;
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
     * @param mixed $dishId
     */
    public function setDishId($dishId)
    {
        $this->dishId = $dishId;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    function __construct($dishId = null, $name=null,$description = null, $price = null, $image = null){
        $this->dishId = $dishId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }
    
   public function __toString(){
        
       $data="<tr style='background-color:lightgreen'><td>$this->dishId</td><td>$this->name</td><td>$this->description</td><td>$this->price</td>";
       $data.="<td><img style='height:100px;width:100px;' src= './Images/DishImages/$this->image'/></td></tr>";
       return $data;
    }
    
    public function create($connection)
    {
        $dishId = $this->dishId;
        $name = $this->name;
        $description = $this->description;
        $price = $this->price;
        $image = $this->image;
        
        $sqlStmt = "INSERT into dish VALUES($dishId,'$name','$description',$price,'$image')";
        $result = $connection->exec($sqlStmt);
        
        return $result;
    }
    
    public function update($connection)
    {
        $dishId = $this->dishId;
        $name = $this->name;
        $description = $this->description;
        $price = $this->price;
        $image = $this->image;
        
        $sqlStmt = "UPDATE dish SET name = '$name', description = '$description', price = $price, image = '$image' where dishId = $dishId";
        $result = $connection->exec($sqlStmt);
        
        return $result;
    }
    
    public function delete($connection){
        $dishId = $this->dishId;
        
        $sqlStmt = "DELETE from dish where dishId = $dishId";
        
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
    public static function getHeader()
    {
        $data = $data = "<div class='container' class='col-sm-4'><table border='2'>";
        $data.="<tr class='white' style='background-color:black;'><th>Dish Id</th><th>Name</th><th>Description</th><th>Price</th><th>Image</th></tr>";
        return $data;
    }
    
    public static function getFooter()
    {
        return "</div></table>";
    }
    
    public function getAllDishes($connection)
    {
        $counter=0;
        $sqlStmt= "SELECT * from dish";
        
        foreach($connection->query($sqlStmt) as $oneRow)
        {
            $dishObj = new Dishes();
            $dishObj->setDishId($oneRow['dishId']);
            $dishObj->setName($oneRow['name']);
            $dishObj->setDescription($oneRow['description']);
            $dishObj->setPrice($oneRow['price']);
            $dishObj->setImage($oneRow['image']);
            
            $listOfDishes[$counter++]= $dishObj;
        }
        
        return $listOfDishes;
    }
    
    public function displayAllDishes($listOfDishes)
    {
        echo Dishes::getHeader();
        foreach($listOfDishes as $oneDish)
        {
           
            echo $oneDish;
            
        }
        echo Dishes::getFooter();
    }
}


?>