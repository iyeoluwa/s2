<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'length',
        'summary',
        'podcast_date',
        'series_id',
        'audio',
        'audio_stream',
    ];


    protected $dates = [
        'converted_for_downloading_at',
        'converted_for_streaming_at',
    ];
    public function series(){
        return $this->belongsTo(Series::class);
    }
}
