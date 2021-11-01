<?php
namespace Tawa\Service;


use Illuminate\Http\Request;

abstract class ResourceService
{
    public static $model;
    public static $group = 'admin';
    public static $showInMenu = true;
    protected array $fields = [];

    /**
     * @param Request $request
     * @return mixed
     */
    abstract public function fields(Request $request);


    public static function redirectAtCreated(){

        return ;
    }

    public static function redirectAtUpdated(){

        return ;
    }

    public static function redirectAtDeleted(){

        return ;
    }
}
