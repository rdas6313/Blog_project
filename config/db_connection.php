<?php
include 'configure.php';

class DB{
	public $conn;
	public function __construct(){
		if(!isset($conn)){
			try{
				$this->conn=new PDO(DBSOFT.':host='.HOST.';dbname='.DBNAME,USERNAME,PASSWORD);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		return $this->conn;
	}
	public function __destruct(){
		$this->conn=NULL;
	}
	public function query($q){
		$s=$this->conn->prepare($q);
		$s->setFetchMode(PDO::FETCH_ASSOC);
		$s->execute();
		return $s;
	
	}
	public function insert($query){
		try{
			$s=$this->conn->prepare($query);
			return $s;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function update($query){
		try{
			$s=$this->conn->prepare($query);
			return $s;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function delete($query){
		try{
			$this->conn->exec($query);
			return true;
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

}
?>