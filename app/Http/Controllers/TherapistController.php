<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class TherapistController extends Controller
{
    public function index()
    {
    $contents = Content::all(); // Fetch all content
    return view('therapist.dashboard', compact('contents')); // Pass to view
    }

    public function appIndex()
    {
        // Fetch the appointments where the logged-in therapist is assigned
        $appointments = Appointment::where('therapistID', Auth::id())->with('patient')->get();

        // Pass appointments to the view
        return view('therapist.appointments', compact('appointments'));
    }

}
