<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use OwenIt\Auditing\Contracts\Auditable;

class Notification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'notifiable_id');
    }

    public function sendNotificationFirebase($user_id, $contents, $save_to_db = null)
    {
        if (!empty($save_to_db)) {
            NotificationCustom::create([
                'sender_id' => auth()->id() ?? 1,
                'getter_id' => $user_id,
                'content' => $contents ?? "Đã gửi hình ảnh",
            ]);
        }

        if (env('FIREBASE_SERVER_NOTIFIABLE')) {

            $topic = (string)$user_id;
            if (auth()->check() && auth()->id() == $topic) return;

            Http::withBasicAuth('keys', 'secret')->withOptions(['verify'=>false])->timeout(1)
                ->withHeaders([
                    'token' => env('TOKEN')
                ])
                ->post(env('HOST_SEND_NOTIFICATION_FIREBASE') . $topic, [
                    'body' => $contents ?? "Đã gửi hình ảnh",
                    'title' => optional(auth()->user())->display_name ?? "Thông báo",
                ]);


//            $messaging = app('firebase.messaging');
//
//            $topic = (string)$user_id;
//            if (auth()->check() && auth()->id() == $topic) return;
//
//            $message = CloudMessage::fromArray([
//                'topic' => $topic,
//                'notification' => [
//                    'body' => $contents ?? "Đã gửi hình ảnh",
//                    'title' => optional(auth()->user())->display_name ?? "Thông báo",
//                ]
//            ]);
//
//            $messaging->send($message);

        }
    }

}
