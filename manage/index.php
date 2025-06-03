<?php
$movies = []; // Empty array since user hasn't uploaded any movies yet
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movies - RatingTales</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <h2>RATE-TALES</h2>
            </div>
            <ul class="nav-links">
                <li><a href="../beranda/index.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="../favorite/index.php"><i class="fas fa-heart"></i>Favourites</a></li>
                <li><a href="../review/index.php"><i class="fas fa-star"></i>Review</a></li>
                <li class="active"><a href="../manage/index.php"><i class="fas fa-film"></i>Manage</a></li>
            </ul>
            <ul class="bottom-links">
                <li><a href="../logout/index.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search movies...">
                </div>

            </div>

            <!-- Movies Grid -->
            <div class="movies-grid">
                <?php if (empty($movies)): ?>
                    <div class="empty-state">
                        <i class="fas fa-film"></i>
                        <p>No movies uploaded yet</p>
                        <p class="subtitle">Start adding your movies by clicking the upload button below</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="edit-all-btn" title="Edit All Movies">
                    <i class="fas fa-edit"></i>
                </button>
                <a href="upload.php" class="upload-btn" title="Upload New Movie">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-bar input');
            const moviesGrid = document.querySelector('.movies-grid');
            const movieCards = document.querySelectorAll('.movie-card');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                movieCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    if (title.includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show empty state if no movies match
                const visibleCards = document.querySelectorAll('.movie-card[style="display: "]');
                if (visibleCards.length === 0 && searchTerm !== '') {
                    if (!document.querySelector('.search-empty-state')) {
                        const emptyState = document.createElement('div');
                        emptyState.className = 'empty-state search-empty-state';
                        emptyState.innerHTML = `
                            <i class="fas fa-search"></i>
                            <p>No movies found</p>
                            <p class="subtitle">Try a different search term</p>
                        `;
                        moviesGrid.appendChild(emptyState);
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