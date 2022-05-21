function showPassword(){
    let input = document.getElementById('password');
    let icon = document.getElementById('icon');

    if(input.type === "password"){
        input.type = "text";
        icon.classList.add('selected');
    } else{
        input.type = "password";
        icon.classList.remove('selected');
    }
}

function confirmWindow(id){
    if(confirm(`Хотите удалить учётную запись пользователя (ID = ${id})?`)){
        window.location.href = `actions/delete.php?id=${id}`;
    } else{

    }
}