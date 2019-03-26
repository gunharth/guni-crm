<?php

namespace App;

use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use Actionable;
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function registrar()
    {
        return $this->belongsTo(Service::class, 'registrar_id', 'id');
    }

    public function dns()
    {
        return $this->belongsTo(Service::class, 'dns_id', 'id');
    }

    public function website()
    {
        return $this->belongsTo(Service::class, 'website_id', 'id');
    }

    public function mail()
    {
        return $this->belongsTo(Service::class, 'mail_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
