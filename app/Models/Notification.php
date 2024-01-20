<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $fillable = [
        'topic',
        'send_date',
        'description',
        'notify_methods',
        'extra_explanation',
        'sender_id',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function notificationUsers()
    {
        return $this->hasMany(NotificationUser::class, 'notification_id');
    }

}
