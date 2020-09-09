AFRAME.registerComponent('markerhandler1', {
	
	init: function(){
		var scene = this.el.sceneEl;
		var el = this.el;
		
		let btn =  document.getElementById('playVideo');
		
		let geometry = new THREE.PlaneBufferGeometry( 3, 2, 1, 1);
		let video = document.getElementById( 'video' );
		let texture = new THREE.VideoTexture( video );
		
		texture.minFilter = THREE.LinearFilter;
		texture.magFilter = THREE.LinearFilter;
		texture.format = THREE.RGBFormat;
		let material = new THREE.MeshBasicMaterial( { map: texture } );
	
		let mesh = new THREE.Mesh( geometry, material );
		
		/* to get el children use this */
		el.object3D.children[0].el.setObject3D('mesh', mesh);
		
		el.setAttribute('emitevents', 'true');
 
		el.addEventListener('markerFound', function() {
			document.getElementById('videoPrompt').classList.add('hidden');
			//document.querySelector('#marker').setAttribute('visible',true);
			btn.classList.remove('hidden');
			btn.addEventListener('click', function(){
				btn.classList.add('hidden');
				video.play();
			});
			});
		
		el.addEventListener('markerLost', function() {
			document.getElementById('videoPrompt').classList.remove('hidden');	
			btn.classList.add('hidden');
			video.pause();	
		});
	
	}
 });
 


//working magic for stability
 document.addEventListener('DOMContentLoaded', function(evt) {

    var sceneEl = document.querySelector('a-scene');

    sceneEl.addEventListener('loaded', function(evt) {
		
		setTimeout(function(){
		document.getElementById('loader').style.display = "none";
		document.getElementById('videoPrompt').classList.remove('hidden');
		},1000);
		
		sceneEl.renderer.shadowMap.enabled = true;
		sceneEl.renderer.gammaOutput= true;
		sceneEl.renderer.gammaInput= true;
		sceneEl.renderer.antialias = true;
		sceneEl.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
		sceneEl.renderer.outputEncoding = THREE.Linear;
    });
});
