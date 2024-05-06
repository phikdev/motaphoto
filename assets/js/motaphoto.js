document.addEventListener('DOMContentLoaded', function() {
    // Sélection de l'image avec la classe .close
    var closeButton = document.querySelector('.close');

    // Ajout d'un écouteur d'événements au clic sur l'image de fermeture
    closeButton.addEventListener('click', function(event) {
        // Arrêt de la propagation de l'événement
        event.stopPropagation();

        // Sélection de la lightbox
        var lightbox = document.querySelector('.lightbox');
        
        // Masquer la lightbox en modifiant son style
        lightbox.style.display = 'none';
    });

    // Chargement initial de la lightbox
    loader();

    var images = document.querySelectorAll('.photo-fullscreen-link');
    var lightbox = document.querySelector('.lightbox');
    var img = lightbox.querySelector('img');
    var referenceElement = lightbox.querySelector('.info-ref');
    var categorieElement = lightbox.querySelector('.info-cat');
    var currentIndex = 0; // Définir currentIndex

    function loader(){
        var lightbox = document.querySelector('.lightbox');
        var img = new Image();
        lightbox.appendChild(img);

        var infoContainer = document.createElement('div');
        infoContainer.className = 'info-container';
        lightbox.appendChild(infoContainer);

        var referenceElement = document.createElement('p');
        referenceElement.className = 'info-ref';
        infoContainer.appendChild(referenceElement);

        var categorieElement = document.createElement('p');
        categorieElement.className = 'info-cat';
        infoContainer.appendChild(categorieElement);

        // Ouvrir la lightbox sur clic de l'icône plein écran
        document.querySelectorAll('.icon-fullscreen').forEach(function(link, index) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                currentIndex = index; // Mettre à jour currentIndex
                showImage(index); // Afficher l'image correspondante dans la lightbox
            });
        });
    } 

    // Fonction pour afficher l'image dans la lightbox
    function showImage(index) {
        var lightbox = document.querySelector('.lightbox');
        var img = lightbox.querySelector('.photo');
        var reference = images[index].getAttribute('data-reference');
        var categorie = images[index].getAttribute('data-categorie');
        
        img.src = images[index].href;
        
        lightbox.style.display = 'flex';
        
        // Afficher la référence et la catégorie dans la lightbox
        referenceElement.textContent = reference;
        categorieElement.textContent = categorie;
        currentIndex = index; // Mettre à jour currentIndex
    }

    // Ajout d'un écouteur d'événements au clic sur la flèche gauche
    document.querySelector('.left-arrow').addEventListener('click', function(event) {
        event.stopPropagation();
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex); // Afficher l'image précédente dans la lightbox
    });

    // Ajout d'un écouteur d'événements au clic sur la flèche droite
    document.querySelector('.right-arrow').addEventListener('click', function(event) {
        event.stopPropagation();
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex); // Afficher l'image suivante dans la lightbox
    });
});


    