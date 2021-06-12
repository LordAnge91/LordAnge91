<?php 
   session_start();
?>

<?php
if (isset($_SESSION["useruid"]) !== false) {
?>

<?php
   include_once '../../mainElement/nav1s.php';
?>

<?php
   include_once '../../includes/dbh.inc.php';
?>
<div class="shower"></div>

<?php
   $sql = "SELECT * FROM users where userUid = '".$_SESSION['useruid']."'";
   $result = mysqli_query($conn, $sql);

   while ($row = mysqli_fetch_assoc($result)) {
         $id = $row['usersId'];
         $name = $row['userNome'];
         $cognome = $row['userCognome'];
         $email = $row['userEmail'];
         $username = $row['userUid'];
         $pwd = $row['userPwd'];
         $sex = $row['userSex'];
         $indirizzo = $row['userIndirizzo'];
         $info = $row['userIndirizzoInfo'];
         $phone = $row['userPhone'];
         $citta = $row['userCity'];
         $provincia = $row['userProvincia'];
         }
            ?>
            <div class="profy">
               <div class="flexy1">
                  <div class="profList">
                  <div>Lista attesa</div>
                  <a class="pli" href="" data-id="">lista</a>
               </div>
               <div class="profList">
                  <div>Lista acquisti</div>
                  <div class="acqui">
<?php
   include_once '../../includes/dbprod.inc.php';

   $sql1 = "SELECT * FROM `acquisti` where idUtente = '".$id."';";
   $result1 = mysqli_query($conn, $sql1);

   while ($row1 = mysqli_fetch_assoc($result1)) {
   $date = $string = substr($row1['data'],0,10); ?>   
                     <span data-id="<?=$row1['idprodotti']?>" class="fli pointer"><?=$date?></span>
                     <?php } ?>
                  </div>
               </div>
               </div>
               <div class="column">
               <div class="profyInfo borderColor">
               <div class="dispInfo borderColor">
                  <div>Img Profilo</div>
                  <div class="dispic"><img class="borderColor profPic" src="../../pictures/Profile/lone_tree.jpg"></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Nome & Cognome</div>
                  <div class=""><span><?= $name?></span> <span><?= $cognome?></span></div>
               </div> 
               <div class="dispInfo borderColor">
                  <div>Nome Utente</div>
                  <div class=""><?= $username?></div>
                  <button class="aggio upp2">Aggiorna</button>
               </div>
               <div class="dispInfo borderColor">
                  <div>Contatti</div>
                  <div class=""><?= $email?></div>
                  <div class=""><?= $phone?></div>
                  <button class="aggio upp2">Aggiorna</button>
               </div>
               <div class="dispInfo borderColor">
                  <div>Sesso</div>
                  <div class=""><?= $sex?></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Indirizzo di consegna</div>
                  <div class=""><?= $indirizzo?></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Info indirizzo</div>
                  <div class=""><?= $info?></div>
               </div>
               <div class="dispInfo borderColor">
                  <div>Città, Provincia</div>
                  <div><span><?= $citta?></span>,<span> <?= $provincia?></span></div>
               </div>
            </div>
            <button id="upp" class="aggio">Aggiorna</button>
            </div>
         </div>




              <div class="Fixed showFixed" id="updateCont">

            
            <div class="registerForm">
               <form action="../../includes/update.inc.php" method="post" class="register colorUpp">

               <label class="regs">Aggiornamento</label>
            <div class="flex2">
               <div class="mainInfo">Nome <input type="text" name="nome" value="<?=$name?>" required="required">*</div>

                <div class="mainInfo">Cognome <input type="text" name="cognome" value="<?=$cognome?>" required="required">*</div>

                <div class="mainInfo">Telefono 
                  <input type="text" name="phone" placeholder="Telefono" value="<?=$phone?>" minlenght="10" maxlength="10">
                </div>
            </div>
            <span>
                  <div>Sesso
                  <div class="flex1"> 
                  <div><input type="radio" name="sesso" value="Uomo" <?php if ($sex == 'Uomo') { echo 'checked=""'; }?> ><label>Uomo</label></div>
                  <div><input type="radio" name="sesso" value="Donna"<?php if ($sex == 'Donna') { echo 'checked=""'; }?>><label>Donna</label></div>
                  </div>
               </div>
               <div class="dispic"><img class="borderColor profPic" src="../../pictures/Profile/lone_tree.jpg"></div>
            </span>
               <div class="flex3 mainInfo2 marginTB">Indirizzo di Consegna <input class="mainInfo2" type="text" name="indirizzo" value="<?=$indirizzo?>">
               <textarea class="mainInfo2" name="Dettagli" rows="4"><?=$info?></textarea></div>
               
               <div>Città <select class="citta" name="citta">
                  <option value="<?=$citta?>"> <?=$citta?> </option>
                  <option value="Aggius"> Aggius </option>
                  <option value="Aglientu"> Aglientu </option>
                  <option value="Alà dei Sardi"> Alà dei Sardi </option>
                  <option value="Alghero"> Alghero </option>
                  <option value="Anela"> Anela </option>
                  <option value="Ardara"> Ardara </option>
                  <option value="Arzachena"> Arzachena </option>
                  <option value="Badesi"> Badesi </option>
                  <option value="Banari"> Banari </option>
                  <option value="Benetutti"> Benetutti </option>
                  <option value="Berchidda"> Berchidda </option>
                  <option value="Bessude"> Bessude </option>
                  <option value="Bonnanaro"> Bonnanaro </option>
                  <option value="Bono"> Bono </option>
                  <option value="Bonorva"> Bonorva </option>
                  <option value="Bortigiadas"> Bortigiadas </option>
                  <option value="Borutta"> Borutta </option>
                  <option value="Bottidda"> Bottidda </option>
                  <option value="Buddusò"> Buddusò </option>
                  <option value="Budoni"> Budoni </option>
                  <option value="Bultei"> Bultei </option>
                  <option value="Bulzi"> Bulzi </option>
                  <option value="Burgos"> Burgos </option>
                  <option value="Calangianus"> Calangianus </option>
                  <option value="Cargeghe"> Cargeghe</option>
                  <option value="Castelsardo"> Castelsardo </option>
                  <option value="Cheremule"> Cheremule </option>
                  <option value="Chiaramonti"> Chiaramonti </option>
                  <option value="Codrongianos"> Codrongianos </option>
                  <option value="Cossoine"> Cossoine </option>
                  <option value="Erula"> Erula </option>
                  <option value="Esporlatu"> Esporlatu </option>
                  <option value="Florinas"> Florinas </option>
                  <option value="Giave"> Giave </option>
                  <option value="Golfo Aranci"> Golfo Aranci </option>
                  <option value="Illorai"> Illorai </option>
                  <option value="Ittireddu"> Ittireddu </option>
                  <option value="Ittiri"> Ittiri </option>
                  <option value="Laerru"> Laerru </option>
                  <option value="Loiri Porto San Paolo"> Loiri Porto San Paolo </option>
                  <option value="Luogosanto"> Luogosanto </option>
                  <option value="Luras"> Luras </option>
                  <option value="Mara"> Mara </option>
                  <option value="Martis"> Martis </option>
                  <option value="Monteleone Rocca Doria"> Monteleone Rocca Doria </option>
                  <option value="Monti"> Monti </option>
                  <option value="Mores"> Mores </option>
                  <option value="Muros"> Muros </option>
                  <option value="Nughedu San Nicolò"> Nughedu San Nicolò </option>
                  <option value="Nule"> Nule </option>
                  <option value="Nulvi"> Nulvi </option>
                  <option value="Olbia"> Olbia </option>
                  <option value="Olmedo"> Olmedo </option>
                  <option value="Oschiri"> Oschiri </option>
                  <option value="Osilo"> Osilo </option>
                  <option value="Ossi"> Ossi </option>
                  <option value="Ozieri"> Ozieri </option>
                  <option value="Padria"> Padria </option>
                  <option value="Padru"> Padru </option>
                  <option value="Palau"> Palau </option>
                  <option value="Pattada"> Pattada </option>
                  <option value="Perfugas"> Perfugas </option>
                  <option value="Ploaghe"> Ploaghe </option>
                  <option value="Porto Torres"> Porto Torres </option>
                  <option value="Pozzomaggiore"> Pozzomaggiore </option>
                  <option value="Putifigari"> Putifigari </option>
                  <option value="Romana"> Romana </option>
                  <option value="San Teodoro"> San Teodoro </option>
                  <option value="Sant Antonio di Gallura"> Sant Antonio di Gallura </option>
                  <option value="Santa Maria Coghinas"> Santa Maria Coghinas </option>
                  <option value="Santa Teresa Gallura"> Santa Teresa Gallura </option>
                  <option value="Sassari"> Sassari </option>
                  <option value="Sedini"> Sedini </option>
                  <option value="Semestene"> Semestene </option>
                  <option value="Sennori"> Sennori </option>
                  <option value="Siligo"> Siligo </option>
                  <option value="Sorso"> Sorso </option>
                  <option value="Stintino"> Stintino </option>
                  <option value="Telti"> Telti </option>
                  <option value="Tempio Pausania"> Tempio Pausania </option>
                  <option value="Tergu"> Tergu </option>
                  <option value="Thiesi"> Thiesi </option>
                  <option value="Tissi"> Tissi </option>
                  <option value="Torralba"> Torralba </option>
                  <option value="Trinità d Agultu e V."> Trinità d Agultu e V.</option>
                  <option value="Tula"> Tula </option>
                  <option value="Uri"> Uri </option>
                  <option value="Usini"> Usini </option>
                  <option value="Valledoria"> Valledoria </option>
                  <option value="Viddalba"> Viddalba </option>
                  <option value="Villa"> Villa </option>                  
               </select></div>

               <div>Provincia <select name="provincia" value="<?=$provincia?>">
                  <option value="(SS) Sassari">Sassari</option>
               </select></div>
               <input type="hidden" name="ID" value="<?php echo $id?>">
               <button type="submit" name="update" class="marginTB btnRegs">update</button>
            </form>
            </div>
         </div>


         <div class="Fixed showFixed" id="updateCont2">

            
            <div class="updinform column2">
               <form action="../../includes/update.inc.php" method="post" class="updinf min-height0 colorUpp">
               <label class="regs">Aggiornamento Nome Utente</label>
            <div class="flex2">
               <input type="hidden" name="oldusername" value="<?=$username?>">
               <div class="mainInfo">Nuovo Nome Utente <input type="text" name="newusername"></div>
            </div>
               <input type="hidden" name="ID" value="<?php echo $id?>">
               <button type="submit" name="updateuid" class="marginTB btnRegs">update</button>
            </form>

            <form action="../../includes/update.inc.php" method="post" class="updinf min-height0 colorUpp">
               <label class="regs">Aggiornamento Email</label>
            <div class="flex2">
               <input type="hidden" name="oldemail" value="<?=$email?>">
               <div class="mainInfo">Nuova Email <input type="email" name="newemail"></div>
            </div>
               <input type="hidden" name="ID" value="<?php echo $id?>">
               <button type="submit" name="updatemail" class="marginTB btnRegs">update</button>
            </form>

            <form action="../../includes/update.inc.php" method="post" class="updinf min-height0 colorUpp">
               <label class="regs">Aggiornamento Password</label>
            <div class="flex2">
               <input type="hidden" name="oldusername" value="<?=$username?>">
               <div class="mainInfo">Vecchia Password <input type="password" name="oldpwd" value="" required="required">*</div>
               <div class="mainInfo">Nuova Password <input type="password" name="newpwd" value="" required="required">*</div>
               <div class="mainInfo">ripeti Nuova Password <input type="password" name="newpwdrpt" value="" required="required">*</div>
            </div>
               <input type="hidden" name="ID" value="<?php echo $id?>">
               <button type="submit" name="updatepwd" class="marginTB btnRegs">update</button>
            </form>

            </div>

         </div>




         <?php
         } else {
            header("location: ../../index.php");
            exit();
        }
