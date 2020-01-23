<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    protected $fillable = [
        'latitude',
        'longitude',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
        # caso colunas de amarracao fujam do padrao, devemos informa-la como parametro na sequencia...
        # Ex:
        #return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
