<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:wght@200&display=swap" rel="stylesheet"> 
    <title>Atelierul de tuns</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</head>
<body>

    <!--Prima pagina-->
    <section id="banner" class="banner">
       <a href="#banner" ><img src="imagini/logo.png" class="logo"></a>
       <div class="banner-text">
           <h1>Atelierul de tuns</h1>
           <p>Nu lăsa frizura să îți strice buna dispoziție</p>
                    <div class="butoane-banner">
                        <a href="user_register.php"><span></span>Cont nou</a>
                        <a href="user_login.php"><span></span>Logare</a>
                        <a href="#programare"><span></span>Programează-te</a>
                    </div>
       </div>
     </section>

     <div id="meniu-navigare" class="meniu">
         <nav>
             <ul>
                 <li><a href="#banner">Acasa</a></li>
                 <li><a href="#despre">Despre noi</a></li>
                 <li><a href="#servicii">Servicii</a></li>
                 <li><a href="produse.php">Produse</a></li>
                 <li><a href="#contact">Contact</a></li>
             </ul>
        </nav>  
    </div>

<div id="btn-meniu" class="buton-meniu deschis" onclick="toggleMenu(this); inchis();">
<span></span>
<span></span>
<span></span>
</div>

 <!-- Despre noi-->

<section id="despre">
    <div class="text-titlu">
    <p>Despre noi</p>
    <h1>De ce să ne alegi pe noi?</h1>
    </div>

<div class="despre-continut">
    <div class="despre">
       <h1>Frizeri cu experiență</h1>
       <div class="despre-descriere"> 
           <div class="despre-icon">
           <i class="fa-solid fa-person"></i>
           </div>
           <div class="despre-text">
               <p>Domeniul îngrijirii personale este un domeniu ce nu va muri niciodată. Oamenii au investit și investesc, în continuare, în imaginea lor, deoarece este cartea de vizită proprie. Frizerii noștrii sunt in domeniu de cel puțin 5 ani și au grijă ca părul tău să arate deosebit. Vino chiar acum si convinge-te singur!
               </p>
           </div>
       </div>
       <h1>Programare online </h1>
       <div class="despre-descriere"> 
           <div class="despre-icon">
           <i class="fa-solid fa-calendar-check"></i>
           </div>
           <div class="despre-text">
               <p>Nu mai sta pe gânduri și programează-te acum de pe site-ul nostru chiar <a href="logare.php">aici</a>. Profită și tu de cele mai mici prețuri la orice serviciu.
               </p>
           </div>
       </div>
       <h1>Cele mai mici prețuri </h1>
       <div class="despre-descriere"> 
           <div class="despre-icon">
           <i class="fa-solid fa-coins"></i>
           </div>
           <div class="despre-text">
               <p>Prețurile noastre sunt la un alt nivel! Avem cele mai avantajoase prețuri și cei mai talentați frizeri din oraș. 
               </p>
           </div>
       </div>
    </div>
    <div class="despre-imagine">
       <img src="imagini/pozafrizer2.jpg">
    </div>
</div>
</section>

<!-- @@@@@@@@@@@@@ Servicii @@@@@@@@@@@@ -->

<section id="servicii" >
<div class="text-titlu">
    <p>Servicii</p>
    <h1>Servicii calitative</h1>
    </div>
    <div class="servicii-casuta">
         <div class="poza-serviciu">
           <img src="imagini/poza3" alt="poza-frizer"/>
           <div class="overlay"></div>
           <div class="descriere-serviciu">
               <h3>Tuns</h3>
               <hr>
               <p>Pentru un look cât mai fresh îți recomandăm o tunsoare tip fade și nu numai, la prețul de 40 de lei.</p>
           </div>
         </div>
         <div class="poza-serviciu">
         <img src="imagini/poza2" alt="poza-frizer"/>
         <div class="overlay"></div>
         <div class="descriere-serviciu">
               <h3>Aranjarea parului</h3>
               <hr>
               <p>Nu ieși pe stradă cu părul ciufulit, cere-ne să-ți aranjăm părul pentru doar 5 lei.</p>
           </div>
         </div>
         <div class="poza-serviciu">
         <img src="imagini/poza5" alt="poza-frizer"/>
         <div class="overlay"></div>
         <div class="descriere-serviciu">
               <h3>Tuns barbă</h3>
               <hr>
               <p>Vrei să nu te mai recunoască lumea? Atunci vino și dă-ți barba jos la accesibilul preț de 20 de lei</p>
           </div>
         </div>
         <div class="poza-serviciu">
         <img src="imagini/poza1" alt="poza-frizer"/>
         <div class="overlay"></div>
         <div class="descriere-serviciu">
               <h3>Contur barbă</h3>
               <hr>
               <p>Întreține-ți barba și fă-ți conturul la aceasta la pretul de 10 lei.</p>
           </div>
         </div>
         <div class="poza-serviciu">
         <img src="imagini/poza4" alt="poza-frizer"/>
         <div class="overlay"></div>
         <div class="descriere-serviciu">
               <h3>Spălare capilară</h3>
               <hr>
               <p>Vrei să te relaxezi la finalul tunsului, atunci lasă-ne pe noi să ne facem treaba. Cel mai bun masaj si spălare capilară pentru doar 10 lei.</p>
           </div>
         </div>
         <div class="poza-serviciu">
         <img src="imagini/poza6" alt="poza-frizer"/>
         <div class="overlay"></div>
         <div class="descriere-serviciu">
               <h3>Tratament pentru creșterea și îngrijirea părului</h3>
               <hr>
               <p>Părul tău a suferit schimbări majore? Atunci vino la noi săptămânal să-ți aplicăm cel mai bun tratament pentru părul tău la prețul de 40 de lei </p>
           </div>
         </div>

    </div>

