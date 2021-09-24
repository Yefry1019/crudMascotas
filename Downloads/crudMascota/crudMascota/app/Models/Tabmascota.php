<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tabmascota
 *
 * @property $id
 * @property $nombre
 * @property $raza
 * @property $edad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tabmascota extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'raza' => 'required',
		'edad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','raza','edad'];



}
