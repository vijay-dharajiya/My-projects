import { Link } from "react-router-dom";
import FoodCard from "./FoodCard";
import foodData from "./FoodData";

function Home() {
  return (
    <div>

      {/* HERO SECTION */}
      <section style={styles.hero}>
        <div style={styles.overlay}>

          <div className="container text-center text-white">

            <h1 style={styles.title}>
              Welcome to 🍔 Jugadi Adda
            </h1>

            <p style={styles.subtitle}>
              Desi Taste with Modern Twist 😋
            </p>

            <Link to="/menu" className="btn btn-light btn-lg mt-3 fw-bold">
              Explore Menu
            </Link>

          </div>

        </div>
      </section>
      <div className="container mt-5 text-center">
  <h2>🔥 Popular Dishes</h2>

  <div style={styles.foodGrid}>
    {foodData.map((item) => (
      <FoodCard
        key={item.id}
        name={item.name}
        price={item.price}
        rating={item.rating}
        image={item.image}
      />
    ))}
  </div>
</div>

      {/* EXTRA SECTION */}
      <div className="container text-center mt-5 mb-5">
        <h2>Why Choose Us?</h2>

        <div className="row mt-4">

          <div className="col-md-4">
            <h4>🔥 Fresh Food</h4>
            <p>Prepared with hygiene and quality ingredients</p>
          </div>

          <div className="col-md-4">
            <h4>⚡ Fast Delivery</h4>
            <p>Get your food delivered quickly at your door</p>
          </div>

          <div className="col-md-4">
            <h4>💰 Affordable</h4>
            <p>Best taste at best price</p>
          </div>

        </div>
      </div>

    </div>
  );
}

const styles = {
  foodGrid: {
  display: "flex",
  gap: "25px",
  justifyContent: "center",
  flexWrap: "wrap",
  marginTop: "20px"
},
  hero: {
    height: "90vh",
    backgroundImage: "url(https://images.unsplash.com/photo-1504674900247-0877df9cc836)",
    backgroundSize: "cover",
    backgroundPosition: "center",
    position: "relative"
  },

  overlay: {
    height: "100%",
    width: "100%",
    background: "rgba(0,0,0,0.6)",
    display: "flex",
    alignItems: "center"
  },

  title: {
    fontSize: "50px",
    fontWeight: "bold"
  },

  subtitle: {
    fontSize: "20px",
    marginTop: "10px"
  }
};

export default Home;