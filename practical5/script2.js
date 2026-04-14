let postsDiv = document.getElementById("posts");
async function getPosts() {
    try {
        let response = await fetch("https://jsonplaceholder.typicode.com/posts");
        if (!response.ok) {
            throw new Error("Помилка при отриманні даних");
        }
        let posts = await response.json();
        posts.forEach(post => {
            let postElement = document.createElement("div");
            postElement.innerHTML = `
            <h3>${post.title}</h3>
            <p>${post.body}</p>
            <hr>
            `;
            postsDiv.appendChild(postElement);
        });

    } catch (error) {
        postsDiv.innerHTML = `<p>Сталася помилка: ${error.message}</p>`;
    }
}
getPosts();