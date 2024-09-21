<?php




class ProductGateway{

private PDO $conn;

public function __construct(Database $database) {
    $this->conn = $database->getconnection();
}

public function getall(){

    $query="SELECT * FROM продукты";

    $sth = $this->conn->prepare($query);
    $sth->execute();
    
$arr = $sth->fetchAll(PDO::FETCH_ASSOC);
$art['data']=$arr;
return $art;
}

}








?>