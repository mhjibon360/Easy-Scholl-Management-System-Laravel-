<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Easy School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .feature-icon {
            font-size: 40px;
            color: #007bff;
        }

        footer {
            background-color: #0d6efd;
            color: white;
            padding: 15px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">SmartSchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#features" class="nav-link">Features</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center" id="home">
        <div class="container">
            <h1>Manage Your School Smarter</h1>
            <p class="lead mt-3">All-in-one system for students, teachers, and administrators.</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Explore Features</a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5" id="features">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Key Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white">
                        <div class="feature-icon mb-3">📚</div>
                        <h5>Student Management</h5>
                        <p>Maintain student profiles, attendance, and academic records easily.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white">
                        <div class="feature-icon mb-3">👨‍🏫</div>
                        <h5>Teacher Dashboard</h5>
                        <p>Teachers can manage classes, assign grades, and monitor performance.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white">
                        <div class="feature-icon mb-3">💰</div>
                        <h5>Fee Management</h5>
                        <p>Track payments, generate invoices, and manage all fee collections digitally.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="py-5 bg-light" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1600172454284-934feca6c612?auto=format&fit=crop&w=800&q=80"
                        class="img-fluid rounded" alt="School Image">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">About Our System</h2>
                    <p class="mt-3">Our School Management System is built to make education management easier and more
                        efficient. From tracking students to managing staff and fees, everything is just a click away.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="py-5" id="contact">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Contact Us</h2>
            <p>Have questions? Reach out to us anytime.</p>
            <a href="mailto:info@smartschool.com" class="btn btn-outline-primary">easy@school.com</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <p class="mb-0">© {{ now()->year }} easyschool. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bund
