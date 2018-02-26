<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <th>ID</th>
    <th>NOM</th>
    <th>ADRESSE</th>
    <th>TELEPHONE</th>
    </thead>
    <tr>
        <td>
            {{$client->id_client}}
        </td>
        <td>
            {{$client->nom}}
        </td>
        <td>
            {{$client->adresse}}
        </td>
        <td>
            {{$client->tel}}
        </td>
    </tr>
</table>
</body>
</html>