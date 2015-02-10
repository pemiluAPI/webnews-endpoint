<?php

class XApi
{
    public static function response($data = array('error' => 0, 'results' => null), $http_code = 200)
    {
        return Response::json(
            array(
                'error' =>   $data['error'],
                'results' => $data['results'],
            ),
            $http_code);
    }
}