let up_left_basket = document.getElementById("ul_basket");
let lower_left_basket = document.getElementById("ll_basket");
let up_right_basket = document.getElementById("ur_basket");
let lower_right_basket = document.getElementById("lr_basket");

let game_date = {"up_left":[], "lower_left":[], "up_right":[], "lower_right":[], "basket":"up_left"}; //{} - словарь, [] - массив позиции на которых яйца
let interval_game = undefined;      //id интервал

let speed = 2000;
let count = 0;

document.addEventListener("keydown", function(event) {
    switch(event.code) {
        case "KeyR": //левый верхний
            up_left_basket.style.visibility = "visible";
            lower_left_basket.style.visibility = "hidden";
            up_right_basket.style.visibility = "hidden";
            lower_right_basket.style.visibility = "hidden";
            game_date['basket'] = "up_left";
            break;

        case "KeyF": //левый нижний
            up_left_basket.style.visibility = "hidden";
            lower_left_basket.style.visibility = "visible";
            up_right_basket.style.visibility = "hidden";
            lower_right_basket.style.visibility = "hidden";
            game_date['basket'] = "lower_left";
            break;

        case "KeyI": // правый верзний
            up_left_basket.style.visibility = "hidden";
            lower_left_basket.style.visibility = "hidden";
            up_right_basket.style.visibility = "visible";
            lower_right_basket.style.visibility = "hidden";
            game_date['basket'] = "up_right";
            break;

        case "KeyJ": //правый нижний
            up_left_basket.style.visibility = "hidden";
            lower_left_basket.style.visibility = "hidden";
            up_right_basket.style.visibility = "hidden";
            lower_right_basket.style.visibility = "visible";
            game_date['basket'] = "lower_right";
            break;

        default:
            break;
    }
});

function generateEgg(){
    let choice = ["up_left", "lower_left", "up_right", "lower_right"];

    let index = Math.floor(Math.random()*choice.length);

    return choice[index];
}

window.onload = function (){            //страница загрузилась
    interval_game = setInterval(interval, speed);
}

function interval(){
    let position = generateEgg();
    game_date[position].unshift(0); // добовления нуля в начало яйцо проявилось - начальное положение яйца

    for(let i = 0; i < game_date['up_left'].length; i++){
        if(game_date['up_left'][i] === 6){
            if(game_date['basket'] !== 'up_left'){
                clearInterval(interval_game);
                confirmWindow();
                return;
            } else{
                count++;
                game_date['up_left'].pop();         //удаляет последнее значение
            }
        }
    }

    for(let i = 0; i < game_date['lower_left'].length; i++){
        if(game_date['lower_left'][i] === 6){
            if(game_date['basket'] !== 'lower_left'){
                clearInterval(interval_game);
                confirmWindow();
                return;
            } else{
                count++;
                game_date['lower_left'].pop();         //удаляет последнее значение
            }
        }
    }

    for(let i = 0; i < game_date['up_right'].length; i++){
        if(game_date['up_right'][i] === 6){
            if(game_date['basket'] !== 'up_right'){
                clearInterval(interval_game);
                confirmWindow();
                return;
            } else{
                count++;
                game_date['up_right'].pop();         //удаляет последнее значение
            }
        }
    }

    for(let i = 0; i < game_date['lower_right'].length; i++){
        if(game_date['lower_right'][i] === 6){
            if(game_date['basket'] !== 'lower_right'){
                clearInterval(interval_game);
                confirmWindow();
                return;
            } else{
                count++;
                game_date['lower_right'].pop();         //удаляет последнее значение
            }
        }
    }

    document.getElementById('score').innerText = count;

    for(let i = 0; i < game_date['up_left'].length; i++){
        game_date['up_left'][i] += 1;
    }

    for(let i = 0; i < game_date['up_right'].length; i++){
        game_date['up_right'][i] += 1;
    }

    for(let i = 0; i < game_date['lower_left'].length; i++){
        game_date['lower_left'][i] += 1;
    }

    for(let i = 0; i < game_date['lower_right'].length; i++){
        game_date['lower_right'][i] += 1;
    }

    for(let i = 0; i <= 6; i++){
        if(game_date['up_left'].includes(i)){
            if(document.getElementById(`ul_egg_${i-1}`) !== null){
                document.getElementById(`ul_egg_${i-1}`).style.visibility = "visible";
            }
        } else{
            if(document.getElementById(`ul_egg_${i-1}`) !== null){
                document.getElementById(`ul_egg_${i-1}`).style.visibility = "hidden";
            }
        }
    }

    for(let i = 0; i <= 6; i++){
        if(game_date['lower_left'].includes(i)){
            if(document.getElementById(`ll_egg_${i-1}`) !== null){
                document.getElementById(`ll_egg_${i-1}`).style.visibility = "visible";
            }
        } else{
            if(document.getElementById(`ll_egg_${i-1}`) !== null){
                document.getElementById(`ll_egg_${i-1}`).style.visibility = "hidden";
            }
        }
    }

    for(let i = 0; i <= 6; i++){
        if(game_date['up_right'].includes(i)){
            if(document.getElementById(`ur_egg_${i-1}`) !== null){
                document.getElementById(`ur_egg_${i-1}`).style.visibility = "visible";
            }
        } else{
            if(document.getElementById(`ur_egg_${i-1}`) !== null){
                document.getElementById(`ur_egg_${i-1}`).style.visibility = "hidden";
            }
        }
    }

    for(let i = 0; i <= 6; i++){
        if(game_date['lower_right'].includes(i)){
            if(document.getElementById(`lr_egg_${i-1}`) !== null){
                document.getElementById(`lr_egg_${i-1}`).style.visibility = "visible";
            }
        } else{
            if(document.getElementById(`lr_egg_${i-1}`) !== null){
                document.getElementById(`lr_egg_${i-1}`).style.visibility = "hidden";
            }
        }
    }

    if (count % 10 === 0 && speed > 500 && count > 0){
        clearInterval(interval_game);
        speed -= 500;
        setInterval(interval, speed);
    }
}

function confirmWindow(){
    commit();
    if(confirm(`Ваш счёт: ${count}.\nХотите продолжить?`)){
        window.location.reload();
    } else{
        window.location.href = "../prophile.php";
    }
}

function commit(){
    $.ajax({
        url: '../vendor/game_update.php',
        type: 'POST',
        data: `count=${count}`,
        success: function (){
            console.log("УСПЕХ");
        },
        error: function (){
            console.log("НЕ ПОВЕЗЛО, НЕ ФАРТОНУЛО");
        }
    })
}
