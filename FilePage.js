let doc = document;
let header = doc.getElementById("filePageH");
let leftCorner = doc.getElementById("roundLCornerD");
let rightCorner = doc.getElementById("roundRCornerD");

let scrollVal = doc.body.scrollTop;

scrollThing = setInterval(scrollReach, 10);

function scrollReach(){
    scrollVal = doc.documentElement.scrollTop;
    if(scrollVal >= header.clientHeight - 100){
        leftCorner.style.height = header.clientHeight - scrollVal - 10 + "px";
        rightCorner.style.height = header.clientHeight - scrollVal - 10 + "px";
        leftCorner.style.transition = "opacity 200ms";
        rightCorner.style.transition = "opacity 200ms";
        leftCorner.style.opacity = header.clientHeight - scrollVal - 10;
        rightCorner.style.opacity = header.clientHeight - scrollVal - 10;
    } else {
        leftCorner.style.position = "fixed";
        rightCorner.style.position = "fixed";
        leftCorner.style.transition = "opacity 200ms";
        rightCorner.style.transition = "opacity 200ms";
        leftCorner.style.opacity = "1";
        rightCorner.style.opacity = "1";
        leftCorner.style.height = "50px";
        rightCorner.style.height = "50px";
    }
}