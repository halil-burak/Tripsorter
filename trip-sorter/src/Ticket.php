<?php
namespace TripSorter;

interface Ticket {
    
    function getType();
    function getFrom();
    function setFrom($from);
    function getTo();
    function setTo($to);
    function getSeat();
    function setSeat($seat);
}