<?php
// 컴포저 로드
require "../../../autoload.php";

$content= file_get_contents("index.html");
echo $content;
$ft = \jiny\frontMatter($content);
print_r($ft);

$content = \jiny\liquid($ft->content, $ft->data);
echo $content;


/*


$file2 = file_get_contents("file2.html");
echo \jiny\liquid($file2, ['content' => $content, 'name'=>"hojin"]);
*/