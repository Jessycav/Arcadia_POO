document.addEventListener("DOMContentLoaded", function() {
    fetchTestimonials();

    function fetchTestimonials() {
        fetch ('index.php?page=accueil&ajax=1')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur lors du chargement des avis');
            }
            return response.json();
        })
        .then(testimonials => {
            console.log("Données reçues :", testimonials);
            const sliderContainer = document.getElementById('testimonial-slider-container');
            sliderContainer.innerHTML = "";
            testimonials.forEach((testimonial, index) => {
                const slide = document.createElement('div');
                slide.classList.add('slide');

                slide.innerHTML = `
                    <h5>${testimonial.visitor_firstname}</h5>
                    <p>Visite du ${new Date(testimonial.visit_date).toLocaleDateString('fr-FR')}</p>
                    <p>${testimonial.message}</p>
                `;
                sliderContainer.appendChild(slide);
            });
            initializeTestimonialCarousel();
        })
        .catch(error => console.error('Erreur lors du chargement des avis', error));
    }
});