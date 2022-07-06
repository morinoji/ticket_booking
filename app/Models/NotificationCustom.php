<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class NotificationCustom extends Model
{
    protected $guarded = [];

    public function createNotification($getter_id, $content){
        NotificationCustom::create([
            'sender_id' => auth()->id(),
            'getter_id' => $getter_id,
            'content' => $content,
        ]);

        $this->sendNotificationFirebase($getter_id, $content);
    }

    public function sendNotificationFirebase($user_id, $content){

//        if (env('FIREBASE_SERVER_NOTIFIABLE')){
//            auth()->user()->notify(new FirebaseNotifications('Thông báo', $content, $user_id . ""));
//        }
    }

    public function sender(){
        return $this->hasOne(User::class, 'id','sender_id');
    }

    public function getter(){
        return $this->hasOne(User::class, 'id','getter_id');
    }
}
