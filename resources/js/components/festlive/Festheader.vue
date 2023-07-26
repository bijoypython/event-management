<template>
    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-person custom-icon me-2"></i>
                        <strong class="text-dark">Welcome to Music Festival 2023</strong>
                    </p>
                </div>

            </div>
        </div>
    </header>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                Festava Live
            </a>

            <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                    <li class="nav-item">
                        <router-link to="/fest" class="nav-link click-scroll" href="#section_1">Home</router-link>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">Artists</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Schedule</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6">Contact</a>
                    </li>
                </ul>

                <router-link to="/fest/ticket" class="btn custom-btn d-lg-block d-none">Buy Ticket</router-link>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Festheader'
};
</script>