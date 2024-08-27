<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Services\Mail;
use App\Models\User;
use App\Http\Requests\ChangePasswordRequest;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function sendResetLinkEmail(Request $request, Mail $mailer)
    {
    //    print_r($request->email); 
    
    // $newPassword = 'new password';

    // $mailer->message = 'Your new password:<br>' . $newPassword;       

    // $mailer->funcSend($request->email);

    // return redirect()->route('login');
    
     $user = User::where('email', $request->email)->first();

    if($user) {

        $newPassword = \Str::random(8);
        $user->password = \Hash::make($newPassword); //!!!
        $user->save(); //!!!

       $mailer->message = 'Your new password:<br>' . $newPassword;       

       $mailer->funcSend($request->email);

       return redirect()->route('login')->with('resetPassword', 'A new password has been sent to your email address.');

    }else {
           return redirect()->route('password.request')->with('notExistEmail', 'This Email does not exist.');    
        }
    } 

   /**
     * Link for changing password.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function linkChangePassword()
    {
       return view('auth.passwords.change'); //!!!auth.passwords.change   
    } 

  /**
     * Change password.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();  //  \Auth::user();

        $user->password = \Hash::make($request->password);
        $user->save();
  
        \Auth::logout();
  
        return redirect(route('login'))->with('changePassword', 'Your password has been changed.');
   
    } 
    
}
