<?php 
class Guest
{
	private $dbconnect;
	
	function  __construct($db)
    {
        $this->dbconnect = $db;
    }
	function getCarouselImages()
	{
		$query = "select * from images";
		$this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        return $result;

	}
	 function getMajors()
    {
        $query = 'select * from majors';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    
	
	
}
?>