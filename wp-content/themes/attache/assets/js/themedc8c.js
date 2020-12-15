/**
 *  Custom JS Scripts
 *
 * @package Attache
 */

/**
 *  Initialize FluidVids
 */
var fluidVids = (function () {

	'use strict';

	var pub = {}; // public facing functions

	pub.init = function() {

		fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});

		var postVid = document.querySelector('.fluidvids');
		var videoContainer = document.querySelector('.entry-media');
		if( !videoContainer ) {
			return;
		}
		if( postVid ) {
			var parentElem = postVid.parentNode;
			postVid.remove();
			if( parentElem.tagName === "P" ) {
				parentElem.remove();
			}
			videoContainer.insertBefore( postVid, videoContainer.firstChild );
		}
	};

	return pub;

}());

/**
 *  Initialize Isotope
 */
var isotopeGrid = (function ($) {

	'use strict';

	var pub = {}; // public facing functions

	pub.init = function() {
		var $container = $('.grid');
		$container.imagesLoaded( function() {
			$container.isotope({
				itemSelector: '.grid-item',
				masonry: {
					columnWidth: '.col-lg-4'
				}
			});

			$container.isotope({
				itemSelector: '.grid-item'
			});
		});

		if (typeof loadPagesData !== 'undefined') {
			$container.imagesLoaded( function() {
				$container.infinitescroll({
						navSelector  : '.page-numbers',
						nextSelector : '.next',
						itemSelector : '.grid-item',
						loading: {
							img: '',
							finishedMsg: '',
							msgText: '',
							msg: ''
						}
					},
					// call Isotope as a callback
					function( newElements ) {
						var $newElems = $( newElements ).hide();
						$newElems.imagesLoaded(function(){
							$container.isotope( 'appended', $newElems );
						});
						$container.isotope('reloadItems');
					});
			});
		}
	};

	return pub;

})( jQuery );

/**
 *  Menus and navigation
 */
var mobileMenu = (function ($) {

	'use strict';

	var pub = {}; // public facing functions

	pub.init = function() {
		var container, button, menu, menuToggle, menuContainer, links, subMenus, subMenuToggle, i, len;

		// Menu container
		container = document.getElementById( 'site-navigation' );
		if ( ! container ) {
			return;
		}

		// Menu button
		button = container.getElementsByTagName( 'button' )[0];
		if ( 'undefined' === typeof button ) {
			return;
		}

		// Menu ul elements
		menu = container.getElementsByTagName( 'ul' )[0];

		// Mobile menu toggle
		menuToggle = document.querySelector( '.site-mobile-toggle' );
		if ( ! menuToggle ) {
			return;
		}

		// Menu container
		menuContainer = $( '.site-navigation-wrapper' );
		if ( ! menuContainer ) {
			return;
		}

		// Sub menu button
		subMenuToggle = document.querySelectorAll( '.dropdown-toggle' );

		// Add 'active' class to menu toggle
		menuToggle.addEventListener('click', function() {
			this.classList.toggle('active');
			menuContainer.slideToggle();
		}, false);

		// Give menu container aria-expanded false to begin with
		container.setAttribute( 'aria-expanded', 'false' );

		menuToggle.addEventListener('click', function() {
			if ( -1 !== this.className.indexOf( 'active' ) ) {
				this.setAttribute( 'aria-expanded', 'true' );
				container.setAttribute( 'aria-expanded', 'true' );
			} else {
				this.setAttribute( 'aria-expanded', 'false' );
				container.setAttribute( 'aria-expanded', 'false' );
			}
		});

		// Hide menu toggle button if menu is empty and return early.
		if ( 'undefined' === typeof menu ) {
			button.style.display = 'none';
			return;
		}

		menu.setAttribute( 'aria-expanded', 'false' );
		if ( -1 === menu.className.indexOf( 'menu' ) ) {
			menu.className += ' menu';
		}

		button.onclick = function() {
			if ( -1 !== container.className.indexOf( 'toggled' ) ) {
				container.className = container.className.replace( ' toggled', '' );
				button.setAttribute( 'aria-expanded', 'false' );
				menu.setAttribute( 'aria-expanded', 'false' );
			} else {
				container.className += ' toggled';
				button.setAttribute( 'aria-expanded', 'true' );
				menu.setAttribute( 'aria-expanded', 'true' );
			}
		};

		// Get all the link elements within the menu.
		links    = menu.getElementsByTagName( 'a' );
		subMenus = menu.getElementsByTagName( 'ul' );

		// Set menu items with submenus to aria-haspopup="true".
		for ( i = 0, len = subMenus.length; i < len; i++ ) {
			subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
		}

		// Give sub-menu aria-expanded false to begin with
		$( '.sub-menu' ).attr( 'aria-expanded', 'false' );

		// Click event
		[].forEach.call(subMenuToggle, function (el) {
			el.addEventListener('click', function() {
				var toggleParent = this.parentNode;
				var dropdown = toggleParent.querySelector('.sub-menu');

				toggleParent.classList.toggle('opened');
				if ( -1 !== toggleParent.className.indexOf( 'opened' ) ) {
					$( 'svg title', $( this ) ).text( "Close Sub Menu" );
				} else {
					$( 'svg title', $( this ) ).text( "Open Sub Menu" );
				}

				if ( -1 !== toggleParent.className.indexOf( 'opened' ) ) {
					dropdown.setAttribute( 'aria-expanded', 'true' );
				} else {
					dropdown.setAttribute( 'aria-expanded', 'false' );
				}

			}, false);
		});

		// turn on selection sharing
		$('p').selectionSharer();

	};

	return pub;

})( jQuery );

 /**
 *  Initialize Functions
 */
( function() {

	fluidVids.init();
	isotopeGrid.init();
	mobileMenu.init();

})();
