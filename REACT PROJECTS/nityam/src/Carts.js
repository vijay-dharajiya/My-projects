import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

function Cart() {
  const [cartItems, setCartItems] = useState([]);
  const navigate = useNavigate();

  // Load cart from localStorage
  useEffect(() => {
    try {
      const data = JSON.parse(localStorage.getItem("cart")) || [];
      setCartItems(data);
    } catch (error) {
      console.error("Error loading cart:", error);
      setCartItems([]);
    }
  }, []);

  // Sync cart to localStorage
  const syncCart = (updatedCart) => {
    setCartItems(updatedCart);
    localStorage.setItem("cart", JSON.stringify(updatedCart));
  };

  // Increase quantity
  const handleIncrease = (index) => {
    const updatedCart = [...cartItems];
    updatedCart[index].quantity += 1;
    syncCart(updatedCart);
  };

  // Decrease quantity
  const handleDecrease = (index) => {
    const updatedCart = [...cartItems];

    if (updatedCart[index].quantity > 1) {
      updatedCart[index].quantity -= 1;
    } else {
      updatedCart.splice(index, 1);
    }

    syncCart(updatedCart);
  };

  // Remove item
  const handleRemove = (index) => {
    const updatedCart = cartItems.filter((_, i) => i !== index);
    syncCart(updatedCart);
  };

  // Calculate total
  const calculateTotal = () => {
    return cartItems.reduce((total, item) => {
      const price = Number(item.price.replace("₹", ""));
      return total + price * item.quantity;
    }, 0);
  };

  return (
    <div style={styles.container}>
      <h1 style={styles.heading}>🛒 Your Cart</h1>

      {cartItems.length === 0 ? (
        <p style={styles.empty}>Your cart is empty 😢</p>
      ) : (
        <>
          {cartItems.map((item, index) => {
            const itemTotal =
              Number(item.price.replace("₹", "")) * item.quantity;

            return (
              <div key={index} style={styles.card}>
                <img src={item.image} alt={item.name} style={styles.image} />

                <div style={styles.info}>
                  <h3>{item.name}</h3>
                  <p>{item.price}</p>

                  <div style={styles.qtyBox}>
                    <button onClick={() => handleDecrease(index)}>-</button>
                    <span>{item.quantity}</span>
                    <button onClick={() => handleIncrease(index)}>+</button>
                  </div>
                </div>

                <div style={styles.actions}>
                  <button
                    onClick={() => handleRemove(index)}
                    style={styles.removeBtn}
                  >
                    Remove ❌
                  </button>

                  <p style={styles.itemTotal}>₹{itemTotal}</p>
                </div>
              </div>
            );
          })}

          {/* Summary */}
          <div style={styles.summary}>
            <h2>Total: ₹{calculateTotal()}</h2>

            <button
              style={styles.checkoutBtn}
              onClick={() =>
                navigate("/checkout", { state: { cart: cartItems } })
              }
            >
              Proceed to Checkout 🚀
            </button>
          </div>
        </>
      )}
    </div>
  );
}

const styles = {
  container: {
    padding: "40px",
    maxWidth: "900px",
    margin: "auto",
  },

  heading: {
    marginBottom: "20px",
  },

  empty: {
    textAlign: "center",
    fontSize: "18px",
  },

  card: {
    display: "flex",
    alignItems: "center",
    justifyContent: "space-between",
    padding: "15px",
    marginBottom: "15px",
    borderRadius: "12px",
    background: "#fff",
    boxShadow: "0 5px 20px rgba(0,0,0,0.1)",
  },

  image: {
    width: "100px",
    height: "80px",
    objectFit: "cover",
    borderRadius: "10px",
  },

  info: {
    flex: 1,
    marginLeft: "20px",
  },

  qtyBox: {
    display: "flex",
    alignItems: "center",
    gap: "10px",
    marginTop: "10px",
  },

  actions: {
    textAlign: "right",
  },

  itemTotal: {
    fontWeight: "bold",
    marginTop: "10px",
  },

  removeBtn: {
    background: "red",
    color: "#fff",
    border: "none",
    padding: "6px 10px",
    borderRadius: "5px",
    cursor: "pointer",
  },

  summary: {
    marginTop: "30px",
    textAlign: "right",
  },

  checkoutBtn: {
    background: "#ff3c00",
    color: "#fff",
    border: "none",
    padding: "12px 25px",
    borderRadius: "8px",
    cursor: "pointer",
    fontSize: "16px",
  },
};

export default Cart;