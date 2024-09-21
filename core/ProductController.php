<?php



class ProductController{

    public function processrequest($method,$id=null):void
    {
        if($id){
$this->ProcessResouceRequest($method,$id);
        }else {
            $this->ProcessCollectionRequest($method);
        }
    }



private function ProcessResouceRequest($method,$id){

}

private function ProcessCollectionRequest($method){
switch($method){
    case "GET":
echo json_encode(['id'=>'123']);
break;

}
}





}
















