<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\traits\DeleteFlagTrait;

class Office extends Model
{
    use HasFactory;
    use DeleteFlagTrait;

    protected $table = 'offices';

    public function getOffice(){
        return $this->all();
    }

    public function getDeletedOffices(){
        return $this->onlyTrashed()->get();
    }

    public function memo(){
        return $this->hasMany(Memo::class);
    }

}
