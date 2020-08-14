document.addEventListener('DOMContentLoaded', function(){
    if(!VLM_DATA) {
        return;
    }
    const selector = VLM_DATA.selector;
    const element = document.querySelector(selector);
    element.style.overflow = 'hidden';
    element.style.height = '0px';

    window.YT.ready(function() {
        var player;
        player = new YT.Player('player', {
            events: {
                'onStateChange': onPlayerStateChange
            },
        });
    });

    function onPlayerStateChange(event) {
        if(event.data === 0) {
            const element = document.querySelector(selector);
            if(!element) {
                return;
            }
            element.style.transition = '0.8s';
            element.style.overflow = 'unset';
            element.style.height = '100%';
        }
    }

}, false);
