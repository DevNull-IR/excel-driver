<?php

namespace ExcelDriver;

use Facades\Facade;

class Excel extends Facade
{
    public static function setNameSpace()
    {
        return ExcelService::class;
    }
}