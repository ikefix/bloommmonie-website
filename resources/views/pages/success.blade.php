<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f5f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-container {
            background: #ffffff;
            padding: 40px;
            width: 90%;
            max-width: 480px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            animation: fadeIn 0.6s ease-in-out;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px auto;
            color: white;
            font-size: 45px;
            font-weight: bold;
        }

        h1 {
            color: #1a1a1a;
            margin-bottom: 10px;
            font-size: 28px;
        }

        p {
            color: #444;
            line-height: 1.6;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn-home {
            background: #007bff;
            color: white;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .btn-home:hover {
            background: #0056b3;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>

<div class="success-container">
    <div class="success-icon">✔</div>

    <h1>Payment Successful</h1>

    <p>
        Thank you! Your payment has been processed successfully.
        <br><br>
        A confirmation email has been sent to your inbox.  
        Please check it for more instructions.
    </p>

    <a href="/" class="btn-home">Go to Home</a>
</div>

</body>
</html>
