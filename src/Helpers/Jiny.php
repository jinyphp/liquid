<?php
/*
 * This file is part of the jinyPHP package.
 *
 * (c) hojinlee <infohojin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace jiny;

function liquid($body=null, $data=null)
{
    $obj = \Jiny\Liquid\Template::instance();  
    if (func_num_args()) {
        return $obj->liquid($body, $data);
    } else {
        return $obj;
    }
}
