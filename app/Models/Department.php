<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $guarded = false;

    public function boss(){

        return $this->hasOneThrough(Worker::class, Position::class);

    }

    public function workers(){
        return $this->hasManyThrough(Worker::class, Position::class);
    }
}
