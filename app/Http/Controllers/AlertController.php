<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pest;

class AlertController extends Controller
{
    public function getPestAlerts()
    {
        // Fetch all pests from the database
        $pests = Pest::all();

        // Pass the pests to the view
        return view('alerts', compact('pests'));
    }
}