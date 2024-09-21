<?php


class errorHandler{


public static function error(Throwable $exception){
    http_response_code(505);
    echo json_encode([
        'code'=>$exception->getCode(),
        'message'=>$exception->getMessage(),
        'file'=>$exception->getFile(),
        'line'=>$exception->getLine()
    ]);
}



}













?>