?>





<?php
   include_once '../../mainElement/footer1s.php'
?>


<script src="../../JS/menu.js"></script>
<script src="../../JS/SearchBar.js"></script>
<script src="../../JS/Cart1i.js"></script>


<script type="text/javascript">
let uppy = document.getElementById('updateCont');
uppy.addEventListener('click', closeupd);
let upp = document.getElementById('upp');
upp.addEventListener('click', openupd);

function openupd() {
   document.getElementById('updateCont').classList.toggle('showFixed');
}

function closeupd(ev) {
   if (event.target.classList.contains('Fixed')) {
      document.getElementById('updateCont').classList.toggle('showFixed');
   }
}

let uppy2 = document.getElementById('updateCont2');
uppy2.addEventListener('click', closeupd2);
let upp2 = document.getElementsByClassName('upp2')[0];
let upp3 = document.getElementsByClassName('upp2')[1];
upp2.addEventListener('click', openupd2);
upp3.addEventListener('click', openupd2);

function openupd2() {
   document.getElementById('updateCont2').classList.toggle('showFixed');
}

function closeupd2(ev) {
   if (event.target.classList.contains('Fixed')) {
      document.getElementById('updateCont2').classList.toggle('showFixed');
   }
}

let buylink = [...document.getElementsByClassName('fli')];
temp = JSON.parse(localStorage.getItem('products'));
temp.forEach(filt => {
buylink.forEach(link => {
link.addEventListener('click', (event) =>{
   let id = link.dataset.id.split(',');
id.forEach(id => {
      if (id === filt.id) {
         let inCart = cart.find(item => item.id ===id);
         if (inCart) {

         } else {
            let cartItem = { ...Storage.getProduct(id), amount: 1};
            cart = [...cart, cartItem];
            Storage.saveCart(cart);
            setCartValues(cart);
         } location.href = '../2/Carr.php'
      }

})
})
})
})
function setCartValues(cart) {
      let tempTotal = 0;
      let itemsTotal = 0;
      cart.map(item=>{
         tempTotal += item.price * item.amount;
         itemsTotal += item.amount;
      });
      cartItems.innerText = itemsTotal;
   }
</script>

