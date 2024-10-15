
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <title>Reporte - Usuarios</title>

    <style>
      table {
   width: 100%;
   border: 1px solid #000;
   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
th {
   background: #eee;
}
    </style>

</head>
<body>
  <h1><center>Lista de Pacientes</center></h1>
    <table>
        <thead>
            <tr">
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Residencia</th>
            </tr>                    
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{$paciente['nombre']}}</td>
                <td>{{$paciente['edad']}}</td>
                <td>@if($paciente['sexo']=='h')
                    {{'Hombre'}}
                    @else
                    {{'Mujer'}}
                    @endif
                </td>
                <td>{{$paciente['residencia']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
