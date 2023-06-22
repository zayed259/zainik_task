<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['name'] }} | {{ $data['details'] }}</title>
    <link rel="stylesheet" href="{{url('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('avatars/' . $data['avatar']) }}" alt="{{ $data['name'] }}" />
</head>

<body>
    <div class="container text-center mt-5">
        <h2>USER DATA</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['email'] }}</td>
                    <td>{{ $data['details'] }}</td>
                    <td><img src="{{ asset('avatars/' . $data['avatar']) }}" alt="{{ $data['name'] }}" width="100px" height="100px"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>