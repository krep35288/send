<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_text = htmlspecialchars($_POST['user_text']); // Защита от XSS

    $to = "your_email@example.com"; // Замените на вашу почту
    $subject = "Сообщение от пользователя";
    $message = "Пользователь ввел следующий текст:nn" . $user_text;
    $headers = "From: no-reply@example.com"; // Замените на ваш адрес

    if (mail($to, $subject, $message, $headers)) {
        $success_message = "Сообщение успешно отправлено!";
    } else {
        $error_message = "Ошибка при отправке сообщения.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отправка текста на почту</title>
</head>
<body>
    <h1>Введите текст</h1>
    
    <?php if (isset($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php elseif (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <textarea name="user_text" rows="10" cols="30" required></textarea><br>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>