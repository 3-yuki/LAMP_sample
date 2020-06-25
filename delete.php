<?php
$dsn = 'mysql:dbname=sample_db;host=localhost;';
$user = 'mikami';
$password = 'morijyobi';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];


    $sql = "delete from user where id=:id";
    $stmt = $dbh->prepare($sql);
    $params = array(':id' => $id, ':name' => $name, ':age', $age);
    $stmt->execute($params);

    header('Location: index.php?fg=1');

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    header('Location: index.php?fg=0?err='.$e->getMessage())
    exit();
}
?>