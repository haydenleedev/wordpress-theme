// focusin/out event polyfill (firefox)
!function(){
	var w = window,
	d = w.document;

	if( w.onfocusin === undefined ){
		d.addEventListener('focus' ,addPolyfill ,true);
		d.addEventListener('blur' ,addPolyfill ,true);
		d.addEventListener('focusin' ,removePolyfill ,true);
		d.addEventListener('focusout' ,removePolyfill ,true);
	}
	function addPolyfill(e){
		var type = e.type === 'focus' ? 'focusin' : 'focusout';
		var event = new CustomEvent(type, { bubbles:true, cancelable:false });
		event.c1Generated = true;
		e.target.dispatchEvent( event );
	}
	function removePolyfill(e){
if(!e.c1Generated){ // focus after focusin, so chrome will the first time trigger tow times focusin
	d.removeEventListener('focus' ,addPolyfill ,true);
	d.removeEventListener('blur' ,addPolyfill ,true);
	d.removeEventListener('focusin' ,removePolyfill ,true);
	d.removeEventListener('focusout' ,removePolyfill ,true);
}
setTimeout(function(){
	d.removeEventListener('focusin' ,removePolyfill ,true);
	d.removeEventListener('focusout' ,removePolyfill ,true);
});
}
}();


var menuItems1 = document.querySelectorAll('#menu-header > li.menu-item-has-children');
var timer1, timer2;

Array.prototype.forEach.call(menuItems1, function(el, i){
		var activatingA = el.querySelector('a');
		var btn = '<button><span><span class="visuallyhidden">show submenu for “' + activatingA.text + '”</span></span></button>';
		activatingA.insertAdjacentHTML('afterend', btn);
		el.addEventListener("mouseover", function(event){
				this.classList.add("open");
				this.querySelector('a').setAttribute('aria-expanded', "true");
				this.querySelector('button').setAttribute('aria-expanded', "true");
				clearTimeout(timer1);
		});
		el.addEventListener("mouseout", function(event){
				//timer1 = setTimeout(function(event){
                    this.querySelector('a').setAttribute('aria-expanded', "false");
				this.querySelector('button').setAttribute('aria-expanded', "false");
						document.querySelector("#primary-nav .menu-item-has-children.open").classList.remove("open");
						document.querySelector('#primary-nav .menu-item-has-children.open a').setAttribute('aria-expanded', "false");
						document.querySelector('#primary-nav .menu-item-has-children.open button').setAttribute('aria-expanded', "false");
				//}, 1000);
		});
		el.querySelector('button').addEventListener("click",  function(event){
			if (this.parentNode.className == "menu-item-has-children") {
				this.parentNode.classList.add("open");
				this.parentNode.querySelector('a').setAttribute('aria-expanded', "true");
				this.parentNode.querySelector('button').setAttribute('aria-expanded', "true");
			} else {
				this.parentNode.classList.remove("open");
				this.parentNode.querySelector('a').setAttribute('aria-expanded', "false");
				this.parentNode.querySelector('button').setAttribute('aria-expanded', "false");
			}
			event.preventDefault();
		});

		var links = el.querySelectorAll('a');
		Array.prototype.forEach.call(links, function(el, i){
			el.addEventListener("focus", function() {
				if (timer2) {
					clearTimeout(timer2);
					timer2 = null;
				}
			});
			el.addEventListener("blur", function(event) {
				timer2 = setTimeout(function () {
					var opennav = document.querySelector("#primary-nav .menu-item-has-children.open")
					if (opennav) {
						opennav.classList.remove("open");
						opennav.querySelector('a').setAttribute('aria-expanded', "false");
						opennav.querySelector('button').setAttribute('aria-expanded', "false");
					}
				}, 10);
			});
		});
});