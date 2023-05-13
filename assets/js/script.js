// Get all the add buttons
const addButtons = document.querySelectorAll('.add-button');

// Create a function to get the basket items from local storage
function getBasketItems() {
  // Get the basket items from local storage using the website's domain name as the key
  const storedBasketItems = localStorage.getItem(window.location.hostname);

  // If there are basket items in local storage, parse the JSON and return the array
  if (storedBasketItems) {
    return JSON.parse(storedBasketItems);
  }

  // If there are no basket items in local storage, return an empty array
  return [];
}

// Create a function to update the basket items in local storage
function updateBasketItems(items) {
  // Store the basket items in local storage using the website's domain name as the key
  localStorage.setItem(window.location.hostname, JSON.stringify(items));
}

// Add event listeners to the add buttons
addButtons.forEach(button => {
  button.addEventListener('click', () => {
    // Get the name and price of the item
    const item = button.parentElement;
    const name = item.querySelector('h2').textContent;
    const price = item.querySelector('span').textContent;

    // Get the current basket items from local storage
    let basketItems = getBasketItems();

    // Add the new item to the basket items array
    basketItems.push({ name, price });

    // Update the basket items in local storage
    updateBasketItems(basketItems);
  });
});

// Function to display the items in the shopping basket
function displayBasket() {
    const basketTable = document.querySelector('#basket-table tbody');
    const totalPrice = document.querySelector('#total-price');
    let total = 0;
  
    // Clear the existing contents of the basket table
    basketTable.innerHTML = '';
  
    // Get the basket items from local storage
    const basketItems = getBasketItems();
  
    // If there are items in the basket, display them in the table
    if (basketItems.length > 0) {
      basketItems.forEach(item => {
        const row = basketTable.insertRow(-1);
  
        const nameCell = row.insertCell(0);
        nameCell.textContent = item.name;
  
        const priceCell = row.insertCell(1);
        priceCell.textContent = item.price;
  
  
        total += parseFloat(item.price.slice(1));
      });
  
      // Display the total price
      totalPrice.textContent = `Total: £${total.toFixed(2)}`;
    } else {
      // If there are no items in the basket, display a message
      basketTable.innerHTML = '<tr><td colspan="3">Your basket is empty.</td></tr>';
      totalPrice.textContent = '';
    }
  }
  
  
// Call the displayBasket function to display the items in the basket on page load
displayBasket();