document.querySelector('.kupi').addEventListener('click',function()
{
    let url=new URL('Controller/controllerKorpa.php', location.href);
    
    let podaci=
    {
        metoda:'kupi',
    }
               
    for (let podatak in podaci){
        url.searchParams.append(podatak, podaci[podatak]);
    }

    // console.log(url);
    // fetch(url).then(r=>r.text()).then(txt=>alert(txt));
    fetch(url).then(window.open('index.php'));
})

let dugmici=[...document.querySelectorAll('.brisi')];

dugmici.map(b=>b.addEventListener('click', function(e)
{
    let dz=this.getAttribute('data-dugme').split("&");

    this.parentNode.parentNode.remove();

    let url=new URL('Controller/controllerKorpa.php', location.href);
    
    let podaci=
    {
        metoda:'obrisi',
        id:dz[0],
        boja:dz[1],
    }
               
    for (let podatak in podaci){
        url.searchParams.append(podatak, podaci[podatak]);
    }

    console.log(url);
    fetch(url).then(r=>r.text()).then(txt=>alert(txt));


}));
