<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <br><br>
    <form class="form" method="POST">
        <label class="label_input" for="name">Введите имя</label>
        <input class="add_input" name="name" id="name" type="text" placeholder="Имя" required><br>
        <label class="label_input" for="email">Введите email</label>
        <input class="add_input" name="email" id="email" type="email" placeholder="Email" required><br>
        <label class="label_input" for="phone">Введите номер телефона</label>
        <input class="add_input" name="phone" id="phone" type="tel" placeholder="Номер телефона" required><br>
        <input type="submit" value="Отправить" class="button">
    </form>

    <?php
    function validateForm($name, $email, $phone){
//       валидация имени
        if (empty($name) || strlen($name) < 2){
            return "<p class='error'> Повторите вновь. Поле не должно быть пустым и не должно содержать менее 2 символов.</p>";
        }

//        валидация почты
        if (empty($email) || strlen($email) < 5 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "<p class='error'>Повторите вновь. Неверный формат email.</p>";
        }

//        валидация номера телефона
        if (empty($phone) || strlen($phone) != 11){
           return "<p class='error'>Повторите вновь. Поле не должно содержать менее 11 символов.</p>";
        }

//        пустая строка
        return "";
    }

//    функция
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $error = validateForm($name, $email, $phone);

    if (!empty($error)){
        echo $error;
    } else{
        echo "<p class='good'>Валидация прошла успешно!</p>";
    }
    ?>
</div>
</body>
</html>

