<?php 
  include("classes/database.php");
  $banco = new BancoDeDados;

  $banco->query("SELECT * FROM noticias");
  $total = $banco->linhas();

?>

<div class="container-fluid mt-5">
  <div class="row mt-5">
    <div class="col-md-12 text-center">

      <script>
        var myvid = document.getElementById('myvideo');
        var myvids = [
          "videos/webtv/2.mp4", 
          ];
        var activeVideo = 0;

        myvid.addEventListener('ended', function(e) {
          // update the new active video index
          activeVideo = (++activeVideo) % myvids.length;

          // update the video source and play
          myvid.src = myvids[activeVideo];
          myvid.play();
        });
      </script>

      <video src="videos/webtv/2.mp4" id="myvideo" width="720" height="480" controls style="background:black">
      </video>

    </div>
  </div>  
</div>
