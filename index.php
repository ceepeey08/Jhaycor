<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jhaycor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    body {
      padding-top: 56px;
      background-color: #f8f9fa;
    }

    .sidebar {
      position: fixed;
      top: 56px;
      left: 0;
      width: 240px;
      height: calc(100vh - 56px);
      background-color: #343a40;
      overflow-y: auto;
      padding-top: 1rem;
    }

    .sidebar .nav-link {
      color: #adb5bd;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #495057;
      color: #fff;
    }

    .main-content {
      margin-left: 240px;
      padding: 1.5rem;
    }

    .section-content {
      display: none;
    }

    .section-content.active {
      display: block;
    }

    .navbar-brand img {
      height: 40px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.png" alt="Logo">
        <label for="">Jhaycor Industries, Inc.</label>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about_us.php">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Settings
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="settings.php">Account Settings</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item text-danger" href="logout.php" id="logout-btn">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="nav flex-column px-3">
      <li class="nav-item">
        <a class="nav-link active" href="#" data-section="dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="common_forms">Common Forms</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="department_info">Department Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="admin">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="accounting">Accounting</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="engineering">Engineering</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="executive">Executive</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="human_resource">Human Resource</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="ict">Information Technology</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="logistics">Logistics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="operations">Operations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="procurement">Procurement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="sales_marketing">Sales and Marketing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="warehouse">Warehouse</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-section="cooperative">Cooperative</a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Dashboard -->
    <div id="dashboard" class="section-content active">
      <div class="container my-4">
        <h1 class="mt-5">Welcome!</h1>
        <p class="lead">This is a simple Bootstrap-powered PHP site.</p>
        <a href="pages/about.php" class="btn btn-primary">Learn more</a>
        <p style="text-align: justify;">
        <h1>Dashboard</h1>
      </div>
    </div>

    <!-- Human Resource -->
    <div id="human_resource" class="section-content">
      <div class="container my-4">
        <h2 class="mb-4">Customer Feedback</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date Submitted</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'dbconn.php';
              $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
              $result = $conn->query($sql);

              if ($result && $result->num_rows > 0):
                $count = 1;
                while ($row = $result->fetch_assoc()):
              ?>
                  <tr>
                    <td><?= $count++; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= nl2br(htmlspecialchars($row['message'])); ?></td>
                    <td><?= date('F d, Y h:i A', strtotime($row['created_at'])); ?></td>
                  </tr>
                <?php endwhile;
              else: ?>
                <tr>
                  <td colspan="5" class="text-center">No messages found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Additional HR Content Section -->
        <h2 class="my-5">Human Resource Center</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Job Openings</h5>
              <p>Explore current job openings and submit your application online.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">View Jobs</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Employee Handbook</h5>
              <p>Download our employee handbook for policies, benefits, and guidelines.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Training Programs</h5>
              <p>Browse training sessions and skill development resources.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Explore Training</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">HR Forms</h5>
              <p>Access HR-related forms such as leave requests and evaluations.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Access Forms</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Employee Directory</h5>
              <p>Find contact info and department details for all staff members.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">View Directory</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">HR Support</h5>
              <p>Need assistance? Reach out to our HR support team.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Contact HR</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="ict" class="section-content">
      <div class="container my-4">

        <!-- Additional IT Content -->
        <h2 class="my-5">Information Technology Resources</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-info">Network Status</h5>
              <p>Check current server and internet connectivity across departments.</p>
              <a href="#" class="btn btn-sm btn-outline-info">View Status</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-info">Software Licenses</h5>
              <p>Review active software licenses and their expiration dates.</p>
              <a href="#" class="btn btn-sm btn-outline-info">Manage Licenses</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-info">Submit a Ticket</h5>
              <p>Experiencing an issue? Submit a support request to the IT department.</p>
              <a href="#" class="btn btn-sm btn-outline-info">Create Ticket</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-info">IT Policies</h5>
              <p>Read guidelines for device usage, internet security, and more.</p>
              <a href="#" class="btn btn-sm btn-outline-info">Read Policies</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-info">Asset Inventory</h5>
              <p>Track issued laptops, desktops, and mobile devices.</p>
              <a href="#" class="btn btn-sm btn-outline-info">View Inventory</a>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-info">Security Alerts</h5>
              <p>Stay updated on phishing threats, malware, and IT advisories.</p>
              <a href="#" class="btn btn-sm btn-outline-info">See Alerts</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="logistics" class="section-content">
      <div class="container my-4">
        <div id="map" style="height: 400px; width: 100%;"></div>
      </div>
    </div>

    <div id="sales_marketing" class="section-content">
      <div class="container my-4">

        <h2 class="my-5">Sales & Marketing Resources</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Lead Dashboard</h5>
              <p>View and manage your current sales leads and their progress.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Open Dashboard</a>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Campaign Manager</h5>
              <p>Design, schedule, and analyze email marketing campaigns.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Manage Campaigns</a>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Sales Reports</h5>
              <p>Access monthly, quarterly, and annual sales performance reports.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">View Reports</a>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Client Database</h5>
              <p>Browse and update client contact and activity information.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Access Database</a>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Email a User</h5>
              <p>Send a message directly to a team member or client.</p>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#emailModal">Send Email</button>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm p-3">
              <h5 class="text-primary">Marketing Materials</h5>
              <p>Download the latest brochures, product sheets, and media kits.</p>
              <a href="#" class="btn btn-sm btn-outline-primary">Download Files</a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Email Modal -->
    <!-- Modal -->
    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="emailForm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="emailModalLabel">Email a User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="emailTo" class="form-label">To</label>
                <input type="email" name="emailTo" id="emailTo" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="emailSubject" class="form-label">Subject</label>
                <input type="text" name="emailSubject" id="emailSubject" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="emailMessage" class="form-label">Message</label>
                <textarea name="emailMessage" id="emailMessage" class="form-control" rows="4" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Send Email</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

  <!-- Bootstrap + JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const links = document.querySelectorAll('.sidebar .nav-link');
    const sections = document.querySelectorAll('.section-content');

    links.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();

        links.forEach(l => l.classList.remove('active'));
        sections.forEach(s => s.classList.remove('active'));

        const target = this.getAttribute('data-section');
        document.getElementById(target).classList.add('active');
        this.classList.add('active');
      });
    });

    // Logout
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
      history.pushState(null, null, location.href);
      location.replace('logout.php');
    };

    document.getElementById('logout-btn').addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Are you sure you want to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, logout',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'logout.php';
        }
      });
    });
  </script>
  <script>
    document.getElementById("emailForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("send_email.php", {
          method: "POST",
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          alert(data.message);
          if (data.status === "success") {
            document.getElementById("emailForm").reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById("emailModal"));
            modal.hide();
          }
        })
        .catch(error => {
          alert("Error sending email");
          console.error(error);
        });
    });
  </script>

  <!-- Maps -->
  <?php
  $latitude = 7.3081;
  $longitude = 125.6845;
  ?>
  <script>
    const lat = <?php echo $latitude; ?>;
    const lng = <?php echo $longitude; ?>;

    const map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=P6Qc8ViMtCXJ1sGCzfmI', {
      attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a>',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(map);


    L.marker([lat, lng]).addTo(map)
      .bindPopup('Panabo City, Davao del Norte')
      .openPopup();
  </script>

</body>

</html>