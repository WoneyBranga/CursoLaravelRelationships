<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function location()
    {
        return $this->hasOne(Location::class);

        # caso colunas de amarracao fujam do padrao, devemos informa-la como parametro na sequencia...
        # Ex:
        #return $this->hasOne(Location::class, 'country_id', 'id');
    }
}
