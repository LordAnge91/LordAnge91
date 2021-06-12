<?php 
   session_start();
?>

<?php 
   include_once '../../mainelement/nav1s.php'
?>



   
<div class="shower">
   
   <a href="Frutta_&_Verdura.php"><div class="showerElem">Frutta e Verdura</div></a>
   <a href="Fresca.php"><div class="showerElem">Frutta fresca</div></a>
   <a href="Secca.php"><div class="showerElemActive">Frutta secca</div></a>
   <a href="Fresche.php"><div class="showerElem">Verdure fresche</div></a>
   <a href="Scattolame.php"><div class="showerElem">Scattolame</div></a>
   <a href="Cereali&Legumi.php"><div class="showerElem">Cereali e legumi</div></a>

   <div class="showerElemSelected"><h1>Frutta Secca</h1></div>

</div>
<?php
   include_once ('../../includes/testdbhconn.php');
   $query = "SELECT * FROM products WHERE category = 'Frutta&Verdura' AND sub_category = 'FruttaSecca';";
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
            <?php if ($show1["Offer"] <= 0) { ?><div class="blue" data-price='<?php echo $show1["price"]; ?>'> € <?php echo $show1["price"];?> </div><?php }
             else { ?> <div class="prodvalue"><div class="proddiscount blue"><?php if ($show1["Offer"] >= 1) {?>€ <?php echo $show1["price"]; }?> </div><div class="prodprice bold red" data-price='<?php echo $show1["discount"]; ?>'>€ <?php echo $show1["discount"];?> </div></div>  <?php }?>
            
         <div class="prodvalue"><?php if ($show1['Offer'] >= 1) { ?>
             <div class="prodpriceunit red bold">€ <?php echo number_format(1000*$show1["discount"]/$show1['weight'], 2); ?> / Kg</div> <?php } else if ($show1['Offer'] <= 0) { ?>
            <div class="prodpriceunit blue">€ <?php echo number_format(1000*$show1["price"]/$show1['weight'], 2); ?> / Kg</div> <?php         }?>

         <div class="prodweight blue"><?php echo number_format($show1["weight"]/1000, 1); ?> kg</div>
         </div>
         <div class="prodpriceunit bold">In negozio <?php echo $show1["Disponibilita"]; ?></div>
         </div>          
         <button class="add addToCart" data-id='<?php echo $show1["id"]; ?>'>Aggiungi</button>
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
   include_once '../../mainelement/footer1s.php'
?>

  
<script src="../../JS/menu.js"></script>
<script src="../../JS/SearchBar.js"></script>
<script src="../../JS/Cart1i.js"></script>

   <script type="text/javascript">





   </script>


   </body>