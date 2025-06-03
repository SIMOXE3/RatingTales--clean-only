<?php
$movies = [
    [
        'title' => 'Moonfall',
        'year' => '2022',
        'genre' => 'Action',
        'rating' => '4.0',
        'image' => 'https://m.media-amazon.com/images/M/MV5BZjk0OWZiN2ItNmQ2YS00NTJmLTg0MjItNzM4NzBkMWM1ZTRlXkEyXkFqcGdeQXVyMjMxOTE0ODA@._V1_.jpg'
    ],
    [
        'title' => 'Black Adam',
        'year' => '2022',
        'genre' => 'Action',
        'rating' => '4.2',
        'image' => 'https://m.media-amazon.com/images/M/MV5BYzZkOGUwMzMtMTgyNS00YjFlLTg5NzYtZTE3Y2E5YTA5NWIyXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_.jpg'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATE-TALES - Favourites</title>
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
                <li><a href="../beranda/index.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
                <li class="active"><a href="#"><i class="fas fa-heart"></i> <span>Favourites</span></a></li>
                <li><a href="../review/index.php"><i class="fas fa-star"></i> <span>Review</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i> <span>Manage</span></a></li>
            </ul>
            <div class="bottom-links">
                <ul>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </nav>
        <main class="main-content">
            <div class="review-header">
                <h1>My Favourites</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search favourites...">
                    <button><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="review-grid">
                <?php foreach ($movies as $movie): ?>
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
                        <div class="movie-actions">
                            <button class="action-btn" title="Remove from favourites"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="movie-details">
                        <h3><?php echo $movie['title']; ?></h3>
                        <p class="movie-info"><?php echo $movie['year']; ?> | <?php echo $movie['genre']; ?></p>
                        <div class="rating">
                            <div class="stars">
                                <?php
                                $rating = floatval($movie['rating']);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<i class="fas fa-star"></i>';
                                    } else if ($i - 0.5 <= $rating) {
                                        echo '<i class="fas fa-star-half-alt"></i>';
                                    } else {
                                        echo '<i class="far fa-star"></i>';
                                    }
                                }
                                ?>
                            </div>
                            <span class="rating-count">(<?php echo $movie['rating']; ?>)</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-bar input');
            const movieCards = document.querySelectorAll('.movie-card');
            const reviewGrid = document.querySelector('.review-grid');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                let hasVisibleCards = false;

                movieCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const genre = card.querySelector('.movie-info').textContent.toLowerCase();
                    
                    if (title.includes(searchTerm) || genre.includes(searchTerm)) {
                        card.style.display = '';
                        hasVisibleCards = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show empty state if no movies match
                if (!hasVisibleCards && searchTerm !== '') {
                    if (!document.querySelector('.search-empty-state')) {
                        const emptyState = document.createElement('div');
                        emptyState.className = 'empty-state search-empty-state';
                        emptyState.innerHTML = `
                            <i class="fas fa-search"></i>
                            <p>No favorites found</p>
                            <p class="subtitle">Try a different search term</p>
                        `;
                        reviewGrid.appendChild(emptyState);
                    }
                } else {
                    const emptyState = document.querySelector('.search-empty-state');
                    if (emptyState) {
                        emptyState.remove();
                    }
                }
            });
        });
    </script>
</body>
</html>