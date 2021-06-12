<?php 
   session_start();
?>

<?php
   include_once '../../../mainElement/nav1ss.php'
?>

<div class="shower">
   
   <a href="Solubili_e_Vegetali.php"><div class="showerElem">Solubili e Vegetali</div></a>
   <a href="Gassate.php"><div class="showerElem">Gassate</div></a>
   <a href="Energy_ed_integratori.php"><div class="showerElemActive">Energy ed integratori</div></a>
   
   <div class="showerElemSelected"><h1>Energy ed integratori</h1></div>

</div>

<div class="flex">
   
<div class="f1">
<div class="ordinesel">
   
   <div class="ordine">Ordine alfabetico crescente</div>
   <div class="ordine">Ordine alfabetico decrescente</div>
   <div class="ordine">Ordine marca</div>
   <div class="ordine">Ordine prezzo crescente</div>
   <div class="ordine">Ordine prezzo decrescente</div>


</div>
</div>
<?php
   include_once ('../../../includes/testdbhconn.php');
   $query = "SELECT * FROM products WHERE category = 'Bibite' AND sub_category = 'Gassate';";
   $result = mysqli_query($conn, $query);
?>
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
            <?php if ($show1["Offer"] <= 0) { ?><div><div></div><div class="blue" data-price='<?php echo $show1["price"]; ?>'>€ <?php echo $show1["price"];?> </div></div><?php }
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
</div>

<div id="showProductContainerBackground">
   
</div>



<?php
   include_once '../../../mainElement/footer1ss.php'
?>

<script src="../../../JS/menu.js"></script>
<script src="../../../JS/SearchBar.js"></script>
<script src="../../../JS/Cart1ii.js"></script>
<script src="../../../JS/Ordine.js"></script>


   <script type="text/javascript">



   </script>

   </body>