<?php


namespace App\Models;


class MBWorks_translations extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'mb_works_translations';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'record_id', 'language_code', 'title', 'description'];

    public function work ()
    {
        return $this->hasOne(MBWorks::class,'id' , 'record_id');
    }
}