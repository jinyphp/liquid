<?php
// 컴포저 로드
require "../../../autoload.php";

$file1 = file_get_contents("file1.html");
$content = \jiny\liquid($file1, ['name'=>"hojin"]);

$file2 = file_get_contents("file2.html");
echo \jiny\liquid($file2, ['content' => $content, 'name'=>"hojin"]);
