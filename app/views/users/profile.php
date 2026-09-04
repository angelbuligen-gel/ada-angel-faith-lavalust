<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

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
            max-width:950px;
            margin:auto;
        }

        .back-btn{
            display:inline-flex;
            align-items:center;
            gap:8px;
            text-decoration:none;
            color:#93c5fd;
            margin-bottom:20px;
            font-weight:600;
        }

        .back-btn:hover{
            color:#60a5fa;
        }

        .profile-card{
            background:#111827;
            border-radius:22px;
            overflow:hidden;
            border:1px solid #1d4ed8;
            box-shadow:0 15px 35px rgba(0,0,0,.45);
        }

        .profile-header{
            background:linear-gradient(135deg,#1d4ed8,#2563eb,#3b82f6);
            padding:40px 35px;
            display:flex;
            align-items:center;
            gap:25px;
            flex-wrap:wrap;
        }

        .avatar{
            width:110px;
            height:110px;
            border-radius:50%;
            background:white;
            color:#2563eb;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:48px;
            font-weight:bold;
            box-shadow:0 0 20px rgba(255,255,255,.25);
        }

        .profile-header h1{
            color:white;
            font-size:32px;
            margin-bottom:8px;
        }

        .profile-header p{
            color:#dbeafe;
            font-size:15px;
            margin:4px 0;
        }

        .content{
            padding:35px;
        }

        .section-title{
            color:#60a5fa;
            font-size:20px;
            margin-bottom:20px;
            padding-bottom:10px;
            border-bottom:2px solid #1e40af;
        }

        .grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:20px;
        }

        .info-box{
            background:#0f172a;
            border:1px solid #1e3a8a;
            border-radius:14px;
            padding:18px;
            transition:.3s;
        }

        .info-box:hover{
            transform:translateY(-4px);
            border-color:#3b82f6;
            box-shadow:0 10px 20px rgba(37,99,235,.2);
        }

        .label{
            color:#94a3b8;
            font-size:13px;
            text-transform:uppercase;
            margin-bottom:8px;
            letter-spacing:.5px;
        }

        .value{
            color:white;
            font-size:17px;
            font-weight:600;
        }

        .actions{
            margin-top:35px;
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            text-decoration:none;
            padding:12px 22px;
            border-radius:10px;
            font-weight:600;
            transition:.3s;
        }

        .btn-back{
            background:#334155;
            color:white;
        }

        .btn-back:hover{
            background:#475569;
        }

        .btn-edit{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
        }

        .btn-edit:hover{
            box-shadow:0 8px 18px rgba(59,130,246,.35);
            transform:translateY(-2px);
        }

        @media(max-width:768px){

            body{
                padding:20px;
            }

            .profile-header{
                justify-content:center;
                text-align:center;
            }

            .grid{
                grid-template-columns:1fr;
            }

            .actions{
                flex-direction:column;
            }

            .btn{
                text-align:center;
            }

        }

    </style>
</head>

<body>

<div class="container">

    <div class="profile-card">

        <div class="profile-header">

            <div class="avatar">
                <?= strtoupper(substr($user['firstname'],0,1)); ?>
            </div>

            <div>
                <h1><?= $user['firstname']; ?> <?= $user['lastname']; ?></h1>
                <p><strong>User ID:</strong> #<?= $user['id']; ?></p>
                <p><strong>Username:</strong> @<?= $user['username']; ?></p>
            </div>

        </div>

        <div class="content">

            <h2 class="section-title">User Information</h2>

            <div class="grid">

                <div class="info-box">
                    <div class="label">First Name</div>
                    <div class="value"><?= $user['firstname']; ?></div>
                </div>

                <div class="info-box">
                    <div class="label">Last Name</div>
                    <div class="value"><?= $user['lastname']; ?></div>
                </div>

                <div class="info-box">
                    <div class="label">Email Address</div>
                    <div class="value"><?= $user['email']; ?></div>
                </div>

                <div class="info-box">
                    <div class="label">Username</div>
                    <div class="value">@<?= $user['username']; ?></div>
                </div>

                <div class="info-box">
                    <div class="label">User ID</div>
                    <div class="value">#<?= $user['id']; ?></div>
                </div>

                <div class="info-box">
                    <div class="label">Account Status</div>
                    <div class="value">🟢 Active</div>
                </div>

            </div>

            <div class="actions">

                <a href="/" class="btn btn-back">
                    Back to Users
                </a>

                <a href="/users/edit/<?= $user['id']; ?>" class="btn btn-edit">
                    Edit Profile
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>