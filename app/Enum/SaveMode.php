<?php
declare(strict_types=1);

namespace App\Enum;

class SaveMode
{
    public const SAVE_AND_CONTINUE = 'saveAndContinue';
    public const SAVE_AND_RETURN = 'saveAndReturn';
    public const CANCEL = 'cancel';
}