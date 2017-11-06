<script>
  <?php
    function countVideo($myDIR, $room) {
      $dir = opendir('../video/' . $myDIR);
      $count = 0;
      while($file = readdir($dir)) {
        // if($file == '.' || $file == '..'){
        if(preg_match("/^$room/", $file)) {
          $count++;
        }
      }
      echo $count;
    }
  ?>
  </script>