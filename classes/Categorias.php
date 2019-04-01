<?php  
/**
 * 
 */
class Categorias
{
	private $conn;

	function __construct($conn)
	{
		$this->conn = $conn;	
	}
	public function getLista()
	{
		$array = array();
		$sql = $this->conn->query("SELECT * FROM categorias");
		if ($sql->rowCount()>0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
}

?>