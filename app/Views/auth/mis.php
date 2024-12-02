<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Main Content */
        .content h2 {
            color: #003366;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .content-container {
            padding: 60px 0;
        }

        /* Card Style */
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: left; /* Align text to the left for better readability */
            transition: transform 0.3s;
            margin: 20px 0;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        /* Section Title */
        .section-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #3b5998;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .section-title i {
            color: #e91e63;
            margin-right: 10px;
            font-size: 2rem; /* Bigger Icon Size */
        }
        .content-line {
            height: 4px;
            width: 80px;
            background-color: #e91e63;
            margin: 10px auto;
        }

        /* Misi Text */
        .misi-text {
            font-size: 1.125rem;
            color: #555;
            line-height: 1.8;
            text-align: left; /* Ensure text is aligned left */
            padding-left: 40px; /* Padding for better readability */
            margin-left: 20px; /* Left margin to push text inside */
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .content h2 {
                font-size: 24px;
            }
            .section-title {
                font-size: 1.5rem;
            }
            .card {
                padding: 20px;
            }
            .misi-text {
                font-size: 1rem; /* Adjust font size for small screens */
            }
        }

        /* Ensuring wider card on larger screens */
        @media (min-width: 992px) {
            .col-lg-8 {
                max-width: 80%; /* Make the card width wider on larger screens */
            }
        }
    </style>
</head>
<body>
<!-- AOS Animation Library -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init(); // Initialize AOS animations
</script>
</body>
</html>
