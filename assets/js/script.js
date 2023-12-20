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




/*FILTRES*/

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


let currentPage = 1;

jQuery('#btnL').on('click', function() {
  currentPage++;

  jQuery.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'json',
    data: {
      action: 'weichie_load_more',
      paged: currentPage,
    },
    success: function (data) {
      jQuery('#posts-container').append(data.html);
      if (!data.more) {
        jQuery('#btnL').hide(); // Cacher le bouton si toutes les photos sont affichées
      }
    }
  });
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



  


