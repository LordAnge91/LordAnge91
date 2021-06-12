
const searchBar = document.getElementById("searchBar");
let closesearch = document.getElementById('closeSearch');
let temp = JSON.parse(localStorage.getItem('products'));

closesearch.addEventListener('click', (e) => {
    let closeit = e.target;
    var reset = document.querySelector(".searchInv");
    if (event.target === event.currentTarget) {
        searchBar.value = "";
        reset.classList.add("hide");
        closeit.classList.add("hide");
    }
});

searchBar.addEventListener('keyup', (e) => {
    const searchString = e.target.value.toLowerCase();


    const filteredProducts = temp.filter(product => {
        return (
            product.nome.toLowerCase().includes(searchString) || 
            product.brand.toLowerCase().includes(searchString)
            );
    });
   displayProducts(filteredProducts);
   let closesearch = document.getElementById('closeSearch');
    let reset = document.querySelector(".searchInv");
    if (searchString.length <= 1){
        reset.classList.add("hide");
    } 
    else if (searchString.length >= 2){
      reset.classList.remove('hide'); 
      closesearch.classList.remove('hide'); 
    }
  });


function displayProducts(temp) {
    
document.getElementById("productShow").innerHTML = temp.map(function(product) {
     return `
<div class="container2 contSpace">  
<div class="prodimg2"><a href="${product.link}"><img class="fitcontainer" src="${product.img}"></a></div>
<div class="prodname">${product.nome}</div> 
<div class="prodname">${product.brand}</div>
</div>
`;
}).join('')}


displayProducts(temp);
