<?php

namespace App\Observers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;

class TicketObserver
{
  /**
   * Handle the Ticket "created" event.
   */
  public function created(Ticket $ticket): void
  {
    //
  }

  /**
   * Handle the Ticket "updated" event.
   */
  public function updated(Ticket $ticket): void
  {
    if ($ticket->isDirty('attachment')) {
      $oldAttachment = $ticket->getOriginal('attachment');

      if ($oldAttachment && Storage::disk('public')->exists($oldAttachment)) {
        Storage::disk('public')->delete($oldAttachment);
      }
    }
  }

  /**
   * Handle the Ticket "deleted" event.
   */
  public function deleted(Ticket $ticket): void
  {
    if (! is_null($ticket->attachment)) {
      Storage::disk('public')->delete($ticket->attachment);
    }
  }

  /**
   * Handle the Ticket "restored" event.
   */
  public function restored(Ticket $ticket): void
  {
    //
  }

  /**
   * Handle the Ticket "force deleted" event.
   */
  public function forceDeleted(Ticket $ticket): void
  {
    //
  }
}
