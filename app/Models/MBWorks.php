<?php


namespace App\Models;


class MBWorks extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'mb_works';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'url'];

    protected $with = ['translation', 'resourcesConn'];

    public function translation ()
    {
        $lang = request('language_code');
        if($lang == null)
            $lang = app()->getLocale();
        return $this->hasOne(MBWorks_translations::class, 'record_id' , 'id')
            ->where('language_code', $lang);
    }

    public function resourcesConn()
    {
        return $this->hasMany(MBWorksResourcesConnections::class,
            'work_id', 'id')->with(['files']);
    }
}