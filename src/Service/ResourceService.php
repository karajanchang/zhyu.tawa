<?php
namespace Tawa\Service;


abstract class ResourceService
{
    public static $model;
    public static $group = null;
    public static $showInMenu = true;
    protected array $fields = [];

    /**
     * @return array
     */
    abstract public function fields();

}
