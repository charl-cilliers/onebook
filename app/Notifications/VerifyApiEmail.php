<?php
namespace App\Notifications;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
class VerifyApiEmail extends VerifyEmailBase
{
    /**
     * Get the verification URL for the given notifiable.
     *
     * @param mixed $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        $user = User::find(['id' => $notifiable->getKey()])->first();
        \Log::info($user);
        return url('onebookapp://verfiy/'.$user->verify_token);
//            URL::(
//            'verificationapi.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
//        ); // this will basically mimic the email endpoint with get request
    }
}