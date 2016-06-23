// grab an element
var myElement = document.querySelector("header");
// construct an instance of Headroom, passing the element
var headroom = new Headroom(myElement, {
  "offset": 205,
  "tolerance": 5,
  "classes": {
	"pinned": "bounceInDown",
	"unpinned": "bounceOutUp"
  }
});
headroom.init();

// to destroy
headroom.destroy();

( function( $ ) {
	$('.menu-toggle').sidr({
		timing: 'ease-in-out',
		speed: 150,
		side: 'left',
		renaming: false,
		source: '.main-navigation'
	 });

	$( window ).resize(function () {
	  $.sidr('close', 'sidr');
	});


	//add arrows for nav menu with children
	$( ".sidr .menu-item-has-children" ).append( $( "<span class='genericon genericon-expand'></span>" ) );

	$('body').on('click', '.sidr-inner span.genericon', function(event) {
		event.preventDefault();
		/* Act on the event */
		$( event.target ).closest('li').children('ul.sub-menu').toggleClass('open-submenu');
	});

} )( jQuery );
