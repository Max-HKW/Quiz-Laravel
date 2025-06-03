<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>
</head>
<body>
    <div class="container">
        <h1>Paesi</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Capitale</th>
                    <th>Sigla</th>
                    <th>Regione</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->capital }}</td>
                    <td>{{ $country->aplha3Code }}</td>
                    <td>{{ $country->region }}</td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
                    
               