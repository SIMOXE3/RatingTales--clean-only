<?php
$movies = [
    [
        'title' => 'Godzilla: King of the Monsters',
        'year' => '2019',
        'genre' => 'Action, Sci-fi',
        'image' => 'https://m.media-amazon.com/images/M/MV5BMGJkNDJlZWUtOGM1Ny00YjNkLThiM2QtY2ZjMzQxMTIxNWNmXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg'
    ],
    [
        'title' => 'Godzilla vs Kong',
        'year' => '2021',
        'genre' => 'Action, Sci-fi',
        'image' => 'https://m.media-amazon.com/images/M/MV5BYzE4MTllZTktMTIyZS00Yzg1LTg1YzAtMWQwZTZkNjNkODNjXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ],
    [
        'title' => 'Transformers: Rise of the Beasts',
        'year' => '2023',
        'genre' => 'Sci-fi, Action',
        'image' => 'https://m.media-amazon.com/images/M/MV5BZTgzYTRhMmQtNDcxZS00YzFiLTkwMjctZmE5ZjZhOGE5Y2IyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ],
    [
        'title' => 'TAROT',
        'year' => '2024',
        'genre' => 'Horror, Supernatural',
        'image' => 'https://m.media-amazon.com/images/M/MV5BYmRiYjZmOGYtNzQ1NC00NzNmLWFiMzgtMjYyZDhhMGVlMzhlXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ],
    [
        'title' => 'Deadpool 3',
        'year' => '2024',
        'genre' => 'Action, Sci-fi, Comedy',
        'image' => 'https://m.media-amazon.com/images/M/MV5BMDZiOTU4MTYtZTY0Mi00ZTI4LWI5ZTgtYWNkZTk3MjNkZjc2XkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATE-TALES - Movie Rating</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <div class="logo">
                <h2>RATE-TALES</h2>
            </div>
            <ul class="nav-links">
                <li class="active"><a href="#"><i class="fas fa-home"></i> <span>Home</span></a></li>
                <li><a href="#"><i class="fas fa-heart"></i> <span>Favourites</span></a></li>
                <li><a href="#"><i class="fas fa-star"></i> <span>Review</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i> <span>Manage</span></a></li>
            </ul>
            <div class="bottom-links">
                <ul>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </nav>
        <main class="main-content">
            <div class="hero-section">
                <div class="featured-movie-slider">
                    <?php foreach ($movies as $index => $movie): ?>
                    <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
                        <div class="movie-info">
                            <h1><?php echo $movie['title']; ?></h1>
                            <p><?php echo $movie['year']; ?> | <?php echo $movie['genre']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <section class="trending-section">
                <h2>TRENDING</h2>
                <div class="scroll-container">
                    <div class="movie-grid">
                        <?php foreach ($movies as $movie): ?>
                        <div class="movie-card">
                            <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
                            <div class="movie-details">
                                <h3><?php echo $movie['title']; ?></h3>
                                <p><?php echo $movie['year']; ?> | <?php echo $movie['genre']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <section class="for-you-section">
                <h2>For You</h2>
                <div class="scroll-container">
                    <div class="movie-grid">
                        <?php foreach (array_slice($movies, 0, 4) as $movie): ?>
                        <div class="movie-card">
                            <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
                            <div class="movie-details">
                                <h3><?php echo $movie['title']; ?></h3>
                                <p><?php echo $movie['year']; ?> | <?php echo $movie['genre']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>
        <div class="user-profile">
            <img src="https://ui-avatars.com/api/?name=Jamul&background=random" alt="User Profile" class="profile-pic">
            <span>Jamul</span>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Change slide every 5 seconds
        setInterval(nextSlide, 5000);
    });
    </script>
</body>
</html>