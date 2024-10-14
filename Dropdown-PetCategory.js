document.addEventListener('DOMContentLoaded', function() {
    // Toggle the Dog Category List
    document.getElementById('dog-category-button').addEventListener('click', function() {
        const dogList = document.getElementById('dog-category-list');
        const isHidden = dogList.getAttribute('aria-hidden') === 'true';
        dogList.style.display = isHidden ? 'block' : 'none';
        dogList.setAttribute('aria-hidden', !isHidden);
    });

    // Toggle the Cat Category List
    document.getElementById('cat-category-button').addEventListener('click', function() {
        const catList = document.getElementById('cat-category-list');
        const isHidden = catList.getAttribute('aria-hidden') === 'true';
        catList.style.display = isHidden ? 'block' : 'none';
        catList.setAttribute('aria-hidden', !isHidden);
    });

    // Scroll to sections when category images are clicked
    document.getElementById('scrollToDogSection').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('Shop_Dog').scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('scrollToCatSection').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('shop_Cat').scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('scrollTosmallPetSection').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('shop_pet').scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('scrollTofishSection').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('shop_fish').scrollIntoView({ behavior: 'smooth' });
    });

    // Redirect to viewProducts.html when AllItems cards are clicked
    const cards = document.querySelectorAll('.allItems-Card');
cards.forEach(card => {
card.addEventListener('click', function() {
    const link = card.getAttribute('data-link');
    if (link) {
        window.location.href = link; // Navigate to the link
    } else {
        console.error('data-link attribute is missing or invalid'); // Debugging message
    }
});
});
}); 