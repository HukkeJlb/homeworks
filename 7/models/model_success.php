<?php

class Success extends Model
{

    public function getData()
    {
        $errors = [];
        $messages = [];
        $db = Db::getConnection();

        //обращение к БД за данными юзера
        $sql = "SELECT name, age, description FROM `users` WHERE id = $_SESSION[userid]";
        $result = $db->query($sql);
        $array = $result->fetch_all(MYSQLI_ASSOC);
        $name = $array[0]['name'];
        $age = $array[0]['age'];
        $description = $array[0]['description'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $photo = $_FILES['photo'];
            $dir = 'photos';
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $age = $_POST['age'];
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

            if (empty($photo['name'])) {
                $sql_photo = "SELECT photo FROM `users` WHERE id = $_SESSION[userid]";
                $result = $db->query($sql_photo);
                $file_name_array = $result->fetch_all();
                $file_name = $file_name_array[0][0];
            } else {
                $pattern = '|\.+[a-zA-Z0-9]+|i'; //|.*(\.)|
                preg_match_all($pattern, $photo['name'], $photo1);
                $expansion = $photo1[0][count($photo1[0]) - 1];
                if (($expansion == '.jpg') || ($expansion == '.png') || ($expansion == '.bmp')) {
                    $file_path = $dir . '/' . $_SESSION['userid'] . '.jpg';
                    $file_name = $_SESSION['userid'] . '.jpg';
                    $result = move_uploaded_file($photo['tmp_name'], $file_path);
                } else {
                    $errors[] = 'Ошибка при загрузке файла. Ожидаемое расширение файла ".jpg", ".png", ".bmp"';
                }
            }

            if (empty($errors)) {
                $sql = "UPDATE users SET name=\"$name\", age=\"$age\", description=\"$description\", photo=\"$file_name\"WHERE id=$_SESSION[userid]";
                $result = $db->query($sql);
                if ($result) {
                    $messages[] = 'Данные успешно обновлены';
                }
            }
        }
        $data = [
            'errors' => $errors,
            'messages' => $messages,
            'name' => $name,
            'age' => $age,
            'description' => $description
        ];
        return $data;
    }

}