
			var camera, scene, renderer;

			var isUserInteracting = false,
				onMouseDownMouseX = 0, onMouseDownMouseY = 0,
				lon = 0, onMouseDownLon = 0,
				lat = 0, onMouseDownLat = 0,
				phi = 0, theta = 0;

			init();
			animate();

			function init() {

				var container, mesh;

				container = document.getElementById( 'homeContainer' );

				camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1100 );
				camera.target = new THREE.Vector3( 0, 0, 0 );

				scene = new THREE.Scene();

				var geometry = new THREE.SphereBufferGeometry( 500, 60, 40 );
				// invert the geometry on the x-axis so that all of the faces point inward
				geometry.scale( - 1, 1, 1 );

				var texture = new THREE.TextureLoader().load( 'images/360/view.png' );
				var material = new THREE.MeshBasicMaterial( { map: texture } );

				mesh = new THREE.Mesh( geometry, material );

				scene.add( mesh );

				renderer = new THREE.WebGLRenderer();
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );

				//document.addEventListener( 'mousedown', onPointerStart, false );
				//document.addEventListener( 'mousemove', onPointerMove, false );
				//document.addEventListener( 'mouseup', onPointerUp, false );

				//document.addEventListener( 'wheel', onDocumentMouseWheel, false );

				//document.addEventListener( 'touchstart', onPointerStart, false );
				//document.addEventListener( 'touchmove', onPointerMove, false );
				//document.addEventListener( 'touchend', onPointerUp, false );

				//

				document.addEventListener( 'dragover', function ( event ) {

					event.preventDefault();
					event.dataTransfer.dropEffect = 'copy';

				}, false );

				document.addEventListener( 'dragenter', function () {

					document.body.style.opacity = 0.5;

				}, false );

				document.addEventListener( 'dragleave', function () {

					document.body.style.opacity = 1;

				}, false );

				//

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			function onPointerStart( event ) {

				isUserInteracting = true;

				var clientX = event.clientX || event.touches[ 0 ].clientX;
				var clientY = event.clientY || event.touches[ 0 ].clientY;

				onMouseDownMouseX = clientX;
				onMouseDownMouseY = clientY;

				onMouseDownLon = lon;
				onMouseDownLat = lat;

			}

			function onPointerMove( event ) {

				if ( isUserInteracting === true ) {

					var clientX = event.clientX || event.touches[ 0 ].clientX;
					var clientY = event.clientY || event.touches[ 0 ].clientY;

					lon = ( onMouseDownMouseX - clientX ) * 0.1 + onMouseDownLon;
					lat = ( clientY - onMouseDownMouseY ) * 0.1 + onMouseDownLat;

				}

			}

			function onPointerUp() {

				isUserInteracting = false;

			}

			function onDocumentMouseWheel( event ) {

				var fov = camera.fov + event.deltaY * 0.05;

				camera.fov = THREE.Math.clamp( fov, 10, 75 );

				camera.updateProjectionMatrix();

			}

			function animate() {

				requestAnimationFrame( animate );
				update();

			}

			function update() {

				if ( isUserInteracting === false ) {

					lon += 0.1;

				}

				lat = Math.max( - 85, Math.min( 85, lat ) );
				phi = THREE.Math.degToRad( 90 - lat );
				theta = THREE.Math.degToRad( lon );

				camera.target.x = 500 * Math.sin( phi ) * Math.cos( theta );
				camera.target.y = 500 * Math.cos( phi );
				camera.target.z = 500 * Math.sin( phi ) * Math.sin( theta );

				camera.lookAt( camera.target );

				/*
				// distortion
				camera.position.copy( camera.target ).negate();
				*/

				renderer.render( scene, camera );

			}