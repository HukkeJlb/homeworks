<?php

class Login extends Model
{
    public function getData()
    {
        $login = '';
        $errors = '';
        $db = Db::getConnection();
        $secret = '6Le4HRsUAAAAAOIUN0i8j9IpUEtemWiSANQRKRct';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

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

            if (empty ($_POST['g-recaptcha-response'])) {
                $errors[] = 'Подтвердите, что вы не робот!';
            }

            if (empty($errors)) {
                if (!$login) {
                    $errors[] = 'Вы оставили пустым окно "Логин"';
                } elseif (!$password) {
                    $errors[] = 'Вы оставили пустым окно "Пароль"';
                }
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
                $_SESSION['login'] = $login;
                header('Location: http://' . $_SERVER['HTTP_HOST'] . "/success");
            }
        }
        $data = [
            'login' => $login,
            'errors' => $errors
        ];
        return $data;
    }
}