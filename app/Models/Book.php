<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'author' => 'required'
    );

    public function getData()
    {
        return $this->id . ':' . $this->title . ':' . $this->author;
    }
    use HasFactory;
}
