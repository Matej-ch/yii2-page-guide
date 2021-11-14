document.addEventListener('DOMContentLoaded',() => {

    document.querySelector('body').addEventListener('click',e => {
        if(e.target.id === 'js-intro-guide') {
            e.preventDefault();
            startIntro();
        }
    });

    function startIntro() {
        const intro = introJs();
        intro.setOptions({
            steps: window.rules || []
        });

        intro.setOption("prevLabel", 'Späť');
        intro.setOption("nextLabel", 'Ďalej');
        intro.setOption("skipLabel", 'Preskočiť');
        intro.setOption("doneLabel",'Ukončiť');
        intro.start();
    }

    document.addEventListener("dragstart", function( event ) {
        // store a ref. on the dragged elem
        let dragged = event.target;
        onDragStart(event);
    }, false);

    document.addEventListener("dragend", function( event ) {
        // reset the transparency
        event.target.style.backgroundColor = "";
    }, false);

    function onDragStart(event) {
        event.dataTransfer.setData('id', event.target.id);
        event.target.style.backgroundColor = '#8db3f2';
    }

    var click = 1;

    document.querySelector('body').addEventListener('click',function(e) {
        if(e.target.id === 'js-goto-page') {
            e.preventDefault();
            if(document.getElementById('js-url-input') && document.getElementById('js-url-input').value !== '') {
                const url = new URL(document.getElementById('js-url-input').value);
                if(Array.from(url.searchParams).length) {
                    window.open(document.getElementById('js-url-input').value + '&guideCreator=1','_blank');
                } else {
                    window.open(document.getElementById('js-url-input').value + '?guideCreator=1','_blank');
                }
            }
        }
    });

    function addElement() {
        let tmpl = document.getElementById('element-input-template').content.cloneNode(true);
        tmpl.querySelector('.js-step').name = 'PageGuide[rules]['+click+'][step]';
        tmpl.querySelector('.js-step').value = click + 1;
        tmpl.querySelector('.js-element').name = 'PageGuide[rules]['+click+'][element]';
        tmpl.querySelector('.js-intro').name = 'PageGuide[rules]['+click+'][intro]';
        document.getElementById('js-el-container').appendChild(tmpl);
        click++;
    }

    /* events fired on the drop targets */
    document.addEventListener("dragover", function( event ) {
        // prevent default to allow drop
        event.preventDefault();
    }, false);

    document.addEventListener("dragenter", function( event ) {
        // highlight potential drop target when the draggable element enters it
        if (event.target.classList && event.target.classList.contains("js-dragzone")) {
            event.target.style.background = "#e83b3b";
        }
    }, false);

    document.addEventListener("dragleave", function( event ) {
        // reset background of potential drop target when the draggable element leaves it
        if (event.target.classList && event.target.classList.contains("js-dragzone")) {
            event.target.style.background = "";
        }
    }, false);

    document.addEventListener("drop", function( event ) {
        // prevent default action (open as link for some elements)
        event.preventDefault();
        // move dragged elem to the selected drop target
        if (event.target.classList && event.target.classList.contains("js-dragzone")) {
            event.target.style.background = "";
            onDrop(event);
        }

    }, false);

    function onDrop(event) {
        const id = event.dataTransfer.getData('id');
        const dropzone = event.target;
        dropzone.parentElement.querySelector('.js-element').value = "#" + id;
        addElement();
    }
});

