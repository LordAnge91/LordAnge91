

   
    let resqh3 = new XMLHttpRequest();
    resqh3.open('GET', "http://127.0.0.1/negozio/includes/homequery/dbhHomeQuery3.php");
    resqh3.onload = function() {
        let resqDatah3 = JSON.parse(resqh3.responseText);
        displayShow3(resqDatah3)
    };
resqh3.send();      


function displayShow3(productsh) {
    document.getElementsByClassName('showFlex')[2].innerHTML = productsh.map(function(producth) {
    return `
    <div class="container3 contSpace1">  
    <div class="prodimg3"><a href="${producth.link}"><img class="fitcontainer" src="${producth.img}"></a></div>
    <div class="prodname1">${producth.nome}</div> 
    <div class="prodbrand3">${producth.brand}</div>
    </div>
    `
    }).join('')};


let amounth3 = 10;
let initialh3 = 0;

document.getElementsByClassName('scrollBack')[2].addEventListener('click', (event) => {
    if (event.target == document.getElementsByClassName('scrollBack')[2] || event.target !== document.getElementsByClassName('scrollBack')[2]) {
        let show = document.getElementsByClassName('showFlex')[2];
        
        if (initialh3 >= 0) {
        return
        }
        initialh3 += amounth3;
        show.animate([
        // keyframes
        { transform: 'translateX('+ (initialh3 - amounth3) +'%)' }, 
        { transform: 'translateX('+ initialh3 +'%)' },
        ], { 
        // timing options
        duration: 500,
        iteration: Infinity,
        });
        show.style.transform = "translateX("+ initialh3 +"%)";
    }
});

document.getElementsByClassName('scrollFoward')[2].addEventListener('click', (event) => {
    if (event.target == document.getElementsByClassName('scrollFoward')[2] || event.target !== document.getElementsByClassName('scrollFoward')[2]) {
        let show = document.getElementsByClassName('showFlex')[2];
        
        if (initialh3 > -50) {                                          // increase for more product if increase limit over 10
           initialh3 -= amounth3;
            show.animate([
        // keyframes
        { transform: 'translateX('+ (initialh3 + amounth3) +'%)' }, 
        { transform: 'translateX('+ initialh3 +'%)' },
        ], { 
        // timing options
        duration: 500,
        iteration: Infinity,
        });
           show.style.transform = "translateX("+ initialh3 +"%)";
        }  if (initialh3 < 0) {                                     // increase for more product if increase limit over 10
               if (show.lastElementChild.classList.contains('linkBox')) { 
               } else if (!show.lastElementChild.classList.contains('linkBox')) { 
            //let linkIt = show.childNodes[1].childNodes[1].children[0].href
            let a = document.createElement("a");
            a.classList.add("linkBox");
            a.setAttribute('href', "1/Speciali/Offerta.php");
            a.innerHTML = `
            <h2>Vai alla pagina dei prodotti</h2>
            `;
            show.appendChild(a);
        }
        }  
        }
});




