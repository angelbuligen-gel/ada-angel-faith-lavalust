<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Module</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background:#0b1120;
            color:#e2e8f0;
            padding:40px;
        }

        .container{
            max-width:1200px;
            margin:auto;
        }

        /* Header */
        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            margin-bottom:25px;
        }

        .header h1{
            color:#60a5fa;
            font-size:34px;
            font-weight:700;
            margin-bottom:5px;
        }

        .header p{
            color:#94a3b8;
            font-size:15px;
        }

        .count-card{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            padding:18px 25px;
            border-radius:14px;
            color:white;
            text-align:center;
            box-shadow:0 10px 25px rgba(37,99,235,.35);
        }

        .count-card h2{
            font-size:28px;
        }

        .count-card span{
            font-size:13px;
            opacity:.9;
        }

        /* Main Card */
        .table-card{
            background:#111827;
            border-radius:18px;
            overflow:hidden;
            border:1px solid #1e3a8a;
            box-shadow:0 12px 35px rgba(0,0,0,.4);
        }

        /* Table */
        table{
            width:100%;
            border-collapse:collapse;
        }

        thead{
            background:#1d4ed8;
        }

        thead th{
            color:white;
            text-align:left;
            padding:18px;
            font-size:14px;
            text-transform:uppercase;
            letter-spacing:.5px;
        }

        tbody td{
            padding:16px 18px;
            border-bottom:1px solid #1f2937;
        }

        tbody tr{
            transition:.25s;
        }

        tbody tr:nth-child(even){
            background:#0f172a;
        }

        tbody tr:hover{
            background:#172554;
        }

        /* User Info */
        .user-info{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .avatar{
            width:45px;
            height:45px;
            border-radius:50%;
            background:linear-gradient(135deg,#2563eb,#60a5fa);
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            font-weight:bold;
            font-size:18px;
        }

        .fullname{
            color:white;
            font-weight:600;
            font-size:15px;
        }

        .email{
            color:#7dd3fc;
            font-size:14px;
        }

        .id-badge{
            background:#1e40af;
            color:#dbeafe;
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
            font-weight:bold;
        }

        .username{
            background:#1e293b;
            color:#93c5fd;
            padding:7px 12px;
            border-radius:20px;
            font-size:13px;
            border:1px solid #2563eb;
        }

        /* Button */
        .btn-profile{
            display:inline-block;
            text-decoration:none;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            padding:10px 16px;
            border-radius:8px;
            font-size:14px;
            font-weight:600;
            transition:.3s;
        }

        .btn-profile:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 18px rgba(59,130,246,.45);
            background:linear-gradient(135deg,#1d4ed8,#60a5fa);
        }

        /* Footer */
        .footer{
            padding:18px;
            text-align:center;
            color:#64748b;
            font-size:13px;
            background:#0f172a;
        }

        /* Responsive */
        @media(max-width:768px){

            body{
                padding:20px;
            }

            .header{
                flex-direction:column;
                align-items:flex-start;
                gap:15px;
            }

            .count-card{
                width:100%;
            }

            table{
                display:block;
                overflow-x:auto;
                white-space:nowrap;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="header">

        <div>
            <h1>👥 User Management</h1>
            <p>Manage and view registered student accounts.</p>
        </div>

        <div class="count-card">
            <h2><?= count($users); ?></h2>
            <span>Total Users</span>
        </div>

    </div>

    <!-- Table -->
    <div class="table-card">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Student Information</th>
                    <th>Email Address</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach($users as $user): ?>

                <tr>

                    <!-- ID -->
                    <td>
                        <span class="id-badge">
                            #<?= $user['id']; ?>
                        </span>
                    </td>

                    <!-- Student -->
                    <td>
                        <div class="user-info">

                            <div class="avatar">
                                <?= strtoupper(substr($user['firstname'],0,1)); ?>
                            </div>

                            <div>
                                <div class="fullname">
                                    <?= $user['firstname']; ?>
                                    <?= $user['lastname']; ?>
                                </div>
                            </div>

                        </div>
                    </td>

                    <!-- Email -->
                    <td class="email">
                        <?= $user['email']; ?>
                    </td>

                    <!-- Username -->
                    <td>
                        <span class="username">
                            @<?= $user['username']; ?>
                        </span>
                    </td>

                    <!-- Action -->
                    <td>
                        <a href="/users/profile/<?= $user['id']; ?>" class="btn-profile">
                            View Profile
                        </a>
                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <div class="footer">
            User Management Module • LavaLust PHP MVC
        </div>

    </div>

</div>

</body>
</html>