<?php
date_default_timezone_set('America/Sao_Paulo');

set_error_handler(function ($severity, $message, $file, $line) {
    if (error_reporting() & $severity) {
        throw new \ErrorException($message, 0, $severity, $file, $line);
    }
});

putenv('DISPLAY_ERRORS_DETAILS='.true);
putenv('ENDERECO_BANCO=localhost');
putenv('NOME_BANCO=setupgame');
putenv('USUARIO_BANCO=root');
putenv('SENHA_BANCO=');
putenv('PORTA_BANCO=3306');

putenv('JWT_SECRET_KEY=BJI9o6IiW++ObJeCEAb8S+0aRrl4MBXS/tB0frQ9BVhN+chbwyIy0d8xW5Pvp/ghkusAivWbhsCymHCDN0Vo1/dW+E5lRPJxYlA81OgdRgP0T0uMhPW9F3nCkAcg9zqjRHks1j7O3nLM3UJgaCsdANPVoQvu5oDZ3jHT7B+zD71rDAZF0vWjvpwKaW4uflm/fNDuCDDps5rCLyOxjU2xwIGRclW/GzDZ/mUvU1Ad9OMfHodYHwaqHcRNH2D42AQkzFPH7lMq18/BiSQ8O3CN0+1oyCgtuWzrGq7vixQT7qJb+7NQaPcF4zvNx1Rh4B2iysWZQv+e/CoKvSR+znaQ5g==');