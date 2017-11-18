<?php

if (isset($_GET['country'])  || isset($_GET['all']))
{
    
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:charset=utf8mb4;host=$host;dbname=$dbname", $username, $password);

$all = $_GET['all'];

if($all=='true')
{
    
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '".$_GET["country"]."'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


echo '<ul>';
foreach ($results as $row) {
  echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
}
echo '</ul>';
}