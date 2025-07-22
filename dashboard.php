<?php
require_once 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jhaycor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/images/logo.png" alt="Logo" height="40">
                <span class="ms-2" style="color: #fff;">Jhaycor Industries, Inc.</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-section="dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="hdpe">HDPE Pipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="upvc">uPVC Pipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="fittings">Fittings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="hdpe">Fabricated Fittings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="about_us">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="contact_us">Contact Us</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard -->
        <div id="dashboard" class="section-content active">
            <h2 class="mb-4 fw-bold">Company Sales Dashboard</h2>
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card p-3">
                        <h5>Monthly Sales Overview</h5>
                        <canvas id="salesChart" height="150"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5>Product Type Breakdown</h5>
                        <canvas id="productChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="row mt-4 g-4">
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <h6>Total Revenue</h6>
                        <h3 class="text-success">₱<?= number_format(1240000, 2) ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <h6>Top Product</h6>
                        <h4>UPVC Pipe 4"</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <h6>Total Orders</h6>
                        <h3>276</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- HDPE Pipes -->
        <div id="hdpe" class="section-content">
            <h2 class="fw-bold mb-4">HIGH-DENSITY POLYETHYLENE</h2>

            <div id="hdpe_container" style="
                    display: grid;
                    grid-template-areas: 'menu hdpe-content';
                    grid-template-columns: 1.5fr 2.5fr;
                    background-color: #ffffff;
                    border: 2px solid #000000;
                    border-radius: 4px;
                ">

                <div class="menu" style="
                    background-color: #f5f5f5;
                    color: #000000;
                    border: 1px solid #000000;
                ">
                    <div class="menu-logo" style="text-align: center; margin-bottom: 10px;">
                        <img
                            src="assets/images/logo png file.png"
                            alt="Logo"
                            style="padding-top: 10px; height: auto; display: block; margin: 0 auto; width: 150px; height: 80px;" />
                    </div>
                    <div class="menu-paragraphs" style="margin: 0; padding: 0; padding-bottom: 5px;">
                        <p class="hdpe-p" style="margin: 0; padding: 0; text-align: center; font-size: 14px; color: #000;">
                            Purok 1, Panabo City, 8105 Davao del Norte
                        </p>
                        <p class="hdpe-p" style="margin: 0; padding: 0; text-align: center; font-size: 14px; color: #000;">
                            Telefax #s:(082) 235-1052 ; (082) 233-2818
                        </p>
                        <p class="hdpe-p" style="margin: 0; padding: 0; text-align: center; font-size: 14px; color: #000;">
                            Email Address: jhaycor2@yahoo.com/inquiry@jhaycor.com
                        </p>
                    </div>
                </div>

                <div class="hdpe-content" style="
                    background-color: #f5f5f5;
                    color: #000000;
                    border: 1px solid #000000;
                    padding: 5px;
                    font-family: sans-serif;
                    max-width: 100%;
                    box-sizing: border-box;
                ">
                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">PRODUCT</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">ISO HDPE PIPES</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">APPLICATION</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Potable Water Main Distribution &amp; Service Connection System, Plantations and Aqua-Farms</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">STANDARD</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Conforming to ISO 161-1/11922-1, SDR-PR in accordance to PNS ISO 4427-2002</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">MATERIAL</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">PE 80 and 100</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">SIZE</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">20mm to 315mm</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">COLOR</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Black / Blue / Stripes</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 130px; font-weight: bold;">JOINT METHOD</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Butt Fusion, Compression Fittings, Mechanical Jointing</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- uPVC Pipes -->
        <div id="upvc" class="section-content">
            <h2 class="fw-bold mb-4">UNPLASTICIZED POLYVINYL CHLORIDE</h2>

            <div id="upvc_container" style="
                    display: grid;
                    grid-template-areas: 'menu upvc-content';
                    grid-template-columns: 1.5fr 2.5fr;
                    background-color: #ffffff;
                    border: 2px solid #000000;
                    border-radius: 4px;
                ">

                <div class="menu" style="
                    background-color: #f5f5f5;
                    color: #000000;
                    border: 1px solid #000000;
                ">
                    <div class="menu-logo" style="text-align: center; margin-bottom: 10px;">
                        <img
                            src="assets/images/logo png file.png"
                            alt="Logo"
                            style="padding-top: 10px; height: auto; display: block; margin: 0 auto; width: 150px; height: 80px;" />
                    </div>
                    <div class="menu-paragraphs" style="margin: 0; padding: 0; padding-bottom: 5px;">
                        <p class="upvc-p" style="margin: 0; padding: 0; text-align: center; font-size: 14px; color: #000;">
                            Purok 1, Panabo City, 8105 Davao del Norte
                        </p>
                        <p class="upvc-p" style="margin: 0; padding: 0; text-align: center; font-size: 14px; color: #000;">
                            Telefax #s:(082) 235-1052 ; (082) 233-2818
                        </p>
                        <p class="upvc-p" style="margin: 0; padding: 0; text-align: center; font-size: 14px; color: #000;">
                            Email Address: jhaycor2@yahoo.com/inquiry@jhaycor.com
                        </p>
                    </div>
                </div>

                <div class="upvc-content" style="
                    background-color: #f5f5f5;
                    color: #000000;
                    border: 1px solid #000000;
                    padding: 5px;
                    font-family: sans-serif;
                    max-width: 100%;
                    box-sizing: border-box;
                ">
                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">PRODUCT</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">uPVC Water Main Pipes</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">APPLICATION</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Potable Water Pressure <br>Main Distribution System</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">STANDARD</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">PNS 65</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">SIZE</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">63mm to 315mm</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; margin-bottom: 6px;">
                        <div style="flex: 0 0 130px; font-weight: bold;">COLOR</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Blue</div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 130px; font-weight: bold;">JOINT METHOD</div>
                        <div style="flex: 0 0 10px;">:</div>
                        <div style="flex: 1;">Rubber Ring Push-On Type, Power Lock / Fixed Seal</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fittings -->
        <div id="fittings" class="section-content">
            <h2 class="fw-bold mb-4">Fittings</h2>
            <div class="card p-3 mb-3">
                <ul>
                    <li>Couplings</li>
                    <li>Elbows</li>
                    <li>Reducers</li>
                    <li>End Caps</li>
                </ul>
            </div>
        </div>

        <!-- About Us -->
        <div id="about_us" class="section-content container">
            <h2 class="fw-bold mb-4 text-center text-primary">About Us</h2>

            <div class="row justify-content-center g-4">

                <!-- Vision -->
                <div class="col-lg-8 col-md-10">
                    <div class="card h-100 shadow-sm border-0 p-4 text-center">
                        <h4 class="text-secondary">Vision</h4>
                        <p class="mb-0">
                            <b>
                                "We empower sustainable communities through the conveyance of safe and potable water."
                            </b>
                        </p>
                    </div>
                </div>

                <!-- Mission -->
                <div class="col-lg-8 col-md-10">
                    <div class="card h-100 shadow-sm border-0 p-4 text-center">
                        <h4 class="text-secondary">Mission</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">Cultivate good values, knowledge, leadership, and partnerships with every member of Jhaycor Industries, Inc. to make a difference.</li>
                            <li class="mb-2">Provide customers with world-class products and services without compromising future sustainability.</li>
                            <li class="mb-2">Commit to responsible business practices by adhering to legal requirements and ensuring a safe working environment.</li>
                            <li>Empower communities through the provision of jobs and meaningful opportunities.</li>
                        </ul>
                    </div>
                </div>

                <!-- Quality Policy -->
                <div class="col-lg-8 col-md-10">
                    <div class="card h-100 shadow-sm border-0 p-4 text-center">
                        <h4 class="text-secondary">Quality Policy</h4>
                        <p>
                            <b>
                                "We commit to provide world-class and competitively-priced HDPE & uPVC Pipes."
                            </b>
                        </p>
                        <p>We achieve this by:</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">Strictly enforcing international quality standards and complying with all applicable requirements.</li>
                            <li class="mb-2">Promoting the growth and development of our people.</li>
                            <li class="mb-2">Ensuring a reasonable return on investment.</li>
                            <li class="mb-2">Maintaining mutually-beneficial relationships with our partners.</li>
                            <li>Continuously improving the effectiveness of our quality management system.</li>
                        </ul>
                    </div>
                </div>

                <!-- Core Values -->
                <div class="col-lg-8 col-md-10">
                    <div class="card h-100 shadow-sm border-0 p-4 text-center">
                        <h4 class="text-secondary">Core Values</h4>
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            <span class="badge bg-primary-subtle text-dark fw-semibold">INTEGRITY</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">RESPECT</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">RESPONSIBLE</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">EXCELLENCE</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">COLLABORATIVE</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">CUSTOMER FOCUS</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">EMPATHY</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">LEADERSHIP</span>
                            <span class="badge bg-primary-subtle text-dark fw-semibold">ACCOUNTABILITY</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="contact_us" class="section-content container mt-5">
            <h2 class="fw-bold mb-4 text-center text-primary">Contact Us</h2>
            <p class="text-center mb-5 text-muted">We'd love to hear from you. Fill out the form below or reach us directly.</p>

            <div class="row justify-content-center g-4">

                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 p-4">
                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="contactName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="contactName" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="contactEmail" placeholder="you@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="contactMessage" class="form-label">Message</label>
                                <textarea class="form-control" id="contactMessage" rows="4" placeholder="Your message..." required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 p-4 h-100">
                        <h5 class="text-secondary mb-3">Reach Us</h5>
                        <p class="mb-2"><strong>Globe:</strong> 0917-7198058</p>
                        <p class="mb-2"><strong>Smart:</strong> 0920-9534452</p>
                        <p class="mb-2"><strong>Dito:</strong> 0993-0929930</p>
                        <p class="mb-2"><strong>Landline:</strong> 082-3081971</p>
                        <p class="mb-2"><strong>Email:</strong> jhaycorindustries@gmail.com</p>
                        <p class="mb-0"><strong>Address:</strong> Purok 1, Panabo City, 8105 Davao del Norte</p>
                    </div>
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

            document.getElementById("contactForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const name = document.getElementById("contactName").value;
                const email = document.getElementById("contactEmail").value;
                const message = document.getElementById("contactMessage").value;

                fetch("save_contact.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&message=${encodeURIComponent(message)}`
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire("Sent!", data.message, "success");
                            document.getElementById("contactForm").reset();
                        } else {
                            Swal.fire("Error", data.message, "error");
                        }
                    })
                    .catch(err => {
                        Swal.fire("Oops", "Something went wrong!", "error");
                        console.error(err);
                    });
            });
        </script>
</body>

</html>