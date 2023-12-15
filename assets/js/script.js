icons.addEventListener("click", function() {
    nav.classList.toggle("active");
   });
   const links = document.querySelectorAll("mobile li");

      icons.addEventListener("click", function() {
        mobile.classList.toggle("active");
       });
       links.forEach((link) => {
        link.addEventListener("click", () => {
          mobile.classList.remove("active");
        });
      });



      // Get the modal
var modal = document.querySelector('#myModal');

// Get the button that opens the modal
var btn = document.querySelector(".myBtn");




// When the user clicks on the button, open the modal
btn.addEventListener('click', function(){
  modal.style.display = "block";
  console.log('afficher modale');
});

//   // TEST
//   document.addEventListener("DOMContentLoaded", function () {

//     const categorySelect = document.getElementById("cat-select");
    
//     const bloggerElt = document.getElementById("blogger");

//     categorySelect.addEventListener("change", function() {
//         bloggerElt.textContent = '';
        

//         const categoryId = categorySelect.value;
        
//         // Requête AJAX vers la fonction personnalisée
//         var xhr = new XMLHttpRequest();
//         xhr.open('GET', '/wp-admin/admin-ajax.php?action=get_thumbnails_by_category&category_id=' + categoryId);
//         //Declanche la requete ajax côté serveur

//         //Crée un tableau json et le rends dispo coté client
//         xhr.onload = function() {
//             if (xhr.status === 200) {
              
//                 // La réponse est au format JSON
//                 var thumbnails = JSON.parse(xhr.responseText);
//                 console.log(thumbnails);

//                 thumbnails.forEach((thumbnail_url) => {
//                   console.log('reponse');
//                     const divElt = document.createElement('div');
//                     divElt.classList.add('divImg');

//                     const imgElt = document.createElement('img');
//                     imgElt.src = thumbnail_url;

//                     divElt.appendChild(imgElt);
//                     bloggerElt.appendChild(divElt);
//                 });
//             } else {
//                 console.error('Erreur lors de la requête AJAX');
//             }
//         }

//         xhr.send();
//     });
// });





/*test2*/


document.addEventListener('DOMContentLoaded', function () {
    function updatePosts() {
        var category = document.getElementById('category-filter').value;
        var format = document.querySelector('.formats').value;
        var order = document.getElementById('date-filter').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/wp-admin/admin-ajax.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200) {
                document.getElementById('posts-container').innerHTML = this.responseText;
            }
        };
        xhr.send('action=filter_photos&category=' + category + '&format=' + format + '&order=' + order);
    }

    document.getElementById('category-filter').addEventListener('change', updatePosts);
    document.querySelector('.formats').addEventListener('change', updatePosts);
    document.getElementById('date-filter').addEventListener('change', updatePosts);
});





























// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

var btn2 = document.querySelector(".btn2");


// When the user clicks on the button, open the modal
var data = document.querySelector(".data-ref").innerText;
var inputRef = document.querySelector("#ref-photo");
btn2.addEventListener('click', function(){
  modal.style.display = "block";
  inputRef.setAttribute('value', data);
  
  
  
});

  var arrowLeft = document.querySelector("#left");
  arrowLeft.addEventListener(
  "mouseenter",
  function () {
    console.log('fleche gauche');
    document.querySelector(".previous").style.display = "block";
    document.querySelector(".next").style.display = "none";
  });


  var right = document.querySelector("#right");
  right.addEventListener(
  "mouseenter",
  function () {
    document.querySelector(".next").style.display = "block";
    document.querySelector(".previous").style.display = "none";

  });





  

