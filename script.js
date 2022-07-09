/*button-mod-element*/
let buttonModElement = document.querySelector('.button-mod-element');
let containerModifiedProduct = document.querySelector('.container-modified-product');
let closeWindow = document.querySelector('.close-window');
let isDown;
let offset;

buttonModElement.addEventListener('click',function(){

    containerModifiedProduct.classList.remove('cmp-hide');

});

closeWindow.addEventListener('click',function(){

    containerModifiedProduct.classList.add('cmp-hide');

});

containerModifiedProduct.addEventListener('mousedown', function(e) {
    isDown = true;
    offset = [
        containerModifiedProduct.offsetLeft - e.clientX,
        containerModifiedProduct.offsetTop - e.clientY
    ];
}, true);

document.addEventListener('mouseup', function() {
    isDown = false;
}, true);

document.addEventListener('mousemove', function(event) {
    event.preventDefault();
    if (isDown) {
        mousePosition = {

            x : event.clientX,
            y : event.clientY

        };
        containerModifiedProduct.style.left = (mousePosition.x + offset[0]) + 'px';
        containerModifiedProduct.style.top  = (mousePosition.y + offset[1]) + 'px';
    }
}, true);
