<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\FacebookPoster\FacebookPosterChannel;
use NotificationChannels\FacebookPoster\FacebookPosterPost;
use App\Http\Controllers\BitlyController;

class PublishPost extends Notification
{
    // use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FacebookPosterChannel::class];
    }

   /**
     * Get the Facebook post representation of the notification.
     *
     * @param  mixed  $notifiable.
     * @return \NotificationChannels\FacebookPoster\FacebookPosterPost
     */
    public function toFacebookPoster($product) {
        $amplifiedUrl = $product->amazon_converted_url .'?tag=bhushanmer-21';
        if(!$product->bitly_url){
            $bitlyUrl = BitlyController::shortenUrl($amplifiedUrl);
            if($bitlyUrl){
                $product->bitly_url = $bitlyUrl;
                $product->save();
            }
        }

        $amplifiedUrl = $product->bitly_url ? $product->bitly_url : $amplifiedUrl;

        return (new FacebookPosterPost($product->name .' @' .$product->amazon_price))
            ->withLink($amplifiedUrl);
    }
}
