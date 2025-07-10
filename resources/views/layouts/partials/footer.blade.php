<!-- resources/views/layouts/partials/footer.blade.php -->
<footer id="footer" class="footer position-relative light-background">
    <style>
        .footer-top {
            display: flex;
            justify-content: center; /* Center content horizontally */
            text-align: center;
        }

        .footer-about {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content vertically */
        }

        .sitename {
            white-space: nowrap; /* Prevents the text from breaking into multiple lines */
        }
    </style>

    <div class="container footer-top">
        <div class="row justify-content-center gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex justify-content-center align-items-center">
                    <span class="sitename">Barangay Centro 2</span>
                </a>
                <p>Welcome to Barangay Centro 2, where community spirit thrives. We are dedicated to fostering a safe, inclusive, and vibrant neighborhood where residents can connect, grow, and support each other. Together, we celebrate our shared culture, heritage, and the values that make our barangay a great place to live. Join us in building a brighter future, one step at a time</p>
                <div class="mt-4 social-links d-flex justify-content-center">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <!-- Add other footer columns as needed -->
        </div>
    </div>
    <div class="container mt-4 text-center copyright">
        <p>© 2024 All Rights Reserved | Barangay Centro 2</p>
        <div class="credits">
            Designed by <a href="#">Barangay Centro Team</a>
        </div>
    </div>
</footer>
