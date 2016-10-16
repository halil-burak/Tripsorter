<?php
namespace TripSorter;

use TripSorter\Ticket;
use TripSorter\Type;

class PlaneTicket implements Ticket {
    
    private $from;
    private $to;
    private $seat;
    private $gate;
    private $flightNo;
    
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
    
    function getGate() {
        
        return $this->gate;
    }
    
    function setGate($gate) {
        
        $this->gate = $gate;
    }
    
    function getFlightNo() {
        
        return $this->flightNo;
    }
    
    function setFlightNo($flightNo) {
        
        $this->flightNo = $flightNo;
    }
}