<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Page</title>
</head>
<body>
    <table>
        @foreach($specs as $spec)
        <tr>
            <td>{{$spec}}:</td>
            <td>{{$carsSpecs->$spec}}</td>
        </tr>
        @endforeach
    </table>
    Work!
</body>
</html>