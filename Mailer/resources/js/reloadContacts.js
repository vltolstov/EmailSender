
// reloadContacts 0.1

function reloadContacts()
{

    let xhttp = new XMLHttpRequest();
    let token = document.querySelector('.token');

    xhttp.open('GET', 'http://127.0.0.1:8000/test', true);
    xhttp.setRequestHeader('X-CSRF-Token', token.value);
    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == '200') {
            console.log(this.responseText);
        }
    };
    xhttp.send();

}

document.querySelector('.reloadContacts').addEventListener('click', reloadContacts);

