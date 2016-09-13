<?php

namespace Magnetion\Colossus\Models;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    protected $table = 'blog_author';

    public function post()
    {
        return $this->belongsTo('\Magnetion\Colossus\Models\Post');
    }
}


class Comment extends Model
{
    protected $table = 'blog_comment';
}


class MetaData extends Model
{
    protected $table = 'blog_metadata';
}


class Post extends Model
{
    protected $table = 'blog_post';

    public function author()
    {
        return $this->hasOne('\Magnetion\Colossus\Models\Author', 'id', 'author_id');
    }
}


class Taxonomy extends Model
{
    protected $table = 'blog_taxonomy';
}