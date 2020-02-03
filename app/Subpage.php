<?php

namespace App;

use App\Traits\MultiLangSupport;
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
    use SoftDeletes, MultiLangSupport;

    protected $casts = [
        'title' => 'array',
        'contents' => 'array',
    ];

    protected $multiLang = ['title', 'contents'];

    protected $fillable = ['title', 'contents'];

}
