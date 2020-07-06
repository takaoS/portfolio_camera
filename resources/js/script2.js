'use strict';

var video_area = document.getElementById('video_area');
var start = document.getElementById('start');
var capture = document.getElementById('capture');
const hdConstraints = {
    video: { facingMode: "environment" },
    audio: false
}

start.addEventListener('click', () => {
    navigator.mediaDevices.getUserMedia(hdConstraints)
    .then(stream => video_area.srcObject = stream)
    .catch(err => alert(`${err.name} ${err.message}`));
}, false);

capture.addEventListener('click', () => {
    var ci = document.getElementById('captured_image');
    var ci_context = ci.getContext('2d');
    var va = document.getElementById('video_area');

    ci.width  = va.videoWidth;
    ci.height = va.videoHeight;
    ci_context.drawImage(va, 0, 0);

    document.getElementById('image').value = ci.toDataURL('image/png');

    //var link = document.createElement('a');
    //link.href = ci.toDataURL('image/png');
    //link.download = 'sample.png';
    //link.click();

}, false);
