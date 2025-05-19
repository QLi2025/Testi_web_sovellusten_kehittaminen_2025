<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $companyName = $_POST['companyName'];
    $registrationNumber = $_POST['registrationNumber'];
    $companyAddress = $_POST['companyAddress'];
    $postalCode = $_POST['postalCode'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $industry = $_POST['industry'];
    $annualTurnover = $_POST['annualTurnover'];
    $businessNeeds = $_POST['businessNeeds'];
    $howFound = $_POST['howFound'];

    $termsAccepted = isset($_POST['termsCheck']) ? 'Yes' : 'No';
    $marketingAccepted = isset($_POST['marketingCheck']) ? 'Yes' : 'No';

    // Save to file or database
    $file = fopen("registrations.csv", "a");
    fputcsv($file, [
        $companyName, $registrationNumber, $companyAddress, $postalCode, $city, $country,
        $firstName, $lastName, $email, $phone, $position,
        $industry, $annualTurnover, $businessNeeds, $howFound,
        $termsAccepted, $marketingAccepted
    ]);
    fclose($file);

    echo "<h1>Thank you for registering!</h1><p>We’ve received your application.</p>";
} else {
    header("Location: register.html");
    exit();
}
?>