<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone_number'] ?? '';
    $whatsapp = $_POST['whatsapp_number'] ?? '';
    $message = $_POST['text'] ?? '';

    $data = "Contact Form:\nName: $name\nEmail: $email\nPhone: $phone\nWhatsApp: $whatsapp\nMessage: $message\n------\n";
    file_put_contents("contact_messages.txt", $data, FILE_APPEND);

    header("Location: index.html");
    exit();
}
?>
