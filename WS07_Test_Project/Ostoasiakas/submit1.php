<?php
$filename = "registrations.csv";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        date("Y-m-d H:i:s"),
        $_POST['companyName'] ?? '',
        $_POST['registrationNumber'] ?? '',
        $_POST['companyAddress'] ?? '',
        $_POST['postalCode'] ?? '',
        $_POST['city'] ?? '',
        $_POST['country'] ?? '',
        $_POST['firstName'] ?? '',
        $_POST['lastName'] ?? '',
        $_POST['email'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['position'] ?? '',
        $_POST['industry'] ?? '',
        $_POST['annualTurnover'] ?? '',
        $_POST['businessNeeds'] ?? '',
        $_POST['howFound'] ?? '',
        isset($_POST['marketingCheck']) ? 'Kyllä' : 'Ei',
    ];

    $file = fopen($filename, "a");
    if ($file) {
        fputcsv($file, $data, ';'); // Puolipiste CSV:ssä toimii hyvin Excelin kanssa
        fclose($file);
        echo "<h2>Kiitos! Tietosi on tallennettu.</h2>";
    } else {
        echo "<h2>Virhe: tiedostoa ei voitu avata.</h2>";
    }
} else {
    echo "<h2>Virheellinen pyyntö.</h2>";
}
?>