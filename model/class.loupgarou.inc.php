<?php


class loupgarou
{
    private $id;

    public function __construct($id)
    {
        $this->id=$id;
    }

    public function get_id()
    {
        return $this->id;
    }
    public function set_id($id) {
        $this->id=$id;
    }
    
}