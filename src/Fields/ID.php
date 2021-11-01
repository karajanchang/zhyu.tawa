<?php


namespace Tawa\Fields;


class ID extends AbstractField
{
    
    public function __construct($name = 'id', $column_name = null)
    {

        parent::__construct($name, $column_name);

        return $this;
    }

    public function hide(){
        $this->showOnIndex(false);
        $this->showOnCreate(false);
        $this->showOnUpdate(false);
        $this->showOnDetail(false);
    }
}
