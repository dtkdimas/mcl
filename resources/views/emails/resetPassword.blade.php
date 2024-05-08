<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        p {
            font-weight: 500;
        }

        .background {
            background-color: rgb(232 232 232);
            padding: 5rem;
        }

        .card {
            padding: 5rem;
            background-color: white;
            border-radius: 5px;
        }

        .header {
            margin-bottom: 1rem;
        }

        .link {
            margin: 2rem 0;
        }

        .link-button {
            padding: 1rem;
            text-decoration: none;
            font-weight: 600;
            color: white !important;
            background-color: #9747ff;
            border-radius: 5px;
        }

        .footer {
            margin: 1.5rem 0;
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="card">
            <div class="header">
                <h3>Hello,</h3>
            </div>
            <div>
                <p>You are receiving this email because a request has been made to reset the password for your account.
                    To reset your password, please click on the following link:</p>
            </div>
            <div class="link">
                <a href="{{ route('password.reset', $token) }}" class="link-button">Reset Password Link</a>
            </div>
            <p>If you did not request this password reset, you can safely ignore this email. Your password will not be
                changed
                unless
                you visit the link above and create a new password.
            </p>
            <div class="footer">
                <h3>Thank you, <br>
                    Microsite Component Library</h3>
            </div>
        </div>
    </div>
</body>

</html>
