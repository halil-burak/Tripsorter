<?php
namespace TripSorter;

use TripSorter\Transportation;
use TripSorter\Type;

class Bus implements Transportation {
    
    private $no;
    
    function getType() {
        
        return Type::BUS;
    }
    
    function getNo() {
        
        return $this->no;
    }
    
    function setNo($no) {
        
        $this->no = $no;
    }
}