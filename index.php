<?php

$db = new mysqli("localhost", "root", "", "zadanie_med");

$q = $db->prepare("SELECT * FROM staff");

if($q->execute()) {
    $result = $q->get_result();
    while($row = $result->fetch_assoc()) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $q = $db->prepare("SELECT * FROM schedule WHERE staff_id = ?");
        $q->bind_param("i",$staff_id);
        if($q->execute()) {
            $schedule = $q->get_result();
            while($visit = $schedule->fetch_assoc()) {
                $timestamp = strtotime($visit['date']);
                echo "<span style =\"margin:10px;\">";
                echo date("j/m/Y H:i", $timestamp);
                echo "<span>";
            }
        }
        echo "<br>";
    }
} else {
    echo "Błąd podczas wyszukiwania w bazie danych";
}

?>