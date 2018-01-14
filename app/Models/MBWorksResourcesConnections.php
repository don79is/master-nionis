<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MBWorksResourcesConnections extends Model
{
    /**
     * @var bool
     */
    protected $updated_at = false;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'mb_works_resources_connections';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['resource_id', 'work_id'];

    public function files()
    {
        return $this->hasMany(MBResources::class,'id', 'resource_id');
    }


}