<?php
// Movie data will be handled later
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Movie - RatingTales</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="upload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <h2 class="logo">RATE-TALES</h2>
            <ul class="nav-links">
                <li><a href="../beranda/index.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="../favorite/index.php"><i class="fas fa-heart"></i>Favorites</a></li>
                <li><a href="../review/index.php"><i class="fas fa-star"></i>Review</a></li>
                <li><a href="index.php" class="active"><i class="fas fa-film"></i>Manage</a></li>
            </ul>
            <ul class="bottom-links">
                <li><a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <header>
            </header>

            <div class="upload-container">
                <h1>Upload New Movie</h1>
                <form class="upload-form" action="#" method="post" enctype="multipart/form-data">
                    <div class="form-layout">
                        <div class="form-main">
                            <div class="form-group">
                                <label for="movie-title">Movie Title</label>
                                <input type="text" id="movie-title" name="movie-title" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="movie-summary">Movie Summary</label>
                                <textarea id="movie-summary" name="movie-summary" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Genre</label>
                                <div class="genre-options">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="genre[]" value="action">
                                        <span>Action</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="genre[]" value="adventure">
                                        <span>Adventure</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="genre[]" value="comedy">
                                        <span>Comedy</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="genre[]" value="drama">
                                        <span>Drama</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="genre[]" value="horror">
                                        <span>Horror</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="age-rating">Age Rating</label>
                                <select id="age-rating" name="age-rating" required>
                                    <option value="">Select age rating</option>
                                    <option value="G">G (General Audience)</option>
                                    <option value="PG">PG (Parental Guidance)</option>
                                    <option value="PG-13">PG-13 (Parental Guidance for children under 13)</option>
                                    <option value="R">R (Restricted)</option>
                                    <option value="NC-17">NC-17 (Adults Only)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="movie-trailer">Movie Trailer</label>
                                <div class="trailer-input">
                                    <input type="text" id="trailer-link" name="trailer-link" placeholder="Enter YouTube video URL">
                                    <span class="trailer-note">* Paste YouTube video URL</span>
                                </div>
                                <div class="trailer-upload">
                                    <input type="file" id="trailer-file" name="trailer-file" accept="video/*">
                                    <span class="trailer-note">* Or upload video file</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-side">
                            <div class="poster-upload">
                                <label for="movie-poster">Movie Poster</label>
                                <div class="upload-area" id="upload-area">
                                    <i class="fas fa-image"></i>
                                    <p>Click or drag image here</p>
                                    <input type="file" id="movie-poster" name="movie-poster" accept="image/*" required>
                                </div>
                            </div>

                            <div class="advanced-settings">
                                <h3>Advanced Settings</h3>
                                <div class="form-group">
                                    <label for="release-date">Release Date</label>
                                    <input type="date" id="release-date" name="release-date" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="duration-hours">Film Duration</label>
                                    <div class="duration-inputs">
                                        <div class="duration-field">
                                            <input type="number" id="duration-hours" name="duration-hours" min="0" placeholder="Hours" required>
                                            <span>Hours</span>
                                        </div>
                                        <div class="duration-field">
                                            <input type="number" id="duration-minutes" name="duration-minutes" min="0" max="59" placeholder="Minutes" required>
                                            <span>Minutes</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="cancel-btn" onclick="window.location.href='index.php'">Cancel</button>
                        <button type="submit" class="submit-btn">Upload Movie</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>