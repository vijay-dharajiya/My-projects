function About() {
    return (
        <div>

            {/* HERO SECTION */}
            <div className="bg-dark text-light text-center py-5">
                <div className="container">
                    <h1 className="fw-bold">About Kishu Studio</h1>
                    <p className="lead">
                        Delivering creativity and quality since 1985
                    </p>
                </div>
            </div>

            {/* COMPANY INFO */}
            <div className="container py-5">
                <div className="row align-items-center">

                    {/* LEFT TEXT */}
                    <div className="col-md-6">
                        <h2 className="fw-bold">Our Story</h2>
                        <p className="text-muted">
                            Kishu Studio was established in 1985 in Gujarat with a vision 
                            to provide high-quality services and creative solutions. 
                            Over the years, we have built a strong reputation for 
                            innovation, trust, and customer satisfaction.
                        </p>
                        <p className="text-muted">
                            We believe in delivering excellence and continuously 
                            improving our services to meet modern demands.
                        </p>
                    </div>

                    {/* RIGHT IMAGE */}
                    <div className="col-md-6 text-center">
                        <img 
                            src="/img/1.jpg"
                            alt="Company"
                            className="img-fluid rounded shadow"
                        />
                    </div>

                </div>
            </div>

            {/* FEATURES / HIGHLIGHTS */}
            <div className="bg-light py-5">
                <div className="container text-center">
                    <h2 className="fw-bold mb-4">Why Choose Us</h2>

                    <div className="row">

                        <div className="col-md-4">
                            <div className="p-4 shadow rounded bg-white">
                                <h5>✔ Experience</h5>
                                <p>40+ years of industry experience.</p>
                            </div>
                        </div>

                        <div className="col-md-4">
                            <div className="p-4 shadow rounded bg-white">
                                <h5>✔ Quality</h5>
                                <p>We focus on premium quality services.</p>
                            </div>
                        </div>

                        <div className="col-md-4">
                            <div className="p-4 shadow rounded bg-white">
                                <h5>✔ Trust</h5>
                                <p>Trusted by hundreds of satisfied clients.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {/* TEAM SECTION */}
            <div className="container py-5">
                <h2 className="text-center fw-bold mb-5">Our Team</h2>

                <div className="row text-center">

                    <div className="col-md-4">
                        <img 
                            src="/img/kishan.jfif"
                            className="rounded-circle mb-3"
                            alt="Founder"
                            width="150"
                            height="150"
                        />
                        <h5>Founder</h5>
                        <p className="text-muted">Vision & Leadership</p>
                    </div>

                    <div className="col-md-4">
                        <img 
                            src="/img/pravin.jpg"
                            className="rounded-circle mb-3"
                            alt="Manager"
                            width="150"
                            height="150"
                        />
                        <h5>Manager</h5>
                        <p className="text-muted">Operations Head</p>
                    </div>

                    <div className="col-md-4">
                        <img 
                            src="/img/GANESH.jfif"
                            className="rounded-circle mb-3"
                            alt="Designer"
                            width="150"
                            height="150"
                        />
                        <h5>Designer</h5>
                        <p className="text-muted">Creative Expert</p>
                    </div>

                </div>
            </div>

        </div>
    );
}

export default About;