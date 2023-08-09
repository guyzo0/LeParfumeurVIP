<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mark',
        'model',
        'serialNumber',
        'matricule',
        'code',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
