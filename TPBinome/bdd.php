<?php
// paramètres de connexion à la base de données
$host = '10.5.40.71';
$dbname = 'DatabaseMail';
$username = 'root';
$password = '1234';

// tentative de connexion à la base de données en utilisant PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result = $pdo->prepare("SELECT * FROM users where email = (:email)");
    $result->execute(array(
        'email' => $_POST['email']));
    $result = $result->fetchAll();
    
    $email = [];
    foreach ($result as $res) {
        $email[] = $res['email'];
    }
    
    if(!empty($email)){
        echo 'Vous êtes déjà inscrit dans notre base de données';
    } else {
        $sql = "INSERT INTO users (email) VALUES (:email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();
        echo 'Vous êtes bien inscrit dans notre base de données';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>