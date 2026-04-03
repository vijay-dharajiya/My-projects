<?php include "header.php" ?>

<!-- HERO SECTION -->
<div class="hero-section position-relative" style="background: url('img/contact.jfif') center/cover no-repeat;">
    <div class="overlay"></div>
    <div class="container text-center position-absolute top-50 start-50 translate-middle text-white" data-aos="fade-up">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead">We’re here to help! Reach out for any questions or support.</p>
    </div>
</div>

<!-- CONTACT INFO SECTION -->
<div class="container py-5">
    <div class="row text-center g-4">

        <!-- Address Box -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box h-100 bg-white text-dark p-4 shadow-sm">
                <i class="bi bi-geo-alt-fill fs-2 mb-3 text-primary"></i>
                <h5 class="fw-bold">Our Address</h5>
                <p class="mb-0">123 Tech Street, Silicon Valley, CA, USA</p>
            </div>
        </div>

        <!-- Email Box -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box h-100 bg-white text-dark p-4 shadow-sm">
                <i class="bi bi-envelope-fill fs-2 mb-3 text-success"></i>
                <h5 class="fw-bold">Email Us</h5>
                <p class="mb-0">
                    <a href="mailto:vijaydharajiya0305@gmail.com" class="text-decoration-none text-dark">
                        vijaydharajiya0305@gmail.com
                    </a>
                </p>
            </div>
        </div>

        <!-- Phone Box -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box h-100 bg-white text-dark p-4 shadow-sm">
                <i class="bi bi-telephone-fill fs-2 mb-3 text-danger"></i>
                <h5 class="fw-bold">Call Us</h5>
                <p class="mb-0">
                    <a href="tel:+918320917517" class="text-decoration-none text-dark">
                        +91 8320917518
                    </a>
                </p>
            </div>
        </div>

    </div>
</div>



<!-- CONTACT FORM SECTION -->
<div class="container py-5">
    <h2 class="section-title fw-bold text-center" data-aos="fade-up">Send Us a Message</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="6" placeholder="Your message here..." required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- OPTIONAL GOOGLE MAPS SECTION -->
<div class="container py-5">
    <div class="row">
        <div class="col-12" data-aos="fade-up">
            <div class="ratio ratio-16x9">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.6104427765736!2d70.7595844!3d22.292741799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cbd2f288f55b%3A0xb95487047aee1f4e!2sNityam%20Webtech!5e0!3m2!1sen!2sin!4v1765261257159!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
