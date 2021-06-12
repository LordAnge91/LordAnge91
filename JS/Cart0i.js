

//const cartBtn = document.getElementsByClassName('removetem');
const clearCartBtn = document.getElementById('clearCart');
//const cartDOM = document.getElementsByClassName('placeCart');
//const cartOverlay = document.getElementsByClassName('placeCount');
const cartItems = document.getElementById('placeCount');
const cartTotal = document.getElementById('cartTotal');
const cartContent = document.getElementById('cartItems');
const productsDOM = document.getElementById('container');

let cart = [];
// buttons
let buttonsDOM = [];

// getting products
class Products{
async getProducts(){
	try {
	let result = await fetch('https://ss-market.space/includes/testdbhtoxml.php');
	let data = await result.json();
    let products = data
    // destructuring complex json
	/*let products = data.items;
	products = products.map(item=>{
		const {name,price} = item.fields;
		const {id} = item.tag;
		const {image} = item.fields.image.fields.file.url;
	})*/
	return products

	} catch (error) {
		console.log(error);
	}

}
}

// display products
class UI {
	/*displayProducts(products){
//console.log(products);
	let result = "";
	products.forEach(product => {
		result += `
	<div class="container contSpace">  
		<div class="prodimg"><img class="fitcontainer" src="${product.img}"></div>
			<div class="prodname">${product.name}</div> 
			<div class="prodvalue">
			<div class="prodbrand">${product.brand}</div>
			<div class="prodweight">${product.weight}</div>
		</div>
			<div class="prodvalue">
			<div class="prodprice" data-price='${product.price}'>€ ${product.price}</div>
			<div class="proddiscount hidden">${product.discount}</div>
		</div>
			<div class="prodpriceunit">${product.kilo} al kilo</div>
			<div class="center2"><button class="add addToCart" data-id='${product.id}'>Aggiungi</button></div>

			<span class='hidden'><p class='showinfo '> ${product.info}</p>
			<div><img class='showimg' src="${product.img2}" ></div>
			<span class='tagshow'>${product.tag}</span>

			</div>
		`;
	});
	productsDOM.innerHTML = result; 
	}
	getAddButton(){
		const addCarts = [...document.getElementsByClassName('addToCart')];
		buttonsDOM = addCarts;
		addCarts.forEach(button => {
			let id = button.dataset.id;
			let inCart = cart.find(item => item.id ===id);
			if(inCart){
				button.innerText = "Aggiunto";
				button.disabled = true;
			} else {
				button.addEventListener('click', (event)=>{
					event.target.innerText = "Aggiunto";
					event.target.disabled = true;
					// get product from products
					let cartItem = { ...Storage.getProduct(id), amount: 1};
					// add product to cart
					cart = [...cart, cartItem];
					// save cart in local
					Storage.saveCart(cart);
					// set cart values
					this.setCartValues(cart);
					// display cart item
					this.addCartItem(cartItem);
					// show cart
					//this.showCart();
				})
			}
		})
	}*/
	setCartValues(cart) {
		let tempTotal = 0;
		let itemsTotal = 0;
		cart.map(item=>{
			tempTotal += item.price * item.amount;
			itemsTotal += item.amount;
		});
		//cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
		cartItems.innerText = itemsTotal;
	}
	addCartItem(item) {
		/*const div = document.createElement("div");
		div.classList.add("cartItem");
		div.innerHTML = `
		<div class='cartImg'><img class="fitImg" src="${item.img}"></div>
        <div class='cartName'>${item.name}</div>
        <div class='cartPrice'>${item.price} €</div>
        <div class="cartQuantity">
            <i class="increase" data-id="${item.id}">+</i>
            <span class="cartAmount">${item.amount}</span>
            <i class="decrease" data-id="${item.id}">-</i>
        </div>
        <button class="removeItem" data-id="${item.id}">Rimuovi</button>
        `;
        cartContent.appendChild(div);*/
        
	}
	/*showCart() {
		cartOverlay.classList.add('transparentBcg');
		cartDOM.classList.add('showCart');
		//console.alert("Aggiunto");
	}*/
	setupAPP(){
		cart = Storage.getCart();
		this.setCartValues(cart);
		this.populateCart(cart);
		//cartBtn.addEventListener('click', this.showCart);
		// closeCartBtn.addEventListener('click', this.hideCart)
	}
	populateCart(cart) {
		cart.forEach(item => this.addCartItem(item));
	}
	/* hideCart(){
		cartOverlay.classList.remove('transparentBcg');
		cartDOM.classList.remove('showCart');
	}*/
	cartLogic() { // this "this" is pointing a function not an element
	// clear button
		//clearCartBtn.addEventListener('click', () => { this.clearCart(); });
		// cart functionality
		/*cartContent.addEventListener('click', (event)=>{
			if (event.target.classList.contains('removeItem')) {
				let removeItem = event.target;
				let id = removeItem.dataset.id;
				cartContent.removeChild(removeItem.parentElement);
				this.removeItem(id);
				}
				else if (event.target.classList.contains('increase')) {
					let addAmount = event.target;
					let id =addAmount.dataset.id;
					let tempItem = cart.find(item => item.id === id);
					tempItem.amount = tempItem.amount +1;
					Storage.saveCart(cart);
					this.setCartValues(cart);
					addAmount.nextElementSibling.innerText = tempItem.amount;
				}
				else if (event.target.classList.contains('decrease')) {
					let lowerAmount = event.target;
					let id =lowerAmount.dataset.id;
					let tempItem = cart.find(item => item.id === id);
					tempItem.amount = tempItem.amount -1;
					if (tempItem.amount > 0 ) {
						Storage.saveCart(cart);
						this.setCartValues(cart);
						lowerAmount.previousElementSibling.innerText = tempItem.amount;
					}
					else {
						cartContent.removeChild(lowerAmount.parentElement.parentElement);
						this.removeItem(id);
					} 					
				}

		})*/
	}

	/*clearCart() {
		let cartItems = cart.map(item => item.id);
		cartItems.forEach(id => this.removeItem(id));
		while(cartContent.children.length > 0) {
			cartContent.removeChild(cartContent.children[0]);
		}
		// this.hideCart();
	}*/
	removeItem(id) {
		cart = cart.filter(item => item.id!== id);
		this.setCartValues(cart);
		Storage.saveCart(cart);
		let button = this.getSingleButton(id);
		button.disabled = false;
		button.innerText = "Aggiungi";
		}
	getSingleButton(id) {
		return buttonsDOM.find(button => button.dataset.id ===id);
	}
}



// localStorage
class Storage{
	static saveProducts(products) {
	localStorage.setItem("products",JSON.stringify(products));
	}
	static getProduct(id){
		let products = JSON.parse(localStorage.getItem('products'));
		return products.find(product => product.id === id);
	}
	static saveCart(cart){
		localStorage.setItem('cart', JSON.stringify(cart));
	}
	static getCart(){
		return localStorage.getItem('cart')?JSON.parse(localStorage.getItem('cart')):[];
	}
}

document.addEventListener("DOMContentLoaded", ()=>{
const ui = new UI();
const products = new Products();
// setup app
ui.setupAPP();

//get all products
products.getProducts().then(products => {
	//ui.displayProducts(products)
	Storage.saveProducts(products);
	}).then(()=>{
		//ui.getAddButton();
		ui.cartLogic();
	});
});