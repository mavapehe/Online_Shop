document.addEventListener('DOMContentLoaded', async () => {
    const cart = getCartFromLocalStorage();
    const productIds = Object.keys(cart);
    const products = await fetchProductDetails(productIds);
    displayCartItems(products, cart);
    displayCartSummary(products, cart);


        // Add event listener for 'Clear Cart' button
        document.getElementById('clear-cart-btn').addEventListener('click', () => {
            clearCart();
            displayCartItems([], {}); // Clear the cart items display
            displayCartSummary([], {}); // Clear the cart summary
            updateCartDisplay(); // Update the button
        });

});

function getCartFromLocalStorage() {
    const cartJSON = localStorage.getItem('cart');
    return cartJSON ? JSON.parse(cartJSON) : {};
}

async function fetchProductDetails(productIds) {
    const response = await fetch(`get_products.php?ids=${productIds.join(',')}`);
    const products = await response.json();
    return products;
}

function displayCartItems(products, cart) {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = ''; // Clear previous items

    products.forEach(product => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        cartItem.innerHTML = `
            <div class="cart-item-content">
                <div class="image">
                    <img class="cart-item-image" src="/${product.image}" alt="${product.name}">
                </div>
                <div class="cart-item-info">
                    <h3 class="cart-item-name">${product.name}</h3>
                    <p class="cart-item-price">$${product.price}</p>
                    <h2 class="cart-item-quantity">${cart[product.id]}</h2>
                </div>
                <div class="buttons">    
                    <button id="add" class="add-item btn-add" data-id="${product.id}">Add One</button>
                    <button id="remove" class="remove-item btn-remove" data-id="${product.id}">Remove</button>
                </div>
            </div>
        `;

        cartItemsContainer.appendChild(cartItem);
    });

    // Event listeners for add buttons
    document.querySelectorAll('.add-item').forEach(button => {
        button.addEventListener('click', event => {
            const productId = event.target.getAttribute('data-id');
            addItemToCart(productId);
            const updatedCart = getCartFromLocalStorage(); // Get the updated cart
            displayCartItems(products, updatedCart); // Update the cart items display
            displayCartSummary(products, updatedCart); // Update the cart summary
        });
    });

    // Event listeners for remove buttons
    const removeButtons = document.querySelectorAll('.remove-item');
    removeButtons.forEach(button => {
        button.addEventListener('click', event => {
            const productId = event.target.getAttribute('data-id');
            removeFromCart(productId);

            const updatedCart = getCartFromLocalStorage(); // Get the updated cart
            const cartItem = event.target.closest('.cart-item');
            const itemQuantity = updatedCart[productId] || 0;

            if (itemQuantity === 0) {
                cartItem.remove();
            } else {
                cartItem.querySelector('.cart-item-quantity').textContent = itemQuantity;
            }

            displayCartSummary(products, updatedCart); // Update the cart summary
            
            updateCartDisplay(); // Update the button
        });
    });
}


function removeFromCart(productId) {
    const cart = getCartFromLocalStorage();
    cart[productId] -= 1;

    if (cart[productId] <= 0) {
        delete cart[productId];
    }

    saveCartToLocalStorage(cart);
}


function addItemToCart(productId) {
    const cart = getCartFromLocalStorage();
    if (cart[productId]) {
        if (cart[productId] < 20) {
            cart[productId] += 1;
        } else {
            alert("You can add a maximum of 20 items of the same product.");
        }
    } else {
        cart[productId] = 1;
    }
    saveCartToLocalStorage(cart);
}

function saveCartToLocalStorage(cart) {
    const cartJSON = JSON.stringify(cart);
    localStorage.setItem('cart', cartJSON);
}

function clearCart() {
    localStorage.removeItem('cart');
}

function displayCartSummary(products, cart) {
    const updatedCart = getCartFromLocalStorage(); // Get the updated cart
    let totalItems = 0;
    let totalPrice = 0;


    products.forEach(product => {
        const quantity = updatedCart[product.id];
        totalItems += quantity;
        totalPrice += product.price * quantity;
    });

    document.getElementById('total-items').textContent = totalItems;
    document.getElementById('total-price').textContent = totalPrice.toFixed(2);
    localStorage.setItem('totalPrice', totalPrice.toFixed(2));
}








