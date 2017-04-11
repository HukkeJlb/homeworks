<?php
class VkApi
{
    public $myID  = '5977332';
    public $token = '7e04d9c94960951bb4988ea5c4db8f363e54ffcf42553b781563f73ae2f9999c5c21248269c3c11b7c1e4';

    public $responseJson;
    public $requestDowl;
    public $ArrayInJson;


    public function vkRequest(string $method, array $options = []) : string {
        $params  =  http_build_query($options);
        $url     = 'https://api.vk.com/method/' . $method . '?' . $params . '&access_token=' . $this->token;

        return $this->push($url);
    }
    //метод для загрузки картики на сервер VK
    public function downloadServer($link, $nameFile)
    {
        $cfile = curl_file_create($nameFile, 'image/jpeg', 'test_name.jpg');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $link,
            CURLOPT_POST           => 1,
            CURLOPT_POSTFIELDS     => array("photo" => $cfile)
        ));
        $this->requestDowl = json_decode(curl_exec($curl));
    }
    //Работаем только с массивом,преобразуем в массив
    public function toArray(){
        $this->ArrayInJson = json_decode($this->responseJson, 1);
        return $this->ArrayInJson;
    }
    //Вывод в json
    public function toJson()
    {
        echo  $this->responseJson;
    }

    private function push($url) : string
    {
        $curl    = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_URL,$url);
        $this->responseJson = curl_exec($curl);
        curl_close($curl);
        return $this->responseJson;
    }
}