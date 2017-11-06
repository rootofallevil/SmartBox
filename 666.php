<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="pics/fav-trans.png" type="image/png">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/mmystyle.css">
  <link rel="stylesheet" href="bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css">
  <script src="js/moment-with-locales.min.js"></script>
  <script src="js/jquery-3.2.1.js"></script>
  <script src="bootstrap-datetimepicker-master/src/js/bootstrap-datetimepicker.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <title>SmartBox_archVideo</title>
</head>

<body>
  <div class="jumbotron text-center">
    <h1>SmartBox</h1>
    <p>Video backup archive</p> 
  </div>

  <div class="container calendar">
    <div class="row">
      <div class="col-xs-12 text-center" style="background-color:grey">
        <form>
          <input type="date" name="date" id="myDate" value="2017-10-30" min="2017-10-28" required>
          <!-- value="<?php echo date('Y-m-d'); ?>"  установить текущую дата -->
        </form>




         <!-- 
        <script> $(function() {
          $('#datetimepicker2').datetimepicker(moment().format('YYYY-MM-dd'));
          // var now = moment().format('YYYY MM DD');
          // alert(now);
        });
      </script> -->













      </div>
    </div>
  </div>

<!-- OutPosts List -->

  <div class="container text-center objects">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-4">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<!-- 1 -->
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h3 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  г.Вельск<br> <small>ул. Дзержинского, д. 105, к.1</small>
                </a>
              </h3>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <div class="container cntBtn lBtn" onclick="pezda()">Зал</div>
                <div class="container cntBtn rBtn" onclick="pezda()">Склад</div>
              </div>
            </div>
          </div>
<!-- 2 -->
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h3 class="panel-title">
                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  г.Санкт-Петербург<br><small>ул. Адмирала Трибуца, д. 5А</small>
                </a>
              </h3>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                <div class="container cntBtn lBtn" onclick="pezda()">Зал</div>
                <div class="container cntBtn rBtn" onclick="pezda()">Склад</div>
              </div>
            </div>
          </div>
<!-- 3 -->
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading3">
              <h3 class="panel-title">
                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  г.Санкт-Петербург<br><small>ул. Народная, д.27</small>
                </a>
              </h3>
            </div>
            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body">
                <div tabindex="1" class="container cntBtn lBtn" data-path="Narod/TZ-" onclick="getPath()">Зал<br>
                  <span>total:<?php countVideo(Narod, TZ) ?></span>
                  <span>last: 31.10.2017</span>
                </div>
                <div tabindex="1" class="container cntBtn rBtn" role="button" data-path="Narod/Storage-" onclick="getPath()">Склад
                </div>
              </div>
            </div>
          </div>
        
        </div>  

<!-- Submit -->
        <div class="container SubmitBtn" onclick="subForm()"><img src="../pics/fav-trans.png" height="65%" style="margin-top: -3px;">Get Video</div>





      </div>            <!--  ячейки: конец -->
    </div> 
  </div>

                        <!--   Модальное окно с видео  -->

  <div id="myModalBox" class="modal fade" aria-labelledby="myModalBox">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <video id="path" class="embed-responsive-item" height="100%" width="100%" controls autoplay></video>
        </div>
      </div>
    </div>
  </div>
                        <!--   Модальное окно с видео: конец  -->

</body>

  

  <script>
    var GlobalPath = 0;
    var GlobalDate = 0;

    function getPath() {
      GlobalPath = document.activeElement.dataset.path;
      console.log(GlobalPath);
    }

    function getDate() {
      var tmp = document.getElementById("myDate").value;
      tmp = tmp.substr(2);
      GlobalDate = tmp.replace(/(\d+)-(\d+)-(\d+)/, '$3-$2-$1');
      console.log(GlobalDate);
    }

    function AlertClose() {
      $('#AlertModal').alert('close');
    }

    function subForm() {
      getDate();
      if (GlobalPath === 0) {
        $('#AlertModal').modal('show');
        alert('Не выбран обект и камера!');
        return; } 
      else {
        var finalPath = '../' + 'video/' + GlobalPath + GlobalDate + '.mp4';
        console.log(finalPath);
        $.ajax(finalPath, { 
            success:  function() {
                        document.getElementById('path').setAttribute('src', finalPath);
                        $('#myModalBox').modal('show');
                      },
            error:  function() {
                      alert("Такого видео не существует");
                    },
            method: "HEAD"
        });
      }
    }
  </script>

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

</html>









