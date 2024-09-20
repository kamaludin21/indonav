<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
  public function view($slug)
  {
    $industry = Industry::where('slug', $slug)->first();
    return view('pages.industries.[Industry:slug]', ['industry' => $industry]);
  }
}
