import { useState } from "react";

function FoodCard({ name, price, image, rating }) {

  const [added, setAdded] = useState(false);

  const handleAddToCart = () => {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    const item = {
      name,
      price,
      image,
      rating,
      quantity: 1
    };

    // Check if already exists
    const existingItem = cart.find(i => i.name === name);

    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      cart.push(item);
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    setAdded(true);

    setTimeout(() => setAdded(false), 2000);
  };

  return (
    <div style={styles.card}>

      <img src={image} alt={name} style={styles.image} />

      <div style={styles.body}>
        <h5>{name}</h5>
        <p style={styles.rating}>⭐ {rating}</p>
        <p style={styles.price}>{price}</p>

        <button 
          style={{
            ...styles.button,
            background: added ? "green" : "#ff3c00"
          }}
          onClick={handleAddToCart}
        >
          {added ? "Added ✅" : "Add to Cart 🛒"}
        </button>
      </div>

    </div>
  );
}

const styles = {
  card: {
    width: "250px",
    borderRadius: "15px",
    overflow: "hidden",
    boxShadow: "0 8px 25px rgba(0,0,0,0.15)",
    transition: "0.3s",
    background: "#fff"
  },

  image: {
    width: "100%",
    height: "160px",
    objectFit: "cover"
  },

  body: {
    padding: "15px",
    textAlign: "center"
  },

  price: {
    fontWeight: "bold",
    color: "#ff3c00",
    fontSize: "18px"
  },

  rating: {
    color: "green",
    marginBottom: "5px"
  },

  button: {
    border: "none",
    padding: "10px 18px",
    borderRadius: "8px",
    cursor: "pointer",
    color: "#fff",
    fontWeight: "600",
    transition: "0.3s"
  }
};

export default FoodCard;