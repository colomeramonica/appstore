<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    private $table = 'developer';

    protected $primaryKey = 'dev_id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'company_name',
        'email',
        'contact_number'
    ];

    public function apps()
    {
        return $this->hasMany(App::class, 'developer_id');
    }
}
