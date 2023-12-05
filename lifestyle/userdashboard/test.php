<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Fetch All Posts</title>
</head>

<body>
    <div id='posts-container'></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Replace the URL with your actual API endpoint
        const apiUrl = 'https://chanrericr.com/blog/api/posts.php';

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {

                // Display the posts on the page
                const postsContainer = document.getElementById('posts-container');

                if (data.length > 0) {

                    const postsHTML = data.map(post => `
                    <div class='news-item'>
                        <div class='news-tem-image'>
                            <img src='https://chanrericr.com/blog/admin/postimages/${post.PostImage}'' alt='Hello'/>
                        </div>
                        <div class='news-item-info'>
                            <div class='list-news-title'>
                                ${post.PostTitle}
                            </div>
                        </div>
                    </div>
                            
                        `).join('');

                    postsContainer.innerHTML = postsHTML;
                } else {
                    // No posts found
                    postsContainer.innerHTML = '<p>No posts found.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching posts:', error);
            });
    });
    </script>
</body>

</html>