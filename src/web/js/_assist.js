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
        console.log(event.target.id);
        event.target.style.backgroundColor = '#8db3f2';
    }
});

