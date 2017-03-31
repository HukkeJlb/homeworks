<?php

class Register extends Model
{

    public function getData()
    {
        $errors = [];
        $login = '';
        $data = [];
        $db = Db::getConnection();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $login = trim($login);
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $password = stripslashes($password);
                $password = htmlspecialchars($password);
                $password = trim($password);
                $salt = 'stfu228solo322';
                $hashedpassword = crypt($password, $salt);
                if ($hashedpassword == '') {
                    unset($hashedpassword);
                }
            }
            if (empty($login) || empty($password) || empty($_POST['verification'])) {
                $errors[] = 'Вы ввели не всю информацию. Заполните все поля!';
            }
            if (empty($errors)) {
                // проверка на существование пользователя с таким же логином
                $sql = "SELECT id FROM users WHERE login=\"$login\"";
                $result = $db->query($sql);
                $check_login = mysqli_fetch_array($result);
                if (!empty($check_login['id'])) {
                    $errors[] = 'Извините, введённый вами логин уже зарегистрирован. Введите другой логин.';
                }
            }
            if (empty($errors)) {
                if ($_POST['password'] != $_POST['verification']) {
                    $errors[] = 'Пароли не совпадают';
                }
            }
            if (empty($errors)) {
                $sql2 = "INSERT INTO users (login,password) VALUES(\"$login\",\"$hashedpassword\")";
                $result2 = mysqli_query($db, $sql2);
                if ($result2) {
                    header('HTTP/1.1 200 OK');
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . "/login");
                    exit;
                } else {
                    $errors[] = 'Ошибка! Вы не зарегистрированы.';
                }
            }
            $data = [$login, $errors];
        }
        return $data;
    }

    public function getLogin($data)
    {
        if (!empty($data[0])) {
            $login = $data[0];
        } else {
            $login = '';
        }
        return $login;
    }

    public function getErrors($data)
    {
        if (!empty($data[1])) {
            $errors = $data[1];
        } else {
            $errors = '';
        }
        return $errors;
    }

}