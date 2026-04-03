import { useLocation, useNavigate } from "react-router-dom";

function Checkout() {
  const location = useLocation();
  const navigate = useNavigate();

  const cart = location.state?.cart || [];

  const getTotal = () => {
    return cart.reduce((total, item) => {
      return total + parseInt(item.price.replace("₹", "")) * item.quantity;
    }, 0);
  };

  const handleOrder = () => {
    alert("Order Placed Successfully 🎉");

    localStorage.removeItem("cart"); // clear cart
    navigate("/");
  };

  return (
    <div style={styles.container}>
      <h1>Checkout 🧾</h1>

      {cart.length === 0 ? (
        <p>No items found</p>
      ) : (
        <>
          {cart.map((item, index) => (
            <div key={index} style={styles.card}>
              <img src={item.image} alt={item.name} style={styles.image} />

              <div>
                <h3>{item.name}</h3>
                <p>₹{parseInt(item.price.replace("₹", ""))}</p>
                <p>Qty: {item.quantity}</p>
              </div>

              <h3>
                ₹{parseInt(item.price.replace("₹", "")) * item.quantity}
              </h3>
            </div>
          ))}

          <div style={styles.summary}>
            <h2>Total: ₹{getTotal()}</h2>

            <button style={styles.orderBtn} onClick={handleOrder}>
              Place Order ✅
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
    margin: "auto"
  },

  card: {
    display: "flex",
    justifyContent: "space-between",
    alignItems: "center",
    padding: "15px",
    marginBottom: "10px",
    background: "#fff",
    borderRadius: "10px",
    boxShadow: "0 4px 15px rgba(0,0,0,0.1)"
  },

  image: {
    width: "80px",
    height: "60px",
    objectFit: "cover",
    borderRadius: "8px"
  },

  summary: {
    marginTop: "30px",
    textAlign: "right"
  },

  orderBtn: {
    background: "green",
    color: "#fff",
    border: "none",
    padding: "12px 25px",
    borderRadius: "8px",
    cursor: "pointer",
    fontSize: "16px"
  }
};

export default Checkout;