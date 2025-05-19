<?php
// Tiedoston nimi
$filename = 'registrations.csv';

// Tarkista, että lomake on lähetetty POST:lla
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kerää ja suojaa tiedot
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

    // Avataan tai luodaan tiedosto ja kirjoitetaan rivin loppuun
    $file = fopen($filename, 'a');

    if ($file) {
        fputcsv($file, $data, ';');
        fclose($file);
        echo "Kiitos! Lomake on tallennettu.";
    } else {
        echo "Virhe: tiedostoa ei voitu avata.";
    }
} else {
    echo "Virheellinen pyyntö.";
}
?>
