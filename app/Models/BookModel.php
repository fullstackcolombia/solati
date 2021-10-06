<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table         = 'slt_book';
    protected $allowedFields = ['name','description','status','created_at','updated_at','deleted_at'];
    protected $returnType    = 'App\Entities\Book';
    protected $useTimestamps = true;
}