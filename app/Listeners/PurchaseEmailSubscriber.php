<?php

namespace App\Listeners;

use App\Events\PurchaseSuccess;
use App\Events\PurchaseFailed;
use App\Notifications\ItemBoughtFailure;
use App\Notifications\ItemBoughtSuccess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PurchaseEmailSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    public function subscribe($events)
    {
        $events->listen(
            PurchaseSuccess::class,
            [PurchaseEmailSubscriber::class, 'handlePurchaseSuccess']
        );

        $events->listen(
            PurchaseFailed::class,
            [PurchaseEmailSubscriber::class, 'handlePurchaseFail']
        );
    }

    public function handlePurchaseSuccess($event)
    {
        $event->user->notify(new ItemBoughtSuccess($event->user, $event->product));
    }

    public function handlePurchaseFail($event)
    {
        $event->user->notify(new ItemBoughtFailure($event->user, $event->product));
    }
}
