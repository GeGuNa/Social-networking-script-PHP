<?php

defined('in') or die('uups');

?>

<?

class PDOORM
{
    private $pdo;
    private $host;
    private $dbname;
    private $username;
    private $password;

   
   /* public function __construct($dsn, $username, $password)
    {
        $this->pdo = new PDO($dsn, $username, $password);
    }*/
    
    
    

    public function __construct($host, $dbname, $username, $password)
    {
		
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        
        $this->connect();
        
    }

    public function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
			
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            $this->pdo->exec("SET sql_mode = 'NO_ENGINE_SUBSTITUTION'");
            
        } catch (PDOException $e) {
			
			file_put_contents($_SERVER['DOCUMENT_ROOT'].'/inc/pdo.txt', $e->getMessage(), FILE_APPEND);
			
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    
    
    //not prepared statement
     public function Exec(string $query)
    {
        $statement = $this->pdo->exec($query);
        return $statement;
    }   
    
    

    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save($user)
    {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->execute();
    }

    public function delete($where, $col,  $id)
    {
			
        $stmt = $this->pdo->prepare("delete from `$where` where `$col` = ?",[$id]);

		$stmt->execute([$id]);
        
       //return $stmt;
       
    }
    
    public function queryUnprepared($sql)
    {
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }
    
    
   public function query($sql, $params = [])
   {
	   
		$kq1 = count($params);
	   
        try {
            $stmt = $this->pdo->prepare($sql);
            
        if ($kq1>0)
			$stmt->execute($params);
		else 
			$stmt->execute();
		
		
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function fetchOne($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function getLastInsertedId()
    {
        return $this->pdo->lastInsertId();
    }
    
 	public function queryCounter($sql, $params = []) {
		$stmt = $this -> query($sql, $params);
		return $stmt -> rowCount();
	}
	
	public function queryCounterArray($sql, $params = []) {
		$stmt = $this -> query($sql, $params);
		return $stmt -> rowCount();
	}   
    
   
	public function queryFetchColumn($sql, $params = []) {
		$stmt = $this -> query($sql, $params);
		return $stmt -> fetchColumn();
	}   
     
   
    

    
    
    
    
    
}

		

$pdo = new PDOORM("localhost", "plast","soc_ge","soc_ge");

$pdo->queryFetchColumn
$pdo->fetchOne


//echo $pdo->queryFetchColumn("select count(*) from `user`");
//echo $pdo->queryFetchColumn("select count(*) from `user` where id = ?", ['1']);
//echo $pdo->queryFetchColumn("select count(*) from `user` where id = ?", [0]);

//$pdo->delete("user","id","15");
//$pdo->delete("user_post_reaction","post_id","15");
//$pdo->getLastInsertedId();


/*

$pics = $db->query('SELECT COUNT(id) FROM pics');
$all = $pics->fetchColumn(); 
    
    
queryCounter
queryCounterArray 

///////
$kqp123idd1 = filter($_GET['id']);
$chatrm=$pdo->fetchOne("SELECT * FROM `chat_cats` WHERE `id` = ?", [$kqp123idd1]);
//////////////


$qq = $pdo->query("insert into `gueest`(`name`,`val`) values(?,?)", ['1qqq','qweqwe']);



$qq = $pdo->fetchOne("select * from user where id = ?", ['qweqwe']);



$qq = $pdo->fetchOne("select * from user where id = ? order by id desc limit 10", ['qweqwe']); //can be used for while




$qq = $pdo->fetchAll("select * from user where id = ?", ['qweqwe']); // for



$pdo->exec("delete from user where id = '15';"); // for while

$pdo->exec("update user set nick = ? where id = ?", ['qqq',15]);



$pdo->query("update user set nick = ? where id = ?", ['qqq',15]);








*/
