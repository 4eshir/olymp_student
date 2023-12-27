<?php


namespace App\Models\displayed;


use Nette\Utils\DateTime;

class DisplayEntry
{
    public $id;

    public $subject;
    public $class;

    public $datetime;
    public $address;
    public $tour;
    public $status;

    public function checkDateDifference($days)
    {

        $dateEvent = explode(" ", $this->datetime)[0];
        $diff = ((strtotime(substr($dateEvent, 0, 6).'20'.substr($dateEvent, 6)) - strtotime(date("d.m.Y")))/(60*60*24));

        return $diff > $days;
    }

}
