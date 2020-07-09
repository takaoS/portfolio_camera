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
      $disk = Storage::disk('s3');

      if (isset($canvas)) {
        $canvas = preg_replace('<data:image/jpeg;base64,>', '', $canvas);
        $canvas = base64_decode($canvas);

        // $canvasはバイナリ文字なのでstringとして認識され、File()コンストラクタに渡されるので、pathの形にしなければならない。
        // そのため、一時ファイルを使って pathとして保存する。
        // putFileAs()でなく、put()でいいなら、一時ファイルを介さなくても保存できる。
        $temp = tmpfile();
        fwrite($temp, $canvas);
        $meta = stream_get_meta_data($temp); //このままだと配列なので、$meta['uri']で pathの部分だけ使う。
        $path = $disk->putFileAs('sampledir', $meta['uri'], 'sample.jpeg', 'public');
        fclose($temp);

        $image_path = new ImagePath;
        $image_path->path = $disk->url($path);
        $image_path->save();

        //return view('capture_image', compact('image_path'));
      }
      return view('capture_image', compact('image_path'));
      //return redirect(/*secure_*/url('/'));
    }

    public function index_video()
    {
      return view('capture_video_image');
    }
}
