<?php
class PDOHandler
{
   private  $host;//Host we will connect to
   private  $db;//Database we will work with
   private  $user;//Username we will connect the database with
   private  $pass;//Password we will connect the database with
   private  $charset;//Charset we are going to use
   private  $opt;//Connection options
   private  $dsn;//Connection string
   private  $pdo;//Database connection
   
   //PDO constructor
   public function PDOHandler($host,$db,$user,$pass,$charset)
   {
        $this->host=$host;
        $this->db=$db;
        $this->user=$user;
        $this->pass=$pass;
        $this->charset=$charset;
        
        $this->opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
   }
   
   //Connecting the database
   private function connect()
   { 
		try//Trying to connect to the database
		{
			$this->dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
			$this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
		}
		catch(Exception $e)//If we couldn't connect the database
		{
			die("Couldn't connect the database");
		}		
   }   
   
   //Disconncting from the database
   private function disconnect()
   {
        $this->pdo = null;
   }
   
   //Executing a query (update/delete/insert)
   public function executeQuery($query,$info)
   {		
		$this->connect();
        $this->pdo->prepare($query)->execute($info);//Executing the given query
		$this->disconnect();
   }
   
   //Getting an information according to the specific query
   public function getInfo($query,$info)
   {
		$this->connect();
		
		//Getting rows according to the current query
		$stmt = $this->pdo->prepare($query);
		$stmt->execute($info);
		$data = $stmt->fetchAll();
				
		$this->disconnect();
		
		return $data;
   }
}
?>