<?php

class Register extends Model
{

    public function getData()
    {

        $errors = [];
        $login = '';
        $email = '';
        $db = Db::getConnection();
        $secret = '6Le4HRsUAAAAAOIUN0i8j9IpUEtemWiSANQRKRct';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

            $ip = $_SERVER['REMOTE_ADDR'];

            if (isset($_POST['login'])) {
                $login = $_POST['login'];
                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $login = trim($login);
            }

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $email = stripslashes($email);
                $email = htmlspecialchars($email);
                $email = trim($email);
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

            if (empty ($_POST['g-recaptcha-response'])) {
                $errors[] = 'Подтвердите, что вы не робот!';
            }


            if (empty($errors)) {
                $gump = new GUMP();
                $_POST = $gump->sanitize($_POST);

                $gump->validation_rules(array(
                    'login' => 'required|min_len,5',
                    'password' => 'required|max_len,25|min_len,3',
                    'email' => 'required|valid_email',
                ));
                $gump->filter_rules(array(
                    'login' => 'trim|sanitize_string',
                    'password' => 'trim',
                    'email' => 'trim|sanitize_email',
                ));
                $validatedData = $gump->run($_POST);

                if ($validatedData === false) {
                    $validationResult = $gump->get_errors_array();
                    foreach ($validationResult as $error) {
                        $errors[] = $error;
                    }
                }
            }

            if (empty($errors)) {
                if (empty($login) || empty($password) || empty($_POST['verification']) || empty($email)) {
                    $errors[] = 'Вы ввели не всю информацию. Заполните все поля!';
                }
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
                $sql2 = "INSERT INTO users (login,password,ipv4) VALUES(\"$login\",\"$hashedpassword\",\"$ip\")";
                $result2 = mysqli_query($db, $sql2);
                if ($result2) {
                    header('HTTP/1.1 200 OK');
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . "/login");
                    $this->sendMail($email, $login);
                    exit;
                } else {
                    $errors[] = 'Ошибка! Вы не зарегистрированы.';
                }
            }
        }
        $data = [
            'login' => $login,
            'errors' => $errors,
            'email' => $email
        ];
        return $data;
    }

    public function sendMail($email, $login)
    {
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'loftschoolhomeworks@gmail.com';
        $mail->Password = 'BaHrAmA120590';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setLanguage('ru');

        $mail->setFrom('loftschoolhomeworks@gmail.com', 'LoftSchool Homeworks');
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Добро пожаловать в Smilebook';
        $mail->Body = '<h1>Доброго времени суток, ' . $login . '! Ваш аккаунт создан!</h1><br><img src="https://pp.userapi.com/c836432/v836432329/314d9/0gY2bWrdueo.jpg">';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    }

//    private static function Validate()
//    {
//        $gump = new GUMP();
//        $_POST = $gump->sanitize($_POST);
//
//        $gump->validation_rules(array(
//            'login' => 'required|min_len,5',
//            'password' => 'required|max_len,25|min_len,3',
//            'email' => 'required|valid_email',
//        ));
//        $gump->filter_rules(array(
//            'login' => 'trim|sanitize_string',
//            'password' => 'trim',
//            'email' => 'trim|sanitize_email',
//        ));
//        $validatedData = $gump->run($_POST);
//
//        if ($validatedData === false) {
//            $validationResult = $gump->get_errors_array();
//            foreach ($validationResult as $error) {
//                $errors[] = $error;
//            }
//        }

//        $validationArray = [
//            'login' => $login,
//            'email' => $email,
//            'ip' => $ip
//        ];
//
//        $validationResult = GUMP::is_valid($validationArray,[
//            'login' => 'required|min_len,5',
//            'email' => 'required|valid_email',
//            'ip' => 'required|valid_ipv4',
//        ]);
//
//        if($validationResult === true){
//            //continue
//        } else {
//            foreach ($validationResult as $error) {
//                $errors[] = $error;
//            }
//        }
//    }

}