<?php

namespace ExcelDriver;

use Facades\Facade;

class Excel extends Facade
{
    /**
     * @return string
     */
    public static function setNameSpace()
    {
        return ExcelService::class;
    }
}