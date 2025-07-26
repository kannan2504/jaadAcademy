<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $about = $_POST['about'] ?? '';

    $resumeName = $_FILES['resume']['name'];
    $resumeTmp = $_FILES['resume']['tmp_name'];
    $uploadDir = "uploads/";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $resumePath = $uploadDir . $resumeName;
    move_uploaded_file($resumeTmp, $resumePath);

    $data = "Career Form:\nName: $name\nEmail: $email\nPhone: $phone\nAbout: $about\nResume: $resumePath\n------\n";
    file_put_contents("career_submissions.txt", $data, FILE_APPEND);

    header("Location: index.html");
    exit();
}
?>
