<?php
$movies = [
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
    ],
    [
        'title' => 'Dune: Part Two',
        'year' => '2024',
        'genre' => 'Sci-fi, Adventure',
        'image' => 'https://m.media-amazon.com/images/M/MV5BODdjMjM3NGQtZDA5OC00NGE4LWIyZDQtZjYwOGM2NTNmNjdkXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_.jpg'
    ],
    [
        'title' => 'Kung Fu Panda 4',
        'year' => '2024',
        'genre' => 'Animation, Comedy',
        'image' => 'https://m.media-amazon.com/images/M/MV5BZDY0NmNhOGYtOGUxMC00ZDkxLWE4YjUtYjNjNjY0ZDg2NDhkXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ],
    [
        'title' => 'Inside Out 2',
        'year' => '2024',
        'genre' => 'Animation, Adventure',
        'image' => 'https://m.media-amazon.com/images/M/MV5BOTMyMjEyMzgtZTIyYi00YmViLWE3ZjItYzY5NWY0ZWJiYjJkXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ],
    [
        'title' => 'Ghostbusters: Frozen Empire',
        'year' => '2024',
        'genre' => 'Action, Comedy',
        'image' => 'https://m.media-amazon.com/images/M/MV5BNGE5YzJmYmYtZjY0My00ZjcxLTk2YTQtOGE4YjNkZjJlZDY4XkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATE-TALES - Review</title>
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
                <li><a href="#"><i class="fas fa-heart"></i> <span>Favourites</span></a></li>
                <li class="active"><a href="#"><i class="fas fa-star"></i> <span>Review</span></a></li>
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
                <h1>Movie Reviews</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search movies...">
                    <button><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="review-grid">
                <?php foreach ($movies as $movie): ?>
                <div class="movie-card" onclick="showMovieDetails(this, '<?php echo $movie["title"]; ?>', '<?php echo $movie["year"]; ?>', '<?php echo $movie["genre"]; ?>', '<?php echo htmlspecialchars(json_encode('King Kong is transported out of his containment zone after Godzilla resurfaces and creates mayhem. Humans need his help to reach Hollow Earth and find a way to subdue the king of the monsters.')); ?>', '4.4/5')">
                    <div class="movie-poster">
                        <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
                        <div class="movie-actions">
                            <button class="action-btn"><i class="fas fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="movie-details">
                        <h3><?php echo $movie['title']; ?></h3>
                        <p class="movie-info"><?php echo $movie['year']; ?> | <?php echo $movie['genre']; ?></p>
                        <div class="rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="rating-count">(4.0)</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <div id="movie-details-popup" class="movie-details-popup">
        <div class="popup-content">
            <div class="popup-header">
                <h2 id="popup-title"></h2>
                <div class="popup-rating">
                    <div class="rating-stars">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                    <span id="popup-rating"></span>
                </div>
            </div>
            <p id="popup-year-genre"></p>
            <p id="popup-description"></p>
            <div class="popup-actions">
                <button class="action-btn"><i class="fas fa-heart"></i></button>
                <button class="read-more-btn" onclick="openMovieDetails()"><i class="fas fa-book-open"></i></button>
            </div>
        </div>
    </div>

    </div>

    <script>
    let currentMovie = {};

    function showMovieDetails(card, title, year, genre, description, rating) {
        currentMovie = { title, year, genre, description: JSON.parse(description), rating };
        
        document.getElementById('popup-title').textContent = title;
        document.getElementById('popup-year-genre').textContent = year + ' | ' + genre;
        document.getElementById('popup-description').textContent = JSON.parse(description);
        document.getElementById('popup-rating').textContent = rating;

        const popup = document.getElementById('movie-details-popup');
        popup.classList.add('active');

        // Close popup when clicking outside
        popup.onclick = function(e) {
            if (e.target === popup) {
                popup.classList.remove('active');
            }
        };

        // Initialize rating stars
        const stars = document.querySelectorAll('.rating-stars i');
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                updateRating(rating);
            });

            star.addEventListener('mouseover', function() {
                const rating = this.getAttribute('data-rating');
                highlightStars(rating);
            });
        });

        document.querySelector('.rating-stars').addEventListener('mouseout', function() {
            resetStars();
        });
    }



    function updateRating(rating) {
        const stars = document.querySelectorAll('.rating-stars i');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.className = 'fas fa-star';
            } else {
                star.className = 'far fa-star';
            }
        });
        // Here you would typically send the rating to your backend
        console.log(`Rating ${rating} stars for movie: ${currentMovie.title}`);
    }

    function highlightStars(rating) {
        const stars = document.querySelectorAll('.rating-stars i');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.className = 'fas fa-star';
            } else {
                star.className = 'far fa-star';
            }
        });
    }

    function resetStars() {
        const stars = document.querySelectorAll('.rating-stars i');
        stars.forEach(star => {
            star.className = 'far fa-star';
        });
    }

    function openMovieDetails() {
        // Save current movie details to localStorage for the details page
        localStorage.setItem('currentMovie', JSON.stringify(currentMovie));
        window.location.href = 'movie-details.php';
    }
    </script>
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
                            <p>No movies found</p>
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

            // Trigger search when search button is clicked
            const searchButton = document.querySelector('.search-bar button');
            searchButton.addEventListener('click', function() {
                const event = new Event('input');
                searchInput.dispatchEvent(event);
            });
        });
    </script>
</body>
</html>