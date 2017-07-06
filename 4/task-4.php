<?php
$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
$data = json_decode($result, true);
echo "<pre>";
print_r($data);
// Решение данного задания вызывает очень много вопросов! =) Решил за 5 мин на коленке, однако хочу узнать оптимальный метод решения
$page_id = $data['query']['pages']['15580374']['pageid'];
$title = $data['query']['pages']['15580374']['title'];
echo "Pageid - $page_id<br>title - $title";


