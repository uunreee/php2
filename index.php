<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика 2 Краснова</title>
    <link rel="stylesheet" href="style.css">
</head>

<?
if(isset($_POST['reg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $userInfo = ['name' => "$name", 'email' => "$email", 'phone' => "$phone"];

    $result = validateForm($userInfo);
}


function validateForm($userInfo)
{
    $errors = [
        '<p class="error">Заполните поле </p>',
        '<p class="error">Имя должно состоять от 2 символов</p>',
        '<p class="error">Слишком короткое значение почты</p>',
        '<p class="error">Неправильный формат почты</p>',
        '<p class="error">Телефон должен состоять из 11 цифр</p>',
    ];

    if (empty($userInfo['name'])) {
        echo $errors[0];
    } elseif (strlen($userInfo['name']) < 2) {
        echo $errors[1];
    }

    if (empty($userInfo['email'])) {
        echo $errors[0];
    } elseif (strlen($userInfo['email']) < 7) {
        echo $errors[2];
    } elseif (!filter_var($userInfo['email'], FILTER_VALIDATE_EMAIL)) {
        echo $errors[3];
    }

    if (empty($userInfo['phone'])) {
        echo $errors[0];
    } elseif (strlen($userInfo['phone']) != 11) {
        echo $errors[4];
    }

    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }

    return ['success' => true];

    if (!$result['success']) {

        foreach ($result['errors'] as $error) {
            echo $error . '<br>';
        }
    } 
}

?>

<body>
    <form action="" class="form" name="reg" method="post">
        <div class="form_div">
            <input type="text" name="name" placeholder="Имя">
        </div>
        <div class="form_div">
            <input type="text" name="email"  placeholder="Почта">
        </div>
        <div class="form_div">
            <input type="text" name="phone"  placeholder="Номер телефона">
        </div>
        <input type="submit" name="reg" value="Отправить" class="bth">
    </form>
</body>

</html>