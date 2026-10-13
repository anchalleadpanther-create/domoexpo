<?php

namespace App\Http\Controllers\Customer\Buyer;

use Illuminate\View\View;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
  public function index(): View
  {
    $user  = Auth::guard('buyer')->user();
    $notifications = Notification::where('user_type','Buyer')->where('user_id',$user->id)->orderByDesc('id')->get();
    $totalNotifications = Notification::where('user_type','Buyer')->where('user_id',$user->id)->orderByDesc('id')->count();
    Notification::where('user_type','Buyer')->where('user_id',$user->id)->update(['is_seen' => 1]);
    // dd($notifications);
    return view('customer.buyer.notification', compact('notifications','totalNotifications'));
  }
   
  public function unseenNotificationCount(){
      try {
        $unseenNotificationCount = getUnseenNotificationCount(auth()->id(),'Buyer') ?? 0;
       return $this->successResponse(compact('unseenNotificationCount'));
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }
  
    public function clearAllNotification()
    {
        $user = Auth::guard('buyer')->user();
        if (!$user) {
            return back()->with('error', 'User not authenticated!');
        }
        Notification::where('user_type', 'Buyer')->where('user_id', $user->id)->delete();
        return back()->with('success', 'Notifications have been cleared successfully!');
    }
  
  
}
