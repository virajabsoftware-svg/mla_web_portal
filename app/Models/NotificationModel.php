<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'notification_code',
        'user_type',
        'user_id',
        'title',
        'message',
        'notification_type',
        'reference_type',
        'reference_id',
        'data',
        'is_read'
    ];
    
    //generate automatic code for notification
    public function generateNotificationCode()
    {
        do {
            $code = 'NTF-' . strtoupper(substr(uniqid(), -10));

            $exists = $this->where('notification_code', $code)->first();
        } while ($exists);

        return $code;
    }

    public function sendNotification(array $data)
    {
        $notification = [
            'notification_code' => $this->generateNotificationCode(),
            'user_type'         => $data['user_type'],
            'user_id'           => $data['user_id'],
            'title'             => $data['title'],
            'message'           => $data['message'],
            'notification_type' => $data['notification_type'],
            'reference_type'    => $data['reference_type'] ?? null,
            'reference_id'      => $data['reference_id'] ?? null,
            'data'              => isset($data['data']) ? json_encode($data['data']) : null,
            'is_read'           => 0,
        ];

        return $this->insert($notification);
    }

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}