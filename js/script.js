/* Modale */

document.addEventListener("DOMContentLoaded", function () {
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btns = document.querySelectorAll(".myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btns.forEach((btn) => {
    btn.addEventListener("click", function () {
      modal.style.display = "block";
    });
  });
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
});

/* Requête ajax 

document.addEventListener("DOMContentLoaded", function () {
  document.querySelector("#ajax_call").addEventListener("click", function () {
    let formData = new FormData();
    formData.append("action", "request_photos");

    fetch(motaphoto_js.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        if (!response.ok) {
          throw new Error("Network response error.");
        }

        return response.json();
      })
      .then(function (data) {
        if (data && data.query_posts && data.query_posts.length > 0) {
          // Assuming 'post_title' is a valid property, adjust it accordingly
          data.query_posts.forEach(function (post) {
            document
              .querySelector("#ajax_return")
              .insertAdjacentHTML(
                "beforeend",
                '<div class="col-12 mb-5">' + post.post_title + "</div>"
              );
          });
        } else {
          console.log("No posts found.");
        }
      })
      .catch(function (error) {
        console.error("There was a problem with the fetch operation: ", error);
      });
  });
});*/

/* carrousel single page */

document.addEventListener("DOMContentLoaded", function () {
  const carrousel = document.querySelector(".carrousel");
  const prevButton = document.querySelector(".prev");
  const nextButton = document.querySelector(".next");
  const prevImage = document.querySelector(".prev-image");
  const nextImage = document.querySelector(".next-image");

  prevButton.addEventListener("mouseover", function () {
    nextImage.classList.add("hide-image");
    prevImage.classList.remove("hide-image");
  });

  nextButton.addEventListener("mouseover", function () {
    prevImage.classList.add("hide-image");
    nextImage.classList.remove("hide-image");
  });
});

/* filtre sélection */

document.addEventListener("DOMContentLoaded", function () {
  // Sélectionnez tous les éléments de sélection dans le formulaire
  const selectElements = document.querySelectorAll("#filters-form select");

  // Ajoutez un gestionnaire d'événements change à chaque élément de sélection
  selectElements.forEach(function (select) {
    select.addEventListener("change", function () {
      // Soumettez le formulaire lorsque l'option de sélection change
      document.getElementById("filters-form").submit();
    });
  });
});
