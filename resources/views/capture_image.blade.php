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
    <input id="upload_image" type="hidden" name="upload_image" value="">
    <input id="input_image" type="file" style="display:none" name="input_image" accept="image/*" capture>
    <input id="submit_image" type="submit" name="submit_image" value="送信">
  </form>
  <canvas id="display" width="250" height="250" style="background-color: #000"></canvas>
  <script src="{{ /*secure_*/asset('js/script.js') }}"></script>
</body>
</html>
