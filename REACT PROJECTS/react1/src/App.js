import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

import Navbar from "./Navbar";

import Home from "./Home";
import About from "./About";
import Service from "./Service";
import Contact from "./Contact";

function App(){
  return(
    <Router>

      <Navbar/>

      <Routes>
        <Route path="/" element={<Home/>}/>
        <Route path="/about" element={<About/>}/>
        <Route path="/service" element={<Service/>}/>
        <Route path="/contact" element={<Contact/>}/>
      </Routes>

    </Router>
  )
}

export default App;