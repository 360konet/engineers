<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle user authentication and redirect based on department.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // Redirect based on department
        switch ($user->department) {
            case 'Architect':
                return redirect('/architect');
            case 'Electricals':
                return redirect('/electricals');
            case 'Civil Works':
                return redirect('/civil');
            case 'Quantity surveyors':
                return redirect('/quantity');
            case 'Orderly Room':
                return redirect('/orderly');
            case 'Finance':
                return redirect('/finances');
            case 'Admin':
                return redirect('/home'); // Admin dashboard
            default:
                return redirect('/'); // Default fallback
        }
    }

    /**
     * Override username field for authentication.
     *
     * @return string
     */
    public function username()
    {
        return 'svc';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Send a failed login response.
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
