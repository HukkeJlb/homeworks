<?php
use Intervention\Image\ImageManagerStatic as Image;

class Success extends Model
{

    public function getData()
    {
        $errors = [];
        $messages = [];
        
        $user = User::find($_SESSION['userid']);
        $name = $user->name;
        $age = $user->age;
        $description = $user->description;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $photo = $_FILES['photo'];
            $dir = 'photos';
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $age = $_POST['age'];
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

            if (empty($errors)) {
                $gump = new GUMP();
                $validatedData = self::validateInput($gump);
                if ($validatedData === false) {
                    $validationResult = $gump->get_errors_array();
                    foreach ($validationResult as $error) {
                        $errors[] = $error;
                    }
                }
            }

            if (empty($photo['name'])) {
                $file_name = $user->photo;
            } else {
                $pattern = '|\.+[a-zA-Z0-9]+|i'; //|.*(\.)|
                preg_match_all($pattern, $photo['name'], $photo1);
                $expansion = $photo1[0][count($photo1[0]) - 1];
                if (($expansion == '.jpg') || ($expansion == '.png') || ($expansion == '.bmp')) {
                    $file_path = $dir . '/' . $_SESSION['userid'] . '.jpg';
                    $file_name = $_SESSION['userid'] . '.jpg';
                    move_uploaded_file($photo['tmp_name'], $file_path);
                    Image::make("$file_path")->resize(480, 480)->save("$file_path", 100);
                } else {
                    $errors[] = 'Ошибка при загрузке файла. Ожидаемое расширение файла ".jpg", ".png", ".bmp"';
                }
            }

            if (empty($errors)) {
                $result = $user->updatePersonalInfo($name, $age, $description, $file_name);
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

    private static function validateInput($gump)
    {
        $_POST = $gump->sanitize($_POST);

        $gump->validation_rules(array(
            'description' => 'required|min_len,50',
        ));
        $gump->filter_rules(array(
            'description' => 'trim|sanitize_string',
        ));

        return $gump->run($_POST);
    }

}