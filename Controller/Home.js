let popup = document.getElementById("popup");
let isShow = 0;

function show(){
    switch(isShow){
        case 0:
            popup.style.display = "none";
            isShow++;
            break;
        case 1:
            popup.style.display = "block";
            isShow--;
            break;
        default:
            popup.style.display = "none";
            isShow++;
            break;
    }
}