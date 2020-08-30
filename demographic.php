
<?php //include "include/session.php"?>
<?php include "include/header.php"?>


        <div >
            <div class="row" style="    padding: 48px;">
			<div class="col-md-4 col-md-offset-4">
        <div id="camera_info"></div>
    <div id="camera"></div><br>
    <button id="take_snapshots" class=" btn-sm glyphicon glyphicon-camera" style=    "border-radius: 50%; margin-left: 122px;font-size: 47px;">	</button>
	<a href="close.php" class="	glyphicon glyphicon-ok-sign btn-sm" style="    border-radius: 50%;
    margin-left: 1px;
    font-size: 63px;
    color: #00ff5c;"></a>
      </div>
      </div>
        </div>

<style>
#camera {
  width: 350px;
  height: 350px;
}

</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);

  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();

    snapshot.upload({api_url: "action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}
</script>
