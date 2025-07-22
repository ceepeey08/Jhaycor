<?php
include 'includes/navbar.php';
session_start();
require_once 'dbconn.php';
$user_id = $_SESSION['user_id'] ?? null;

$swal = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        $swal = "<script>
            Swal.fire({
                icon: 'error',
                title: 'Password Mismatch',
                text: 'New password and confirm password do not match.'
            });
        </script>";
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        if (!password_verify($current, $hashed_password)) {
            $swal = "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrect Password',
                    text: 'Current password is incorrect.'
                });
            </script>";
        } else {
            $new_hashed = password_hash($new, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update->bind_param("si", $new_hashed, $user_id);
            if ($update->execute()) {
                $swal = "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Password updated successfully.'
                    });
                </script>";
            } else {
                $swal = "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: 'Failed to update password. Please try again.'
                    });
                </script>";
            }
            $update->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Settings</title>
    <link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: grid;
            place-items: center;
            background-color: #f4f6f8;
        }

        .account-settings {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .account-settings h2 {
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        .form-group label {
            font-weight: 500;
        }

        .btn-save {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="account-settings">
        <h2>Change Password</h2>
        <form method="POST" action="">
            <div class="mb-3 form-group">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>
            <div class="mb-3 form-group">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required>
            </div>
            <div class="mb-3 form-group">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>

            <button type="submit" name="update_password" class="btn btn-success btn-save">Update</button>
        </form>
    </div>
    <?php if (!empty($swal)) echo $swal; ?>
</body>

</html>