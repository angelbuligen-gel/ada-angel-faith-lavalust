<!DOCTYPE html>
<html>
<head>
    <title>Users</title>

    <style>

        body{
            font-family: Arial;
            background:#f4f4f4;
            padding:40px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th{
            background:#4CAF50;
            color:white;
            padding:12px;
        }

        td{
            padding:12px;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f2f2f2;
        }

        h2{
            margin-bottom:20px;
        }

    </style>

</head>

<body>

<h2>User Management Module</h2>

<table>

    <thead>

        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach($users as $user): ?>

        <tr>

            <td><?= $user['id']; ?></td>
            <td><?= $user['firstname']; ?></td>
            <td><?= $user['lastname']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['username']; ?></td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</body>

</html>