<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>test-sql</title>
  </head>
  <body>
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "testsql";

    try {
      $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully <br>";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    // $sql = "SELECT * FROM `table 1`";
    // foreach ($conn -> query($sql) as $row) {
    //   echo $row['first_name'] .'&nbsp'. $row['last_name'] . "<br>";
    // }

    //les palmer
//     $sql = "SELECT last_name, first_name FROM `table 1` WHERE last_name = 'palmer'";
//     foreach ($conn -> query($sql) as $row) {
// echo $row['last_name'] .'&nbsp'. $row['first_name'] . "<br>";

//les femmes
// $sql = "SELECT last_name, first_name, gender FROM `table 1` WHERE gender = 'female'";
// foreach ($conn -> query($sql) as $row) {
// echo $row['last_name'] .'&nbsp'. $row['first_name'] .'&nbsp'. $row['gender']. "<br>";

//etats commence par n
// $sql = "SELECT country_code FROM `table 1` WHERE country_code LIKE 'n%'";
// foreach ($conn -> query($sql) as $row) {
// echo $row['country_code']. "<br>";
// }

//email contenant google
// $sql = "SELECT last_name, first_name, email FROM `table 1` WHERE email LIKE '%google%'";
// foreach ($conn -> query($sql) as $row) {
// echo $row['last_name'] .'&nbsp'. $row['first_name'] .'&nbsp'. $row['email']. "<br>";

//répartition par etat +nombre d'enregistrement par état croissant
$sql = "SELECT country_code, COUNT(*) as count FROM `table 1` GROUP BY country_code ORDER BY count";
foreach ($conn -> query($sql) as $row) {
echo $row['country_code'].'&nbsp'. $row['count'] ."<br>";


}


     ?>
  </body>
</html>
