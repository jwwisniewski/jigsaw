<?php
declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Arr;

trait MultiLangSupport
{
    protected function readMultiLangValue(string $key): ?string
    {
        $locale = request()->get('editLang', config('jigsaw.defaultClientLocale'));
        $value = json_decode($this->attributes[$key], true, 512, JSON_THROW_ON_ERROR);

        return Arr::get($value, $locale, null);
    }

    protected function storeMultiLangValue(string $key, ?string $value): void
    {
        $locale = request()->get('editLang', config('jigsaw.defaultClientLocale'));
        $current = json_decode($this->attributes[$key] ?? '{}', true, 512, JSON_THROW_ON_ERROR);
        $new = array_merge($current, [$locale => $value]);
        $this->attributes[$key] = json_encode($new, JSON_THROW_ON_ERROR, 512);
    }
}