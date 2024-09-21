<?php


class Database{


    // public function __construct(
    //     private string $host,
    //     private string $name,
    //     private string $log,
    //     private string $pass,
    // ) {
       
    // }

public function getconnection(): PDO
{
  return  new PDO("mysql:dbname=php;host=localhost", 'root', 'root');
       
 }








}