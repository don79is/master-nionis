<?php


namespace App\Models;


class MBResources extends CoreModel
{
    protected $table = 'mb_resources';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'mime_type', 'path', 'width', 'size', 'height'];
}