<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@if (session()->has('succes'))
      <div class="alert alert-success col-lg-12" role="alert">
        {{session ('succes')}}
      </div> 
    @endif
<body>
    
</body>
</html>