<?php
namespace TripSorter;

use TripSorter\Transportation;
use TripSorter\Type;

class Plane implements Transportation {
    
    private $no;
    private $gate;
    private $baggage;
    
    function getType() {
        
        return Type::PLANE;
    }
    
    function getNo() {
        
        return $this->no;
    }
    
    function setNo($no) {
        
        $this->no = $no;
    }
    
     function getGate() {
        
        return $this->gate;
    }
    
    function setGate($gate) {
        
        $this->gate = $gate;
    }
    
    function getBaggage() {
        
        return $this->baggage;
    }
    
    function setBaggage($baggage) {
        
        $this->baggage = $baggage;
    }
}