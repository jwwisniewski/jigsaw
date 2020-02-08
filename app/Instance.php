<?php

namespace App;

use App\Traits\MultiLangSupport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instance extends Model
{
    use SoftDeletes, MultiLangSupport;

    protected $casts = [
        'title' => 'array',
        'url' => 'array',
        'keywords' => 'array',
        'description' => 'array',
    ];

    protected $multiLang = ['title', 'url', 'keywords', 'description'];
    protected $fillable = ['title', 'url', 'keywords', 'description', 'module'];

//    public function news()
//    {
//        return $this->hasMany(News::class);
//    }

}
