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

public function create($data)
{

    

    $sth = $this->conn->prepare("INSERT INTO `продукты` SET `name` = :name, `price` = :price, `number`= :number");
    //clean data
   
    // $data->name=htmlspecialchars(strip_tags($data->name));
    // $data->price=htmlspecialchars(strip_tags($data->price));
    // $data->number=htmlspecialchars(strip_tags($data->number));

    if($sth->execute(['name'=>$data->name, 'price'=>$data->price,'number'=>$data->number])){

        return $this->conn->lastInsertId();
        
    }
    
return false;
}


}








?>