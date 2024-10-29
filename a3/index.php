<?php
include_once("includes/header.inc");
?>

<main class="home-page">
    <div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/dog1.jpeg" class="d-block" alt="Dog 1" style="width: 100%; height: 300px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="images/dog2.jpeg" class="d-block" alt="Dog 2" style="width: 100%; height: 300px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="images/cat1.jpeg" class="d-block" alt="Cat 1" style="width: 100%; height: 300px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="images/cat2.jpeg" class="d-block" alt="Cat 2" style="width: 100%; height: 300px; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div>
        <h1>Pets Victoria</h1>
        <h2>WELCOME TO PET<br>ADOPTION</h2>
    </div>
</main>



<?php
include_once("includes/footer.inc");
?>