<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>List Companies</title>
</head>
<body>
    <h3 class="text-center fw-bold">List Companies</h3>

    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th scope="col" width="10%">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td scope="row">{{ $company->name ?? '-' }}</td>
                    <td>{{ $company->email ?? '-' }}</td>
                    <td>{{ $company->logo ?? '-' }}</td>
                    <td>{{ $company->website ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td scope="row" colspan="5">
                        <p class="text-danger text-center">No company found!</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>