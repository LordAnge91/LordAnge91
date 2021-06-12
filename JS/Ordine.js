let ordine = document.getElementsByClassName('ordine');
for (i=0; i < ordine.length; i++) {
    ordine[i].addEventListener('click', (even)=>{
        if (event.target.textContent === 'Ordine alfabetico crescente') {
        let nodo = document.getElementById('container');
        let inventnodo = nodo.childNodes;
        let arraynome = [];
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodonome = prodnodo.childNodes[3].childNodes[1].childNodes[0].nodeValue;
                arraynome.push(prodonome);
        }}
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodonome = prodnodo.childNodes[3].childNodes[1].childNodes[0].nodeValue;
                arraynome.sort();
                inventnodo[w].style.order = arraynome.lastIndexOf(prodonome);
    }}
    } else if (event.target.textContent === 'Ordine alfabetico decrescente') {
        let nodo = document.getElementById('container');
        let inventnodo = nodo.childNodes;
        let arraynome = [];
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodonome = prodnodo.childNodes[3].childNodes[1].childNodes[0].nodeValue;
                arraynome.push(prodonome);
        }}
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodonome = prodnodo.childNodes[3].childNodes[1].childNodes[0].nodeValue;
                arraynome.sort();
                arraynome.reverse();
                inventnodo[w].style.order = arraynome.lastIndexOf(prodonome);
    }}
    } else if (event.target.textContent === 'Ordine prezzo crescente') {
        let nodo = document.getElementById('container');
        let inventnodo = nodo.childNodes;
        let arrayprezzo = [];
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodprezzo = prodnodo.childNodes[3].childNodes[5].childNodes[1].textContent;
                arrayprezzo.push(prodprezzo);
        }}
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodprezzo = prodnodo.childNodes[3].childNodes[5].childNodes[1].textContent;
                arrayprezzo.sort();
                inventnodo[w].style.order = arrayprezzo.lastIndexOf(prodprezzo);
    }}
    } else if (event.target.textContent === 'Ordine prezzo decrescente') {
        let nodo = document.getElementById('container');
        let inventnodo = nodo.childNodes;
        let arrayprezzo = [];
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodprezzo = prodnodo.childNodes[3].childNodes[5].childNodes[1].textContent;
                arrayprezzo.push(prodprezzo);
        }}
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodprezzo = prodnodo.childNodes[3].childNodes[5].childNodes[1].textContent;
                arrayprezzo.sort();
                arrayprezzo.reverse();
                inventnodo[w].style.order = arrayprezzo.lastIndexOf(prodprezzo);
    }}
    } else if (event.target.textContent === 'Ordine marca') {
        let nodo = document.getElementById('container');
        let inventnodo = nodo.childNodes;
        let arraymarca = [];
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodmarca = prodnodo.childNodes[3].childNodes[3].childNodes[0].textContent;
                arraymarca.push(prodmarca);
        }}
        for (w=1; w < inventnodo.length; w++) {
            let prodnodo = inventnodo[w].childNodes[1];
            if (prodnodo !== undefined) {
                let prodmarca = prodnodo.childNodes[3].childNodes[3].childNodes[0].textContent;
                arraymarca.sort();
                inventnodo[w].style.order = arraymarca.lastIndexOf(prodmarca);
    }}
    }
    });
}
