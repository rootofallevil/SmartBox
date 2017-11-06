    $.ajax("../video/Narod/Storage-13-07-17.mp4", {
    success: function() {
      alert('exists');
    },
    error: function() {
        alert('An error occurred. We can not play the audio');
    },
    method: "HEAD"
});
