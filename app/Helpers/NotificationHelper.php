<?php

namespace App\Helpers;

use App\Mail\Invoices\NewInvoice;
use App\Mail\Orders\NewOrder;
use App\Mail\Test;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotificationHelper
{
    public static function bcc()
    {
        if (config('settings::bcc') == null) return [];
        return explode(',', config('settings::bcc')) ?? [];
    }

    /**
     * @param $order \App\Models\Order
     * @param $user \App\Models\User
     * 
     * @return void
     */
    public static function sendNewOrderNotification($order, $user)
    {
        if (config('settings::mail_disabled')) return;
        Mail::to($user->email)->bcc(NotificationHelper::bcc())->queue(new NewOrder($order));
    }

    /**
     * @param $invoice \App\Models\Invoice
     * @param $user \App\Models\User
     * 
     * @return void
     */
    public static function sendNewInvoiceNotification($invoice, $user)
    {
        if (config('settings::mail_disabled')) return;
        Mail::to($user->email)->bcc(NotificationHelper::bcc())->queue(new NewInvoice($invoice));
    }

    /**
     * @param $user \App\Models\User
     * 
     * @return void
     */
    public static function sendTestNotification($user)
    {
        if (config('settings::mail_disabled')) return;
        Mail::to($user->email)->bcc(NotificationHelper::bcc())->send(new Test($user));
    }
}
