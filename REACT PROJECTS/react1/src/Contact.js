function Contact() {
    return (
        <div>

            {/* HERO SECTION */}
            <div className="bg-dark text-light text-center py-5">
                <div className="container">
                    <h1 className="fw-bold">Contact Us</h1>
                    <p className="lead">We’d love to hear from you</p>
                </div>
            </div>

            {/* CONTACT SECTION */}
            <div className="container py-5">
                <div className="row g-4">

                    {/* CONTACT FORM */}
                    <div className="col-md-6">
                        <div className="card shadow p-4 border-0">
                            <h4 className="mb-3">Send Message</h4>

                            <form>
                                <div className="mb-3">
                                    <label className="form-label">Your Name</label>
                                    <input 
                                        type="text" 
                                        className="form-control" 
                                        placeholder="Enter your name" 
                                    />
                                </div>

                                <div className="mb-3">
                                    <label className="form-label">Email</label>
                                    <input 
                                        type="email" 
                                        className="form-control" 
                                        placeholder="Enter your email" 
                                    />
                                </div>

                                <div className="mb-3">
                                    <label className="form-label">Message</label>
                                    <textarea 
                                        className="form-control" 
                                        rows="4"
                                        placeholder="Write your message..."
                                    ></textarea>
                                </div>

                                <button className="btn btn-success w-100">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>

                    {/* CONTACT INFO */}
                    <div className="col-md-6">
                        <div className="p-4">
                            <h4 className="mb-3">Get In Touch</h4>

                            <p><strong>Email:</strong> kishustudio@gmail.com</p>
                            <p><strong>Phone:</strong> +91 90000 00000</p>
                            <p><strong>Location:</strong> Gujarat, India</p>

                            <hr />

                            <h5>Business Hours</h5>
                            <p className="text-muted">
                                Mon - Sat: 9:00 AM - 8:00 PM <br />
                                Sunday: Closed
                            </p>

                            <a 
                                href="https://wa.me/919000000000"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="btn btn-success mt-3"
                            >
                                Chat on WhatsApp
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            {/* GOOGLE MAP (OPTIONAL) */}
            <div className="container pb-5">
                <iframe
                    title="map"
                    src="https://maps.google.com/maps?q=gujarat&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="300"
                    style={{ border: 0, borderRadius: "10px" }}
                    allowFullScreen=""
                    loading="lazy"
                ></iframe>
            </div>

        </div>
    );
}

export default Contact;