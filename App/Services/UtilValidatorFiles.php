<?php

namespace App\Services;

final class UtilValidatorFiles{


    public static function valida_zip_aula($nome_dir): bool
    {
        $valid = [];

        if (is_dir($nome_dir)) {
            if ($dh = opendir($nome_dir)) {
                while (($file = readdir($dh)) !== false) {
                    if($file == 'assets' && is_dir($nome_dir . $file)){
                        array_push($valid, true);
                    }
                    if($file == 'aula.js' && UtilValidatorFiles::procurar_palavra_no_texto($nome_dir . $file, '$configuracao=')){
                        array_push($valid, true);
                    }
                    if($file == 'index.html' && UtilValidatorFiles::procurar_palavra_no_texto($nome_dir . $file, 'creator:software')){
                        array_push($valid, true);
                    }
                }
                closedir($dh);
            }
        }

        return sizeof($valid) === 3;
    }

    public static function diretorio_existe($nome_dir):bool
    {
        return is_dir($nome_dir) && file_exists($nome_dir);
    }

    public static function valida_se_tamanho_arquivo_maior_zero(Object $file): bool
    {
        if(!is_file($file->getFilePath()))
            if($file->getSize() == 0)
                return false;

        return true;
    }

    public static function valida_extensao_arquivo(Object $file, array $extensoes): bool
    {
        $extensao = pathinfo($file->getClientFileName(), PATHINFO_EXTENSION);
        if(!in_array($extensao, $extensoes))
            return false;
        return true;
    }
}