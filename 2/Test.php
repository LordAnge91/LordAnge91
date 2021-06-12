<?php 
   session_start();
?>

<?php
	include_once '../../mainelement/nav1s.php';
?>

<?php
	include_once ('../../includes/testdbhconn.php');
	$query = "SELECT * FROM products WHERE category = 'Bibite' AND sub_category = 'Gassate';";
	$result = mysqli_query($conn, $query);
?>

<div class="shower"></div>
<div id="container" class="inventario">	
<?php 
	while ($show1 = mysqli_fetch_assoc($result)) 
	{
?>
		<div class="container4">  
         <div class="container contSpace">  
         <div class="prodimg2"><img class="fitcontainer" src="<?php echo $show1['img']; ?>"></div>
         <div class="displayContent">
         <div class="prodname"><?php echo $show1["nome"]; ?></div> 
         <div class="prodbrand"><?php echo $show1["brand"]; ?></div>
            <?php if ($show1["Offer"] <= 0) { ?><div class="blue" data-price='<?php echo $show1["price"]; ?>'> € <?php echo $show1["price"];?> </div><?php }
             else { ?> <div class="prodvalue"><div class="proddiscount blue"><?php if ($show1["Offer"] >= 1) {?>€ <?php echo $show1["price"]; }?> </div><div class="prodprice bold red" data-price='<?php echo $show1["discount"]; ?>'>€ <?php echo $show1["discount"];?> </div></div>  <?php }?>
            
         <div class="prodvalue"><?php if ($show1['Offer'] >= 1) { ?>
             <div class="prodpriceunit red bold">€ <?php echo number_format(1000*$show1["discount"]/$show1['weight'], 2); ?> / Kg</div> <?php } else if ($show1['Offer'] <= 0) { ?>
            <div class="prodpriceunit blue">€ <?php echo number_format(1000*$show1["price"]/$show1['weight'], 2); ?> / Kg</div> <?php         }?>

         <div class="prodweight blue"><?php echo number_format($show1["weight"]/1000, 1); ?> kg</div>
         </div>
         <?php 
         if ($show1["Disponibilita"] > 25) { ?>
            <div class="prodpriceunit bold green">In negozio <?php echo $show1["Disponibilita"]; ?></div>
   <?php } else if ($show1["Disponibilita"] >= 12) { ?>
      <div class="prodpriceunit bold blue">In negozio <?php echo $show1["Disponibilita"]; ?></div>
   <?php } else if ($show1["Disponibilita"] < 12) { ?>
      <div class="prodpriceunit bold red">In negozio <?php echo $show1["Disponibilita"]; ?></div>
   <?php } ?>

      </div>         
         <button class="add addToCart" data-id='<?php echo $show1["id"]; ?>'>Aggiungi</button>
         <button class="remItem hidit" data-id='<?php echo $show1["id"]; ?>'>Rimuovi</button>
         <span class='hidden'><p class='showinfo'><?php echo $show1["info"]; ?></p></span>
         </div> 
         </div> 
<?php
}  
?>

</div>
<div id="showProductContainerBackground">
   
</div>


<?php
	include_once '../../mainelement/footer1s.php';
?>

<script>
class Products{
	async getProducts() {
		try {
	let result = await fetch('http://127.0.0.1/Negozio/includes/testdbhtoxml.php');
	let data = await result.json();
    let products = data
    
	return products

	} catch (error) {
		console.log(error);
	}
}
}
const clearCartBtn = document.getElementById('clearCart');
const cartItems = document.getElementById('placeCount');
const cartTotal = document.getElementById('cartTotal');
const cartContent = document.getElementById('cartItems');
const productsDOM = document.getElementById('container');

let cart = [];
// buttons
let buttonsDOM = [];

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
			} else if(inCart){
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
	}
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
	}
	
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
	
	cartLogic() { // this "this" is pointing a function not an element
	
	}

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
   var info = shopItem.childNodes[7].getElementsByClassName('showinfo')[0].textContent
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
  
   let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../icons/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="fontResize blue">prezzo ${price}</div>
         <div class="prodvalue padding">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="addToCart">AGGIUNGI</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   ` 
   cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
//   cartRow.getElementsByClassName('closeViewer')[0].addEventListener('click', closeShowerItem)
   cartRow.addEventListener('click', showerItem)
//	cartRow.getElementsByClassName('addToCart')[0].addEventListener('click', setItems)
//	console.log(cartItems);
}

function biggerShowerContainer2(title, price, img, brand, info, weight, kilo, id, disp, disc) {
   let cartRow = document.createElement('div')
   cartRow.classList.add('showProductContainerBackground')
   let cartItems = document.getElementById('showProductContainerBackground')
  
   let cartRowContent = `
      <div class='showProductContainer'>
      <img class="right resizeButton closeViewer" src='../../icons/emblemunreadable_93487.png'>
      <div class="showProduct">
   
         <div class="prodimg padding"><img class="fitcontainer" src="${img}"></div>
         <div class="prodname fontResize padding">${title}</div>
         <div class='flex'><span class="Brand fontResize padding">${brand}</span></div>
         <div class="prodvalue padding">
         <div class="prodprice red fontResize">prezzo ${price}</div>
         <div class="proddiscount blue fontResize">${disc}</div>
         </div>
         <div class="prodvalue padding">
         <div class="prodpriceunit fontResize padding">${kilo}</div>
         <div class="prodweight fontResize padding">peso ${weight}</div>
         </div>
         <span class="Brand fontResize padding">${disp}</span>
         <div class="center2 fontResize padding"><button data-id="${id}" class="addToCart">AGGIUNGI</button></div>
         <div class="InfoProduct fontResize padding">${info}</div>
      </div>
      </div>
   ` 
   cartRow.innerHTML = cartRowContent
   cartItems.appendChild(cartRow)
//	console.log(cartRow);
getAddButton()
//   cartRow.getElementsByClassName('closeViewer')[0].addEventListener('click', closeShowerItem)
   cartRow.addEventListener('click', showerItem)
//	cartRow.getElementsByClassName('addToCart')[0].addEventListener('click', setItems)
//	console.log(cartItems);
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
			} else if(inCart){
				button.innerText = "Aggiunto";
				button.disabled = true;
			}
			})
			}

function showerItem(event) {
   var click = event.target
   if (click.classList.contains("closeViewer")) {
	click.parentNode.parentNode.remove();
   }
   if (click.classList.contains("showProductContainerBackground")) {
   	click.remove();
   }

   if (click.classList.contains("addToCart")) {
   	let button = click
   	let id = button.attributes[0].textContent
   	cart = Storage.getCart();
		let inCart = cart.find(item => item.id ===id);
		if (inCart) {
			return
		} else {
			button.addEventListener('click', (event)=>{
			event.target.innerText = "Aggiunto";
			event.target.disabled = true;
			let cartItem = { ...Storage.getProduct(id), amount: 1};
			cart = [...cart, cartItem];
			Storage.saveCart(cart);
			setCartValues(cart);
			getAddButton();
			})
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
			} else if(inCart){
				button.innerText = "Aggiunto";
				button.disabled = true;
			}
			})
			}
}
      
}

}
</script>


<script src="../../JS/menu.js"></script>
<script src="../../JS/SearchBar.js"></script>
