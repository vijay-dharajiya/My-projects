function Home() {
    return (

        <div>

            {/* HERO SECTION */}
            <section
                style={{
                    backgroundImage: "url(/img/1.jpg)",
                    height: "100vh",
                    backgroundSize: "cover",
                    backgroundPosition: "center"
                }}
                className="d-flex align-items-center text-center text-light"
            >
                <div className="container">
                    <h1 className="display-2 fw-bold">Kishu Studio</h1>
                    <p className="lead">
                        Wedding • Pre Wedding • Portrait Photography
                    </p>

                    <a href="/contact" className="btn btn-warning btn-lg mt-3">
                        Book Your Shoot
                    </a>
                </div>
            </section>

            {/* SERVICES */}
            <section className="container mt-5">
                <h2 className="text-center mb-5">Our Services</h2>

                <div className="row text-center">

                    <div className="col-md-4">
                        <div className="card shadow border-0">
                            <div className="card-body">
                                <h4>Wedding Photography</h4>
                                <p>Cinematic wedding photography with creative storytelling.</p>
                            </div>
                        </div>
                    </div>

                    <div className="col-md-4">
                        <div className="card shadow border-0">
                            <div className="card-body">
                                <h4>Pre Wedding Shoots</h4>
                                <p>Outdoor romantic shoots for couples.</p>
                            </div>
                        </div>
                    </div>

                    <div className="col-md-4">
                        <div className="card shadow border-0">
                            <div className="card-body">
                                <h4>Studio Portraits</h4>
                                <p>Professional portrait photography.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            {/* GALLERY */}
            <section className="container mt-5">
                <h2 className="text-center mb-5">Our Work</h2>

                <div className="row g-3">

                    <div className="col-md-4">
                        <img src="/img/1.jpg" className="img-fluid rounded" alt="gallery1" />
                    </div>

                    <div className="col-md-4">
                        <img src="/img/2.jpg" className="img-fluid rounded" alt="gallery2" />
                    </div>

                    <div className="col-md-4">
                        <img src="/img/3.jpg" className="img-fluid rounded" alt="gallery3" />
                    </div>

                    <div className="col-md-4">
                        <img src="/img/4.jpg" className="img-fluid rounded" alt="gallery4" />
                    </div>

                    <div className="col-md-4">
                        <img src="/img/5.jpg" className="img-fluid rounded" alt="gallery5" />
                    </div>

                    <div className="col-md-4">
                        <img src="/img/6.jpg" className="img-fluid rounded" alt="gallery6" />
                    </div>

                </div>
            </section>

            {/* FOOTER */}
            <footer className="bg-dark text-light p-4 mt-5">
                <div className="container d-flex justify-content-between align-items-center">

                    <p className="mb-0">
                        © 2026 Kishu Studio | All Rights Reserved
                    </p>

                    <a
                        href="https://wa.me/919000000000"
                        target="_blank"
                        rel="noopener noreferrer"
                        className="btn btn-success"
                        style={{
                            borderRadius: "50px",
                            padding: "8px 15px"
                        }}
                    >
                        WhatsApp
                    </a>

                </div>
            </footer>

        </div>
    );
}

export default Home;