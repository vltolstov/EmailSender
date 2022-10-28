
// reloadContacts 0.9.1

function reloadContacts()
{

    let icon = document.querySelector('.reloadContacts');
    icon.classList.remove('reload');
    icon.classList.add('loading');

    setTimeout(1000);

    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '/update-contacts', true);
    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == '200') {
            icon.classList.remove('loading');
            icon.classList.add('complete');
        }
    };
    xhttp.send();

}

document.querySelector('.reloadContacts').addEventListener('click', reloadContacts);


