<?php include_once 'templates/api/api_params.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>EasyAutocomplete json example</title>
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/easy-autocomplete.min.css" rel="stylesheet" type="text/css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.easy-autocomplete.min.js" type="text/javascript" ></script>
</head>
<body>
 <h1>EasyAutocomplete - country flags example</h1>
 <input id="tags" placeholder="Enter"/>
<script type="text/javascript">
var options = {
    url: "resources/res.json",
    getValue: "name",
    list: { match: { enabled: true },maxNumberOfElements: 10 },
    template: { type: "custom",
				method: function(value, item) {
				 var content='';
					return "<img src='" + (item.image)+ "' style='width:60px;height:60px;'>" + value;
			    } } };
$("#tags").easyAutocomplete(options);
</script>
</body>
</html>
