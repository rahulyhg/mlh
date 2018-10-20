<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">  
function core_anchorScrolling(){
  $("a").on('click', function(event) {
    if (this.hash !== "") { event.preventDefault(); var hash = this.hash;
	  $('html, body').animate({ scrollTop: $(hash).offset().top}, 10, function(){ window.location.hash = hash; });
    } 
  });
}
$(document).ready(function(){ core_anchorScrolling(); });
</script>
</head>
<body>

<div class="container-fluid">
  <div align="center" id="div1" style="background-color:#454545;width:100%;height:1600px;">
    <a href="#div2"><button class="btn btn-primary"><b>Next Div2</b></button></a>
  </div>
  <div align="center" id="div2" style="background-color:#f6f6aa;width:100%;height:1600px;">
    <a href="#div3"><button class="btn btn-primary"><b>Next Div3</b></button></a>
  </div>
  <div align="center" id="div3" style="background-color:#aabbcc;width:100%;height:1600px;">
    <a href="#div1"><button class="btn btn-primary"><b>Next Div1</b></button></a>
  </div>
</div>

</body>
</html>