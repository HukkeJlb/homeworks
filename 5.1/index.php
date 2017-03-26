<?php
require 'Renault.php';
$renault1 = new Renault('Logan', 'синий', 70, 'механическая');
$renault1->move(350, 30, 'вперёд');
$renault2 = new Renault('Duster', 'жёлтый', 115, 'автоматическая');
$renault2->move(150, 10, 'назад');