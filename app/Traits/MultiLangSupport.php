<?php
declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Arr;

trait MultiLangSupport
{
    private function getLocale(): string
    {
        return request()->get('editLang', config('jigsaw.defaultClientLocale'));
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if ($value === null || $value === '' || !in_array($key, $this->multiLang, true)) {
            return $value;
        }

        return Arr::get($value, $this->getLocale(), null);
    }

    public function setAttribute($key, $value)
    {
        if (!in_array($key, $this->multiLang, true)) {
            return parent::setAttribute($key, $value);
        }

        $allValues = parent::getAttribute($key);

        $allValues[$this->getLocale()] = $value;

        return parent::setAttribute($key, $allValues);
    }
}