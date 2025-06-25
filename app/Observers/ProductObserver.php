<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
  /**
   * Handle the Product "created" event.
   */
  public function created(Product $product): void
  {
    //
  }

  /**
   * Handle the Product "updated" event.
   */
  public function updated(Product $product): void
  {
    // Check and delete old 'image_product'
    if ($product->isDirty('image_product')) {
      $old = $product->getOriginal('image_product');
      if ($old && Storage::disk('public')->exists($old)) {
        Storage::disk('public')->delete($old);
      }
    }

    // Check and delete old 'image_highlight'
    if ($product->isDirty('image_highlight')) {
      $old = $product->getOriginal('image_highlight');
      if ($old && Storage::disk('public')->exists($old)) {
        Storage::disk('public')->delete($old);
      }
    }

    // Check and delete old feature images
    if ($product->isDirty('features')) {
      $oldFeatures = $product->getOriginal('features');
      foreach ($oldFeatures as $feature) {
        if (!empty($feature['image']) && Storage::disk('public')->exists($feature['image'])) {
          Storage::disk('public')->delete($feature['image']);
        }
      }
    }

    // Check and delete old specification documents
    if ($product->isDirty('specifications')) {
      $oldSpecs = $product->getOriginal('specifications');
      foreach ($oldSpecs as $spec) {
        if (!empty($spec['document']) && Storage::disk('public')->exists($spec['document'])) {
          Storage::disk('public')->delete($spec['document']);
        }
      }
    }
  }

  /**
   * Handle the Product "deleted" event.
   */
  public function deleted(Product $product): void
  {
    // Delete main image and highlight image
    foreach (['image_product', 'image_highlight'] as $field) {
      $path = $product->$field;
      if ($path && Storage::disk('public')->exists($path)) {
        Storage::disk('public')->delete($path);
      }
    }

    // Delete feature images
    foreach ($product->features ?? [] as $feature) {
      if (!empty($feature['image']) && Storage::disk('public')->exists($feature['image'])) {
        Storage::disk('public')->delete($feature['image']);
      }
    }

    // Delete specification documents
    foreach ($product->specifications ?? [] as $spec) {
      if (!empty($spec['document']) && Storage::disk('public')->exists($spec['document'])) {
        Storage::disk('public')->delete($spec['document']);
      }
    }
  }

  /**
   * Handle the Product "restored" event.
   */
  public function restored(Product $product): void
  {
    //
  }

  /**
   * Handle the Product "force deleted" event.
   */
  public function forceDeleted(Product $product): void
  {
    //
  }
}
