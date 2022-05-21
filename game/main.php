<?php
    session_start();
//    echo "SELECT * FROM `users` WHERE `login` = ".'"'. $_SESSION['user']['login']. '"';
//    echo "UPDATE `users` SET `record` =" .'"'.$_POST['record'].'"'.'WHERE `login` = '.'"'. $_SESSION['user']['login']. '"'
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Птицефабрика</title>
    <link rel = "stylesheet" href="style.css">
</head>

<body>
    <div id="immutable_view">
        <div id="left_side">
            <div id="upper_left_egg_line">
                <img id="chicken" src="images/chicken_96.png" alt="Курица">
                <img id="rail" src="images/rail.png" alt="Рельсы">
                <div id="ul_egg_rail">
                    <img id="ul_egg_1" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(35deg);">
                    <img id="ul_egg_2" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(75deg);">
                    <img id="ul_egg_3" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(135deg);">
                    <img id="ul_egg_4" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(235deg);">
                    <img id="ul_egg_5" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(315deg);">
                </div>
            </div>
            <div id="lower_left_egg_line">
                <img id="chicken" src="images/chicken_96.png" alt="Курица">
                <img id="rail" src="images/rail.png" alt="Рельсы">
                <div id="ll_egg_rail">
                    <img id="ll_egg_1" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(35deg);">
                    <img id="ll_egg_2" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(75deg);">
                    <img id="ll_egg_3" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(135deg);">
                    <img id="ll_egg_4" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(235deg);">
                    <img id="ll_egg_5" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(315deg);">
                </div>
            </div>
        </div>
        <div id="basket_loc">
            <img id="ul_basket" src="images/basket_76.png" alt="Корзина (слева вверху)">
            <img id="ll_basket" src="images/basket_76.png" alt="Корзина (слева снизу)">
            <img id="ur_basket" src="images/basket_76.png" alt="Корзина (справа вверху)">
            <img id="lr_basket" src="images/basket_76.png" alt="Корзина (справа снизу)">
        </div>
        <div id="right_side">
            <div id="upper_right_egg_line">
                <img id="chicken" src="images/chicken_96.png" alt="Курица">
                <img id="rail" src="images/rail.png" alt="Рельсы">
                <div id="ur_egg_rail">
                    <img id="ur_egg_5" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(45deg);">
                    <img id="ur_egg_4" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(125deg);">
                    <img id="ur_egg_3" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(225deg);">
                    <img id="ur_egg_2" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(285deg);">
                    <img id="ur_egg_1" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(325deg);">
                </div>
            </div>
            <div id="lower_right_egg_line">
                <img id="chicken" src="images/chicken_96.png" alt="Курица">
                <img id="rail" src="images/rail.png" alt="Рельсы">
                <div id="lr_egg_rail">
                    <img id="lr_egg_5" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(45deg);">
                    <img id="lr_egg_4" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(125deg);">
                    <img id="lr_egg_3" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(225deg);">
                    <img id="lr_egg_2" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(285deg);">
                    <img id="lr_egg_1" src="images/egg_64.png" alt="Яйцо" style="visibility: hidden; transform: rotate(325deg);">
                </div>
            </div>
        </div>
    </div>
    <div id="info">
        <div id="score_view">
            <label>Счет: </label>
            <label id="score">0</label>
        </div>
        <div id="controls_view">
            <h3>Управление</h3>
            <p>
                R - перенос корзины на верхний левый угол<br>
                F - перенос корзины на нижний левый угол<br>
                I - перенос корзины на верхний правый угол<br>
                J - перенос корзины на нижний правый угол
            </p>
        </div>
    </div>
</body>


<script type = text/javascript src="jquery-3.6.0.min.js"></script>
<script type = text/javascript src="scriptGame.js"></script>
