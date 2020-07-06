var input_image = document.getElementById('input_image');
var display = document.getElementById('display');
var ctx = display.getContext('2d');
var canvas_width = 250;
var canvas_height = 250;

display.addEventListener('click', () => {
		input_image.click();
}, false)

input_image.addEventListener('change', () => {
		var file = input_image.files[0];
		var image = new Image();
		var reader = new FileReader();

		reader.onload = function() {
				image.onload = function() {
						var image_width = image.naturalWidth;
						var image_height = image.naturalHeight;

						// 縮小比の計算
						var scale = 1.0;
						if ( (image_width/image_height) > (canvas_width/canvas_height) ) {
								scale = canvas_height / image_height;
						} else {
								scale = canvas_width / image_width;
						}

						// 元画像の切り出し領域の計算
						var clip_width = canvas_width / scale;
						var clip_height = canvas_height / scale;
						var clip_x = (image_width - clip_width) / 2;
						var clip_y = (image_height - clip_height) / 2;

						ctx.clearRect(0, 0, canvas_width, canvas_height);
						ctx.drawImage(image, clip_x, clip_y, clip_width, clip_height, 0, 0, canvas_width, canvas_height);

						document.getElementById('upload_image').value = display.toDataURL('image/*');
				}
				image.src = reader.result;
				image.onerror = function (){ console.log(image.error); }
		}
		reader.readAsDataURL(file);
		reader.onerror = function (){ console.log(reader.error); }
}, false);
