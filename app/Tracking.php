<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tracking
 * @package App
 */
class Tracking extends Model
{
    protected $appends = ['duration'];

    /**
     * @return bool|\DateInterval
     */
    public function getDurationAttribute()
    {
        $start = new \DateTime($this->start_datetime);

        if (empty($this->end_datetime)) {
            $start->diff($start);
        }

        $end = new \DateTime($this->end_datetime);

        return $end->diff($start);
    }
}
