
<!DOCTYPE html>
<html lang="it" dir="ltr">

   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

      <title>Sassari mini-Market</title>

      <link rel="stylesheet" href="../../style.css">


   </head>

   <body>

      <nav><img class="navBack" src="../../pictures/element/nav.jpg">
         <button id="menuOpen" class="borderColor"><img src="../../pictures/outline_menu_black_24dp.png"></button>
            
         <h1><a class="blueShade" href="../../">Sassari mini-Market</a></h1>

         <label class='cart'>
         <a href="../2/Carr.php">
            <span class="placeCount fontRainbow" id="placeCount">0</span>
            <img src="../../pictures/outline_shopping_cart_black_24dp.png">
         </a></label>

         <div>
         <img id="profile" class="borderColor placing" src="../../pictures/Profile/lone_tree.jpg">

         <?php
         if (isset($_SESSION["useruid"])) { ?>
            <div class="login showFixed fade1" id="logy">
            <div class="angolino"></div>
            <div class="closeLogy" id="closeLogy"></div>
            <form class="flex4">
               <a href="../2/Profilo.php">Profilo</a>
               <a class="dispic" href="../2/Profilo.php"><img class="borderColor profPic" src="../../pictures/Profile/lone_tree.jpg"></a>
               <button class="logyin"><a href="../../includes/logout.inc.php">Disconnetti</a></button>
                        
            </form>   
               <div id="formRegister"></div>
               <div id="formClose"></div>


          <?php
         } else { ?>
            <div class="login showFixed fade1" id="logy">
            <div class="angolino"></div>
            <div class="closeLogy" id="closeLogy"></div>
            <form action="../../includes/login.inc.php" method="post" class="flex4">
               <label>Username<input type="text" name="uid" placeholder="Username / Email"></label>
               <label>Password<input type="password" name="pwd" placeholder="password"></label>
               <button type="submit" name="submit" class="logyin">Log-in</button>
            </form>

<?php $string = "../../incl<udes/signu>p.inc.php"; ?>

            <a id="formRegister" class="registrati">registrati</a> 
         </div>

         <div class="Fixed showFixed" id="formReg">

            <div class="formClose" id="formClose"></div>
            
            <div class="registerForm">
            <form action="includes/signup.inc.php" method="post" class="register">

               <label class="regs marginT">Registrazione</label>
            <div class="flex2 marginT">
               <div class="mainInfo marginT"><div class="infocaratteri nasco">lista caratteri admessi<br> azAZ -<div class="binfocarat"></div></div><div class="i">i</div> Nome <input type="text" name="Nome" placeholder="Nome" minlength="3" required="required"  onkeyup="lettersonly(this)">*</div>

               <div class="mainInfo"><div class="infocaratteri b nasco">lista caratteri admessi<br> azAZ -<div class="binfocarat"></div></div><div class="i">i</div>Cognome <input type="text" name="Cognome" placeholder="Cognome" minlength="2" required="required"  onkeyup="lettersonly(this)">*</div>

               <div class="mainInfo">Email <input type="email" name="Email" placeholder="Email" required="required">*</div>
               
               <div class="mainInfo marginR">Telefono <input type="tel" name="tel" placeholder="Telefono" minlength="10" maxlength="10"  onkeyup="numbersonly(this)"></div>

               <div class="mainInfo"><div class="infocaratteri c nasco">lista caratteri admessi<br> azAZ09 -<div class="binfocarat"></div></div><div class="i">i</div>Nome Utente <input type="text" name="uid" placeholder="Nome Utente" minlength="5" required="required"  onkeyup="letterenorm(this)">*</div>

               <div class="mainInfo">Password <input type="password" name="pwd" placeholder="scegli la pasword" required="required">*</div>
               <div class="mainInfo">Password <input type="password" name="pwdrepeat" placeholder="ripeti la password" required="required">*</div>
            </div>
               <div class="marginT">Sesso
                  <div class="flex1"> 
                  <div><input type="radio" name="sesso" value="Uomo" checked=""><label>Uomo</label></div>
                  <div><input type="radio" name="sesso" value="Donna"><label>Donna</label></div>
                  </div>
               </div>
               
               <div class="flex3 mainInfo2 marginTB">Indirizzo di Consegna <input class="mainInfo2" type="text" name="Indirizzo" minlength="5" placeholder="Via di residenza" onkeyup="indicheck(this)">
               <textarea class="mainInfo2" name="Dettagli" rows="4" placeholder="Maggiori informazioni" value="Non ti puoi sbagliare."  onkeyup="letterenorm(this)"></textarea></div>
               
               <div>Città <select class="citta" name="Citta" placeholder="Città">
                  <option value="--"> -- </option>
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
                  <option value="Sant'Antonio di Gallura"> Sant'Antonio di Gallura </option>
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
                  <option value="Trinità d'Agultu e V."> Trinità d'Agultu e V.</option>
                  <option value="Tula"> Tula </option>
                  <option value="Uri"> Uri </option>
                  <option value="Usini"> Usini </option>
                  <option value="Valledoria"> Valledoria </option>
                  <option value="Viddalba"> Viddalba </option>
                  <option value="Villa"> Villa </option>                  
               </select></div>

               <div class="marginT">Provincia <select name="Provincia" placeholder="Provincia">
                  <option value="(SS) Sassari">Sassari</option>
               </select></div>

               <div class="marginT"><label>Accetto i termini di servizio</label>
               <input type="checkbox" name="check" value="yes" required="required">*</div>

               <div class="marginT"><label>Newsletter delle offerte</label>
               <input type="checkbox" name="check" value="yes"></div>
               
               <button type="submit" name="submit" class="marginTB btnRegs" id="registra">Registrami</button>
            </form></div>
         <?php
         }
         ?>

         </div>

         </div>
         
         <div class="searchBox ">
         
         <label id="search"><img src="../../pictures/outline_search_black_24dp.png"></label>

         <div class="searchDisplay">  
         <span><input id="searchBar" class="searchbar" type="text" placeholder="Cerca nell'inventario."></span>

         <div id="closeSearch" class="hide"></div>

         <div id="productShow" class="searchInv inventario2 hide"></div>

         </div> 
         </div>

         <section id="myDropdown" class="MenuBoxBackground fade1">    
            <div  class="menu-box"><button id=menuClose class="closemenu placing">chiudi x</button>
               <ul>
                  <div class="paddingtop"><label><a href="../Frutta&Verdura/Frutta_&_Verdura.php">Frutta e Verdura</a><img class="tab" onclick="currentTab(1)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
               <div class="sub-menu myMainTab">
                  <ul>
                     <li><a href="../Frutta&Verdura/Fresca.php">Frutta fresca</a></li><br>
                     <li><a href="../Frutta&Verdura/Secca.php">Frutta secca</a></li><br>
                     <li><a href="../Frutta&Verdura/Fresche.php">Verdure fresche</a></li><br>
                     <li><a href="../Frutta&Verdura/Scattolame.php">Scattolame</a></li><br>
                     <li><a href="../Frutta&Verdura/Cereali&Legumi.php">Cereali e legumi</a></li>
                  </ul>
               </div>

               <div class="paddingtop"><label>Freschi e Surgelati<img class="tab" onclick="currentTab(2)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
               <div class="sub-menu myMainTab">
                  <ul>

                     <div><label><a href="../Freschi_&_Surgelati/Latticini/Latticini.php">Latticini</a><img class="tab2" onclick="currentTab2(1)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Freschi_&_Surgelati/Latticini/Yogurt_&_Altri_Derivati.php">Yogurt ed altri derivati</a></li><br>
                           <li><a href="../Freschi_&_Surgelati/Latticini/Formaggi.php">Formaggi</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label><a href="../Freschi_&_Surgelati/Carne/Carne.php">Carne</a><img class="tab2" onclick="currentTab2(2)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2 divbottom">
                        <ul>
                           <li><a href="../Freschi_&_Surgelati/Carne/Pollo.php">Pollo</a></li><br>
                           <li><a href="../Freschi_&_Surgelati/Carne/Suino.php">Suino</a></li><br>
                           <li><a href="../Freschi_&_Surgelati/Carne/Manzo.php">Manzo</a></li><br>
                           <li><a href="../Freschi_&_Surgelati/Carne/Affettati.php">Affettati</a></li>
                        </ul>
                        </div>
                     <li class="paddingtop"><a href="../Freschi_&_Surgelati/Dessert.php">Dessert</a></li><br>
                     <li><a href="../Freschi_&_Surgelati/Altri_Prodotti.php">Altri prodotti</a></li>

                     <div class="paddingtop"><label><a href="../Freschi_&_Surgelati/Surgelati/Surgelati.php">Surgelati</a><img class="tab2" onclick="currentTab2(3)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Freschi_&_Surgelati/Surgelati/Alimenti.php">Alimenti</a></li><br>
                           <li><a href="../Freschi_&_Surgelati/Surgelati/Pesce.php">Pesce</a></li><br>
                           <li><a href="../Freschi_&_Surgelati/Surgelati/Gelati.php">Gelati</a></li>
                        </ul>
                     </div>
                  </ul>
                  </div>
     
                  <div class="paddingtop"><label>Bevande<img class="tab" onclick="currentTab(3)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                  <div class="sub-menu myMainTab">
                  <ul>

                     <div><label>Acqua<img class="tab2" onclick="currentTab2(4)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Bevande/Acqua/Gassata_ed_Effervescente.php">Gassata ed Effervescente</a></li><br>
                           <li><a href="../Bevande/Acqua/Naturale.php">Naturale</a></li>
                        </ul>
                     </div>

                     <div class="paddingtop"><label>Birra ed Aperitivi<img class="tab2" onclick="currentTab2(5)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Bevande/Birra_e_Aperitivi/Aperitivi_alcolici.php">Aperitivi alcolici</a></li><br>
                           <li><a href="../Bevande/Birra_e_Aperitivi/Aperitivi_analcolici.php">Aperitivi analcolici</a></li><br>
                           <li><a href="../Bevande/Birra_e_Aperitivi/Birra_alcolica.php">Birra alcolica</a></li><br>
                           <li><a href="../Bevande/Birra_e_Aperitivi/Birra_analcolica.php">Birra analcolica</a></li>
                        </ul>
                     </div>

                     <div class="paddingtop"><label>Altri Alcolici<img class="tab2" onclick="currentTab2(6)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Bevande/Altri_Alcolici/Liquori.php">Liquori</a></li><br>
                           <li><a href="../Bevande/Altri_Alcolici/Amarro.php">Amarro</a></li><br>
                           <li><a href="../Bevande/Altri_Alcolici/Distillati.php">Distillati</a></li>
                        </ul>
                     </div>

                     <div class="paddingtop"><label>Vini<img class="tab2" onclick="currentTab2(7)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Bevande/Vini/Vini_bianchi.php">Vini bianchi</a></li><br>
                           <li><a href="../Bevande/Vini/Vini_rosati.php">Vini rosati</a></li><br>
                           <li><a href="../Bevande/Vini/Vini_rossi.php">Vini rossi</a></li><br>
                           <li><a href="../Bevande/Vini/Vini_da_tavola.php">Vini da tavola</a></li><br>
                           <li><a href="../Bevande/Vini/Prosecco_e_Spumanti.php">Prosecco e Spumanti</a></li>
                        </ul>
                     </div>
                     
                     <div class="paddingtop"><label>Bibite<img class="tab2" onclick="currentTab2(8)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2 divbottom">
                        <ul>
                           <li><a href="../Bevande/Bibite/Gassate.php">Gassate</a></li><br>
                           <li><a href="../Bevande/Bibite/Solubili_e_Vegetali.php">Solubili e Vegetali</a></li><br>
                           <li><a href="../Bevande/Bibite/Energy_ed_integratori.php">Energy ed integratori</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop">
                     <li><a href="../Bevande/Succhi.php">Succhi</a></li></div>
                  </ul>
                  </div>

                  <div class="paddingtop"><label>Scaffale<img class="tab" onclick="currentTab(4)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                  <div class="sub-menu myMainTab">
                  <ul>
                     <div><label>Latticini<img class="tab2" onclick="currentTab2(9)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Latticini/Latte_e_latticini.php">Latte e latticini</a></li><br>
                           <li><a href="../Scaffale/Latticini/Uova.php">Uova</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Caffè ed Infusi<img class="tab2" onclick="currentTab2(10)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Caffè_ed_Infusi/Caffè_e_Orzo_solubili.php">Caffè e Orzo solubili</a></li><br>
                           <li><a href="../Scaffale/Caffè_ed_Infusi/Caffè_in_polvere.php">Caffè in polvere</a></li><br>
                           <li><a href="../Scaffale/Caffè_ed_Infusi/The_Infusi_Camomille_Tisane.php">The, Infusi, Camomille, Tisane</a></li><br>
                           <li><a href="../Scaffale/Caffè_ed_Infusi/Digestivi.php">Digestivi</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Pane, Pasta, Farinacei<img class="tab2" onclick="currentTab2(11)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Farinacei/Farina.php">Farina</a></li><br>
                           <li><a href="../Scaffale/Farinacei/Pasta_di_semola.php">Pasta di semola</a></li><br>
                           <li><a href="../Scaffale/Farinacei/Pasta_all'uovo.php">Pasta all'uovo</a></li><br>
                           <li><a href="../Scaffale/Farinacei/Pane_Crackers_Fette_biscottate.php">Pane, Crackers, Fette biscottate</a></li><br>
                           <li><a href="../Scaffale/Farinacei/Riso.php">Riso</a></li><br>
                           <li><a href="../Scaffale/Farinacei/Risotti_Purè_Polenta.php">Risotti, Purè, Polenta</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Scattolame<img class="tab2" onclick="currentTab2(12)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Scattolame/Sottolio_e_Sottaceti.php">Sottolio e Sottaceti</a></li><br>
                           <li><a href="../Scaffale/Scattolame/Verdure_in_scattola.php">Verdure in scattola</a></li><br>
                           <li><a href="../Scaffale/Scattolame/Carne_in_scattola.php">Carne in scattola</a></li><br>
                           <li><a href="../Scaffale/Scattolame/Pesce_in_scattola.php">Pesce in scattola</a></li><br>
                           <li><a href="../Scaffale/Scattolame/Piatti_pronti.php">Piatti pronti</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Condimenti<img class="tab2" onclick="currentTab2(13)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Condimenti/Acetto.php">Acetto</a></li><br>
                           <li><a href="../Scaffale/Condimenti/Dadi_e_Sale.php">Dadi e Sale</a></li><br>
                           <li><a href="../Scaffale/Condimenti/Salse.php">Salse</a></li><br>
                           <li><a href="../Scaffale/Condimenti/Spezie_e_aromi.php">Spezie e aromi</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Sughi<img class="tab2" onclick="currentTab2(14)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Sughi/Pelati_e_Passate.php">Pelati e Passate</a></li><br>
                           <li><a href="../Scaffale/Sughi/Sughi.php">Sughi</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Olio<img class="tab2" onclick="currentTab2(15)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Olio/Olio_d'oliva.php">Olio d'oliva</a></li><br>
                           <li><a href="../Scaffale/Olio/Olio_di_semi.php">Olio di semi</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Dolci<img class="tab2" onclick="currentTab2(16)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Dolci/Biscotti.php">Biscotti</a></li><br>
                           <li><a href="../Scaffale/Dolci/Cereali.php">Cereali</a></li><br>
                           <li><a href="../Scaffale/Dolci/Confetture_e_Miele.php">Confetture e Miele</a></li><br>
                           <li><a href="../Scaffale/Dolci/Creme_spalmabili.php">Creme spalmabili</a></li><br>
                           <li><a href="../Scaffale/Dolci/Torte_Crostate.php">Torte, Crostate</a></li><br>
                           <li><a href="../Scaffale/Dolci/Pasticeria.php">Pasticeria</a></li><br>
                           <li><a href="../Scaffale/Dolci/Prodotti_per_pasticeria.php">Prodotti per pasticeria</a></li><br>
                           <li><a href="../Scaffale/Dolci/Zucchero_e_Dolcificanti.php">Zucchero e Dolcificanti</a></li><br>
                           <li><a href="../Scaffale/Dolci/Caramelle_e_chewingum.php">Caramelle e chewingum</a></li>
                        </ul>
                     </div>
                     <div class="paddingtop"><label>Snack dolci e salati<img class="tab2" onclick="currentTab2(17)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Scaffale/Snack_dolci_e_salati/Merendine_e_snack_dolci.php">Merendine e snack dolci</a></li><br>
                           <li><a href="../Scaffale/Snack_dolci_e_salati/Patatine.php">Patatine</a></li><br>
                           <li><a href="../Scaffale/Snack_dolci_e_salati/Snack_salati.php">Snack salati</a></li>
                        </ul>
                     </div>
                  </ul>
                  </div> 

                  <div class="paddingtop"><label>Animali<img class="tab" onclick="currentTab(5)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab">
                     <ul>
                        <li><a href="../Animali/Alimenti_Cani.php">Alimenti Cani</a></li><br>
                        <li><a href="../Animali/Alimenti_Gatti.php">Alimenti Gatti</a></li><br>
                        <li><a href="../Animali/Alimenti_altri_pet.php">Alimenti atri pet</a></li><br>
                        <li><a href="../Animali/Accessori_e_Igiene.php">Accessori e Igiene</a></li>
                     </ul>
                  </div>
                  <div class="paddingtop"><label>Cura della Persona<img class="tab" onclick="currentTab(6)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab">
                     <ul>

                        <div><label>Prodotti per capelli<img class="tab2" onclick="currentTab2(18)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Cura_della_Persona/Prodotti_per_capelli/Shampoo.php">Shampoo</a></li><br>
                           <li><a href="../Cura_della_Persona/Prodotti_per_capelli/Balsami.php">Balsami</a></li><br>
                           <li><a href="../Cura_della_Persona/Prodotti_per_capelli/Modulazione_capelli.php">Modulazione capelli</a></li><br>
                           <li><a href="../Cura_della_Persona/Prodotti_per_capelli/Maschere_e_Lozioni.php">Maschere e Lozioni</a></li><br>
                           <li><a href="../Cura_della_Persona/Prodotti_per_capelli/Tinture.php">Tinture</a></li>
                        </ul>
                        </div>

                        <div class="paddingtop"><label>Cura del corpo<img class="tab2" onclick="currentTab2(19)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Cura_della_Persona/Cura_del_corpo/Prodotti_viso.php">Prodotti viso</a></li><br>
                           <li><a href="../Cura_della_Persona/Cura_del_corpo/Creme_corpo_viso_e_mani.php">Creme corpo, viso e mani</a></li><br>
                           <li><a href="../Cura_della_Persona/Cura_del_corpo/Deodoranti_e_Profumi.php">Deodoranti e Profumi</a></li><br>
                           <li><a href="../Cura_della_Persona/Cura_del_corpo/Igiene_corpo.php">Igiene corpo</a></li><br>
                           <li><a href="../Cura_della_Persona/Cura_del_corpo/Depilazione.php">Depilazione</a></li><br>
                           <li><a href="../Cura_della_Persona/Cura_del_corpo/Altri_prodotti.php">Altri prodotti</a></li>
                        </ul>
                        </div>

                        <div class="paddingtop"><label>Intima<img class="tab2" onclick="currentTab2(20)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab2 divbottom">
                        <ul>
                           <li><a href="../Cura_della_Persona/Intima/Igiene_intima.php">Igiene intima</a></li><br>
                           <li><a href="../Cura_della_Persona/Intima/Assorbenti_e_Salvaslip.php">Assorbenti e Salvaslip</a></li>
                        </ul>
                        </div>

                        <li class="paddingtop"><a href="../Cura_della_Persona/Igiene_orale.php">Igiene orale</a></li><br>
                        <li><a href="../Cura_della_Persona/Prodotti_per_l'infanzia.php">Prodotti per l'infanzia</a></li>
                     </ul>
                  </div>
                  <div class="paddingtop"><label>Cura della Casa<img class="tab" onclick="currentTab(7)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                  <div class="sub-menu myMainTab">
                     <ul>
                     <div><label>Detersivi<img class="tab3" onclick="currentTab3(1)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="myMainTab3 sub-menu divbottom">
                     <ul>
                        <li><a href="../Cura_della_Casa/Detersivi/Piatti_e_Lavastoviglie.php">Piatti e Lavastoviglie</a></li>

                        <div class="paddingtop"><label>Bucato<img class="tab2" onclick="currentTab2(21)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                        <div class="sub-menu myMainTab2">
                        <ul>
                           <li><a href="../Cura_della_Casa/Detersivi_Bucato/Bucato_a_mano.php">Bucato a mano</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Bucato/Lavatrice.php">Lavatrice</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Bucato/Ammorbidente.php">Ammorbidente</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Bucato/Smacchiatori_e_Sbiancanti.php">Smacchiatori e Sbiancanti</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Bucato/Igienizzante_e_altro.php">Igienizzante e altro</a></li>
                        </ul>
                        </div>

                        <div class="paddingtop"><label>Superfici<img class="tab2" onclick="currentTab2(22)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                        <div class="sub-menu myMainTab2 divbottom">
                        <ul>
                           <li><a href="../Cura_della_Casa/Detersivi_Superfici/Pavimenti.php">Pavimenti</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Superfici/Vetri.php">Vetri</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Superfici/Mobili.php">Mobili</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Superfici/Sgrassatori.php">Sgrassatori</a></li><br>
                           <li><a href="../Cura_della_Casa/Detersivi_Superfici/Igienizzante_e_altro.php">Igienizzante e altro</a></li>
                        </ul>
                        </div>
                        <li class="paddingtop"><a href="#">Cura Elettrodomestici</a></li><br>
                        <li><a href="../Cura_della_Casa/Detersivi/Bagno.php">Bagno</a></li><br>
                        <li><a href="../Cura_della_Casa/Detersivi/Candeggina_Ammoniaca.php">Candeggina, Ammoniaca</a></li>
                     </ul>
                     </div>
                        <li class="paddingtop"><a href="../Cura_della_Casa/Accessori_Insetticidi_e_Altro.php">Accessori, Insetticidi e Altro</a></li>
                     </ul>
                  </div>
                  <div class="paddingtop"><label>Carta e Plastica<img class="tab" onclick="currentTab(8)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                  <div class="sub-menu myMainTab">
                     <ul>
                        <li><a href="../Carta_e_Plastica/Alluminio_Pellicola_e_altri.php">Alluminio, Pellicola e altri</a></li><br>
                        <li><a href="../Carta_e_Plastica/Bicchieri_e_Posate.php">Bicchieri e Posate</a></li><br>
                        <li><a href="../Carta_e_Plastica/Carta_Igienica_e_Fazzoletti.php">Carta Igienica e Fazzoletti</a></li><br>
                        <li><a href="../Carta_e_Plastica/Asciugatutto_e_Tovagloli.php">Asciugatutto e Tovaglioli</a></li>
                     </ul>
                  </div>
                  <div class="paddingtop"><label>Senza Glutine<img class="tab" onclick="currentTab(9)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                  <div class="sub-menu myMainTab">
                     <ul>
                        <li><a href="../Senza_Glutine/Freschi_e_Surgelati.php">Freschi e Surgelati</a></li><br>
                        <li><a href="../Senza_Glutine/Scaffale.php">Scaffale</a></li>
                     </ul>
                  </div>
                  <div class="paddingtop"><label>Senza Lattosio<img class="tab" onclick="currentTab(10)" src="../../pictures/outline_expand_more_white_24dp.png"></label></div>
                     <div class="sub-menu myMainTab">
                     <ul>
                        <li><a href="../Senza_Lattosio/Freschi_e_Surgelati.php">Freschi e Surgelati</a></li><br>
                        <li><a href="../Senza_Lattosio/Scaffale.php">Scaffale</a></li>
                     </ul>
                  </div>
                  <br>
                  <li><a href="../Speciali/Prodotti_originali.php">Prodotti originali</a></li>
                  <br>
                  <li><a href="../Speciali/Offerta.php">Offerta</a></li>
                  <br>
                  <?php if (isset($_SESSION["useruid"]) !== false) {?>
                  <?php if ($_SESSION["useruid"] === 'ssadm') {?>
                  <li><a href="../2/Test.php">Testing</a></li>
                  <br>
                  <li><a href="../2/updProd.php">Prodotti upd</a></li>   <?php  } else if ($_SESSION["useruid"] !== 'ssadm') { ?>                <?php } ?>  <?php   } else if (isset($_SESSION["useruid"]) !== true) {                  } ?>
              </ul>
            </div>
            <div id=menuClose1 class="closeMenu1"></div>
         </section>
      </nav>
