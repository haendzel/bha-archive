let accordion = document.getElementsByClassName('accordion-tab');
let panel = document.getElementsByClassName('accordion-panel');

for (let i = 0; i < accordion.length; i++) {
    accordion[i].onclick = function() {
        var setClasses = !this.classList.contains('is-active');
        setClass(accordion, 'is-active', 'remove');
        setClass(panel, 'is-expanded', 'remove');
        setClass(panel, 'is-opened', 'remove');

        if (setClasses) {
            this.classList.toggle('is-active');

            if (this.previousElementSibling != null && !undefined) {
            this.previousElementSibling.classList.toggle('is-expanded');
            } 

            if (this.nextElementSibling != null && !undefined) {
                this.nextElementSibling.classList.toggle('is-opened');
            } 

        }
    }
}


function setClass(els, className, fnName) {
    for (let i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}