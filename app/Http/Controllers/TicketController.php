<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use App\Models\Ticket;
use Illuminate\Support\Str;

class TicketController extends Controller
{
  public function store(Request $request)
  {
    $validated = $request->validate([
      'full_name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'phone_number' => 'required|string|max:20',
      'company' => 'required|string|max:255',
      'ticket_category' => 'required|string',
      'subject' => 'required|string|max:255',
      'description' => 'required|string',
      'attachment' => 'nullable',
    ]);

    try {
      // Create new ticket
      $ticket = new Ticket();
      $ticket->token = strtoupper(Str::random(2)) . mt_rand(10000, 99999);;
      $ticket->full_name = $validated['full_name'];
      $ticket->email = $validated['email'];
      $ticket->phone_number = $validated['phone_number'];
      $ticket->company = $validated['company'];
      $ticket->ticket_category = $validated['ticket_category'];
      $ticket->subject = $validated['subject'];
      $ticket->description = $validated['description'];
      $ticket->status = 'queue';
      $ticket->save();

      // Handle single file attachment
      if (!empty($validated['attachment'])) {
        $fileData = json_decode($validated['attachment'], true);

        if (isset($fileData['file'])) {
          $filename = $fileData['file'];
          $sourcePath = 'ticket-tmp/' . $filename;
          $destinationFilename = strtoupper(Str::uuid()) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
          $destinationPath = 'lampiran-tiket/' . $destinationFilename;

          if (Storage::exists($sourcePath)) {
            Storage::move($sourcePath, 'public/' . $destinationPath);
            $ticket->attachment = $destinationPath;
          }
        }
      }

      $ticket->save();

     return redirect('/pemesanan')->with('success');
    } catch (\Exception $e) {
      Log::error('Ticket creation failed: ' . $e->getMessage());
      return redirect()->back()->withErrors(['error' => 'Failed to create ticket. Please try again.'])->withInput();
    }
  }


  // Filepond conf.
  public function upload(Request $request)
  {
    if ($request->hasFile('attachment')) {
      $file = $request->file('attachment');

      $extension = $file->getClientOriginalExtension();
      $filename = uniqid('file_', true) . '.' . $extension;
      $path = 'ticket-tmp';

      $file->storeAs($path, $filename);

      return response()->json([
        'file' => $filename,
      ], 200);
    }

    return response()->json(['message' => 'No file uploaded'], 400);
  }
  // public function upload(Request $request)
  // {
  //   if ($request->hasFile('attachment')) {
  //     $files = $request->file('attachment');
  //     $uploadedFiles = [];

  //     if (!is_array($files)) {
  //       $files = [$files];
  //     }
  //     foreach ($files as $file) {
  //       $extension = $file->getClientOriginalExtension();
  //       $filename = uniqid('file_', true) . '.' . $extension;
  //       $path = 'ticket-tmp';

  //       $file->storeAs($path, $filename);

  //       $uploadedFiles[] = [
  //         'filename' => $filename,
  //       ];

  //     }
  //     return response()->json(['files' => $uploadedFiles], 200);
  //   }
  //   return response()->json(['message' => 'No file uploaded'], 400);
  // }

  public function revert(Request $request)
  {
    $data = json_decode($request->getContent(), true);

    if (isset($data['files'][0]['id'])) {
      $filename = $data['files'][0]['id'];
      $path = storage_path("app/ticket-tmp/{$filename}");
      if (file_exists($path)) {
        unlink($path);
        return response()->noContent();
      }
      return response()->json(['error' => 'File not found'], 404);
    }
    return response()->json(['error' => 'Invalid revert payload'], 400);
  }


  // End fn,
}
