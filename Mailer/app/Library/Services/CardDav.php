<?php

namespace App\Library\Services;


class CardDav implements CardDavInterface
{

    public function getContacts($ip, $port, $hash, $login, $password)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $ip . '/carddav/Synology/' . $hash);
        curl_setopt($ch, CURLOPT_PORT, $port);
        curl_setopt($ch, CURLOPT_USERPWD, $login . ':' . $password);
        //curl_setopt($ch, CURLOPT_USERPWD, 'synology:QW!@we23');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $data = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        var_dump($http_code);

        if($http_code == 200 && $data) {
            $pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/";
            preg_match_all($pattern, $data, $result);
            $result = array_unique($result[0]);

            return $result;

        } else {
            exit('Данные или соединение отсутствуют');
        }
    }

}
