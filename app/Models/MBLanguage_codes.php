<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MBLanguage_codes extends Model
{
    public $incrementing = false;
    public $updated_at = false;
    /**
     * Database table name
     * @var string
     */
    protected $table = 'mb_language_codes';

    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id','language_code', 'name', 'is_active'];

    public $timestamps = false;
}