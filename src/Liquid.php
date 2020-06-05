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

class Liquid
{
    public $Liquid;

    public function __construct()
    {
        \Liquid\Liquid::set('INCLUDE_ALLOW_EXT', true);

        // liquid 4.0
        // 테그변경
        \Liquid\Liquid::$config['TAG_START'] = "{%-";
        \Liquid\Liquid::$config['TAG_END'] = "-%}";
        \Liquid\Liquid::$config['VARIABLE_START'] = "{{-";
        \Liquid\Liquid::$config['VARIABLE_END'] = "-}}";

        $this->Liquid = new \Liquid\Template($path);
    }

    /**
     * Liquid 랜더링을 처리합니다.
     */
    public function Liquid($body, $data)
    {        
        // Liquid 코드를 추출합니다.
        $this->Liquid->parse($body);

        // 추출한 코드에 데이터를 처리합니다.
        return $this->Liquid->render($data);
    }

    /**
     * 
     */
}