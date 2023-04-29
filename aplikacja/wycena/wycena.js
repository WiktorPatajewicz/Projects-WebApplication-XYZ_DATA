function wycena(){

    let liczba_podstron = Number(document.querySelector("#podstrony").value);
    // let liczba_podstron = document.getElementById('podstrony').value;
    
    if(liczba_podstron <1){
        document.querySelector("#wynik").innerText = "Błędna liczba podstron";
    }else{
        let koszt = liczba_podstron * 50;
        
        if (document.querySelector("#Proj_graf_t").checked){
            koszt = koszt + 500;
        }

        if (document.querySelector("#CMS_t").checked){
            koszt = koszt + 1200;
        }else if(document.querySelector("#CMS_n").checked){
            koszt = koszt + 600;
        }

        if (document.querySelector("#SEO_t").checked){
            koszt = koszt + 600;
        }

        if (document.querySelector("#CZAS_e").checked){
            koszt = koszt + 0.2 * koszt;
        }

        document.querySelector("#wynik").innerHTML = "<h3>Koszt projektu wynosi "+koszt+" zł.</h3>";
    }
}

document.querySelector("#przycisk").addEventListener("click",wycena);