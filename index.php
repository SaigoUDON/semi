<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=semi;charset=utf8','root','',
        array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
    exit('a'.$e->getMessage());
}

$stmt = $pdo->query("SELECT * FROM a;");
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>
<pre>
    <?PHP var_dump($rows);?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table border="1">
    <tr>
        <th>日付</th>
        <th>場所</th>
    </tr>

    <?php foreach ($rows as $row): ?>
    <tr>

        <th><?php echo $row['date']; ?></th>
        <th><?php echo $row['place']; ?></th>
    </tr>
    <?php endforeach; ?>
</table>
<form method="POST" action="./post.php">
<table border="1">
    <tr>
        <th>日付</th>
        <th>場所</th>
    </tr>
    <tr>
        <td><input type="datetime-local" name="date[]" value=""></td>
        <td><input type="text" name="place[]" value=<?php echo $rows[0]['place'];?>"></td>
    </tr>
</table>
<input type="submit" value="送信">
</form>
</body>
</html>
