var Scriptaculous={Version:"1.8.0",require:function(A){document.write('<script type="text/javascript" src="'+A+'"><\/script>')},REQUIRED_PROTOTYPE:"1.6.0",load:function(){function A(B){var C=B.split(".");return parseInt(C[0])*100000+parseInt(C[1])*1000+parseInt(C[2])}if((typeof Prototype=="undefined")||(typeof Element=="undefined")||(typeof Element.Methods=="undefined")||(A(Prototype.Version)<A(Scriptaculous.REQUIRED_PROTOTYPE))){throw ("script.aculo.us requires the Prototype JavaScript framework >= "+Scriptaculous.REQUIRED_PROTOTYPE)}$A(document.getElementsByTagName("script")).findAll(function(B){return(B.src&&B.src.match(/scriptaculous\.js(\?.*)?$/))}).each(function(C){var D=C.src.replace(/scriptaculous\.js(\?.*)?$/,"");var B=C.src.match(/\?.*load=([a-z,]*)/);(B?B[1]:"builder,effects,dragdrop,controls,slider,sound").split(",").each(function(E){Scriptaculous.require(D+E+".js")})})}};Scriptaculous.load();