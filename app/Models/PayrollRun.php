<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollRun extends Model
{
    use HasFactory;

    protected $fillable = ['period', 'gross_total', 'deductions_total', 'net_total'];

    public function items()
    {
        return $this->hasMany(PayrollItem::class);
    }
}
