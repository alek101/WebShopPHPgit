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
strana.dodaj.map(function(b)
{
    b.addEventListener('click',function(e)
    {
        let id=b.getAttribute('data-index');
        let boja=document.querySelector('#select-'+id).value;
        let kolicina=1;
        pozovi(id,boja,kolicina);
    })
})

strana.oduzmi.map(function(b)
{
    b.addEventListener('click',function(e)
    {
        let id=b.getAttribute('data-index');
        let boja=document.querySelector('#select-'+id).value;
        let kolicina=-1;
        pozovi(id,boja,kolicina);
    })
})

function pozovi(id,boja,kolicina)
{
    let url=new URL('Controller/controllerWeb.php', location.href);

    let podaci=
    {
        id:id,
        boja:boja,
        kolicina:kolicina
    }
               
    for (let podatak in podaci){
        url.searchParams.append(podatak, podaci[podatak]);
    }

    console.log(url);
    fetch(url).then(r=>r.text()).then(txt=>strana.rezultat.innerHTML=txt);
}

//filter cena
strana.filterCena.addEventListener('click',function(e)
{
    let min=strana.min_max[0].value || 0;
    let max=strana.min_max[1].value || 1000000000;
    pozovi3(min,max);
})


function pozovi3(min,max)
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
    fetch(url).then(r=>r.text()).then(txt=>strana.produkti.innerHTML=txt);
}

//filter naziv
strana.filterNaziv.addEventListener('click',function(e)
{
    let rec=strana.inputNaziv.value;
    if(rec.length>0)
    {
        pozovi2(rec);
    }
    
})


function pozovi2(rec)
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
    fetch(url).then(r=>r.text()).then(txt=>strana.produkti.innerHTML=txt);
}