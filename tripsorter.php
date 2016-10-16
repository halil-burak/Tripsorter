<?php
ini_set('display_errors', 1);

require 'hcetinkaya/trip-sorter/vendor/autoload.php';

use TripSorter\Ticket;
use TripSorter\TrainTicket;
use TripSorter\BusTicket;
use TripSorter\PlaneTicket;
use TripSorter\Transportation;
use TripSorter\Train;
use TripSorter\Bus;
use TripSorter\Plane;
use TripSorter\Trip;
use TripSorter\TripGenerator;
use TripSorter\Startandfinish;


$destinationPicker = new Startandfinish();
$destinations = $destinationPicker->getAandB();
$tripGenerator = new TripGenerator($destinations[0], $destinations[1]);
//$tripGenerator = new TripGenerator('Istanbul', 'Dubai');

$trips = $tripGenerator->getTripList();

foreach ($trips as $trip) {
    
    $ticket = $trip->getTicket();
    
    $transportation = $trip->getTransportation();
    
    if($ticket->getType() == "Plane") {
        if($ticket->getSeat() !== "No seating arranged.") {
		    echo "Take the " . $ticket->getType() . " " . $transportation->getNo() . " from " . $ticket->getFrom() . " to " . $ticket->getTo() . ". The gate number is " . $transportation->getGate() . " and sit at " . $ticket->getSeat() . ". Pick your baggage from the ticket counter no: " . $transportation->getBaggage() . "." . " <br />";
	    } else {                          
		    echo "Take the " . $ticket->getType() . " " . $transportation->getNo() . " from " . $ticket->getFrom() . " to " . $ticket->getTo() . ". The gate number is " . $transportation->getGate() . ". " . $ticket->getSeat() . ". Pick your baggage from the ticket counter no: " . $transportation->getBaggage() . "." . " <br />";
	    }
    } else if($ticket->getType() == "Train") {
        if($ticket->getSeat() !== "No seating arranged.") {
		    echo "Take the " . $ticket->getType() . " " . $transportation->getNo() . " from " . $ticket->getFrom() . " to " . $ticket->getTo() . " and sit at " . $ticket->getSeat() . "." . " <br />";
	    } else {
		    echo "Take the " . $ticket->getType() . " " . $transportation->getNo() . " from " . $ticket->getFrom() . " to " . $ticket->getTo() . ". " . $ticket->getSeat() . "." . " <br />";
	    }
    } else if($ticket->getType() == "Bus") {
    	if($ticket->getSeat() !== "No seating arranged.") {
	    	echo "Take the " . $ticket->getType() . " " . $transportation->getNo() . " from " . $ticket->getFrom() . " to " . $ticket->getTo() . " and sit at " . $ticket->getSeat() . "." . " <br />";
    	} else {                                  
	    	echo "Take the " . $ticket->getType() . " " . $transportation->getNo() . " from " . $ticket->getFrom() . " to " . $ticket->getTo() . ". " . $ticket->getSeat() . "." . " <br />";
	    }
    }
}
 echo "You have arrived at your final destination.";
?>
<html><body>
</body>
</html>