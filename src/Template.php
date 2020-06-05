<?php
/*
 * This file is part of the jinyPHP package.
 *
 * (c) hojinlee <infohojin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jiny\Liquid;

class Template
{
    private $Liquid;
    private $path = "";

    /**
     * 싱글턴
     */
    private static $_instance;
    public static function instance($args=null)
    {
        if (!isset(self::$_instance)) {               
            self::$_instance = new self($args); // 인스턴스 생성
            self::$_instance->init();
        } 
        return self::$_instance; 
    }

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        \Liquid\Liquid::set('INCLUDE_ALLOW_EXT', true);

        // liquid 4.0
        // 테그변경
        \Liquid\Liquid::$config['TAG_START'] = "{%-";
        \Liquid\Liquid::$config['TAG_END'] = "-%}";
        \Liquid\Liquid::$config['VARIABLE_START'] = "{{-";
        \Liquid\Liquid::$config['VARIABLE_END'] = "-}}";
        
        $this->Liquid = new \Liquid\Template($this->path);
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Liquid 랜더링을 처리합니다.
     */
    public function liquid($body, $data)
    {        
        return $this->parse($body)->render($data);
    }

    public function layout($body, $data)
    {   
        if($layout = $this->isLayout($data)) {

        }
        return $this->parse($body)->render($data);
    }

    /**
     * 확장 레이아웃이 있는지 확인합니다.
     */
    public function isLayout($data)
    {
        if (isset($data['layout'])) {
            return $data['layout'];
        } else return null;
    }

    // Liquid 코드를 추출합니다.
    public function parse($body)
    {
        $this->Liquid->parse($body);
        return $this;
    }

    // 추출한 코드에 데이터를 처리합니다.
    public function render($data)
    {
        return $this->Liquid->render($data);
    }

    /**
     * 
     */
}