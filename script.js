//objekat sa svim HTML elementima stranice
let strana=
{
    dodaj:[...document.querySelectorAll('.dodaj')],
    oduzmi:[...document.querySelectorAll('.izvadi')],
    rezultat:document.querySelector('.rezultat'),
    min_max:[...document.querySelectorAll('.min_max')],
    produkti:document.querySelector('.products'),
    filterCena:document.querySelector('.filterCena'),
    inputNaziv:document.querySelector('#ime_filter'),
    filterNaziv:document.querySelector('.filterNaziv'),
}

//Korpa
function dodajFunkcijeKorpe()
{
    //povezuje buttone za kupi sa serverom; funkcija je neophodna jer se butoni moraju nanovo povezati svaki
    //put kada filter napravi novi HTML

    //posto ne znamo koliko ce biti proizvoda ili bitona, na ovaj nacin ih skupljamo sve
    //[...a ] spread operator pretvra nod listu u normalni niz za koji mozemo da koristimo map funkciju
    let dodaj=[...document.querySelectorAll('.dodaj')];
    let oduzmi=[...document.querySelectorAll('.izvadi')];
    
    //za svako dugme citamo njegov id, i povezujemo ga sa funkcijom koja ima u sebi fetch
    dodaj.map(function(b)
    {
        b.addEventListener('click',function(e)
        {
            let id=b.getAttribute('data-index');
            let boja=document.querySelector('#select-'+id).value;
            let kolicina=1;
            pozoviKorpu(id,boja,kolicina);
        })
    })

    oduzmi.map(function(b)
    {
        b.addEventListener('click',function(e)
        {
            let id=b.getAttribute('data-index');
            let boja=document.querySelector('#select-'+id).value;
            let kolicina=-1;
            pozoviKorpu(id,boja,kolicina);
        })
    })
}

dodajFunkcijeKorpe();

function pozoviKorpu(id,boja,kolicina)
{
    //ova funkcija poziva funkciju iz php-a koja se odnosi na korpu
    let url=new URL('Controller/controllerKorpa.php', location.href);

    let podaci=
    {
        metoda:'dodaj',
        id:id,
        boja:boja,
        kolicina:kolicina
    }
    
    //for in nam daje imena u objektu podaci, a onda na osnovu njih uzimamo vrednosti
    for (let podatak in podaci){
        url.searchParams.append(podatak, podaci[podatak]);
    }

    console.log(url); //consol log cisto da se zna da je js nesto odradio

    //fetch salje predhodi url kao poziv php-u. Koristi se get metoda. Echo koji se dobija iz php-a, 
    //se prvo pretvara u tekst, pa se onda ostampa na HTML stranici.
    fetch(url).then(r=>r.text()).then(txt=>strana.rezultat.innerHTML=txt);
}

//filter cena
strana.filterCena.addEventListener('click',function(e)
{
    //ovo je stari nacin pisanja, ali u ovom slucaju skracuje pisanje. Ukoliko je input polje prazno
    //iskoristi vrednost posle ||. Treba paziti da je ovde 1000000000 maksimalna predvidjena cena
    let min=strana.min_max[0].value || 0;
    let max=strana.min_max[1].value || 1000000000;
    pozoviFilterCene(min,max);
})


function pozoviFilterCene(min,max)
{
    let url=new URL('Controller/controllerFilter.php', location.href);

    let podaci=
    {
        filter:"cena",
        min:min,
        max:max,
    }
               
    for (let podatak in podaci){
        url.searchParams.append(podatak, podaci[podatak]);
    }

    strana.produkti.innerHTML="";
    console.log(url);

    //ovde imamo dodatak u fetchu, zadnji then, koji nanovo povezuje dugmice. funkcija mora da se pozove bez () na kraju
    //jer bi u suprotnom js funkciju zvao prilikom prvog ucitavanja stranice. 
    fetch(url).then(r=>r.text()).then(txt=>strana.produkti.innerHTML=txt).then(dodajFunkcijeKorpe);
}

//filter naziv
strana.filterNaziv.addEventListener('click',function(e)
{
    let rec=strana.inputNaziv.value;
    if(rec.length>0)
    {
        pozoviFilterNaziva(rec);
    }
    
})


function pozoviFilterNaziva(rec)
{
    let url=new URL('Controller/controllerFilter.php', location.href);

    let podaci=
    {
        filter:"naziv",
        rec:rec,
    }
               
    for (let podatak in podaci){
        url.searchParams.append(podatak, podaci[podatak]);
    }

    strana.produkti.innerHTML="";
    console.log(url);
    fetch(url).then(r=>r.text()).then(txt=>strana.produkti.innerHTML=txt).then(dodajFunkcijeKorpe);
}