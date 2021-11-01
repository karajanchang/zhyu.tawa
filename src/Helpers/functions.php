<?php
/**
 * determine args is a array arguments or string
 * @param $args
 * @return bool
 */
function args_get_parse($args){
    if(isset($args[0]) && is_array($args[0]) && count($args)==1){

        return $args[0];
    }

    return $args;
}
