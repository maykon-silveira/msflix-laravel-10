<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
</head>
<body>

<h1>Visualizar Cliente</h1>
@if(session('sucesso'))
   <div style="color:green;">
    {{session('sucesso')}}
    </div>
@endif
</body>
</html>