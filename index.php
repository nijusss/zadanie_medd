<?php

$db = new mysqli("localhost", "root", "", "zadanie_med");

$q = $db->prepare("SELECT * FROM staff");

if($q->execute()) {
    $result = $q->get_result();
    while($row = $result->fetch_assoc()) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        echo "Lekarz $firstName $lastName<br>";
    }
} else {
    echo "Błąd podczas wyszukiwania w bazie danych";
}

?>