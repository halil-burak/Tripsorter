<?php
namespace TripSorter;

use TripSorter\Ticket;
use TripSorter\Transportation;

class Trip {
    
    private $ticket;
    private $transportation;
    
    public function __construct(Ticket $ticket, Transportation $transportation) {
        
        $this->ticket = $ticket;
        $this->transportation = $transportation;
    }
    
    public function getTicket() {
        
        return $this->ticket;
    }
    
     public function getTransportation() {
        
        return $this->transportation;
    }
}