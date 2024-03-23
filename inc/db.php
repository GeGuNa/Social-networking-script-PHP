<?


define('in', '1');



//ini_set('post_max_size','20M');
//ini_set('upload_max_filesize','20M');

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Credentials: true');
//header('Access-Control-Allow-Methods: POST, GET');

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
            $this->pdo->exec("SET sql_mode = 'NO_ENGINE_SUBSTITUTION';");
           // $this->pdo->exec("SET time_zone = '+04:00';");
            
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
    
   
    public function stuff($query)
    {
        $statement = $this->pdo->prepare($query);
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

		//($host, $dbname, $username, $password)

$pdo = new PDOORM("localhost", "plast", "soc_ge","soc_ge");


