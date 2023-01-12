<?php


class Personnage
{
    private $id;
    private $carte_id;
    private $name_pers;
    private $life;
    private $status;

    public function __construct($id,$carte_id,$name_pers,$life,$status)
    {
        $this->id=$id;
        $this->carte_id=$carte_id;
        $this->name_pers=$name_pers;
        $this->life=$life;
        $this->status=$status;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_carteId()
    {
        return $this->carte_id;
    }

    public function get_namePers()
    {
        return $this->name_pers;
    }
    
    public function get_life()
    {
        return $this->life;
    }

    public function get_status()
    {
        return $this->status;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_carteId($carte_id) {
        $this->carte_id=$carte_id;
    }

    public function set_namePers($name_pers) {
        $this->name_pers=$name_pers;
    }

    public function set_life($life) {
        $this->life=$life;
    }

    public function set_status($status) {
        $this->status=$status;
    }
}