<?php

namespace Magnetion\Colossus\Models;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    protected $table = 'blog_author';
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
}


class Taxonomy extends Model
{
    protected $table = 'blog_taxonomy';
}