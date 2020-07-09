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

    //1.les palmer
//     $sql = "SELECT last_name, first_name FROM `table 1` WHERE last_name = 'palmer'";
//     foreach ($conn -> query($sql) as $row) {
// echo $row['last_name'] .'&nbsp'. $row['first_name'] . "<br>";

//2.les femmes
// $sql = "SELECT last_name, first_name, gender FROM `table 1` WHERE gender = 'female'";
// foreach ($conn -> query($sql) as $row) {
// echo $row['last_name'] .'&nbsp'. $row['first_name'] .'&nbsp'. $row['gender']. "<br>";

//3.etats commence par n
// $sql = "SELECT country_code FROM `table 1` WHERE country_code LIKE 'n%'";
// foreach ($conn -> query($sql) as $row) {
// echo $row['country_code']. "<br>";
// }

//4.email contenant google
// $sql = "SELECT last_name, first_name, email FROM `table 1` WHERE email LIKE '%google%'";
// foreach ($conn -> query($sql) as $row) {
// echo $row['last_name'] .'&nbsp'. $row['first_name'] .'&nbsp'. $row['email']. "<br>";

//5.répartition par etat +nombre d'enregistrement par état croissant
// $sql = "SELECT country_code, COUNT(*) as count FROM `table 1` GROUP BY country_code ORDER BY count";
// foreach ($conn -> query($sql) as $row) {
// echo $row['country_code'].'&nbsp'. $row['count'] ."<br>";
// }

//6.Insérer un utilisateur, lui mettre à jour son adresse mail, puis supprimer l’utilisateur

//////insere utilisateur
// try{
//   $sql = "INSERT INTO `table 1` (first_name, last_name, email, gender, ip_address, birth_date, avatar_url, country_code) VALUES ('Bob','Lennon', 'bob@lennon.com', 'male', '127.0.0.1', '03/05/1990', 'http://boblennon.net/bob.jpg', 'FR')";
//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "New record created successfully";
// }
// catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
// $conn = null;

/////update email
//
//   $sql = "UPDATE `table 1` SET email='Lennon@Bob.com' WHERE last_name = 'Lennon'";
//
//   // Prepare statement
//   $stmt = $conn->prepare($sql);
//
//   // execute the query
//   $stmt->execute();
//
//   // echo a message to say the UPDATE succeeded
//   echo $stmt->rowCount() . " records UPDATED successfully";
//
// $conn = null;

/////supprimer
// $sql = "DELETE FROM `table 1` WHERE last_name='Lennon'";
// $conn->exec($sql);
//   echo "Record deleted successfully";
//
//   $conn = null;
//7. Afficher  le nombre de femmes et d'hommes et leurs  moyennes d’âge

///remplace les / par des -
//UPDATE `table 1`
//SET birth_date = REPLACE(birth_date, '/', '-')

///modifie le dateformat pour convertir birth_date varchar->DATE
//UPDATE `table 1` SET `birth_date`= DATE_FORMAT(str_to_date( birth_date, '%d-%m-%Y'),'%Y-%m-%d');

///convertit en DateTime
//SELECT CONVERT(birth_date, DATE)
// FROM `table 1`

$avg = "SELECT gender, YEAR(NOW())-AVG(YEAR(birth_date)) as avg, COUNT(gender) as count FROM `table 1` GROUP BY gender";
foreach ($conn -> query($avg) as $row) {
echo  $row['count'].'&nbsp'.$row['gender'] .'&nbsp'. $row['avg'] ."<br>";
}

// SELECT birth_date, REPLACE(birth_date, '/', '-')
// FROM `table 1`
     ?>
  </body>
</html>