</section>


<!-- @@@@@@@@@@@@@@@@ PROGRAMARE @@@@@@@@ -->

<section id="programare">

    <div class="text-titlu">
        <p>Programare</p>
        <h1>Fă-ți o programare acum!</h1>
    </div>
    <form action="" method="post"></form>
     
     <div class="detalii-programare">

        <label for="Alege frizerul">Alege frizerul dorit:</label>

        <select name="frizeri" id="frizeri">
        <option value="Cosmin">Cosmin Teodoru</option>
        <option value="Laurentiu">Laurentiu Alexandrescu</option>
        <option value="George">George Ciprian</option>
        <option value="Vlad">Andreescu Vlad</option>
        </select>
     </div>

     <div class="detalii-programare">

        <label for="Alege frizerul">Alege tipul de serviciu dorit:</label>

        <select name="serviciu" id="serviciu" size="3" multiple>
        <option value="tuns">Tuns - pret 40 lei</option>
        <option value="tunsaranjat">Tuns + aranjat + spălare capilară - preț 55 lei</option>
        <option value="barbierit">Tuns barbă/Bărbierit - preț 20 lei </option>
        <option value="complet">Pachet complet(Tuns + aranjat + Tuns barbă/bărbierit + spălare capilară) - preț 70 de lei</option>
        <option value="tratament">Tratament păr - pret 40 lei/ședința</option>
        </select>

     </div>

     <div class="detalii-programare">

        <label for="Alege data">Alege data în care dorești să te programezi:</label>

        <input type="datetime" name="data" id="dataprogramarii">

     </div>

     <div class="detalii-programare">

        <label for="Alege ora">Alege ora la care dorești să te programezi:</label>

        <input type="time" name="data" id="dataprogramarii">

     </div>

     <div class="detalii-clienti">

     <label for="nume">Numele dumneavoastră:</label>
     <input type="text" name="nume" id="nume" placeholder="Introduceti numele" />

     <label for="prenume">Prenumele dumneavoastră:</label>
     <input type="text" name="prenume" id="prenume" placeholder="Introduceti prenumele" />

     <label for="email">Email-ul dumneavoastră:</label>
     <input type="email" name="email" id="email"placeholder="Introduceti adresa de email" />

     <label for="nrtel">Număr de telefon:</label>
     <input type="number" name="numartelefon" id="nrtel" placeholder="Introduceti numarul de telefon" required onkeypress="if(this.value.length == 10) return false;"/>


     </div>
     
    </form>


</section>


                <!-- @@@@@@@@@ CONTACT @@@@@@@-->


<section id="contact">
<div class="text-titlu">
    <img src="imagini/contact3.png" alt="imagine" class="poza-contact">
    <p>Contact</p>
    <h1>Te așteptăm la noi</h1>
</div>
    <div class="contact-coloane">
    <div class="partea-stanga">
        <h1><i class="fa-solid fa-calendar-day"></i></i>Program frizerie:</h1>
        <p><i class="fa-solid fa-clock"></i> Luni-Sâmbată: de la 10:00 până la 18:00.</p>
        <p><i class="fa-solid fa-clock"></i> Duminică: <span style="color:red;">ÎNCHIS</span>.</p>
    </div>
    <div class="partea-dreapta">
    <h1><i class="fa-solid fa-signs-post"></i>Ia legătura cu noi</h1>
    <p>Str. Tohăneni Nr. 102<i class="fa-solid fa-map-location-dot"></i></p>
    <p>babauvlad@gmail.com<i class="fa-solid fa-paper-plane"></i></p>
    <p>0752 266 727<i class="fa-solid fa-phone"></i></p>
    </div>
    </div>

<div class="social">
<a href="https://www.facebook.com/babau.vlad/"><i class="fa-brands fa-facebook"></i></a>
<a href="https://www.instagram.com/vladbbu/"><i class="fa-brands fa-instagram"></i></a>
<i class="fa-brands fa-twitter"></i>
<p><i class="fa-regular fa-copyright"></i>Copyright Atelierul de tuns</p>
</div>

</section>

<script>
    //cand apesi pe meniul de tip burger sa apara X si cand apesi pe X sa apara  meniul tip burger
    function toggleMenu(e) {
        e.classList.toggle("deschis");
    }
    var btnMeniu = document.getElementById("btn-meniu")
    

    function inchis() {
  var meniuNavigare = document.getElementById("meniu-navigare");
  if (meniuNavigare.classList.contains("inchis")) { 
    meniuNavigare.classList.remove("inchis");
  } else {
    meniuNavigare.classList.add("inchis");
  }
}
var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1000,
	speedAsDuration: true
});
</script>
</body>
</html>