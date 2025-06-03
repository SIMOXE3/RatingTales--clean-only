<?php

$host = 'localhost';
$dbname = 'ratingtales';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// User Functions
function createUser($username, $email, $password, $profile_image = null) {
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, profile_image) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$username, $email, $hashedPassword, $profile_image]);
}

function getUserById($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetch();
}

// Movie Functions
function createMovie($title, $summary, $release_date, $duration_hours, $duration_minutes, $age_rating, $poster_image, $trailer_url, $trailer_file, $uploaded_by) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO movies (title, summary, release_date, duration_hours, duration_minutes, age_rating, poster_image, trailer_url, trailer_file, uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$title, $summary, $release_date, $duration_hours, $duration_minutes, $age_rating, $poster_image, $trailer_url, $trailer_file, $uploaded_by]);
}

function addMovieGenre($movie_id, $genre) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO movie_genres (movie_id, genre) VALUES (?, ?)");
    return $stmt->execute([$movie_id, $genre]);
}

function getMovieById($movieId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT m.*, GROUP_CONCAT(mg.genre) as genres FROM movies m LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id WHERE m.movie_id = ? GROUP BY m.movie_id");
    $stmt->execute([$movieId]);
    return $stmt->fetch();
}

function getAllMovies() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT m.*, GROUP_CONCAT(mg.genre) as genres FROM movies m LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id GROUP BY m.movie_id ORDER BY m.created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Review Functions
function createReview($movie_id, $user_id, $rating, $comment) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO reviews (movie_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$movie_id, $user_id, $rating, $comment]);
}

function getMovieReviews($movieId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT r.*, u.username FROM reviews r JOIN users u ON r.user_id = u.user_id WHERE r.movie_id = ? ORDER BY r.created_at DESC");
    $stmt->execute([$movieId]);
    return $stmt->fetchAll();
}

// Favorite Functions
function addToFavorites($movie_id, $user_id) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO favorites (movie_id, user_id) VALUES (?, ?)");
    return $stmt->execute([$movie_id, $user_id]);
}

function removeFromFavorites($movie_id, $user_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM favorites WHERE movie_id = ? AND user_id = ?");
    return $stmt->execute([$movie_id, $user_id]);
}

function getUserFavorites($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT m.*, GROUP_CONCAT(mg.genre) as genres FROM favorites f JOIN movies m ON f.movie_id = m.movie_id LEFT JOIN movie_genres mg ON m.movie_id = mg.movie_id WHERE f.user_id = ? GROUP BY m.movie_id ORDER BY f.created_at DESC");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}