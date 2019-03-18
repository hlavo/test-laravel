require('./bootstrap');
require('blueimp-gallery');

$(function(){
    var elements = document.getElementsByClassName('links')
        for(var a = 0; a < elements.length; a++){
            elements[a].onclick = function (event) {
                event.preventDefault();
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event},
                    links = this.getElementsByTagName('a');

                blueimp.Gallery(links, options);
            };

        }
})