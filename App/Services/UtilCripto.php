<?php

namespace App\Services;

final class UtilCripto{

    public static function Cripto($pass): bool | String
    {
        return hash('whirlpool',hash('sha512',hash('sha384',hash('sha256',sha1 (md5('operacional'.$pass))))));
    }
}