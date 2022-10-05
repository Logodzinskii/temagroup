$(document).ready(function(){
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    ctx.lineWidth = 1;
    ctx.translate(216, 265);
    ctx.moveTo(0, 0);
    ctx.lineTo(-40, 10);
    ctx.moveTo(172, 32);

    ctx.lineTo(120, 50);

    ctx.resetTransform();

    var img = document.getElementById("scream");
    ctx.drawImage(img, -100, 0, 700, 380);
    ctx.stroke();
})

