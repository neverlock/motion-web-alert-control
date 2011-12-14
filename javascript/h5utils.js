function cancel(e) {
  if (e.preventDefault) {
    e.preventDefault();
  }
  return false;
}

var addEvent = (function () {
  if (document.addEventListener) {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.addEventListener(type, fn, false);
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  } else {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.attachEvent('on' + type, function () { return fn.call(el, window.event); });
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  }
})();

(function () {

var pre = document.createElement('pre');
pre.id = "view-source"

/*// private scope to avoid conflicts with demos*/
addEvent(window, 'click', function (event) {
  if (event.target.hash == '#view-source') {
    // event.preventDefault();
    if (!document.getElementById('view-source')) {
      /*// pre.innerHTML = ('<!DOCTYPE html>\n<html>\n' + document.documentElement.innerHTML + '\n</html>').replace(/[<>]/g, function (m) { return {'<':'&lt;','>':'&gt;'}[m]});*/
      var xhr = new XMLHttpRequest();

      /*// original source - rather than rendered source*/
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          pre.innerHTML = this.responseText.replace(/[<>]/g, function (m) { return {'<':'&lt;','>':'&gt;'}[m]});
          prettyPrint();
        }
      };

      document.body.appendChild(pre);
      /*// really need to be sync? - I like to think so*/
      xhr.open("GET", window.location, true);
      xhr.send();
    }
    document.body.className = 'view-source';
    
    var sourceTimer = setInterval(function () {
      if (window.location.hash != '#view-source') {
        clearInterval(sourceTimer);
        document.body.className = '';
      }
    }, 200);
  }
});
  
})();

function init_drag(el){
  var el = document.querySelector(el);
  addEvent(el, 'dragover', cancel); 
  addEvent(el, 'dragenter', cancel);
  addEvent(el, 'drop', function (e) {
    if (e.preventDefault) e.preventDefault(); var str = e.dataTransfer.getData('URL');
    if(str.substring(0,7) == "camera:"){ this.innerHTML = 
      '<img width="'+$(this).width()+'" height="'+$(this).height()+'" src="' + str.substring(7) + '">'; }
    return false;
  });
}

function init_1ch(){
  new init_drag('#c1-1');
}

function init_3ch(){
  new init_drag('#c3-1'); new init_drag('#c3-2');
  new init_drag('#c3-3');
}

function init_4ch(){
  new init_drag('#c4-1'); new init_drag('#c4-2');
  new init_drag('#c4-3'); new init_drag('#c4-4');
}

function init_6ch(){
  new init_drag('#c6-1'); new init_drag('#c6-2');
  new init_drag('#c6-3'); new init_drag('#c6-4');
  new init_drag('#c6-5'); new init_drag('#c6-6');
}

function init_9ch(){
  new init_drag('#c9-1'); new init_drag('#c9-2'); new init_drag('#c9-3');
  new init_drag('#c9-4'); new init_drag('#c9-5'); new init_drag('#c9-6');
  new init_drag('#c9-7'); new init_drag('#c9-8'); new init_drag('#c9-9');
}

function init_16ch(){
  new init_drag('#c16-1'); new init_drag('#c16-2'); new init_drag('#c16-3'); new init_drag('#c16-4');
  new init_drag('#c16-5'); new init_drag('#c16-6'); new init_drag('#c16-7'); new init_drag('#c16-8');
  new init_drag('#c16-9'); new init_drag('#c16-10'); new init_drag('#c16-11'); new init_drag('#c16-12');
  new init_drag('#c16-13'); new init_drag('#c16-14'); new init_drag('#c16-15'); new init_drag('#c16-16');
}

function init_10ch(){
  new init_drag('#c10-1'); new init_drag('#c10-2');
  new init_drag('#c10-3'); new init_drag('#c10-4');
  new init_drag('#c10-5'); new init_drag('#c10-6');
  new init_drag('#c10-7'); new init_drag('#c10-8');
  new init_drag('#c10-9'); new init_drag('#c10-10');
}

function init_25ch(){
  new init_drag('#c25-1'); new init_drag('#c25-2'); new init_drag('#c25-3'); new init_drag('#c25-4'); new init_drag('#c25-5'); 
  new init_drag('#c25-6'); new init_drag('#c25-7'); new init_drag('#c25-8'); new init_drag('#c25-9'); new init_drag('#c25-10'); 
  new init_drag('#c25-11'); new init_drag('#c25-12'); new init_drag('#c25-13'); new init_drag('#c25-14'); new init_drag('#c25-15'); 
  new init_drag('#c25-16'); new init_drag('#c25-17'); new init_drag('#c25-18'); new init_drag('#c25-19'); new init_drag('#c25-20'); 
  new init_drag('#c25-21'); new init_drag('#c25-22'); new init_drag('#c25-23'); new init_drag('#c25-24'); new init_drag('#c25-25'); 
}
