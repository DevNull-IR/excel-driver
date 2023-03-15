<?php
namespace ExcelDriver;


class ExcelService
{

    /**
     * @param $file_path
     * @param $isNullCreated
     * @return bool
     */
    private function check($file_path, $isNullCreated): bool
    {
        $somNext = false;
        if (! file_exists($file_path)){
            if ($isNullCreated){
                $somNext = true;
                file_put_contents($file_path, NULL);
            }
        }else{
            $somNext = true;
        }

        if ($somNext){
            $getExtension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if ($getExtension !== "csv"){
                return false;
            }
        }

        return $somNext;
    }

    /**
     * @param string $file_path
     * @param bool $isNullCreated
     * @return array|bool
     */
    public function openDocument(string $file_path, bool $isNullCreated = true): array|bool
    {
        if ($this->check($file_path, $isNullCreated)){
            $file = file_get_contents($file_path);
            $exp = explode(PHP_EOL, $file);
            $implode = [];
            foreach ($exp as $item) {
                $getArray = explode(",", $item);
                $implode[] = $getArray;
            }
            return $implode;
        }
        return false;
    }


    /**
     * @param string $file_path
     * @param array $data
     * @param bool $isNullCreated
     * @return bool
     */
    public function editDocument(string $file_path, array $data = [], bool $isNullCreated = false): bool
    {
        if ($this->check($file_path, $isNullCreated)){
            $file = file_get_contents($file_path);
            $exp = explode(PHP_EOL, $file);
            $implode = [];
            foreach ($exp as $item) {
                $getArray = explode(",", $item);
                $implode[] = $getArray;
            }
            $execute = array_replace($implode, $data);
            $implodingComa = array_map(function ($acc) {
                return implode(",", $acc);
            }, $execute);
            file_put_contents($file_path, implode(PHP_EOL, $implodingComa));
            return true;
        }

        return false;
    }


    /**
     * @param string $file_path
     * @param array $data
     * @param bool $isNullCreated
     * @return bool
     */
    public function editWithClear(string $file_path, array $data = [], bool $isNullCreated = false): bool
    {
        if ($this->check($file_path, $isNullCreated)) {
            $implodingComa = array_map(function ($acc) {
                return implode(",", $acc);
            }, $data);
            file_put_contents($file_path, implode(PHP_EOL, $implodingComa));
            return true;
        }

        return false;
    }
}