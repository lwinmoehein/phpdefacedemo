<?php
include "dbconfig.php";
$todo=$_GET['todo'];
$sql="insert into todos(todo_item) values(?)  ";
$stmt = $mysqli->prepare("insert into todos(todo_item) values(?)");
$stmt->bind_param("s",$todo);

if ($stmt->execute() === TRUE) {
    echo "<script>alert('added todo');</script>";
    header("Location:index.php");
} else {
    echo "err";
}

$mysqli->close();
?>