/*
 *
 * http://thenewcode.com/766/Create-A-Simple-FullScreen-Image-Gallery-Slideshow-With-JS-amp-CSS
 */

function fullScreen(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen();
    } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    }
}

window.onload = function () {
    var imgs = document.getElementById('slideshow').children,
        interval = 8000,
        currentPic = 0;

    imgs[currentPic].style.webkitAnimation = 'fadey ' + interval + 'ms';
    imgs[currentPic].style.animation = 'fadey ' + interval + 'ms';

    setInterval(function () {
        imgs[currentPic].removeAttribute('style');

        if (currentPic == imgs.length - 1) {
            currentPic = 0;
        } else {
            currentPic++;
        }
        imgs[currentPic].style.webkitAnimation = 'fadey ' + interval + 'ms';
        imgs[currentPic].style.animation = 'fadey ' + interval + 'ms';
    }, interval);
};