import { motion } from "framer-motion";

function About() {
  return (
    <div style={{ fontFamily: "Poppins, sans-serif" }}>

      {/* HERO SECTION */}
      <section
        style={{
          background:
            "linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.4)), url(https://images.unsplash.com/photo-1498654896293-37aacf113fd9)",
          backgroundSize: "cover",
          backgroundPosition: "center",
          height: "90vh",
        }}
        className="d-flex align-items-center text-light"
      >
        <div className="container text-center">
          <motion.h1
            initial={{ opacity: 0, y: 40 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1 }}
            className="display-2 fw-bold"
          >
            Crafted With Passion 🍽️
          </motion.h1>

          <motion.p
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ delay: 0.5 }}
            className="lead mt-3"
          >
            Experience luxury dining at your fingertips
          </motion.p>
        </div>
      </section>

      {/* ABOUT SECTION */}
      <section className="py-5 bg-light">
        <div className="container">
          <div className="row align-items-center">

            {/* IMAGE */}
            <div className="col-md-6 mb-4">
              <motion.img
                whileHover={{ scale: 1.05 }}
                transition={{ duration: 0.4 }}
                src="https://images.unsplash.com/photo-1551218808-94e220e084d2"
                className="img-fluid rounded-4 shadow-lg"
                alt="food"
              />
            </div>

            {/* TEXT */}
            <div className="col-md-6">
              <motion.h2
                initial={{ x: 50, opacity: 0 }}
                whileInView={{ x: 0, opacity: 1 }}
                transition={{ duration: 0.6 }}
                className="fw-bold mb-3"
              >
                Our Story
              </motion.h2>

              <p className="text-muted">
                Since 2020, we have been redefining food experiences by combining
                quality ingredients with exceptional taste. Every dish is crafted
                with passion and precision.
              </p>

              <p className="text-muted">
                Our goal is simple — deliver unforgettable flavors and premium
                service that keeps you coming back.
              </p>

              <button className="btn btn-dark mt-3 px-4 py-2 rounded-pill">
                Explore Menu →
              </button>
            </div>

          </div>
        </div>
      </section>

      {/* GLASS STATS SECTION */}
      <section
        style={{
          background:
            "linear-gradient(135deg, #1d1d1d, #2c2c2c)",
        }}
        className="py-5 text-light"
      >
        <div className="container">
          <div className="row text-center">

            {[
              { number: "5K+", text: "Happy Customers" },
              { number: "150+", text: "Dishes" },
              { number: "4.9⭐", text: "Rating" },
              { number: "24/7", text: "Service" },
            ].map((item, i) => (
              <div className="col-md-3 mb-4" key={i}>
                <motion.div
                  whileHover={{ scale: 1.1 }}
                  className="p-4 rounded-4"
                  style={{
                    backdropFilter: "blur(10px)",
                    background: "rgba(255,255,255,0.05)",
                    border: "1px solid rgba(255,255,255,0.1)",
                  }}
                >
                  <h2 className="fw-bold">{item.number}</h2>
                  <p>{item.text}</p>
                </motion.div>
              </div>
            ))}

          </div>
        </div>
      </section>

      {/* FEATURES */}
      <section className="py-5">
        <div className="container text-center">
          <h2 className="fw-bold mb-5">Why We Stand Out</h2>

          <div className="row">

            {[
              {
                icon: "🍔",
                title: "Premium Ingredients",
                desc: "Only the best quality products used",
              },
              {
                icon: "⚡",
                title: "Fast Delivery",
                desc: "Lightning fast service guaranteed",
              },
              {
                icon: "👨‍🍳",
                title: "Expert Chefs",
                desc: "Crafted by professionals",
              },
            ].map((item, i) => (
              <div className="col-md-4 mb-4" key={i}>
                <motion.div
                  whileHover={{ y: -10 }}
                  className="p-4 shadow-lg rounded-4 bg-white"
                >
                  <h1>{item.icon}</h1>
                  <h4 className="mt-3">{item.title}</h4>
                  <p className="text-muted">{item.desc}</p>
                </motion.div>
              </div>
            ))}

          </div>
        </div>
      </section>

      {/* TEAM SECTION */}
      <section className="bg-dark text-light py-5">
        <div className="container text-center">
          <h2 className="fw-bold mb-5">Meet Our Chefs</h2>

          <div className="row">

            {[
              {
                name: "Chef Ravina",
                img: "https://images.unsplash.com/photo-1607746882042-944635dfe10e",
              },
              {
                name: "Chef Neha",
                img: "https://images.unsplash.com/photo-1544005313-94ddf0286df2",
              },
              {
                name: "Chef Aman",
                img: "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c",
              },
            ].map((chef, i) => (
              <div className="col-md-4 mb-4" key={i}>
                <motion.div whileHover={{ scale: 1.05 }}>
                  <img
                    src={chef.img}
                    className="img-fluid rounded-circle mb-3"
                    style={{ width: "150px", height: "150px", objectFit: "cover" }}
                    alt="chef"
                  />
                  <h5>{chef.name}</h5>
                </motion.div>
              </div>
            ))}

          </div>
        </div>
      </section>

      {/* CTA */}
      <section
        style={{
          background: "linear-gradient(135deg, #ff9800, #ff5722)",
        }}
        className="text-center text-light py-5"
      >
        <div className="container">
          <h2 className="fw-bold">Ready to order?</h2>
          <p>Experience premium taste today</p>
          <button className="btn btn-light text-dark px-4 py-2 rounded-pill">
            Order Now 🚀
          </button>
        </div>
      </section>

    </div>
  );
}

export default About;