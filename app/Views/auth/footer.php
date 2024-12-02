<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0a0a0a, #ff6a00);
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .content-container {
            padding: 80px 0;
            text-align: center;
        }
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 20px;
            opacity: 0;
            transform: translateY(30px);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        .card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            padding: 40px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        footer .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        footer .footer-content .footer-logo h3 {
            color: #ff6a00;
            font-size: 2rem;
        }
        footer .footer-content .footer-logo h3 i {
            margin-right: 10px;
        }
        footer .footer-content .footer-links ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }
        footer .footer-content .footer-links ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.125rem;
            transition: color 0.3s ease;
        }
        footer .footer-content .footer-links ul li a:hover {
            color: #ff6a00;
        }
        footer .footer-content .footer-social ul {
            list-style: none;
            display: flex;
            gap: 15px;
        }
        footer .footer-content .footer-social ul li a {
            color: #ffffff;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        footer .footer-content .footer-social ul li a:hover {
            color: #ff6a00;
        }
        @media (max-width: 768px) {
            footer .footer-content {
                flex-direction: column;
                align-items: center;
            }
            footer .footer-content .footer-links ul {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

<div class="container content-container">
    <!-- Main Content Here -->
</div>

<!-- Footer Section -->
<footer>
    <div class="container footer-content">
        <!-- Footer Logo and Description -->
        <div class="footer-logo">
            <h3><i class="fas fa-school"></i> SDN 1 Wadas</h3>
            <p>Committed to providing quality education and shaping the future generation.</p>
        </div>

        <!-- Footer Links -->
        <div class="footer-links">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>

        <!-- Footer Social Links -->
        <div class="footer-social">
            <ul>
                <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init(); // Initialize AOS animations
</script>
</body>
</html>
