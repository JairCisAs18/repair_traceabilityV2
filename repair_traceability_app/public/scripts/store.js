document.addEventListener('DOMContentLoaded', function(){
    const input = document.getElementById('sna');
    const selected = document.getElementById('process');
    const list = document.getElementById('list');
    const items = document.getElementById('items');
    const items2 = document.getElementById('items2');
    var arrayOfCodes = [];
    input.addEventListener('keypress', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        var p = 1;
        if (selected !== null){
          p = selected.value;
        }
        const value = input.value.trim();
        var flag = arrayOfCodes.includes(value);
        if (!flag){
          if (value) {
            const listItem = document.createElement('li');
            listItem.textContent = value;
            list.appendChild(listItem);

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'snas[]';
            hiddenInput.value = value;
            arrayOfCodes.push(value);
            items.appendChild(hiddenInput);
            if (items2 !== null){
              const hiddenInput2 = document.createElement('input');
              hiddenInput2.type = 'hidden';
              hiddenInput2.name = 'processes[]';
              hiddenInput2.value = p;
              items2.appendChild(hiddenInput2);
            }
            
            input.value = '';
          } else{
            alert('Tienes que ingresar un código.')
          }
        }else{
          alert('Este código ya está escaneado.');
          input.value = '';
        }
      }
    });
})