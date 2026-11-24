
<footer class="site-footer">

    <div class="container footer-content">

        <div class="footer-about">
            <a href="{{ route('home') }}" class="logo footer-logo">
                NEWS<span>HUB</span><small>.</small>
            </a>

            <p>
                Your trusted source for the latest news, stories,
                opinions and updates from around the world.
            </p>
        </div>

        <div class="footer-links">
            <h3>Quick Links</h3>
            <a href="{{ route('home') }}">Home</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">Privacy Policy</a>
        </div>

        <div class="footer-links">
            <h3>Stay Connected</h3>
            <p>Follow us for the latest news and updates.</p>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="container">
            &copy; {{ date('Y') }} NewsHub. All rights reserved.
        </div>
    </div>

</footer>
