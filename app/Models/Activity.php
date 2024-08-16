<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    //protected $table = 'acitivities';
    //protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'actdate',
        'location',
        'type',
        'description',
        'photo',
        'link',
        'duedate',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            $activity->status = 'pending'; // Set default status to 'pending' when creating a new activity
        });
    }
    // Accessor to generate a full URL for the photo
    //public function getPhotoUrlAttribute()
    //{
        //if ($this->photo_path) {
            // Assuming your photos are stored in the 'photos' directory
            //return asset('photos/' . $this->photo_path);
        //}

        //return null;
    //}
}
