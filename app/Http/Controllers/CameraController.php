<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImagePath;

class CameraController extends Controller
{
    public function index()
    {
      return view('capture_image');
    }

    public function store(Request $request)
    {
      $canvas = $request->input('upload_image');

      if (isset($canvas)) {
        $canvas = preg_replace('<data:image/png;base64,>', '', $canvas);
        $canvas = base64_decode($canvas);
        Storage::disk('public')->put('sample.png', $canvas);

        $image_path = new ImagePath;
        $image_path->path = asset('storage/sample.png');
        $image_path->save();
      }

      return redirect(/*secure_*/url('/'));
    }

    public function index_video()
    {
      return view('capture_video_image');
    }
}
