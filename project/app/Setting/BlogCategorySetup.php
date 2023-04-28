<?php

namespace App\Setting;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\BlogPost;

class BlogCategorySetup extends Model
{
    protected $fillable = [
        'title',
        'slug',

        'meta_tags',
        'meta_description',

        'status',

        'created_by',
        'created_date',
        'created_time',
        'updated_by',
        'updated_date',
        'updated_time',
    ];

    public function CreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function UpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function BlogPosts()
    {
        return $this->hasMany(BlogPost::class, 'blogcategorysetup_id', 'id');
    }
}
