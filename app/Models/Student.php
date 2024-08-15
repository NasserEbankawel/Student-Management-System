<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Student extends Model
{
    use HasFactory;
    
    //protected $with = ['course'] ;
    //protected $fillable = ['firstname', 'lastname','email', 'phone', 'gender', 'dob', 'course_id', 'student_id'];
    protected $guarded = [];

    //fetching students with the relationship course

    protected $with = ['course'];
    
    protected $appends = ['image_file'];


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class) ;
    }

    public function getImageURL() {
        $image = $this->image ? $this->image : 'images/default.jpg'; // not necessary
        return Storage::url($image);
    }

    protected function imageFile(): Attribute
    {
        $image = $this->image ? $this->image : 'images/default.jpg'; 
        return new Attribute(
            get: fn () => Storage::url($image) ,
        );
    }
    
}

