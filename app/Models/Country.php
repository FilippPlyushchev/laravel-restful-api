<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected string $table = "country_lang";

    /**
     * @var array|string[]
     */
    protected array $fillable = [
        'id',
        'alias',
        'name',
        'name_en'
    ];
}
