<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOne extends Model
{
    use HasFactory;

    protected $table = 'department';
    // protected $primaryKey = 'flight_id';

    public function dataTwo()
    {
        return $this->hasMany(DataTwo::class, 'DEPT_ID', 'ID');
        // return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }
}
