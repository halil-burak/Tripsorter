<?php

namespace TripSorter;

class Startandfinish {
    
    private $start;
    private $finish;
    private $destinations;
    
     public function __construct() {
         $this->start  = $start;
         $this->finish = $finish;
         
         $this->destinations = [
             'Tokyo',
             'Moscow',
             'Ankara',
             'Madrid',
             'Los Angeles',
             'Chicago',
             'Rio de Janeiro',
             'Athens',
             'Istanbul',
             'Dubai'
         ];
     }
     
     function getAandB() {
         
         $startAndFinish = [];
         $points = [];
         $startAndFinish = $this->getRandomPoints();
         $destinations = $this->destinations;
         array_push($points, $destinations[$startAndFinish[0]], $destinations[$startAndFinish[1]]);
         return $points;
     }
     
     private function getRandomPoints() {
        
        $list = [];
        $start  = rand(1, count($this->destinations));
        array_splice($this->destinations, $start, 1);
        $finish = rand(1, count($this->destinations));
        while($start == $finish) {
            $finish = rand(1, count($this->destinations));
        }
        array_push($list, $start, $finish);
        return $list;
     }
}