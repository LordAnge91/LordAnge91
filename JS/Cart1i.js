

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
let buttonsRomDOM = [];

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
	displayProducts(products){
//console.log(products);
	 
	}
	getAddButton(){
		const addCarts = [...document.getElementsByClassName('addToCart')];
		buttonsDOM = addCarts;
		addCarts.forEach(button => {
			let id = button.dataset.id;
			let temp = JSON.parse(localStorage.getItem('products'))
			let undispo = temp[id-1].Disponibilita
			let inCart = cart.find(item => item.id ===id);
			if (undispo <= 0) {
				button.innerText = "Non disponibile";
				button.disabled = true;
				button.classList.add('btnred');
				button.classList.add('white');
			} else if(inCart){
				button.classList.add('hidit');
				this.getRemoveButton(id);																
			} else {
				button.addEventListener('click', (event)=>{
					event.target.classList.add('hidit');
					// get product from products
					let cartItem = { ...Storage.getProduct(id), amount: 1};
					// add product to cart
					cart = [...cart, cartItem];
					// save cart in local
					Storage.saveCart(cart);
					// set cart values
					this.setCartValues(cart);
					// display cart item
					//this.addCartItem(cartItem);
					this.getRemoveButton(id);
					// show cart
					//this.showCart();
				})
			}
		})
	}
	getRemoveButton(id) {
		const remCarts = [...document.getElementsByClassName('remItem')];
		buttonsRomDOM = remCarts;
		remCarts.forEach(btn => {
			let id = btn.dataset.id;
			let temp = JSON.parse(localStorage.getItem('products'))
			let undispo = temp[id-1].Disponibilita;
			let inCart = cart.find(item => item.id ===id);
			if (undispo <= 0) {
				btn.disabled = true;
				btn.classList.add('hidit');
			} else if (inCart) {
				btn.disabled = false;
				btn.classList.remove('hidit');
				btn.addEventListener('click', (event)=>{
				this.removeItem(id);
				})
			}
		})
	}
	setCartValues(cart) {
		let tempTotal = 0;
		let itemsTotal = 0;
		cart.map(item=>{
			tempTotal += item.price * item.amount;
			itemsTotal += item.amount;
		});
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
		button.classList.remove('hidit');
		let btn = this.getSingleBtn(id);
		btn.classList.add('hidit');
		}
	getSingleButton(id) {
		return buttonsDOM.find(button => button.dataset.id ===id);
	}
	getSingleBtn(id) {
		return buttonsRomDOM.find(button => button.dataset.id ===id);
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
	ui.displayProducts(products)
	Storage.saveProducts(products);
	}).then(()=>{
		ui.getAddButton();
		ui.cartLogic();
	});
});


/------------Bigger display----------/

setTimeout (shower,1000)

