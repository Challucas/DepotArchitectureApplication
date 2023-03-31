const btn = document.querySelector('button')
btn.addEventListener('click', function(){
    let div = document.getElementById('popup')
    if(div.style.display != 'none')
    {
        div.style.display = 'none'
        btn.textContent = 'Afficher'
    }
    else{
        div.style.display = 'block'
        btn.textContent = 'Masquer'
    }
})