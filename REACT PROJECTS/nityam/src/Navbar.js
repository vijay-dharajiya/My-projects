import { Link } from "react-router-dom";

function Navbar() {
  return (
    <nav className="navbar navbar-expand-lg sticky-top" style={styles.navbar}>
      <div className="container">

        {/* LOGO */}
        <Link className="navbar-brand fw-bold text-white" to="/">
          🍔 Jugadi Adda
          <div style={styles.tagline}>Taste Ka King 👑</div>
        </Link>

        {/* MOBILE BUTTON */}
        <button 
          className="navbar-toggler bg-light" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#navbarNav"
        >
          ☰
        </button>

        {/* MENU */}
        <div className="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul className="navbar-nav align-items-center">

            <li className="nav-item">
              <Link className="nav-link text-white" to="/">Home</Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link text-white" to="/menu">Menu</Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link text-white" to="/about">About</Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link text-white" to="/contact">Contact</Link>
            </li>
            <li classname="nav-item">
              <Link to="/Cart" className="nav-link text-white"> Cart 🛒</Link>
            </li>

            {/* ORDER BUTTON */}
            <li className="nav-item ms-3">
              <Link to="/menu" className="btn btn-light fw-bold">
                Order Now
              </Link>
            </li>

          </ul>
        </div>

      </div>
    </nav>
  );
}

const styles = {
  navbar: {
    background: "linear-gradient(90deg, #ff7e00, #ff3c00)",
    boxShadow: "0 4px 15px rgba(0,0,0,0.2)"
  },
  tagline: {
    fontSize: "12px",
    lineHeight: "10px"
  }
};

export default Navbar;