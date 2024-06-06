<style>
    /* jumbotron */
    .jumbotron {
        text-align: justify;
        background-image: url(../img/background-1.png);
        background-size: cover;
        height: 100vh;
        position: relative;
    }

    .jumbotron .container {
        position: relative;
        z-index: 1;
    }

    .jumbotron::after {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        /* background-image: linear-gradient(to top, rgba(0, 0, 01), rgba(0, 0, 0, 0)); */
        position: absolute;
        bottom: 0;
    }

    .jumbotron .display-4 {
        color: black;
        padding-top: 150px;
        /* margin-top: 75px; */
        font-weight: 400px;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        font-size: 40px;
        margin-bottom: 30px;
        font-family: Stuart, Georgia, serif;
    }

    .jumbotron .display-4 span {
        font-weight: 500;
    }

    .jumbotron .btn-1 {
        color: white !important;
        background-color: #00bfff !important;
    }

    .card-body p {
        color: #fff;
    }

    @media screen and (max-width: 990px) {
        .jumbotron {
            background: url(../img/background-2.png) !important;
            width: 100vw;
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .btn-login {
            margin-left: 4% !important;
            margin-top: 20px !important;
        }

        .nav-a {
            margin-left: 0 !important;
        }

        .hp {
            width: 90% !important;
        }
    }
</style>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 px-4 py-5">
                <h1 class="display-4 aos-init aos-animate">
                    Complete
                    <span>Health </span>
                    <span>Solutions</span>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque optio voluptatem h</p>
                <div class="d-flex" style="flex-direction: row !important">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-left: -12px">
                                <div class="card me-3 mb-4" style="width: 18rem">
                                    <img src="..." class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <p class="card-text">Some quick example</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mx-3 mb-4" style="width: 18rem">
                                    <img src="..." class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <p class="card-text">Some quick example</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mx-3 mb-4" style="width: 18rem">
                                    <img src="..." class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <p class="card-text">Some quick example</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-1 btn-lg" href="#About" role="button">Learn more</a>
            </div>
        </div>
    </div>
</div>