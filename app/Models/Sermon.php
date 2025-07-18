<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sermon extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public static $allowedTypes = [
        'audio',
        'video',
        'other'
    ];

    public function sermonAuthor(){
        return $this->belongsTo(User::class, 'uploaded_by');

    }
    public function sermonCategory(){
        return $this->belongsTo(SermonCategory::class, 'sermon_category_id');
    }
    public function sermonSeries(){
        return $this->belongsTo(SermonSerie::class, 'sermon_series_id');
    }
    public function speaker(){
        return $this->belongsTo(Speaker::class, 'speaker_id');
    }

    public function sermonNotes(){
        return $this->hasMany(SermonNote::class,'sermon_id');
    }


}