function shower() {
let IncreaseSizeClick = document.getElementsByClassName('fitcontainer')
   for (var i = 0; i < IncreaseSizeClick.length; i++) {
      let button = IncreaseSizeClick[i]
      button.addEventListener('click', expandViewEvent)
      //console.log(button);
   }

function expandViewEvent(event) {
   let click = event.target
   var shopItem = click.parentNode.parentNode
   var img = shopItem.getElementsByClassName("prodimg2")[0].childNodes[0].src
   var title = shopItem.childNodes[3].getElementsByClassName('prodname')[0].textContent
   var price = shopItem.childNodes[3].childNodes[5].textContent
   var brand = shopItem.childNodes[3].getElementsByClassName('prodbrand')[0].textContent
   var info = shopItem.childNodes[9].getElementsByClassName('showinfo')[0].textContent
   var weight = shopItem.childNodes[3].getElementsByClassName('prodweight')[0].textContent
   var kilo = shopItem.childNodes[3].getElementsByClassName('prodpriceunit')[0].textContent
   let id = shopItem.getElementsByClassName('addToCart')[0].attributes[1].textContent
   let disp = shopItem.childNodes[3].getElementsByClassName('prodpriceunit')[1].textContent

if (!shopItem.childNodes[3].getElementsByClassName('proddiscount')[0]) {
	let disc = ''
   biggerShowerContainer(title, price, img, brand, info, weight, kilo, id, disp, disc)
   } else if (shopItem.childNodes[3].getElementsByClassName('proddiscount')[0].textContent !== '') {
    let disc = shopItem.childNodes[3].getElementsByClassName('proddiscount')[0].textContent
    var price = shopItem.childNodes[3].childNodes[5].childNodes[1].textContent
   biggerShowerContainer2(title, price, img, brand, info, weight, kilo, id, disp, disc)
   }
}

function biggerShowerContainer(title, price, img, brand, info, weight, kilo, id, disp, disc) {
   let cartRow = document.createElement('div')
   cartRow.classList.add('showProductContainerBackground')
   let cartItems = document.getElementById('showProductContainerBackground')
   if (disp.replace('In negozio ', '') >= 25) {

   let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../pictures/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="fontResize blue">prezzo ${price}</div>
         <div class="prodvalue padding blue">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding green">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="add addToCart">AGGIUNGI</button>
         <button class="remItem hidit" data-id='${id}'>Rimuovi</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   ` 
   cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
   cartRow.addEventListener('click', showerItem)
//	console.log(cartItems);
} else if (disp.replace('In negozio ', '') >= 12) {

   let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../pictures/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="fontResize blue">prezzo ${price}</div>
         <div class="prodvalue padding blue">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding blue">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="add addToCart">AGGIUNGI</button>
         <button class="remItem hidit" data-id='${id}'>Rimuovi</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   ` 
   cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
   cartRow.addEventListener('click', showerItem)
//	console.log(cartItems);
} else if (disp.replace('In negozio ', '') < 12) {

   let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../pictures/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="fontResize blue">prezzo ${price}</div>
         <div class="prodvalue padding blue">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding red">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="add addToCart">AGGIUNGI</button>
         <button class="remItem hidit" data-id='${id}'>Rimuovi</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   ` 
   cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
   cartRow.addEventListener('click', showerItem)
//	console.log(cartItems);
}
}

function biggerShowerContainer2(title, price, img, brand, info, weight, kilo, id, disp, disc) {
   let cartRow = document.createElement('div')
   cartRow.classList.add('showProductContainerBackground')
   let cartItems = document.getElementById('showProductContainerBackground')
   if (disp.replace('In negozio ', '') >= 25) {


   let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../pictures/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="prodvalue padding">
         <div class="prodprice red fontResize">prezzo ${price}</div>
         <div class="proddiscount blue fontResize">${disc}</div>
         </div>
         <div class="prodvalue padding blue">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding green">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="add addToCart">AGGIUNGI</button>
         <button class="remItem hidit" data-id='${id}'>Rimuovi</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   `  
   cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
   cartRow.addEventListener('click', showerItem)
//	console.log(cartItems);


} else if (disp.replace('In negozio ', '') >= 12) {
   	let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../pictures/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="prodvalue padding">
         <div class="prodprice red fontResize">prezzo ${price}</div>
         <div class="proddiscount blue fontResize">${disc}</div>
         </div>
         <div class="prodvalue padding blue">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding blue">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="add addToCart">AGGIUNGI</button>
         <button class="remItem hidit" data-id='${id}'>Rimuovi</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   ` 
      cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
   cartRow.addEventListener('click', showerItem)
//	console.log(cartItems);
   } else if (disp.replace('In negozio ', '') < 12) {
   	let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../pictures/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="prodvalue padding">
         <div class="prodprice red fontResize">prezzo ${price}</div>
         <div class="proddiscount blue fontResize">${disc}</div>
         </div>
         <div class="prodvalue padding blue">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding red">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="add addToCart">AGGIUNGI</button>
         <button class="remItem hidit" data-id='${id}'>Rimuovi</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
    ` 
    cartRow.innerHTML = cartRowContent
    cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton();
   cartRow.addEventListener('click', showerItem);
//	console.log(cartItems);
   }
}


function showerItem(event) {
//	event.target.classList.contains('removeItem')
getAddButton();
   var click = event.target;
   if (click.classList.contains("closeViewer")) {
//	console.log('miao1');
	click.parentNode.parentNode.remove();
   } else if (click.classList.contains("showProductContainerBackground")) {
//	console.log('miao');
   	click.remove();
   } else if (click.classList.contains("addToCart")) {
   	let button = click;
   	let id = button.attributes[0].textContent;
   	cart = Storage.getCart();
		let inCart = cart.find(item => item.id ===id);
		if (inCart) {
			
		} else if (!inCart) {
			button.classList.add('hidit');
			let cartItem = { ...Storage.getProduct(id), amount: 1};
			cart = [...cart, cartItem];
			Storage.saveCart(cart);
			setCartValues(cart);
			getRemoveButton();
			}

} else if (click.classList.contains("remItem")) {
   	let btn = click
   	let id = btn.attributes[0].textContent
   	cart = Storage.getCart();
		let inCart = cart.find(item => item.id ===id);
		if (inCart) {
			
		} else {
			btn.classList.add('hidit');
			getAddButton();
		}
		}
}
}

function setCartValues(cart) {
	let tempTotal = 0;
	let itemsTotal = 0;
	cart.map(item=>{
	itemsTotal += item.amount;
	});
	cartItems.innerText = itemsTotal;
}

function getAddButton(){
	const addCarts = [...document.getElementsByClassName('addToCart')];
	buttonsDOM = addCarts;
	addCarts.forEach(button => {
		let id = button.dataset.id;
		let temp = JSON.parse(localStorage.getItem('products'))
		let undispo = temp[id-1].Disponibilita
		let inCart = cart.find(item => item.id ===id);
		if (undispo <= 0) {
			button.innerText = "Non disponibile";
			button.disabled = true;
			button.classList.add('btnred');
			button.classList.add('white');
		} else if (inCart) {
			button.classList.add('hidit');
			getRemoveButton(id);
		} else {
			button.classList.remove('hidit');
		}
		})
		}

function getRemoveButton(id) {
	const remCarts = [...document.getElementsByClassName('remItem')];
	buttonsRomDOM = remCarts;
	remCarts.forEach(btn => {
		let id = btn.dataset.id;
		let temp = JSON.parse(localStorage.getItem('products'));
		let undispo = temp[id-1].Disponibilita;
		let inCart = cart.find(item => item.id ===id);
		if (undispo <= 0) {
			btn.disabled = true;
			btn.classList.add('hidit');
		} else if (inCart) {
			btn.classList.remove('hidit');
			btn.addEventListener('click', (event)=>{
			removeItem(id);
			})
		}
	})
}

function removeItem(id) {
		cart = cart.filter(item => item.id!== id);
		this.setCartValues(cart);
		Storage.saveCart(cart);
		let button = this.getSingleButton(id);
		button.classList.remove('hidit');
		let btn = this.getSingleBtn(id);
		btn.classList.add('hidit');
		}

function getSingleButton(id) {
		return buttonsDOM.find(button => button.dataset.id ===id);
	}
function getSingleBtn(id) {
		return buttonsRomDOM.find(button => button.dataset.id ===id);
	}
