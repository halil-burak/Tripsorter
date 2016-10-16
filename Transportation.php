<?php
namespace TripSorter;

interface Transportation {
    
    function getType();
    function getNo();
    function setNo($no);
}