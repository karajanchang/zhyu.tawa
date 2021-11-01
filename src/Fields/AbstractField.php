<?php

namespace Tawa\Fields;


class AbstractField
{
    protected $name;
    protected $column_name;
    protected $type = 'text';
//    public $placeholder = '';
    public $showOnIndex = true;
    public $showOnCreate = true;
    public $showOnUpdate = true;
    public $showOnDetail = true;
    public $sortable = false;
    public $readonly = false;
    public $searchable = false;
    public $attributes = [];
    public $callbacks = [];
    protected $rules = [];
    protected $resolveFormat;
    protected $displayFormat;
    public $value;

    public function __construct(string $name, string $column_name = null){
        $this->name = $name;
        $this->column_name = $column_name;
    }

    public function __call($method, $arguments){
        if (substr($method, 0, 4) == 'show') {
            $this->{$method} = $arguments[0];
        }else{
            $this->attributes[ $method ]= $arguments[0];
        }
        return $this;
    }

    public function sortable($sortable = true){
        $this->sortable = $sortable;

        return $this;
    }

    public function searchable($searchable = true){
        $this->searchable = $searchable;

        return $this;
    }

    public function readonly($readonly = true){
        $this->readonly = $readonly;

        return $this;
    }

    public function dispatchCallbacks(){
        $res = $this->value;
        foreach($this->callbacks as $callback){
            if(is_callable($callback)){
                $res = call_user_func($callback, $res);

            }
        }

        return $res;
    }

    public function callback($callback){
        array_push($this->callbacks, $callback);

        return $this;
    }

    public function rules(...$rules){
        $this->rules = args_get_parse($rules);

        return $this;
    }

    /**
     * format data when retrieved from database
     * @param $format
     * @return $this
     */
    public function resolveFormat($format){
        $this->resolveFormat = $format;

        return $this;
    }

    /**
     * format data when display
     * @param $format
     * @return $this
     */
    public function displayFormat($format){
        $this->displayFormat = $format;

        return $this;
    }

    public static function __callstatic($method, $arguments){
        $class = get_called_class();
        if(!class_exists($class)){
            throw new \Exception('this class not exists');
        }
        $field = app()->make($class, ['name' => $arguments[0], 'column_name' => $arguments[1]]);
//        dd(get_called_class(), __METHOD__, $method, $arguments);

        return $field;
    }


}
