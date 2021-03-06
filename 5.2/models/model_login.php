<?php

class Login extends Model
{
    public function getData()
    {
        $data = [];
        $db = Db::getConnection();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $errors = [];
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            } else {
                $login = '';
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                $password = '';
            }
            if (!$login) {
                $errors[] = 'Вы оставили пустым окно "Логин"';
            } elseif (!$password) {
                $errors[] = 'Вы оставили пустым окно "Пароль"';
            }
            if (empty($errors)) {
                $salt = 'stfu228solo322';
                $hashedpassword = crypt($password, $salt);
                $sql = "SELECT id FROM users WHERE BINARY login=\"$login\" AND BINARY password=\"$hashedpassword\"";
                $result = $db->query($sql);
                $check = $result->fetch_all(MYSQLI_ASSOC);
                if (!$check) {
                    $errors[] = 'Неверный логин или пароль';
                }
                if (empty($errors)) {
                    $_SESSION['userid'] = $check[0]['id'];
                }
            }
            if (empty($errors)) {
//                echo "<h1>Привет, $login!</h1>";
                $_SESSION['login'] = $login;
                header('Location: http://' . $_SERVER['HTTP_HOST'] . "/success");
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