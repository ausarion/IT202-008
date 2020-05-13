<?php
/***

 * array_key_first only available in php >7.3.0 so we poly fill it

 */

if (!function_exists('array_key_first')) {

    function array_key_first(array $arr) {

        foreach($arr as $key => $unused) {

            return $key;

        }

        return NULL;

    }

}



//attempt at crude router

if (count($_GET) > 0) {

    $BASE = "templates";

    $path = array_key_first($_GET);

    if (isset($path)) {

        //Utils::flash($path);