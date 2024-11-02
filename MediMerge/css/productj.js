function addToCart(productName, productPrice, productImage) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let product = cart.find(item => item.name === productName);

    if (product) {
        product.quantity++;
    } else {
        cart.push({ name: productName, price: productPrice, quantity: 1, image: productImage });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(productName + " has been added to your cart.");
}

function searchProduct() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let products = document.querySelectorAll('.swiper-slide.box');

    products.forEach(product => {
        let productName = product.querySelector('h3').textContent.toLowerCase();
        if (productName.includes(input)) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

function resetSearch() {
    let products = document.querySelectorAll('.swiper-slide.box');
    products.forEach(product => {
        product.style.display = 'block';
    });
    document.getElementById('searchInput').value = '';
}

function sortProducts() {
    const sortValue = document.getElementById("sortSelect").value;
    const productList = document.getElementById("productList");
    const products = Array.from(productList.getElementsByClassName("swiper-slide"));

    products.sort((a, b) => {
        const nameA = a.querySelector("h3").textContent.toUpperCase();
        const nameB = b.querySelector("h3").textContent.toUpperCase();
        const priceA = parseFloat(a.querySelector(".price").textContent.replace('₹', '').trim());
        const priceB = parseFloat(b.querySelector(".price").textContent.replace('₹', '').trim());

        switch (sortValue) {
            case "aToZ":
                return nameA < nameB ? -1 : (nameA > nameB ? 1 : 0);
            case "zToA":
                return nameA > nameB ? -1 : (nameA < nameB ? 1 : 0);
            case "priceLowToHigh":
                return priceA - priceB;
            case "priceHighToLow":
                return priceB - priceA;
            case "popularity":
                // Example logic for popularity sorting
                // Replace with actual popularity logic if available
                return 0;
            default:
                return 0;
        }
    });

    // Clear existing products and append sorted products
    productList.innerHTML = "";
    products.forEach(product => productList.appendChild(product));
}

// Event listener for sorting (make sure your HTML has an element with id="sortSelect")
document.getElementById("sortSelect").addEventListener("change", sortProducts);
