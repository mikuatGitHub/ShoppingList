<?php
require_once(__DIR__.'/../app/config.php');

createToken();
$pdo= getPdoInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
validateToken();

$action= filter_input(INPUT_GET,'action');
switch($action){
  case 'add';
    addItem($pdo);
  break;

  case 'toggle';
    toggleItem($pdo);
  break;

  case 'delete';
    deleteItem($pdo);
  break;

  case 'purge';
   purge($pdo);
  break;

  default:
  exit;
}

header('Location:'.SITE_URL);

exit;
}

$items= getItems($pdo);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>shoppinglist</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<main>
 <h1>買い物リスト</h1>

 <form action="?action=add" method="post">
   <input type="text" name="title">
   <button class="add">追加</button>
   <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
 </form>

 <ul>
   <?php foreach($items as $item){ ?>

   <li>
    <form action="?action=toggle" method="post">
      <input type="checkbox" <?= $item->is_done ? 'checked' : ''; ?> >
      <input type="hidden" name="id" value="<?= h($item->id);?>">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
   </form>

    <span class="<?= $item->is_done ? 'done' : ''; ?>" >
    <?= h($item->title); ?></span>

   <form action="?action=delete" method="post">
      <span class="delete">削除</span>
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      <input type="hidden" name="id" value="<?= h($item->id);?>">
   </form>
   </li>

   <?php }; ?><!-- foreach -->
</ul>

</main>

<script src="main.js"></script>
</body>
</html>