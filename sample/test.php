<?php
// 컴포저 로드
require "../../../autoload.php";

echo \jiny\liquid("Hello, {{- name -}}!", ['name' => 'Alex']);
