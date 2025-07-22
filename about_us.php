<?php
include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company Statements</title>
    <link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 2rem;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/assets/images/JII.png');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: -1;
        }

        .statements-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            max-width: 700px;
            margin: 100px auto 0 auto !important;
        }

        .statement-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .statement-box:hover {
            transform: translateY(-5px);
        }

        .statement-box h3 {
            margin-bottom: 1rem;
            color: #0d6efd;
        }

        .statement-box p {
            margin: 0;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="statements-grid">
        <div class="statement-box">
            <h3>Vision</h3>
            <p><b>"We empower sustainable communities through the conveyance of safe and potable water."</b></p>
        </div>
        <div class="statement-box">
            <h3>Mission</h3>
            <ul>
                <li style="text-align: justify;">Cultivate good values, knowledge, leadership of, and partnership with every member
                    of Jhaycor Industries, Inc. to make a difference.
                </li><br>
                <li style="text-align: justify;">Provide customers with world - class products and services without
                    compramising the future sustainability of the company.
                </li><br>
                <li style="text-align: justify;">Commiting to doing business responsibly by adhering to legal requirements and providing safe working environment.
                </li><br>
                <li style="text-align: justify;">Empowering communities through the provision of jobs and other opportunities.</li>
            </ul>
        </div>
        <div class="statement-box">
            <h3>Quality Policy</h3>
            <p><b>"We commit to provide world-class and competitively-priced HDPE & uPVC Pipes."</b></p>
            <p>We will do this by:</p>
            <ul>
                <li>Strictly enforcing the international standard of quality and complying with applicable requirements.</li>
                <li>Promoting the growth and development of our people.</li>
                <li>Ensuring a reasonable return on investment.</li>
                <li>Maintaining mutually-beneficial relationships with our partners, and</li>
                <li>Continuously improving the effectiveness of our quality management system.</li>
            </ul>
        </div>

        <div class="statement-box">
            <h3>Core Values</h3>
            <ul style="padding-left: 1.25rem; margin: 0;">
                <li>INTEGRITY</li>
                <li>RESPECT</li>
                <li>RESPONSIBLE</li>
                <li>EXCELLENCE</li>
                <li>COLLABORATIVE</li>
                <li>CUSTOMER FOCUS</li>
                <li>EMPATHY</li>
                <li>LEADERSHIP</li>
                <li>ACCOUNTABILITY</li>
            </ul>
        </div>
    </div>

</body>

</html>