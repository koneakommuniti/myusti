const prev=document.querySelector('.button.prev');
const next=document.querySelector('.button.next');
const boxes=document.getElementsByClassName('box');
const toggle=document.getElementsByClassName('toggle-menu')[0];
const nav=document.getElementsByClassName('navbar')[0];
const slid=document.getElementsByClassName('slidee');
let ind=0;
let esti=0;

toggle.addEventListener('click',function(){ 
    nav.classList.toggle('slide');
});

document.addEventListener('click',function(e){
    if(!nav.contains(e.target) && !toggle.contains(e.target)){
        nav.classList.remove('slide');
    }
});

function slides(){
    for(let i=0; i < boxes.length; i++){
        boxes[i].style.transform = `translateX(-${ind * 100}%)`;
    }
}

function estimasi(){
    for(let i=0; i < slid.length; i++){
        slid[i].style.transform = `translateY(-${esti * 110}%)`;
    }
}

function nextlide(){
    ind++;
    if(ind >=boxes.length){
        ind=0;
    }
    slides(ind);
}

function prevslide(){
    ind--;
    if(ind < 0){
        ind=boxes.length-1;
    }
    slides(ind);
}

function autoslides() {
    ind++;
    if(ind >= boxes.length){
        ind=0;
    }
    slides(ind);
}

function estimasislides() {
    esti++;
    if(esti >= slid.length){
        esti=0;
    }
    estimasi(esti);
}


next.addEventListener('click',nextlide);
prev.addEventListener('click',prevslide);
setInterval(autoslides, 5000);
setInterval(estimasislides, 2000);