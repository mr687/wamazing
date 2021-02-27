<?php

namespace Mr687\Wamazing\Channel;

use Illuminate\Notifications\Notification;
use Mr687\Wamazing\Wamazing;

class WamazingChannel
{
  public function send($notifiable, Notification $notification)
  {
    $message = $notifiable->toWamazingChannel($notifiable);

    (new Wamazing())
      ->chat()
      ->from($message->getDevice())
      ->to($message->getTo())
      ->message($message->getContent())
      ->sendText();
  }
}
