<?php

function addItem($pdo){
  $title= trim(filter_input(INPUT_POST,'title'));
   if($title === ''){
    return;
    }
    
   $stmt= $pdo-> prepare("INSERT INTO items(title) VALUES(:title)");
   $stmt->bindValue('title',$title,PDO::PARAM_STR);
   $stmt->execute();
 }
   
function toggleItem($pdo){
  $id= filter_input(INPUT_POST,'id');
   if(empty($id)){
    return;
    }

   $stmt= $pdo-> prepare("UPDATE items SET is_done = NOT is_done WHERE id=:id");
   $stmt->bindValue('id', $id, PDO::PARAM_INT);
   $stmt->execute();
 }
  
function deleteItem($pdo){
  $id= filter_input(INPUT_POST,'id');
  if(empty($id)){
  return;
  }

  $stmt= $pdo->prepare("DELETE FROM items WHERE id=:id");
  $stmt->bindValue('id',$id,PDO::PARAM_INT);
  $stmt->execute();
}

// private function purge(){
//   $this->pdo->query("DELETE FROM todos WHERE is_done=1 ");
// }

function getItems($pdo){
  $stmt= $pdo->query("SELECT * FROM items ORDER BY id DESC");
  $items= $stmt->fetchAll();
  return $items;
}
