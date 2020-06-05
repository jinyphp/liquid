<?php
// 컴포저 로드
require "../../../autoload.php";

$file1 = file_get_contents("file1.html");
echo \jiny\liquid($file1, ['name' => 'Alex']);
