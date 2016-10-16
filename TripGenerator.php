<?php
namespace TripSorter;

use TripSorter\Trip;

class TripGenerator {
    
    private $stations;
    private $from;
    private $to;
	private $seat;
	private $gate;
	private $flightNumber;
    
    public function __construct($from, $to) {
        
       $this->from = $from;
       $this->to   = $to;
	   $this->seat = $seat;
	   $this->gate = $gate;
	   $this->flightNumber = $flightNumber;
       
       $this->stations = [
            'Paris',
            'London',
            'Liverpool',
            'Berlin',
            'Utah',
            'Buenos Aires',
            'Frankfurt Am Main',
            'Barcelona',
            'Istanbul',
            'New York',
            'Sydney'
        ];
    }
    
    public function getTripList() {
        //returns trip list sorted
        $trips = [];
        
        $randomStation = $this->getRandomStation();
        
        for ($i = 0; $i < $randomStation; $i++) {
            
            $random = $this->getRandomTransportation();
            $ticket = $this->getTicket($random);
            $transportation = $this->getTransportation($random);

            $rndStation = $this->getRandomStation() - 1;
            
            if (count($trips) > 0) {
                // the next trip must start from the finish point of the previous trip
                $ticket->setFrom($trips[count($trips)-1]->getTicket()->getTo());
                
            } else {
                //starting point setting
                $ticket->setFrom($this->from);
            }

            $ticket->setTo($this->stations[$rndStation]);
			$ticket->setSeat($this->getSeatNo());
			
            array_splice($this->stations, $rndStation, 1);
            
            $trips[] = new Trip($ticket, $transportation);
            
            unset($ticket);
            unset($transportation);
        }
        
        // Set to finish destination
        $transportation = $this->getTransportation($random);
        $random = $this->getRandomTransportation();
        $ticket = $this->getTicket($random);
        
        $ticket->setFrom($trips[count($trips)-1]->getTicket()->getTo());
        $ticket->setTo($this->to);
        $ticket->setSeat($this->getSeatNo());
      
            
        $trips[] = new Trip($ticket, $transportation);
        
        return $trips;
    }
    
    private function getRandomTransportation() {
        //pick one transport type
        return rand(1, 3);
    }
    
    private function getRandomStation() {
        //pick one station on the way
        return rand(1, count($this->stations));
    }
    
    private function getTicket($random) {
        // Ticket type
        switch ($random) {
            
            case 1:
                return new BusTicket();
                
            case 2:
                return new TrainTicket();
                
            case 3:
                $planeTicket = new PlaneTicket();
				//$planeTicket->setGate(rand(1, 500));
				//$planeTicket->setFlightNo(rand(1000, 9999));
				//echo $planeTicket->getGate() . "DEBUG";
                return $planeTicket;
                
            default:
                throw new \Exception("Unknown ticket type!");
        }
    }
    
     private function getTransportation($random) {
        // Means of Transportation Types
        switch ($random) {
            
            case 1:
                $bus = new Bus();
                $number = $this->getTransportNumber(); 
                $bus->setNo($number);
                return $bus;
                
            case 2:
                $train  = new Train();
                $number = $this->getTransportNumber();
                $train->setNo($number);
                return $train;
                
            case 3:
                $plane = new Plane();
                $number_flight = $this->getFlightNumber();
                $number_gate   = $this->getGate();
                $baggage       = rand(0, 300);
                if($baggage == 0) {
                    $baggage = "Baggage will we automatically transferred from your last leg. Keep going.";
                }
                $plane->setNo($number_flight);
                $plane->setGate($number_gate);
                $plane->setBaggage($baggage);
                return $plane;
                
            default:
                throw new \Exception("Unknown transportation type!");
        }
    }
	
	private function getSeatNo() {
		// Transportation seat number generation
		$data   = 'ABCDEFGH';
        $prefix =  substr(str_shuffle($data), 0, 1);
        $prefix = rand(0, 100). "" . $prefix;
        
        if(strpos($prefix, '0') !== false) {
            $prefix = "No seating arranged.";
        }
		
		return $prefix;
	}
	
	function getGate() {
	    //Genetate gate number
	    $gate = rand(100, 999);
	    return $gate;
	}
	
	function getFlightNumber() {
	    //Generate flight number
	    $data   = 'ABCDEFGHIJKLMNOPQRSTUXWYZ';
	    $prefix = substr(str_shuffle($data), 0, 2);
        $prefix = $prefix . "" . rand(100, 9999) ;
        return $prefix;
	}
	
	function getTransportNumber() {
	    //Generate number for means of transports
	    $letters = 'ABCDEFGHIJKLMNOPQRSTUXWYZ';
        $prefix  = substr(str_shuffle($letters), 0, 1);
	    $prefix  = rand(1, 999) . "" . $prefix;
	    return $prefix;
	}
}