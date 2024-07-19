<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "todo_list";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Ulanishda xatolik: " . $conn->connect_error);
}

$sql = "SELECT id, item FROM items";
$result = $conn->query($sql);
?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Saqlangan ma'lumotlar</title>
</head>
<style>
  input[type="checkbox"]:checked + label {
    text-decoration: line-through;
    color: Silver;
}

</style>
<body>
    <h1>Saqlangan ma'lumotlar</h1>

        <?php
        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
                
        echo '<input type="checkbox" name="selected_items[]" value="' . $row["id"] . '"> ';
        echo '<label for="' . $row['id'] . '">' . $row['item'] . '</label><br>';
        echo '<form action="delete.php" method="post">
            <input type="hidden" name="id" value="' . $row["id"] . '">
            <input type="submit" value="Delete">
            </form>';


              }
        } else {
            echo "Hech qanday ma'lumot topilmadi.";
        }
        ?>
</body>
</html>
<?php
$conn->close();
?>