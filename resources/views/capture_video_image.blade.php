<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>カメラサンプル ビデオver.</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <h2>カメラサンプル ビデオver.</h2>
	<video id="video_area" width="640" height="480" style="background-color: #000" autoplay></video>
  <button id="start">ビデオスタート</button>
  <button id="capture">撮影</button>
  <form id="image_form" action="{{ /*secure_*/url('/') }}" method="post">
    @csrf
    <input id="image" type="hidden" name="upload_image" value="">
    <input id="submit_image" type="submit" name="submit" value="送信">
  </form>
  <canvas id="captured_image"></canvas>
	<script src="{{ asset('js/script2.js') }}"></script>
</body>
</html>
