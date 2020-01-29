<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Subpage
 *
 * @property int $id
 * @property array $title
 * @property array $contents
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subpage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subpage extends Model
{
    use SoftDeletes;

    protected $casts = [
        'title' => 'array',
        'contents' => 'array',
    ];

    protected $fillable = ['title', 'contents'];

    public function getTitleAttribute(): ?string
    {
        $locale = \App::getLocale();
        $title = json_decode($this->attributes['title'], true, 512, JSON_THROW_ON_ERROR);

        return \Arr::get($title, $locale, null);
    }

    public function setTitleAttribute($value): void
    {
        $locale = \App::getLocale();
        $current = json_decode($this->attributes['title'], true, 512, JSON_THROW_ON_ERROR);
        $new = array_merge($current, [$locale => $value]);
        $this->attributes['title'] = json_encode($new, JSON_THROW_ON_ERROR, 512);
    }

    public function getContentsAttribute(): ?string
    {
        $locale = \App::getLocale();
        $title = json_decode($this->attributes['contents'], true, 512, JSON_THROW_ON_ERROR);

        return \Arr::get($title, $locale, null);
    }

    public function setContentsAttribute($value): void
    {
        $locale = \App::getLocale();
        $current = json_decode($this->attributes['contents'], true, 512, JSON_THROW_ON_ERROR);
        $new = array_merge($current, [$locale => $value]);
        $this->attributes['contents'] = json_encode($new, JSON_THROW_ON_ERROR, 512);
    }

}
