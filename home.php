<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>HHA PRINTED</title>
</head>

<body>
    <?php include 'header.php'; ?>


    <section class="hero">
    <div class="slideshow-container">
           <img src="mainpicture1.png" alt="Main Image 1" class="large-image">
           <img src="mainpicture2.png" alt="Main Image 2" class="large-image">
           <img src="mainpicture3.png" alt="Main Image 3" class="large-image">
    </div>
    </section> 

    <section class="welcome">
        <h1><br>Welcome to HHA PRINTED</h1>
        <p>
            Discover a wide range of beautifully designed hijabs made for modern Muslim women. <br>
            Our collection features high-quality, stylish, and comfortable hijabs, perfect for daily wear or special occasions.
        </p>
		
         <!-- Change the button structure -->
        <a href="shop.php" class="shop-now-button">Shop Now</a>
    </section>

    <section class="gallery">
        <div class="gallery-item">
            <img src="IMAGE1.png" alt="Product Image 1" width="300" height="300"> <!-- Add product images -->
        </div>
        <div class="gallery-item">
            <img src="IMAGE2.png" alt="Product Image 2">
        </div>
        <div class="gallery-item">
            <img src="IMAGE3.png" alt="Product Image 3">
        </div>
		<div class="gallery-item">
            <img src="IMAGE4.png" alt="Product Image 4" width="300" height="300"> <!-- Add product images -->
        </div>
    </section>

    <script>
    let slideIndex = 0;
    let slides = document.getElementsByClassName('large-image');

    function showSlides() {
        
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove('active');
        }

        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].classList.add('active');

        setTimeout(showSlides, 6000); 
    }

    showSlides();
	</script>

    <?php include 'footer.php'; ?>

</body>


<style>
 
.hero {
    width: 100%;
    height: 300px;
    background-image: url('../SWC2353 WD/hero-image.jpg'); /* Hero image path */
    background-size: cover;
    background-position: center;
}

	
.large-image {
    width: 1300px;
    height: auto;
	background-color: white;
}

.welcome {
    text-align: center;
    padding-top: 20px;
	padding-bottom: 40px;
}

.welcome h1 {
    font-size: 36px;
	margin-top: -40px;
    margin-bottom: 20px;
}

.welcome p {
    font-size: 20px;
	margin-top: 20px;
    margin-bottom: 30px;
    color: #000000;
	font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
}

.welcome a.shop-now-button {
    background-color: #000;      /* Black background */
    color: #fff;                 /* White text */
    border: none;                /* No border */
    padding: 10px 20px;          /* Padding for the button */
    text-decoration: none;       /* Removes underline */
    font-size: 16px;             /* Adjust font size if needed */
    font-family: 'Arial', sans-serif; /* Adjust font */
    display: inline-block;       /* Makes the link behave like a button */
    transition: background-color 0.3s; /* Optional: adds transition effect */
}

.gallery {
    display: flex;
    justify-content: center;
    padding: 20px;
	padding-right: 10px;
	padding-left: 10px;
}

.gallery-item {
    margin-top: 60px;
}

.gallery-item img {
	margin-top: -10px;
    width: 300px;
    height: 300px;
    object-fit: cover;
}
	
/* Active Page Highlight */
nav ul li a.active {
    color: #800000;
    font-weight: bold;
    border-bottom: 2px solid #800000;
}
	
/* Centering the slideshow in the hero section */
.hero {
    width: 100%;
    display: flex;
    justify-content: center; /* Centers the slideshow horizontally */
    align-items: center;     /* Centers the slideshow vertically */
    height: 600px;           /* Adjust this height as needed */
    background-color: white; /* Just a placeholder background color */
}

/* Slideshow container */
.slideshow-container {
    position: relative;
    max-width: 1300px;
    width: 100%;             /* Ensure the container takes full width */
    height: 100%;            /* Set height to fill the hero section */
    overflow: hidden;
    display: flex;
    justify-content: center;  /* Center the content horizontally */
    align-items: center;      /* Center the content vertically */
}

/* Image styling */
.large-image {
    position: absolute;
    max-width: 100%;         /* Ensure the image scales properly */
    max-height: 100%;        /* Ensure the image doesn't exceed container height */
    object-fit: contain;     /* Ensure the image maintains its aspect ratio */
    opacity: 0;              /* Start with opacity at 0 for transitions */
    transition: opacity 1s ease-in-out;
}


.large-image {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    animation-duration: 7s;
    animation-fill-mode: forwards;
}

.active {
    opacity: 1;
    animation: slideIn 5s ease-in-out;
}

@keyframes slideIn {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(0%);
    }
}
	
.slideshow-container {
    position: relative;
    width: 100%;
    max-width: 1300px;
    height: 600px; /* Tinggi sesuai dengan kebutuhan */
    overflow: hidden;
    display: flex;
    justify-content: center; /* Memposisikan gambar di tengah secara horizontal */
    align-items: center; /* Memposisikan gambar di tengah secara vertikal */
}

.large-image {
    position: absolute;
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Gambar tetap dalam batas yang diberikan tanpa terdistorsi */
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.active {
    opacity: 1;
    animation: slideIn 5s ease-in-out;
}

@keyframes slideIn {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(0%);
    }
}

</style>

</html>
