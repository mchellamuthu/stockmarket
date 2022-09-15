<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Jenssegers\Mongodb\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Casts\Attribute;

class CurrentData extends Model
{
    protected $connection = 'mongodb';
    protected $guarded = [];



    public function getPvcloseAttribute()
    {
        $previous = now()->yesterday()->toDateString();
    // return $previous;
        $query = History::where('ticker', $this->ticker)->whereDate('date', $previous)->whereNotNull('close')->orderBy('date', 'desc')->first();
        $closed = doubleval($query->close);
        return $closed;
    }


}
