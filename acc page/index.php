<?php
$user = [
    'display_name' => 'Jamal',
    'username' => 'jamal123',
    'bio' => '',
    'profile_image' => 'https://placekitten.com/200/200',
    'posts' => [
        [
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed mauris feugis dapibus...',
            'image' => 'https://placekitten.com/100/100'
        ],
        [
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed mauris feugis dapibus...',
            'image' => 'https://placekitten.com/100/100'
        ],
        [
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed mauris feugis dapibus...',
            'image' => 'https://placekitten.com/100/100'
        ],
        [
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed mauris feugis dapibus...',
            'image' => 'https://placekitten.com/100/100'
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATE-TALES - Profile</title>
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
                <li><a href="../favorite/index.php"><i class="fas fa-heart"></i> <span>Favorites</span></a></li>
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
            <div class="profile-header">
                <div class="profile-info">
                    <div class="profile-image">
                        <img src="<?php echo $user['profile_image']; ?>" alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <h1>
                            <span id="displayName"><?php echo $user['display_name']; ?></span>
                            <i class="fas fa-pen edit-icon" onclick="toggleEdit('displayName')"></i>
                        </h1>
                        <p class="username">
                            @<span id="username"><?php echo $user['username']; ?></span>
                            <i class="fas fa-pen edit-icon" onclick="toggleEdit('username')"></i>
                        </p>
                    </div>
                </div>
                <div class="about-me">
                    <h2>ABOUT ME:</h2>
                    <div class="about-content" id="bio" onclick="toggleEdit('bio')">
                        <?php echo $user['bio'] ? $user['bio'] : 'Click to add bio...'; ?>
                    </div>
                </div>
            </div>
            <div class="posts-section">
                <h2>My Post</h2>
                <div class="posts-grid">
                    <?php foreach ($user['posts'] as $post): ?>
                    <div class="post-card">
                        <div class="post-image">
                            <img src="<?php echo $post['image']; ?>" alt="Post Image">
                        </div>
                        <div class="post-content">
                            <p><?php echo $post['content']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
    <script>
        function toggleEdit(elementId) {
            const element = document.getElementById(elementId);
            const currentText = element.textContent.trim();
            
            let input;
            if (elementId === 'bio') {
                input = document.createElement('textarea');
                input.className = 'edit-input bio-input';
                input.value = currentText === 'Click to add bio...' ? '' : currentText;
                input.placeholder = 'Write something about yourself...';
            } else {
                input = document.createElement('input');
                input.type = 'text';
                input.className = 'edit-input';
                input.value = currentText;
            }
            
            input.onblur = function() {
                let newValue = this.value.trim();
                
                if (elementId === 'bio' && !newValue) {
                    newValue = 'Click to add bio...';
                }
                
                element.textContent = newValue;
                // Here you would typically make an API call to save the changes
            };
            
            element.textContent = '';
            element.appendChild(input);
            input.focus();
        }
    </script>
</body>
</html>