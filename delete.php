<?php
require_once 'funcs.php';



$id = $_GET['id'];

$pdo = connectDB();

// $sql = 'DELETE FROM gs_kadai_image WHERE image_id = :image_id';
// $stmt = $pdo->prepare('DELETE FROM gs_kadai_image WHERE image_id = :image_id; ');
$stmt = $pdo->prepare('DELETE FROM gs_kadai_table WHERE id = :id; ');

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();



if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('select.php');
}

// header('Location:list.php');
exit();
?>