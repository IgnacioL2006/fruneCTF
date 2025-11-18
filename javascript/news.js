window.addEventListener("DOMContentLoaded", () => {

    fetch("/retrieve_news.php") 
        .then(response => response.json())
        .then(news_data => {
            console.log("Raw Data", news_data);
            Create_newsletter(news_data);
        })
});

function Create_newsletter(data) {
    const news_container = document.getElementById("news_container");
    news_container.innerHTML = "";

    data.forEach((row) => {
        const news_letter = document.createElement("div");
        news_letter.className = "news_letter";

        // Título
        const title = document.createElement("h1");
        title.textContent = row.title;
        news_letter.appendChild(title);

        // Usuario y fecha
        const sub_title = document.createElement("p");
        sub_title.innerHTML = `
            <img src="${row.photo_url || 'images/user-images/user_image_default.png'}" 
                class="comment-user-img">
            <strong>${row.webname}</strong> el ${row.date}
        `;
        news_letter.appendChild(sub_title);

        // Cuerpo de la noticia
        const body_container = document.createElement("div");
        body_container.className = "news_letter_body";

        const body = document.createElement("p");
        body.textContent = row.body;
        body_container.appendChild(body);

        news_letter.appendChild(body_container);
        news_container.appendChild(news_letter);
    });
}
