-- Create database
CREATE DATABASE IF NOT EXISTS ratingtales;
USE ratingtales;

-- Users table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Movies table
CREATE TABLE movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    summary TEXT,
    release_date DATE NOT NULL,
    duration_hours INT NOT NULL,
    duration_minutes INT NOT NULL,
    age_rating ENUM('G', 'PG', 'PG-13', 'R', 'NC-17') NOT NULL,
    poster_image VARCHAR(255) NOT NULL,
    trailer_url VARCHAR(255),
    trailer_file VARCHAR(255),
    uploaded_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(user_id)
);

-- Movie genres table
CREATE TABLE movie_genres (
    movie_id INT NOT NULL,
    genre ENUM('action', 'adventure', 'comedy', 'drama', 'horror') NOT NULL,
    PRIMARY KEY (movie_id, genre),
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE
);

-- Reviews table
CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    user_id INT NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Favorites table
CREATE TABLE favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    UNIQUE KEY unique_favorite (movie_id, user_id)
);

-- Create indexes
CREATE INDEX idx_movie_title ON movies(title);
CREATE INDEX idx_movie_genre ON movie_genres(genre);
CREATE INDEX idx_movie_rating ON reviews(movie_id, rating);
CREATE INDEX idx_user_favorites ON favorites(user_id, created_at);