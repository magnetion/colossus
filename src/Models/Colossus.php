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

    public function categories()
    {
        return $this->hasMany('\Magnetion\Colossus\Models\Taxonomy', 'post_id', 'id')
            ->join('blog_metadata', 'blog_metadata.id', '=', 'metadata_id')
            ->where('type', 'category')
            ->select('post_id', 'blog_metadata.name', 'blog_metadata.slug', 'blog_metadata.type', 'blog_metadata.count');
    }

    public function tags()
    {
        return $this->hasMany('\Magnetion\Colossus\Models\Taxonomy', 'post_id', 'id')
            ->join('blog_metadata', 'blog_metadata.id', '=', 'metadata_id')
            ->where('type', 'tag')
            ->select('post_id', 'blog_metadata.name', 'blog_metadata.slug', 'blog_metadata.type', 'blog_metadata.count');
    }

    public function comments()
    {
        return $this->hasMany('\Magnetion\Colossus\Models\Comment', 'post_id', 'id');
    }
}


class Taxonomy extends Model
{
    protected $table = 'blog_taxonomy';
}