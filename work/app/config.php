<?php
session_start();

// $pdoの定義
define('DSN','mysql:host=db;dbname=db;charset=utf8mb4');
define('DB_USER','user');
define('DB_PASS','password');

//リダイレクト用URLの指定
define('SITE_URL','http://' . $_SERVER['HTTP_HOST']);

//CSRF対策
function h($str){
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

//tokenの作成と検証
function createToken(){
  if(!isset($_SESSION['token'])){
    $_SESSION['token'] = bin2hex(random_bytes(32));
  };
}

function validateToken(){
  if(
  empty($_SESSION['token']) || 
  $_SESSION['token'] !== filter_input(INPUT_POST,'token')
  ){
    exit('Token Invalid Request');
  };
}

require_once(__DIR__.'/Database.php');
require_once(__DIR__.'/Item.php');
