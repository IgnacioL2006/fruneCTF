window.addEventListener("DOMContentLoaded", () => {

    fetch("retrieve_comment.php?user_id=" + pageUserId)
        .then((response) => response.json())
        .then((data) => {
            console.log("Raw Data", data);
            load_comments(data);
        })
        .catch((error) => console.log("Error", error));
});

function load_comments(data) {

    const comments_container = document.getElementById("comments-section");
    comments_container.innerHTML = "";

    data.forEach(row => {
        const comment_box = document.createElement("div");
        comment_box.className = "comment-box";

        // User photo ====== 
        const img = document.createElement("img");
        img.src = row.photo_url || "images/user-images/user_image_default.png";
        img.className = "comment-user-img";
        comment_box.appendChild(img);

        // User name ====== 
        const username = document.createElement("strong");
        username.textContent = row.webname;
        comment_box.appendChild(username);

        // Comment content ====== 
        const content = document.createElement("p");
        content.textContent = row.content;
        comment_box.appendChild(content);

        // Date ====== 
        const footer = document.createElement("small");
        
        footer.textContent = "Publicado el " + row.created_at;

        if (row.updated_at && row.updated_at !== row.created_at) {
            footer.textContent += " - (Editado)";
        }

        comment_box.appendChild(footer);

        // ====== IF THE USER IS LOGGED IN ======
        if (row.user_id == sessionUserId) {

            const btnContainer = document.createElement("div");
            btnContainer.className = "mt-2";

            // Edit button ====== 
            const editBtn = document.createElement("button");
            editBtn.className = "btn edit-btn btn-sm me-2";
            editBtn.style.backgroundColor = "rgb(92, 115, 163)"; 
            editBtn.style.color = "#fff";
            editBtn.textContent = "Editar";
            editBtn.onclick = () => editComment(row.id, row.content);

            // Append to container
            btnContainer.appendChild(editBtn);

            // Delete button ======
            const deleteBtn = document.createElement("button");
            deleteBtn.className = "btn delete-btn btn-sm";
            deleteBtn.style.backgroundColor = "#ff4444";
            deleteBtn.style.color = "#fff";
            deleteBtn.textContent = "Eliminar";
            deleteBtn.onclick = () => deleteComment(row.id);

            // Append to container
            btnContainer.appendChild(deleteBtn);

            // Add container to comments
            comment_box.appendChild(btnContainer);
        }
        // ====================================================

        comments_container.appendChild(comment_box);
    });
}

// ======= Edit comment function using jQuery =======
function editComment(commentId, oldContent) {
    // Show a prompt to edit the comment
    const newContent = prompt("Editar comentario:", oldContent);
    if (!newContent) return;

    // Send the updated data to the server using jQuery post
    $.post(
        "../edit_comment.php",                   // url of the php
        { 
            id: commentId,                       // ID of the comment to edit
            content: newContent                  // New content entered 
        },
        function (resp) {                        // Function after receiving server response
            console.log("EDIT RESPONSE:", resp); // Log server response
            location.reload();                
        }
    )
    .fail(function(err) {
        console.error("Error edit comment:", err);
    });
}

// ======= Delete comment function using jQuery =======
function deleteComment(commentId) {

    if (!confirm("Estás seguro de eliminar el comentario?")) return;

    // Send the request to delete the comment using jQuery post
    $.post("../delete_comment.php", 
        { 
            id: commentId 
        }, 
        function(resp) {
            console.log("PHP RESPONSE:", resp); 
            location.reload();                  
    })
    .fail(function(err) {
        console.error("Error deleting comment:", err);
    });
}
