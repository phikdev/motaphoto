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
console.log(btn)



// When the user clicks on the button, open the modal
btn.addEventListener('click', function(){
  modal.style.display = "block";
  console.log('afficher modale');
});





// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

var btn2 = document.querySelector(".btn2");
console.log(btn)

// When the user clicks on the button, open the modal
var data = document.querySelector("#data-ref").innerText;
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

  

