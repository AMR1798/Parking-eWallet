<?php

namespace App\Http\Filters;

use Agog\Osmose\Library\OsmoseFilter;
use Agog\Osmose\Library\Services\Contracts\OsmoseFilterInterface;

class paymentlogFilter extends OsmoseFilter implements OsmoseFilterInterface
{
    /**
     * Defines compulsory filter rules
     * @return array
     */
    public function bound () :array
    {
        return [

        ];
    }

    /**
     * Defines form elements and sieve values
     * @return array
     */
    public function residue () :array
    {
        return [
            'bank' => function ($query, $value) {
                if ($value == ''){
                    return $query;
                }else{
                    return $query->where('bankname', $value);
                }
                
            },
            'user' => 'relationship:user,name'
        ];
    }
}
