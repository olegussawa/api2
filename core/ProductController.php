<?php



class ProductController{

public function __construct(private productGateway $gateway)
{
    
}


    public function processrequest($method,$id=null):void
    {
        if($id){
$this->ProcessResouceRequest($method,$id);
        }else {
            $this->ProcessCollectionRequest($method);
        }
    }



private function ProcessResouceRequest($method,$id){

$product=$this->gateway->getone($id);
//проверим если нет продукта с этим номером выходим из функции с 404
if(!$product){
    http_response_code(404);
    echo json_encode(['message'=>'product not found']);
    return;
}

switch($method){
    case "GET":
        echo json_encode($product);
break;


}
}



private function ProcessCollectionRequest($method){
switch($method){
    case "GET":
        
print_r(json_encode($this->gateway->getall())) ;
break;

case "POST":
    $data =json_decode(file_get_contents("php://input"));




//если массив с ошибками не пустой то выводим джсон с ошибками и завершаем код
$err=$this->validation_data($data);
if(!empty($err)){
    echo json_encode(['error'=>$err]);
    break;
}



    $id=$this->gateway->create($data);

   //код создания записи
   http_response_code(201);

   echo json_encode([
    'message'=>'post created',
    'id'=>$id
   ]);
   
   break;
   default:http_response_code(405);
   header("Allow: GET,POST");
}


}
   







private function validation_data($data){

$errors=[];
if(empty($data->name)){
    $errors[]='The name is required';
}
if(empty($data->price)){
    $errors[]='The price is required';
}

if(empty($data->number)){
    $errors[]='The number is required';
}

return $errors;
}








}




