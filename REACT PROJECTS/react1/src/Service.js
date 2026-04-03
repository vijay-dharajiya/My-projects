import './App.css';
function Service() {
    return (
        <div>

            {/* HERO SECTION */}
            <div className="bg-dark text-light text-center py-5">
                <div className="container">
                    <h1 className="fw-bold">Our Services</h1>
                    <p className="lead">
                        Capturing your special moments with creativity & perfection
                    </p>
                </div>
            </div>

           <div className="container py-5">
                <div className="row g-4">

                    {/* Card 1 */}
                    <div className="col-md-4">
                        <div className="card service-card border-0 h-100 text-white">
                            <div className="img-wrapper">
                                <img src="/img/wedding.jpeg" alt="Wedding" />
                            </div>
                            <div className="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 className="fw-bold">Wedding Photography</h5>
                                <p>Capture your big day with cinematic memories.</p>
                            </div>
                        </div>
                    </div>

                    {/* Card 2 */}
                    <div className="col-md-4">
                        <div className="card service-card border-0 h-100 text-white">
                            <div className="img-wrapper">
                                <img src="/img/wed.jpeg" alt="Pre Wedding" />
                            </div>
                            <div className="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 className="fw-bold">Pre-Wedding Shoots</h5>
                                <p>Beautiful outdoor cinematic love stories.</p>
                            </div>
                        </div>
                    </div>

                    {/* Card 3 */}
                    <div className="col-md-4">
                        <div className="card service-card border-0 h-100 text-white">
                            <div className="img-wrapper">
                                <img src="/img/1.webp" alt="Studio" />
                            </div>
                            <div className="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 className="fw-bold">Studio Shoots</h5>
                                <p>Professional indoor photography setup.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {/* WHY CHOOSE US */}
            <div className="bg-light py-5">
                <div className="container text-center">
                    <h2 className="fw-bold mb-4">Why Choose Us</h2>

                    <div className="row g-4">

                        <div className="col-md-4">
                            <div className="p-4 bg-white shadow rounded">
                                <h5>📸 Creative Shots</h5>
                                <p className="text-muted">
                                    Unique and cinematic photography style.
                                </p>
                            </div>
                        </div>

                        <div className="col-md-4">
                            <div className="p-4 bg-white shadow rounded">
                                <h5>🎯 Professional Team</h5>
                                <p className="text-muted">
                                    Experienced photographers & editors.
                                </p>
                            </div>
                        </div>

                        <div className="col-md-4">
                            <div className="p-4 bg-white shadow rounded">
                                <h5>💎 High Quality</h5>
                                <p className="text-muted">
                                    Premium quality photos & albums.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {/* CALL TO ACTION */}
            <div className="bg-dark text-light text-center py-5">
                <div className="container">
                    <h2 className="fw-bold">Book Your Shoot Today</h2>
                    <p>Let’s create unforgettable memories together.</p>
                    <a href="/contact" className="btn btn-success px-4">
                        Contact Us
                    </a>
                </div>
            </div>

        </div>
    );
}

export default Service;