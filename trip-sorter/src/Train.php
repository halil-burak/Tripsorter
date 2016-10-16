<?php
namespace TripSorter;

use TripSorter\Transportation;
use TripSorter\Type;

class Train implements Transportation {
    
    private $no;
    
    function getType() {
        
        return Type::TRAIN;
    }
    
    function getNo() {
        
        return $this->no;
    }
    
    function setNo($no) {
        
        $this->no = $no;
    }
}