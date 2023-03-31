<?php

namespace ExcelDriver;

use Facades\Facade;


/**
 * @method static array|bool openDocument(string $file_path, bool $isNullCreated = true, bool $compailer = false)
 *
 * @method static bool editDocument(string $file_path, array $data = [], bool $isNullCreated = false)
 *
 * @method static bool editWithClear(string $file_path, array $data = [], bool $isNullCreated = false)
 *
 * @method static bool createDocument(string $file_path, array $data)
 *
 * @method static getWithCompiler(string $file_path)
 * @method static buildWithCompiler(string $file_path, array $data)
 */
class Excel extends Facade
{
    /**
     * @return string
     */
    public static function setNameSpace(): string
    {
        return ExcelService::class;
    }
}