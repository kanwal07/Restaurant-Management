<?php
class Feedback{
    private $customerName;
    private $dishName;
    private $comments;
    private $rating;
    
    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @return string
     */
    public function getDishName()
    {
        return $this->dishName;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @param string $dishName
     */
    public function setDishName($dishName)
    {
        $this->dishName = $dishName;
    }

    /**
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param string $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    function __construct($customerName = null, $dishName=null, $comments = null, $rating = null)
    {
        $this->customerName = $customerName;
        $this->dishName = $dishName;
        $this->comments = $comments;
        $this->rating = $rating;
    }
    
    function __toString()
    {
        $customerName=$this->customerName;
        $dishName=$this->dishName;
        $comments=$this->comments;
        $rating=$this->rating;
        
        return $customerName.$dishName.$comments.$rating;
    }
    
    public function submitFeedback($connection)
    {
        $customerName=$this->customerName;
        $dishName=$this->dishName;
        $comments=$this->comments;
        $rating=$this->rating;
        
        $sqlStmt = "INSERT into feedback values('$customerName','$dishName','$comments', $rating)";
        
        $result = $connection->exec($sqlStmt);
        
        return $result;
    }
}


?>