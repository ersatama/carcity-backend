<?php

namespace App\Domain\Contracts;

class CompletionContract extends MainContract
{
    const TABLE =   'completions';
    const FILLABLE  =   [
        self::CUSTOMER,
        self::CUSTOMER_ID,
        self::NUMBER,
        self::ORGANIZATION,
        self::DATE,
        self::SUM,
        self::NAME,
        self::STATUS
    ];
}
