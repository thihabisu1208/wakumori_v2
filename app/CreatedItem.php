<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatedItem extends Model
{
    protected $guarded = [];

    public function create($created = true)
    {
        $this->update(compact('created'));
    }

    public function notcreate()
    {
        $this->create(false);
    }
}
