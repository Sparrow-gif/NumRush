<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .card {
            max-width:620px;
            margin:0 auto;
            border-radius: 10px;
        }
        .alert-box {
            position: fixed;
            z-index: 99999;
            bottom: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .alert-box.show {
            opacity: 1;
            transform: translate(-50%, 0%);
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Contact Us</h4>
        </div>
        <div class="card-body">
            <!-- Alert box -->
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-<?php echo $_GET['success'] == 1 ? 'success' : 'danger'; ?> alert-box show" id="alertBox">
                    <?php echo $_GET['success'] == 1 ? 'Message sent successfully!' : 'Something went wrong. Please try again.'; ?>
                </div>
            <?php endif; ?>

            <!-- Contact Form -->
            <form action="submit.php" method="POST">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send</button>
            </form>
        </div>
    </div>
</div>

<!-- Fadeout Alert after 3 seconds -->
<script>
    const alertBox = document.getElementById('alertBox');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.remove('show');
        }, 3000);
    }
</script>

</body>
</html>
