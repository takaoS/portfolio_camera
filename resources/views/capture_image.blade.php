<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>カメラ サンプル</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <h2>カメラサンプル</h2>
  <form id="image_form" action="{{ /*secure_*/url('/') }}" method="post">
    @csrf
    <input id="input_image" type="file" style="display:none" name="input_image" accept="image/png, image/jpeg" capture>
    <input id="upload_image" type="hidden" name="upload_image" value="">
    <input id="submit_image" type="submit" name="submit_image" value="送信">
  </form>
  <canvas id="display" width="500" height="500" style="background-color: #000; width:250px; height:250px;"></canvas>
  <script src="{{ /*secure_*/asset('js/script.js') }}"></script>
</body>
</html>
