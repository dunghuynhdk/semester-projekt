
// SLIDER 

const products = [
    { title: 'Product 1', image: 'images/product1.png' },
    { title: 'Product 2', image: 'images/product2.png' },
    { title: 'Product 3', image: 'images/product3.png' },
    { title: 'Product 4', image: 'images/product4.png' },
    { title: 'Product 5', image: 'images/product5.png' },
    { title: 'Product 6', image: 'images/product6.png' },
];

let currentIndex = 0;

const slider = document.getElementById('slider');
const leftArrow = document.getElementById('leftArrow');
const rightArrow = document.getElementById('rightArrow');

products.forEach(product => {
    const column = document.createElement('div');
    column.className = 'productColumn';

    const title = document.createElement('div');
    title.innerText = product.title;

    const image = document.createElement('img');
    image.src = product.image;
    image.className = 'productImage';

    const addToCartButton = document.createElement('button');
    addToCartButton.innerText = 'Add to Cart';

    column.appendChild(title);
    column.appendChild(image);
    column.appendChild(addToCartButton);

    slider.appendChild(column);
});


updateArrowsVisibility();

function updateArrowsVisibility() {

    leftArrow.style.display = currentIndex > 0 ? 'block' : 'none';
    
    rightArrow.style.display = currentIndex < products.length - 3 ? 'block' : 'none';
}

function scrollSlider(direction) {
    const columnWidth = document.querySelector('.productColumn').offsetWidth;
    const columnsToShow = 3;
    const maxIndex = Math.max(0, products.length - columnsToShow);

    if (direction === 'left' && currentIndex > 0) {
        currentIndex -= columnsToShow;
        currentIndex = Math.max(0, currentIndex);
    } else if (direction === 'right' && currentIndex < maxIndex) {
        currentIndex += columnsToShow;
        currentIndex = Math.min(maxIndex, currentIndex);
    }

    const transformValue = -currentIndex * columnWidth;
    slider.style.transform = `translateX(${transformValue}px)`;

    updateArrowsVisibility();
} 


// ADD TO CART

const generatedName = localStorage.getItem('generatedName');

function addToCart(title, productTitle, price) {
    const generatedName = localStorage.getItem('generatedName');
    const data = new URLSearchParams({
        addToCart: true,
        productTitle: productTitle,
        price: price,
        petName: generatedName,
    });

    fetch('cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok: ${response.status}`);
            }
            
            console.log('Product added to cart:', { title, productTitle, price });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
