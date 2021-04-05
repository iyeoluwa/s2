<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use BeyondCode\Comments\Traits\HasComments;
use Spatie\Tags\HasTags;

class Article extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use HasComments;
    use HasTags;
    /**
     *the attributes that are mass assignable
     * @var array
     */

    protected  $fillable = [
        'title',
        'summary',
        'content',
        'cover_image',
        'tags'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
