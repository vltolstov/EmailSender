<?php

namespace App\Library\Services;

interface CardDavInterface
{
    public function getContacts($ip, $port, $hash, $login, $password);
}
