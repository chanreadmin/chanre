document.addEventListener('DOMContentLoaded', function() {
const postId = 1; // Replace with the desired post ID
const apiUrl = `https://chanrericr.com/blog/api/posts.php?id=${postId}`;

fetch(apiUrl)
.then(response => response.json())
.then(data => {
const postsContainer = document.getElementById('posts-container');

if (data.length > 0) {
const post = data[0]; // Assuming the API returns an array of posts

const postHTML = `
<div class='news-item'>
    <div class='news-tem-image'>
        <img src='https://chanrericr.com/blog/admin/postimages/${post.PostImage}' alt='Hello' />
    </div>
    <div class='news-item-info'>
        <div class='list-news-title'>
            ${post.PostTitle}
        </div>
        <div class='post-content'>
            ${post.PostContent}
        </div>
    </div>
</div>
`;

postsContainer.innerHTML = postHTML;
} else {
postsContainer.innerHTML = '<p>No post found.</p>';
}
})
.catch(error => {
console.error('Error fetching post:', error);
});
});