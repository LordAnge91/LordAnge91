<?php 
   session_start();
?>

<?php
if ($_SESSION["useruid"] === 'ssadm') {
?>

<?php
   include_once '../../mainElement/nav1s.php';
?>

<?php
   include_once '../../includes/dbprod.inc.php';
?>
<div class="shower"></div>
<?php
   $sql = "SELECT * FROM products";
   $result = mysqli_query($conn, $sql);

   while ($row = mysqli_fetch_assoc($result)) {
         $id = $row['id'];
         $img = $row["img"];
         $nome = $row["nome"];
         $link = $row["link"];
         $barcode = $row["barcode"];
         $brand = $row["brand"];
         $price = $row["price"];
         $offer = $row["Offer"];
         $discount = $row["discount"];
         $weight = $row["weight"];
         $speciali = $row["speciali"];
         $category = $row["category"];
         $subcategory = $row["sub_category"];
         $info = $row["info"];
         $dispo = $row["Disponibilita"];

         ?>
         

            <div class="profy">
               <div class="column2">
               <div class="profyInfo borderColor">
               <div class="dispInfo borderColor">
                  <div>Nome & Brand</div>
                  <div class=""><span><?= $nome?></span> <span><?= $brand?></span></div>
               </div> 
               <div class="dispInfo borderColor">
                  <div>price</div>
                  <div class=""><span><?= $price?></span></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Offerta bool & price</div>
                  <div class=""><span><?= $offer?></span> <span><?= $discount?></span></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Disponibilita</div>
                  <div><?= $dispo?></div>
                  <button class="aggio2 btnviola" name="ba<?= $id?>">Aggiorna</button>
               </div>
               <div class="dispInfo borderColor">
                  <div>Img</div>
                  <div class=""><img class="borderColor profPic" src="<?= $img?>"></div>
               </div>
               <div class="dispInfo borderColor">
                  <button class="aggio" name="a<?= $id?>">Aggiorna</button>
                  <button class="unhid btnviola" name="c<?= $id?>">Mostra</button>
               </div>
            <div class="hidit flex1">
               <div class="dispInfo borderColor">
                  <div>link</div>
                  <div class=""><?= $link?></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Barcode</div>
                  <div class=""><?= $barcode?></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>weight</div>
                  <div class=""><?= $weight?></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Categoria, Sub</div>
                  <div><span><?= $category?></span>,<span> <?= $subcategory?></span></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>info</div>
                  <div><?= $speciali?> <br><?= $info?></div>
               </div>
            </div>
            </div>
            </div>
         </div>




            <div class="Fixed showFixed" name="b<?=$id?>" id="<?=$id?>">
            <div class="registerForm">


            <form action="../../includes/update.inc.php" method="post" class="register colorUpp2">

               <div class="mainInfo3">Nome<input class="inputupdprod" type="text" name="nome" value="<?= $nome?>" required="required"></div>

               <div class="mainInfo3">Marchio<input class="inputupdprod" type="text" name="brand" value="<?= $brand?>" required="required"></div>
 
               <div class="mainInfo3">link pagina<input class="inputupdprod" type="text" name="link" value="<?= $link?>" required="required"></div>
                
               <div class="mainInfo3">Barcode<input class="inputupdprod" type="text" name="barcode" value="<?= $barcode?>" required="required"></div>

               <div class="mainInfo3">Prezzo<input class="inputupdprod" type="text" name="price" value="<?= $price?>" required="required"></div>

               <div class="mainInfo3">Peso<input class="inputupdprod" type="text" name="weight" value="<?= $weight?>" required="required"></div>

               <div class="mainInfo3">Particolare<input class="inputupdprod" type="text" name="speciali" value="<?= $speciali?>"></div>

               <div class="mainInfo3">offerta 0-n / 1-s<input class="inputupdprod" type="text" name="offer" value="<?= $offer?>" required="required"></div>

               <div class="mainInfo3">Prezzo offerta<input class="inputupdprod" type="text" name="discount" value="<?= $discount?>"></div>

               <div class="mainInfo3">Categoria<input class="inputupdprod" type="text" name="category" value="<?= $category?>" required="required"></div>

               <div class="mainInfo3">Sub-Categoria<input class="inputupdprod" type="text" name="subcategory" value="<?= $subcategory?>" required="required"></div>

               <div class="mainInfo3">Imm pic<input class="inputupdprod" type="text" name="img" placeholder="link immagine pic" value="<?= $img?>" required="required"></div>

               <div class="mainInfo3">Info prodotto<textarea class="mainInfo3 inputupdprod" name="info" rows="4"><?=$info?></textarea></div>

               <div class="mainInfo3">Disponibilita prodotto<input class="inputupdprod" type="text" name="dispo" value="0" required="required"></div>
               
               <input type="hidden" name="ID" value="<?= $id?>">

               <div class="mainInfo3"><button type="submit" name="updprod" class="marginTB btnRegs">update</button></div>

            </form>
            </div>
            </div>


            <div class="Fixed showFixed" name="ba<?=$id?>" id="ba<?=$id?>">
            <div class="registerForm">


            <form action="../../includes/update.inc.php" method="post" class="register colorUpp2">

               <div class="mainInfo3">Disponibilita prodotto<input class="inputupdprod" type="text" name="dispo" value="0" required="required"></div>
               
               <input type="hidden" name="ID" value="<?= $id?>">

               <div class="mainInfo3"><button type="submit" name="updisp" class="marginTB btnRegs">update</button></div>

            </form>
            </div>
            </div>


<?php

}
            ?>

         <?php
         } else {
            header("location: ../../index.php");
            exit();
        }
