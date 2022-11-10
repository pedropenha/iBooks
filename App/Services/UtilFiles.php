<?php

namespace App\Services;

use ZipArchive;

final class UtilFiles
{
    public static function calcular_tamanho_diretorio($diretorio): int|float
    {
        $size = 0;
        $files = glob($diretorio . '/*');
        foreach ($files as $path) {
            is_file($path) && $size += filesize($path);

            if (is_dir($path)) {
                $size += self::calcular_tamanho_diretorio($path);
            }
        }
        return $size;
    }

    public static function listar_arquivos_diretorio_detalhado($dir_inicio, $dir, &$result = array()): array
    {
        $root = scandir($dir);
        foreach ($root as $value) {
            if ($value === '.' || $value === '..') {
                continue;
            }
            if (is_file($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[] = array(
                    'nome' => basename($dir . DIRECTORY_SEPARATOR . $value),
                    'tipo' => pathinfo($dir . DIRECTORY_SEPARATOR . $value, PATHINFO_EXTENSION),
                    'tamanho' => filesize($dir . DIRECTORY_SEPARATOR . $value),
                    'diretorio' => $dir_inicio . explode($dir_inicio, $dir)[1]
                );
                continue;
            }
            foreach (self::listar_arquivos_diretorio_detalhado($dir_inicio, $dir . DIRECTORY_SEPARATOR . $value) as $value) {
                $result[] = $value;
            }
        }
        return $result;
    }

    public static function listar_arquivos_diretorio_padrao($dir, &$result = array()): array
    {
        $root = scandir($dir);
        foreach ($root as $value) {
            if ($value === '.' || $value === '..') {
                continue;
            }
            if (is_file($dir . DIRECTORY_SEPARATOR . $value)) {
                array_push($result, $dir . DIRECTORY_SEPARATOR . $value);
                continue;
            }
            foreach (self::listar_arquivos_diretorio_padrao($dir . DIRECTORY_SEPARATOR . $value) as $value) {
                $result[] = $value;
            }
        }
        return $result;
    }

    public static function copiar_diretorio($src, $dst): void
    {
        // open the source directory
        $dir = opendir($src);

        // Make the destination directory if not exist
        @mkdir($dst);

        // Loop through the files in source directory
        while ($file = readdir($dir)) {

            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . DIRECTORY_SEPARATOR . $file)) {

                    // Recursively calling custom copy function
                    // for sub directory
                    self::copiar_diretorio($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                } else {
                    copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
        closedir($dir);
    }

    public static function excluir_diretorio($diretorio): bool
    {
        $iterator = new \RecursiveDirectoryIterator($diretorio, \FilesystemIterator::SKIP_DOTS);
        $rec_iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($rec_iterator as $file) {
            $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
        }
        return rmdir($diretorio);
    }

    public static function salvar_imagem_base64($image_data, $destino, $filename): bool|string
    {
        list($type, $data) = explode(';', $image_data); // exploding data for later checking and validating

        if (preg_match('/^data:image\/(\w+);base64,/', $image_data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png

            if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
                throw new \Exception('Tipo de arquivo inválido.');
            }

            $data = base64_decode($data);

            if ($data === false) {
                throw new \Exception('base64_decode falhou.');
            }
        } else {
            throw new \Exception('URI de dados não correspondeu com dados de imagem.');
        }

        $filename = $filename . '.' . $type;
        $fullname = $destino . DIRECTORY_SEPARATOR . $filename;

        if (file_put_contents($fullname, $data)) {
            return $filename;
        }

        return false;
    }

    public static function salvar_arquivo_base64($image_data, $destino, $filename, $arrayType): string
    {
        list($type, $data) = explode(';', $image_data); // exploding data for later checking and validating


        if (preg_match('/^data:\w+\/(\w+);base64,/', $image_data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]);

            if (!empty($arrayType) && !in_array($type, $arrayType)) {
                throw new \Exception('Tipo de arquivo inválido.');
            }

            $data = base64_decode($data);

            if ($data === false) {
                throw new \Exception('base64_decode falhou.');
            }
        } else {
            throw new \Exception('URI de dados incompatível.');
        }

        $filename = $filename . '.' . $type;
        $fullname = $destino . DIRECTORY_SEPARATOR . $filename;

        if (file_put_contents($fullname, $data)) {
            $result = $filename;
        } else {
            $result = "error";
        }

        return $result;
    }

    public static function ler_arquivo_csv($dir_arquivo): array|bool
    {
        $dados = array();
        $header = null;

        if (($handle = fopen($dir_arquivo, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data = array_map("utf8_encode", $data);

                if ($header === null) {
                    $header = $data;
                    continue;
                } else {
                    $dados[] = array_combine($header, $data);
                }
            }
            fclose($handle);
        } else {
            return false;
        }

        return $dados;
    }

    public static function procurar_palavra_no_texto($texto, $palavra): bool
    {
        $flag = true;

        if ($leitura = fopen($texto, 'r+')) {
            $string = "";
            while ($linha = fgets($leitura)) {
                $string .= $linha;
            }
            fclose($leitura);

            if (!empty($string) && !strpos($string, $palavra)) {
                $flag = false;
            }
        }
        return $flag;
    }

    public static function cria_diretorio($nome_dir): bool
    {
        return mkdir($nome_dir);
    }

    public static function descompacta_arquivo($file, $nome_dir): bool
    {
        $zip = new ZipArchive();

        if (!$zip->open($file)) {
            return false;
        }

        if (!$zip->extractTo($nome_dir)) {
            return false;
        }

        $zip->close();

        return true;
    }

    public static function cria_imagem_base_64(object $file): string
    {
        return 'data:image/' . pathinfo($file->getClientFilename(), PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($file->getFilePath()));
    }

    public static function salvar_imagem_ico($source, $from, $name = ''): bool|string
    {
        if (pathinfo($source, PATHINFO_EXTENSION) != 'png')
            return false;

        $ico = imagecreatefrompng($source);

        if (!$ico)
            return false;

        if (empty($name))
            $name = md5('ico');

        $fullName = $from . DIRECTORY_SEPARATOR . $name . '.ico';

        imagebmp($ico, $fullName);

        imagedestroy($ico);
        return $fullName;
    }

    public static function traz_nome_imagem(string $imagem): string
    {
        if (strlen($imagem) == 0)
            return "";

        $imagemNome = explode(DIRECTORY_SEPARATOR, $imagem);
        $imagemNome = explode('.', $imagemNome[sizeof($imagemNome) - 1]);

        return $imagemNome[sizeof($imagemNome) - 2];
    }

    public static function copia_arquivo_para_outro_diretorio($from, $to, $filename): string|bool
    {
        if (!file_exists($from))
            return false;

        $oldFile = file_get_contents($from, true);

        $extensao = pathinfo($from, PATHINFO_EXTENSION);

        $fullname = $to . DIRECTORY_SEPARATOR . $filename . '.' . $extensao;

        if (!file_put_contents($fullname, $oldFile))
            return false;

        return $fullname;
    }

    public static function resizeImage($filename, $output, $max_width, $max_height)
    {
        list($orig_width, $orig_height) = getimagesize($filename);

        $width = $orig_width;
        $height = $orig_height;

        # taller
        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }

        # wider
        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }

        $image_p = imagecreatetruecolor($width, $height);

        $image = imagecreatefrompng($filename);

        imagesavealpha($image_p, true);
        imagealphablending($image_p, false);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

        imagepng($image_p, $output);
    }

}