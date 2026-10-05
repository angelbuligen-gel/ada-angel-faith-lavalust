<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Management - Login</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #0b1f33;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h1 {
            color: #0b1f33;
            font-size: 27px;
            margin-bottom: 8px;
        }

        .title p {
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #0b1f33;
        }

        .login-button {
            width: 100%;
            padding: 13px;
            background: #0b1f33;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-button:hover {
            background: #143a5a;
        }

        .message {
            display: none;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 6px;
            font-size: 14px;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
        }

        .success {
            background: #e5f7e9;
            color: #176b2c;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="title">
        <h1>Product Management</h1>
        <p>Login to access the system</p>
    </div>

    <div id="message" class="message"></div>

    <form id="loginForm">

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter username"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
            >
        </div>

        <button type="submit" class="login-button">
            Login
        </button>

    </form>

    <div class="footer">
        LavaLust API Authentication
    </div>

</div>

<script>

document.getElementById('loginForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const username =
        document.getElementById('username').value.trim();

    const password =
        document.getElementById('password').value;

    const message =
        document.getElementById('message');


    message.style.display = 'block';
    message.textContent = 'Logging in...';


    try {

        const response = await fetch(
            '/LavaLust_/ada-angel-faith-lavalust/api/login',
            {
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json'
                },

                body: JSON.stringify({
                    username: username,
                    password: password
                })
            }
        );


        const result = await response.json();


        console.log('Login response:', result);


        if (response.ok && result.status === true) {

            localStorage.setItem(
                'access_token',
                result.data.access_token
            );

            localStorage.setItem(
                'refresh_token',
                result.data.refresh_token
            );


            message.textContent =
                'Login successful. Redirecting...';


            window.location.href =
                '/LavaLust_/ada-angel-faith-lavalust/products2';

            return;
        }


        message.textContent =
            result.message ||
            'Invalid username or password.';

    }

    catch (error) {

        console.error('Login error:', error);

        message.textContent =
            'Unable to connect to the API.';

    }

});

</script>

</body>
</html>