?>





<?php
   include_once '../../mainElement/footer1s.php'
?>

<script>


let updformprod = document.getElementsByClassName('aggio');
   for (var i = 0; i < updformprod.length; i++) {
      let button = updformprod[i];
      button.addEventListener('click', expandViewEvent);
}

function expandViewEvent(event) {
   let click = event.target;
   let shopItem = click.name;
   if (shopItem !==  'a0') {
      let id = shopItem.replace('a', '')
      document.getElementById(id).classList.toggle('showFixed', false);
      document.getElementById(id).addEventListener('click', closeView);

   } 


}

function closeView (ev) {
   let click2 = ev.target
   shopItem2 = click2.attributes[1].textContent.replace('b', '')
   if (document.getElementById(shopItem2)) {
      document.getElementById(shopItem2).classList.toggle('showFixed', true);
} 
}

let updisp = document.getElementsByClassName('aggio2');
   for (var i = 0; i < updisp.length; i++) {
      let buton = updisp[i];
      buton.addEventListener('click', updispform);
}

function updispform(event) {
   let click = event.target;
   let shopItem = click.name;
   document.getElementById(shopItem).classList.toggle('showFixed');
   document.getElementById(shopItem).addEventListener('click', closeupdispform);
}

function closeupdispform (ev) {
   let click = ev.target
   if (click.classList.contains('Fixed')) {
      click.classList.toggle('showFixed');
   }
} 

let unhidinfo = document.getElementsByClassName('unhid');
   for (var a = 0; a < unhidinfo.length; a++) {
      let butto = unhidinfo[a];
      butto.addEventListener('click', unhide);
}

function unhide(unh) {
   let clic = unh.target;
   let shotem = parseInt(clic.name.replace('c', ''));
   document.getElementsByClassName('flex1')[shotem - 1].classList.toggle('hidit');
   console.log(clic.textContent);
   if (clic.textContent === 'Nascondi') {
      clic.textContent = 'Mostra';
   } else if (clic.textContent === 'Mostra') {
      clic.textContent = 'Nascondi';
   }

}



</script>


<script src="../../JS/menu.js"></script>
<script src="../../JS/SearchBar.js"></script>
<script src="../../JS/Cart0i.js"></script>