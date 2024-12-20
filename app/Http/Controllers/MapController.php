<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function ShowMapsTugas1() {
        return view('mapsTugas1');
    } 
    public function ShowMapsLatihan1() {
        return view('mapsLatihan1');
    } 
}