<?php

namespace App\Libraries;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseNotification
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(WRITEPATH . 'firebase/firebase-service-account.json');

        $this->messaging = $factory->createMessaging();
    }

    // public function sendNotification($fcmToken, $title, $body, array $data = [])
    // {
    //     $message = CloudMessage::withTarget('token', $fcmToken)
    //         ->withNotification(
    //             Notification::create($title, $body)
    //         )
    //         ->withData($data);

    //     return $this->messaging->send($message);
    // }

    public function sendNotification($fcmToken, $title, $body, array $data = [])
{
    $message = CloudMessage::withTarget('token', $fcmToken)
        ->withNotification(
            Notification::create($title, $body)
        )
        ->withData($data);

    return $this->messaging->send($message);
}
}