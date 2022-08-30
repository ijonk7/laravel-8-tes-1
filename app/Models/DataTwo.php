<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTwo extends Model
{
    use HasFactory;

    protected $table = 'employee';
    // protected $primaryKey = 'flight_id';

    public function dataOne()
    {
        return $this->belongsTo(DataOne::class, 'ID', 'DEPT_ID');
        // return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
    }
}
