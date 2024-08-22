function openModal(){
    let modal = document.getElementById('myModal');
    let span = document.getElementsByClassName('close')[0];
    modal.style.display = 'block';
    span.onclick = function(){
        modal.style.display = 'none';
    }
}