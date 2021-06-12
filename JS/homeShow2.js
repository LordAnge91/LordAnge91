

 
  
    let resqh = new XMLHttpRequest();
    resqh.open('GET', "http://127.0.0.1/negozio/includes/homequery/dbhHomeQuery2.php");
    resqh.onload = function() {
        let resqDatah = JSON.parse(resqh.responseText);
        displayShow2(resqDatah)
    };
resqh.send();      


function displayShow2(productsh) {
    document.getElementsByClassName('showFlex')[1].innerHTML = productsh.map(function(producth) {
    return `
    <div class="container3 contSpace1">  
    <div class="prodimg3"><a href="${producth.link}"><img class="fitcontainer" src="${producth.img}"></a></div>
    <div class="prodname1">${producth.nome}</div> 
    <div class="prodbrand3">${producth.brand}</div>
    </div>
    `
    }).join('')};


let amounth2 = 10;
let initialh2 = 0;

document.getElementsByClassName('scrollBack')[1].addEventListener('click', (event) => {
    if (event.target == document.getElementsByClassName('scrollBack')[1] || event.target !== document.getElementsByClassName('scrollBack')[1]) {
        let show = document.getElementsByClassName('showFlex')[1];
        
        if (initialh2 >= 0) {
        return
        }
        initialh2 += amounth2;
        show.animate([
        // keyframes
        { transform: 'translateX('+ (initialh2 - amounth2) +'%)' }, 
        { transform: 'translateX('+ initialh2 +'%)' },
        ], { 
        // timing options
        duration: 500,
        iteration: Infinity,
        });
        show.style.transform = "translateX("+ initialh2 +"%)";
    }
});

document.getElementsByClassName('scrollFoward')[1].addEventListener('click', (event) => {
    if (event.target == document.getElementsByClassName('scrollFoward')[1] || event.target !== document.getElementsByClassName('scrollFoward')[1]) {
        let show = document.getElementsByClassName('showFlex')[1];
        
        if (initialh2 > -50) {                                          // increase for more product
           initialh2 -= amounth2;
            show.animate([
        // keyframes
        { transform: 'translateX('+ (initialh2 + amounth2) +'%)' }, 
        { transform: 'translateX('+ initialh2 +'%)' },
        ], { 
        // timing options
        duration: 500,
        iteration: Infinity,
        });
           show.style.transform = "translateX("+ initialh2 +"%)";
        }  if (initialh2 < 0) {                                      // increase for more product
               if (show.lastElementChild.classList.contains('linkBox')) { 
               } else if (!show.lastElementChild.classList.contains('linkBox')) { 
            //let linkIt = show.childNodes[1].childNodes[1].children[0].href
            let a = document.createElement("a");
            a.classList.add("linkBox");
            a.setAttribute('href', "1/Bevande/Bibite/Gassate.php");
            a.innerHTML = `
            <h2>Vai alla pagina dei prodotti</h2>
            `;
            show.appendChild(a);
        }
        }  
        }
});




