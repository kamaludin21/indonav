<?php

namespace App\Observers;

use App\Models\Industry;
use Illuminate\Support\Facades\Storage;

class IndustryObserver
{
  /**
   * Handle the Industry "created" event.
   */
  public function created(Industry $industry): void
  {
    //
  }

  /**
   * Handle the Industry "updated" event.
   */
  public function updated(Industry $industry): void
  {
    if ($industry->isDirty('image')) {
      $oldAttachment = $industry->getOriginal('image');

      if ($oldAttachment && Storage::disk('public')->exists($oldAttachment)) {
        Storage::disk('public')->delete($oldAttachment);
      }
    }
  }

  /**
   * Handle the Industry "deleted" event.
   */
  public function deleted(Industry $industry): void
  {
    if (! is_null($industry->image)) {
      Storage::disk('public')->delete($industry->image);
    }
  }

  /**
   * Handle the Industry "restored" event.
   */
  public function restored(Industry $industry): void
  {
    //
  }

  /**
   * Handle the Industry "force deleted" event.
   */
  public function forceDeleted(Industry $industry): void
  {
    //
  }
}
