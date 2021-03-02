<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quay số trúng thưởng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="quayso/main.css" type="text/css" />
        <script type="text/javascript" src="quayso/Winwheel.min.js"></script>
        <script src="quayso/TweenMax.min.js"></script>
</head>
<body style="background-color: tomato">
<div class="row">
  <div class="col-sm-6">
    <div align="center">

            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="438" height="582" class="the_wheel" align="center" valign="center">
                        <canvas id="canvas" width="434" height="434">
                            <p style="color: white" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                        
                    </td>
                </tr>

            </table>
            @if($num >0)
            <button id="spin_start" class="btn" onClick="startSpin();">Quay ngay</button> <br><br>
            <h4 id="message">Bạn còn<span id="luot">{{$num}}</span> lượt quay</h4>
            @else
            <h4 id="message">Hết lượt quay</h4>
            @endif
        </div>
  </div>
<div class="col-sm-6" align="center">
<table class="table table-bordered" style="width:90%;margin-top:60px">
    <thead>
      <tr>
        <th>Lượt quay</th>
        <th>Giải thưởng</th>
        <th>Thời gian quay</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      @foreach($result as $value)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$value->result}}</td>
        <td>{{$value->time}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="quayso/script.js"></script>
</body>
</html>
