<?php

namespace App\Controllers\Api\MLA;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\NotificationModel;

class Notification extends BaseController
{
   public function index()
    {
        $mlaModel = new MlaModel();
        $notificationModel = new NotificationModel();

        $token = $this->request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Authorization token is required.'
            ]);
        }

        $token = str_replace('Bearer ', '', $token);

        $mla = $mlaModel
            ->where('api_token', $token)
            ->first();

        if (!$mla) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid MLA token.'
            ]);
        }

        $page = (int) ($this->request->getGet('page') ?? 1);
        $limit = (int) ($this->request->getGet('limit') ?? 20);

        if ($page < 1) {
            $page = 1;
        }

        if ($limit < 1 || $limit > 100) {
            $limit = 20;
        }

        $offset = ($page - 1) * $limit;

        $totalNotifications = $notificationModel
            ->where('user_type', 'mla')
            ->where('user_id', $mla['id'])
            ->countAllResults(false);

        $notifications = $notificationModel
            ->where('user_type', 'mla')
            ->where('user_id', $mla['id'])
            ->orderBy('id', 'DESC')
            ->findAll($limit, $offset);

      return $this->response->setJSON([
      'status' => true,
      'message' => 'Notifications fetched successfully',
      'pagination' => [
          'page' => $page,
          'limit' => $limit,
          'total' => $totalNotifications,
          'total_pages' => ceil($totalNotifications / $limit)
      ],
      'data' => $notifications
      ]);
    }

    public function unreadCount()
{
    $mlaModel = new MlaModel();
    $notificationModel = new NotificationModel();

    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token is required.'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);

    $mla = $mlaModel
        ->where('api_token', $token)
        ->first();

    if (!$mla) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid MLA token.'
        ]);
    }

    $unreadCount = $notificationModel
        ->where('user_type', 'mla')
        ->where('user_id', $mla['id'])
        ->where('is_read', 0)
        ->countAllResults();

    return $this->response->setJSON([
        'status' => true,
        'message' => 'Unread notification count fetched successfully.',
        'unread_count' => $unreadCount
    ]);
}

public function markAsRead($id)
    {
        $mlaModel = new MlaModel();
        $notificationModel = new NotificationModel();

        $token = $this->request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Authorization token is required.'
            ]);
        }

        $token = str_replace('Bearer ', '', $token);

        $mla = $mlaModel->where('api_token', $token)->first();

        if (!$mla) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid MLA token.'
            ]);
        }

        $notification = $notificationModel
            ->where('id', $id)
            ->where('user_type', 'mla')
            ->where('user_id', $mla['id'])
            ->first();

        if (!$notification) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Notification not found.'
            ]);
        }

        $notificationModel->update($id, [
            'is_read' => 1
        ]);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Notification marked as read.'
        ]);
    }

    public function markAllAsRead()
{
    $mlaModel = new MlaModel();
    $notificationModel = new NotificationModel();

    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token is required.'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);

    $mla = $mlaModel->where('api_token', $token)->first();

    if (!$mla) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid MLA token.'
        ]);
    }

    $notificationModel
        ->where('user_type', 'mla')
        ->where('user_id', $mla['id'])
        ->set(['is_read' => 1])
        ->update();

    return $this->response->setJSON([
        'status' => true,
        'message' => 'All notifications marked as read.'
    ]);
}
}