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
                <div class="user-profile">
                    <i class="fas fa-bell"></i>
                    <a href="../acc page/index.php">
                        <img src="../assets/profile.jpg" alt="Profile" class="profile-img">
                    </a>
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
                <button class="upload-btn" title="Upload New Movie">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </main>
    </div>
</body>
</html>