<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details - RATE-TALES</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .movie-details-page {
            padding: 2rem;
            color: white;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            margin-bottom: 2rem;
            font-size: 1.2rem;
        }

        .movie-header {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .movie-poster-large {
            width: 300px;
            height: 450px;
            border-radius: 15px;
            overflow: hidden;
        }

        .movie-poster-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .movie-info-large {
            flex: 1;
        }

        .movie-title-large {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .movie-meta {
            color: #888;
            margin-bottom: 1.5rem;
        }

        .rating-large {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .rating-large .stars {
            color: #ffd700;
            font-size: 1.5rem;
        }

        .movie-description {
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        .action-button {
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .watch-trailer {
            background-color: #e50914;
            color: white;
        }

        .add-favorite {
            background-color: #333;
            color: white;
        }

        .action-button:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .comments-section {
            margin-top: 3rem;
        }

        .comments-header {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .comment-input {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            background-color: #333;
            color: white;
            margin-bottom: 1rem;
            resize: vertical;
        }

        .comment-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .comment {
            background-color: #1a1a1a;
            padding: 1rem;
            border-radius: 10px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .comment-actions {
            display: flex;
            gap: 1rem;
            color: #888;
        }

        .comment-actions i {
            cursor: pointer;
        }

        .comment-actions i:hover {
            color: white;
        }

        /* Modal styles */
        .trailer-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .trailer-modal.active {
            display: flex;
        }

        .trailer-content {
            width: 80%;
            max-width: 1200px;
            position: relative;
        }

        .close-trailer {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 2rem;
            cursor: pointer;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
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
                <li class="active"><a href="index.php"><i class="fas fa-star"></i> <span>Review</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i> <span>Manage</span></a></li>
            </ul>
            <div class="bottom-links">
                <ul>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </nav>
        <main class="main-content">
            <div class="movie-details-page">
                <a href="index.php" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Reviews</span>
                </a>
                <div class="movie-header">
                    <div class="movie-poster-large">
                        <img id="movie-poster" src="" alt="Movie Poster">
                    </div>
                    <div class="movie-info-large">
                        <h1 id="movie-title" class="movie-title-large"></h1>
                        <p id="movie-meta" class="movie-meta"></p>
                        <div class="rating-large">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span id="movie-rating"></span>
                        </div>
                        <p id="movie-description" class="movie-description"></p>
                        <div class="action-buttons">
                            <button class="action-button watch-trailer" onclick="playTrailer()">
                                <i class="fas fa-play"></i>
                                <span>Watch Trailer</span>
                            </button>
                            <button class="action-button add-favorite">
                                <i class="fas fa-heart"></i>
                                <span>Add to Favorites</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="comments-section">
                    <h2 class="comments-header">Comments</h2>
                    <textarea class="comment-input" placeholder="Write a comment..."></textarea>
                    <div class="comment-list">
                        <div class="comment">
                            <div class="comment-header">
                                <strong>John Doe</strong>
                                <div class="comment-actions">
                                    <i class="fas fa-thumbs-up"></i>
                                    <i class="fas fa-thumbs-down"></i>
                                    <i class="fas fa-reply"></i>
                                </div>
                            </div>
                            <p>Great movie! The special effects were amazing.</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <strong>Jane Smith</strong>
                                <div class="comment-actions">
                                    <i class="fas fa-thumbs-up"></i>
                                    <i class="fas fa-thumbs-down"></i>
                                    <i class="fas fa-reply"></i>
                                </div>
                            </div>
                            <p>One of the best movies I've seen this year!</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Trailer Modal -->
    <div id="trailer-modal" class="trailer-modal">
        <div class="trailer-content">
            <span class="close-trailer" onclick="closeTrailer()">&times;</span>
            <div class="video-container">
                <iframe id="trailer-iframe" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get movie details from localStorage
        const movieData = JSON.parse(localStorage.getItem('currentMovie'));
        if (movieData) {
            document.getElementById('movie-title').textContent = movieData.title;
            document.getElementById('movie-meta').textContent = `${movieData.year} | ${movieData.genre}`;
            document.getElementById('movie-description').textContent = movieData.description;
            document.getElementById('movie-rating').textContent = movieData.rating;
            // You would typically get the poster URL from the movieData as well
            // For now, we'll use a placeholder
            document.getElementById('movie-poster').src = 'https://m.media-amazon.com/images/M/MV5BYzE4MTllZTktMTIyZS00Yzg1LTg1YzAtMWQwZTZkNjNkODNjXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg';
        }
    });

    function playTrailer() {
        const modal = document.getElementById('trailer-modal');
        const iframe = document.getElementById('trailer-iframe');
        // Replace with actual movie trailer URL
        iframe.src = 'https://www.youtube.com/embed/odM92ap8_c0';
        modal.classList.add('active');
    }

    function closeTrailer() {
        const modal = document.getElementById('trailer-modal');
        const iframe = document.getElementById('trailer-iframe');
        iframe.src = '';
        modal.classList.remove('active');
    }

    // Close modal when clicking outside
    document.getElementById('trailer-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeTrailer();
        }
    });
    </script>
</body>
</html>