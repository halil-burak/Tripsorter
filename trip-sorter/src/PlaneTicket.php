<?php
namespace TripSorter;

use TripSorter\Ticket;
use TripSorter\Type;

class PlaneTicket implements Ticket {
    
    private $from;
    private $to;
    private $seat;
    
    function getType() {
        
        return Type::PLANE;
    }
    
    function getFrom() {
        
        return $this->from;
    }
    function setFrom($from) {
        
        $this->from = $from;
    }
    
    function getTo() {
        
        return $this->to;
    }
    
    function setTo($to) {
        
        $this->to = $to;
    }
    
    function getSeat() {
        
        return $this->seat;
    }
    
    function setSeat($seat) {
        
        $this->seat = $seat;
    }
}