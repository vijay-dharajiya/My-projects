import { motion } from "framer-motion";

function Contact() {
  return (
    <div style={{ fontFamily: "Poppins, sans-serif" }}>

      {/* HERO */}
      <section
        style={{
          height: "60vh",
          background:
            "linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.4)), url(https://images.unsplash.com/photo-1517248135467-4c7edcad34c4)",
          backgroundSize: "cover",
          backgroundPosition: "center",
        }}
        className="d-flex align-items-center text-light text-center"
      >
        <div className="container">
          <motion.h1
            initial={{ opacity: 0, y: 40 }}
            animate={{ opacity: 1, y: 0 }}
            className="display-3 fw-bold"
          >
            Get In Touch 📞
          </motion.h1>
          <p className="lead mt-3">
            We'd love to hear from you
          </p>
        </div>
      </section>

      {/* CONTACT SECTION */}
      <section className="py-5 bg-light">
        <div className="container">
          <div className="row g-4">

            {/* CONTACT INFO */}
            <div className="col-md-4">
              <motion.div
                whileHover={{ scale: 1.05 }}
                className="p-4 rounded-4 shadow-lg"
                style={{
                  backdropFilter: "blur(10px)",
                  background: "rgba(255,255,255,0.7)",
                }}
              >
                <h4>📧 Email</h4>
                <p className="text-muted">foodshop@gmail.com</p>

                <h4>📱 Phone</h4>
                <p className="text-muted">+91 9876543210</p>

                <h4>📍 Location</h4>
                <p className="text-muted">
                  Indira Circle, Rajkot, Gujarat
                </p>
              </motion.div>
            </div>

            {/* CONTACT FORM */}
            <div className="col-md-8">
              <motion.div
                initial={{ opacity: 0, x: 50 }}
                whileInView={{ opacity: 1, x: 0 }}
                className="p-4 bg-white rounded-4 shadow-lg"
              >
                <h3 className="mb-4">Send Message</h3>

                <form>
                  <div className="row">
                    <div className="col-md-6 mb-3">
                      <input
                        type="text"
                        placeholder="Your Name"
                        className="form-control p-3 rounded-3"
                      />
                    </div>

                    <div className="col-md-6 mb-3">
                      <input
                        type="email"
                        placeholder="Your Email"
                        className="form-control p-3 rounded-3"
                      />
                    </div>
                  </div>

                  <div className="mb-3">
                    <input
                      type="text"
                      placeholder="Subject"
                      className="form-control p-3 rounded-3"
                    />
                  </div>

                  <div className="mb-3">
                    <textarea
                      rows="5"
                      placeholder="Your Message..."
                      className="form-control p-3 rounded-3"
                    ></textarea>
                  </div>

                  <button className="btn btn-dark px-4 py-2 rounded-pill">
                    Send Message 🚀
                  </button>
                </form>
              </motion.div>
            </div>

          </div>
        </div>
      </section>

      {/* MAP SECTION */}
      <section className="pb-5">
        <div className="container">
          <motion.div
            whileHover={{ scale: 1.01 }}
            className="rounded-4 overflow-hidden shadow-lg"
          >
            <iframe
              title="map"
              src="https://www.google.com/maps?q=Indira%20Circle%20Rajkot&output=embed"
              width="100%"
              height="400"
              style={{ border: 0 }}
              allowFullScreen=""
              loading="lazy"
            ></iframe>
          </motion.div>
        </div>
      </section>

    </div>
  );
}

export default Contact;