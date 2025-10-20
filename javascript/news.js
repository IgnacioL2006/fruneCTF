console.log("Esta wea funciona")
document.getElementById("update_button").addEventListener("click", () => {
    console.log("clicked")
fetch("retrieve_news.php")
    .then((response) => response.json())
    .then((news_data) => {
        console.log("Raw Data", news_data);
        Create_newsletter(news_data)
    })
    .catch((error) => console.log("Error", error));
})


function Create_newsletter(data)
{
    console.log("Function called")
    const news_container = document.getElementById("news_container")
    news_container.innerHTML = "";

    data.forEach((row_data) => {
        const news_letter = document.createElement("div")
        news_letter.className = "news_letter"
        
        const title = document.createElement("h1")
        title.textContent = row_data[1]
        news_letter.appendChild(title)

        const sub_title = document.createElement("p")
        sub_title.textContent = "Creado por " + row_data[3] + " el " + row_data[4]
        news_letter.appendChild(sub_title)
        
        const body_container = document.createElement("div")
        body_container.className = "news_letter_body"

        const body = document.createElement("p")
        body.textContent = row_data[2]
        body_container.appendChild(body)

        news_letter.appendChild(body_container)

        news_container.appendChild(news_letter)

        console.log(news_letter)
    })

}