const btn = document.querySelector('button')
let username = document.getElementById('username')
let password = document.getElementById('password')
btn.addEventListener('click', function(){
    if(password.value == '1234' && username.value == 'lucas')
    {
        alert('Connecté')
    }
    else
    {
        alert('Mauvais identifiant ou mdp')
    }
})