<?php
    /**
     * Created by PhpStorm.
     * User: Alexander
     * Date: 17/03/16
     * Time: 16:57
     */


// My common functions
function prepareArrayForFormBuilderSelect($arr, $value = 'name')
{
    $retArr = [];
    foreach($arr as $a)
    {
        $retArr[$a->id] = $a->{$value};
    }
    return $retArr;
}