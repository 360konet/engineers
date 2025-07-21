<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    //
    public function users(){
        $currentDateTime = now();
        $users = User::orderBy('id', 'desc')->get();
        $ucount = User::select('id')->count();

        return view('super.users.users',compact('currentDateTime','users','ucount'));
    }



    public function add_account(){
        $currentDateTime = now();
        return view ('super.users.add_account',compact('currentDateTime'));
    }


    public function add_new_account(Request $request){
        $new = new User();
    
        $new->name = $request->input('name');
        $new->phone = $request->input('phone');
        $new->department = $request->input('department');
        $new->svc = $request->input('svc');
        $new->email = $request->input('email');
        $new->password = Hash::make($request->input('password')); // Hashing the password
        $new->save();
    
        return redirect('add-account');
    }

        
    public function send(Request $request)
    {
        $phone = $request->input('phone');
        $message = $request->input('message');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('FROG_SMS_API_KEY'),
            'Accept' => 'application/json',
        ])->post(env('FROG_SMS_URL'), [
            'sender_id' => env('FROG_SMS_SENDER_ID'),
            'message' => $message,
            'phone' => $phone,
        ]);

        // Optional: Check for success
        if ($response->successful()) {
            return back()->with('success', 'SMS sent to ' . $phone);
        } else {
            return back()->with('error', 'Failed to send SMS. ' . $response->body());
        }
    }




    
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $data = $request->only(['name', 'phone', 'svc', 'department', 'email']);

    // Only update password if it was filled in
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return back()->with('success', 'User updated successfully.');
}



public function destroy($id)
{
    $user = User::find($id);
    $user->delete();
    return back()->with('success', 'User deleted successfully.');
}



public function sendBulkSMS(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:1600',
    ]);

    $users = User::all();

    foreach ($users as $user) {
        // Send SMS via your preferred API (like Mnotify, Twilio, etc.)
        $this->sendSMS($user->phone, $request->message);
    }

    return back()->with('success', 'Bulk SMS sent successfully.');
}


}
