
/* drop down container java from https://www.sitepoint.com/community/t/show-one-div-hide-another-on-click/195829/11 -*/
(function() {
"use strict";
var className = "active";
var tabcontent = ".tabcontent";
var tabs = ".tabs";

function init() {
    if (document.getElementById && document.createTextNode) {
        var tabtrigger = document.getElementById('tabs').getElementsByTagName('a');
        for (var i = 0; i < tabtrigger.length; i++) {
            addClicks(tabtrigger, i);
        }
    }
}

function addClicks(tabtrigger, i) {
    tabtrigger[i].onclick = function() {
        show(tabtrigger[i]);
        return false;
    };
}

function show(l) {
    hideTabs(tabcontent);
    hideTabs(tabs);
    var id = l.href.match(/#(\w.+)/)[1];
    var el = document.getElementById(id);
    addClassname(el, className);
    addClassname(l, className);
}

function hideTabs(tabcontent) {
    var tabContent = document.querySelectorAll(tabcontent);
    for (var i = 0; i < tabContent.length; i++) {
        removeClassname(tabContent[i], className);
    }
}

function addClassname(el, className) {
    if (el.classList) {
        el.classList.add(className);
    } else {
        el.className += ' ' + className;
    }
}

function removeClassname(el, className) {
    if (el.classList) {
        el.classList.remove(className);
    } else {
        el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }
}

init();
})();

var dropdown = document.getElementsByClassName("slide-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
}
