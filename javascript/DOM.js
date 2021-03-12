var header=document.querySelector("h1")
header
header.style.color='orange';

//random color- generating hexcode
function getrandomcolor()
{
    var letters="0123456789ABCDEF";
    var color="#";
    for(var i=0;i<6;i++)
    {
        color+=letters[Math.floor(Math.random()*16)];
    }
    return color
}

//change color
function changecolor()
{
    colorInput =getrandomcolor()
    header.style.color=colorInput;
}
setInterval("changecolor()",600);