<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Setting\BlogCategorySetup;

class BlogPost extends Model
{
	protected $fillable = [
		'blogcategorysetup_id',
        'title',
        'slug',
        'description',

        'meta_tags',
        'meta_description',

        'avatar',

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

    public function BlogCategorySetup()
    {
        return $this->belongsTo(BlogCategorySetup::class, 'blogcategorysetup_id', 'id');
    }

    public function Comments()
    {
        return $this->hasMany(BlogComment::class, 'blogpost_id', 'id')->whereNull('blogcomment_id');
    }

    public function BlogComments()
    {
        return $this->hasMany(BlogComment::class, 'blogpost_id', 'id');
    }
}
