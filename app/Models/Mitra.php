<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mitra';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Membuat timestamps tidak automatis.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'jenis',
        'nama',
        'wilayah',
        'no_telp',
        'kategori',
        'website',
        'overview',
        'foto',
    ];

    /**
     * Relation to loker table
     */
    public function loker()
    {
        return $this->hasMany(Loker::class);
    }

    /**
     * Relation to kantor table
     */
    public function kantor()
    {
        return $this->hasMany(Kantor::class);
    }
}