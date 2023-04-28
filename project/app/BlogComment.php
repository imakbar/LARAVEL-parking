<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
	protected $fillable = [
        'blogcomment_id',
        'blogcategorysetup_id',
        'blogpost_id',
		'user_id',
        'comment',

        'commentable_id',
        // 'commentable_type',

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

    public function Replies()
    {
        return $this->hasMany(BlogComment::class, 'blogcomment_id');
    }

    // public function BlogCommentDetails()
    // {
    //     return $this->hasMany(BlogComment::class, 'blogcomment_id', 'id')->whereNull('blogcomment_id');
    // }

    // public function BlogCommentDetails()
    // {
    //     // return $this->hasMany(BlogComment::class, 'blogcomment_id', 'id');
    //     return $this->morphMany(BlogComment::class, 'blogpost_id')->whereNull('blogcomment_id');
    // }
}
