<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complains;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Departments;
use App\Models\Technicians;
use App\Notifications\ComplaintStatusChanged;
use Illuminate\Support\Facades\Log;
use PDF; 

class HelpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newcomplains=Complains::where('status','Pending')->count();
        $processingcomplains=Complains::where('status','Processing')->count();
        $fixedcomplains=Complains::where('status','Fixed')->count();
        $unfixedcomplains=Complains::where('status','Unfixed')->count();

        $users=User::select('id')->count();
        $technician=Technicians::select('id')->count();
        $depts=Departments::select('id')->count();


        return view('helpdesk.admin.home',compact('depts','users', 'technician', 'newcomplains','processingcomplains','processingcomplains','fixedcomplains','unfixedcomplains'));
    }


    public function newcomplains()
    {
        $newcomplains=Complains::where('status','Pending')->get();
        return view('helpdesk.admin.complains.newcomplains',compact('newcomplains'));
    }

    public function addcomplain()
    {
        return view('helpdesk.admin.complains.addcomplain');
    }

    public function addnewcomplain(Request $request)
    {
        $complain=new Complains();
        $complain->user_id=$request->input('user_id');
        $complain->username=$request->input('username');
        $complain->email=$request->input('email');
        $complain->department=$request->input('department');
        $complain->ticketID=$request->input('ticketID');
        $complain->category=$request->input('category');
        $complain->description=$request->input('description');
        $complain->status = 'Pending';
        
        $complain->save();

        Session::flash('success', 'Complaint sent successfully.');
        return redirect('/newcomplains');
    }

    public function editstatus($id)
    {
        $editcomplain=Complains::find($id);
        $technicians=Technicians::where('status','Avaliable')->get();
        return view('helpdesk.admin.complains.editcomplain',compact('editcomplain','technicians'));
    }

    public function editcomplain(Request $request, $id)
    {
        try {
            $complain = Complains::find($id);
    
            // Store the current status for comparison later
            $previousStatus = $complain->status;
    
            $complain->user_id = $request->input('user_id');
            $complain->username = $request->input('username');
            $complain->email = $request->input('email');
            $complain->department = $request->input('department');
            $complain->ticketID = $request->input('ticketID');
            $complain->category = $request->input('category');
            $complain->description = $request->input('description');
            $complain->status = $request->input('status');
            $complain->review = $request->input('review');
    
            // Convert the selected technicians array to a comma-separated string
            $technicians = implode(', ', $request->input('technician'));
            $complain->technician = $technicians;
    
            $complain->save();
    
            if ($complain->status !== $previousStatus) {
                // Notify the user via Twilio SMS
                $user = $complain->user; // Assuming you have a relationship set up.
                
                // Check if the user has a phone number and if Twilio is configured
                if ($user->phone_number && config('app.twilio_sid') && config('app.twilio_auth_token')) {
                    $user->notify(new ComplaintStatusChanged($complain));
                }
            }
    
            Session::flash('success', 'Status changed successfully.');
            return redirect('/newcomplains');
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('An exception occurred during notification: ' . $e->getMessage());
    
            // Handle the exception gracefully, e.g., display an error message to the user
            Session::flash('error', 'An error occurred while processing your request.');
            return redirect('/newcomplains');
        }
    }
    


    public function processingcomplains()
    {
        $processingcomplains=Complains::where('status','Processing')->get();
        return view('helpdesk.admin.complains.processingcomplains',compact('processingcomplains'));
    }

    public function fixedcomplains()
    {
        $fixedcomplains=Complains::where('status','Fixed')->get();
        return view('helpdesk.admin.complains.fixedcomplains',compact('fixedcomplains'));
    }

    public function unfixablecomplains()
    {
        $unfixedcomplains=Complains::where('status','Unfixed')->get();
        return view('helpdesk.admin.complains.unfixablecomplains',compact('unfixedcomplains'));
    }

    public function deletecomplain($id){
        $dept= Complains::find($id);
        $dept->delete();
        
        Session::flash('success', 'Complain deleted successfully.');
        return redirect('/newcomplains');
    }



    public function report(){
        return view ('helpdesk.admin.report.report');
    }


    public function generateReport(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'status' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Fetch complains based on the filter criteria
        $query = Complains::query();

        if ($request->status !== 'All') {
            $query->where('status', $request->status);
        }

        $query->whereBetween('created_at', [$request->start_date, $request->end_date]);

        $complains = $query->get();

        // Generate the PDF
        $pdf = PDF::loadView('helpdesk.admin.complains.complainsreport', compact('complains', 'request'));

        // Download or display the PDF
        return $pdf->stream('complains_report.pdf');
    }



}
