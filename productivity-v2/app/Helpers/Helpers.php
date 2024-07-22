<?php

namespace App\Helpers;

use App\Models\Notification;


class Helpers
{
    /**
     * Get notification emails by id.
     * @param $id Integer
     */
    static public function getNotificationEmail($id)
    {
        $notification = Notification::find($id);
        $emails = (isset($notification) ? explode(',', $notification->emails) : [config('app.email_dev')]);
        return $emails;
    }
}
