<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Frikly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        td:hover{
            background-color: rgb(237, 235, 235)
        }
        td{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h2 class="text-center mb-3">Customer Call Executive Agents</h2>
        <table id="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            var usersTable = $('#users-table').DataTable();

            $('#users-table tbody').on('click', 'tr', function() {
                var userId = $(this).data('id');
                window.location.href = '/user/' + userId;
            });

            @foreach ($users as $user)
                usersTable.row.add([
                    '{{ $user->user_id }}',
                    '{{ $user->name }}',
                ]).node().setAttribute('data-id', '{{ $user->user_id }}');
            @endforeach

            usersTable.draw(false);
        });
    </script>
</body>

</html>
