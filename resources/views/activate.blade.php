<!DOCTYPE html>
<html>
<head>
  <title>Account activation</title>
</head>
<body>
  <div>
  	@if ($errors -> has('token'))
  		<h1>Invalid Activation Token</h1>
  	@else
  		<h1>Account Activated Successfully</h1>
  	@endif
  </div>
</body>
</html>
