import { Link } from "react-router-dom";
import './App.css';
function Navbar(){
    return(
        <nav className="navbar navbar-expand-lg gradient-navbar">
            <div className="container">

                <Link className="navbar-brand fw-bold" to="/home">Kishu Studio</Link>

                <button 
                className="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarNav">
                    <ul className="navbar-nav ms-auto">

                        <li className="nav-item">
                            <Link className="nav-link" to="/">Home</Link>
                        </li>

                        <li className="nav-item">
                            <Link className="nav-link" to="/about">About</Link>
                        </li>

                        <li className="nav-item">
                            <Link className="nav-link" to="/service">Service</Link>
                        </li>

                        <li className="nav-item">
                            <Link className="nav-link" to="/contact">Contact</Link>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>
    )
}

export default Navbar;