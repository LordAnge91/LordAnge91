

  
    let resq = new XMLHttpRequest();
    resq.open('GET', "http://127.0.0.1/negozio/includes/homequery/dbhHomeQuery1.php");
    resq.onload = function() {
        let resqData = JSON.parse(resq.responseText);
        displayShow(resqData)
    };
resq.send();      


function displayShow(products) {
    document.getElementsByClassName('showFlex')[0].innerHTML = products.map(function(product) {
    return `
    <div class="container3 contSpace1">  
    <div class="prodimg3"><a href="${product.link}"><img class="fitcontainer" src="${product.img}"></a></div>
    <div class="prodname1">${product.nome}</div> 
    <div class="prodbrand3">${product.brand}</div>
    </div>
    `
    }).join('')};

let amount = 10;
let initial = 0;

document.getElementsByClassName('scrollBack')[0].addEventListener('click', (event) => {
    if (event.target == document.getElementsByClassName('scrollBack')[0] || event.target !== document.getElementsByClassName('scrollBack')[0]) {
        let show = document.getElementsByClassName('showFlex')[0];
        if (initial >= 0) {
        return
        }
        initial += amount;
        show.animate([
        // keyframes
        { transform: 'translateX('+ (initial - amount) +'%)' }, 
        { transform: 'translateX('+ initial +'%)' },
        ], { 
        // timing options
        duration: 500,
        iteration: Infinity,
        });
        show.style.transform = "translateX("+ initial +"%)";
    }
});

document.getElementsByClassName('scrollFoward')[0].addEventListener('click', (event) => {
    if (event.target == document.getElementsByClassName('scrollFoward')[0]|| event.target !== document.getElementsByClassName('scrollFoward')[0]) {
        let show = document.getElementsByClassName('showFlex')[0];

        if (initial > -50) {                                          // increase for more product limit 10
            initial -= amount;
            show.animate([
        // keyframes
        { transform: 'translateX('+ (initial + amount) +'%)' }, 
        { transform: 'translateX('+ initial +'%)' },
        ], { 
        // timing options
        duration: 500,
        iteration: Infinity,
        });
           show.style.transform = "translateX("+ initial +"%)";
        }  if (initial < 0) {                                      // increase for more product
               if (show.lastElementChild.classList.contains('linkBox')) { 
               } else if (!show.lastElementChild.classList.contains('linkBox')) { 
            //let linkIt = show.childNodes[1].childNodes[1].children[0].href
            let a = document.createElement("a");
            a.classList.add("linkBox");
            a.setAttribute('href', "1/Frutta&Verdura/Frutta_&_Verdura.php");
            a.innerHTML = `
            <h2>Vai alla pagina dei prodotti</h2>
            `;
            show.appendChild(a);
        }
        }  
        }
});


