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
        if (! file_exists($file_path)){echo "ab";
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
    public function openDocument(string $file_path, bool $isNullCreated = true, bool $compailer = false): array|bool
    {
        if ($this->check($file_path, $isNullCreated)){
            $file = file_get_contents($file_path);
            $exp = explode(PHP_EOL, $file);
            $implode = [];
            foreach ($exp as $key => $item) {
                if (! $compailer) {
                    $getArray = explode(",", $item);
                    $implode[] = $getArray;
                }else{
                    $getArray = explode(",=", "," . $item);
                    $i = 0;
                    foreach ($getArray as $keyA => $itemArray) {
                        if (is_null($itemArray) or $itemArray == ""){
                            if ($i++ != 0){
                                $implode[$key][] = "";
                            }
                            continue;
                        }
                        if (!str_starts_with($itemArray, ",")){
                            $implode[$key][] = eval("return $itemArray;");
                        }else{
                            $implode[$key] = explode(",", substr($itemArray, 1, strlen($itemArray)));
                        }
                    }
                }
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

    /**
     * @param string $file_path
     * @param array $data
     * @return bool
     */
    public function createDocument(string $file_path, array $data): bool
    {
        return $this->editWithClear($file_path, $data, true);
    }

    /**
     * @param string $file_path
     * @return array|false
     */
    public function getWithCompiler(string $file_path)
    {
        if ($this->check($file_path, false)){
            $get = $this->openDocument($file_path, false, true);

            return $get;
        }
        return false;
    }


    /**
     * @param string $file_path
     * @param array $data
     * @return bool
     */

    public function buildWithCompiler(string $file_path, array $data)
    {
        $this->createDocument("TMP.csv", $data);
        $get = $this->editWithClear(
            file_path: $file_path,
            data: $this->getWithCompiler("TMP.csv"),
            isNullCreated: true);
        unlink("TMP.csv");

        return $get;
    }

}