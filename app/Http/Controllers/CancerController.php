<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancer;
class CancerController extends Controller
{
    public function index()
    {
        // This method should return a list of cancers
        $cancers = Cancer::all();
        if ($cancers->isEmpty()) {
            return response()->json(['message' => 'No cancers found'], 404);
        }
        return response()->json($cancers);
    }
   
}
