var ToolTips={current:null,timeout:null,element:null,attachBehavior:function(){links=document.getElementsByTagName("a");for(var A=0;A<links.length;A++){if(links[A].title){links[A].setAttribute("nicetitle",links[A].title);links[A].removeAttribute("title");addEvent(links[A],"mouseover",ToolTips.onMouseover);addEvent(links[A],"mouseout",ToolTips.out);addEvent(links[A],"focus",ToolTips.onFocus);addEvent(links[A],"blur",ToolTips.out)}}},onMouseover:function(A){if(typeof ToolTips=="undefined"){return }if(ToolTips.timeout){clearTimeout(ToolTips.timeout)}if(A.srcElement){ToolTips.element=A.srcElement}else{if(A.target){ToolTips.element=A.target}}var B=mousePos(A);ToolTips.timeout=setTimeout(function(){ToolTips.show(B)},300)},onFocus:function(A){if(typeof ToolTips=="undefined"){return }if(ToolTips.timeout){clearTimeout(ToolTips.timeout)}if(A.srcElement){ToolTips.element=A.srcElement}else{if(A.target){ToolTips.element=A.target}}var B=eltPos(ToolTips.element);ToolTips.timeout=setTimeout(function(){ToolTips.show(B)},300)},out:function(){if(typeof ToolTips=="undefined"){return }if(ToolTips.timeout){clearTimeout(ToolTips.timeout)}if(ToolTips.current){document.getElementsByTagName("body")[0].removeChild(ToolTips.current);ToolTips.current=null;var A=document.getElementById("iframe_tt");if(A!=null){A.style.display="none"}}},show:function(M){try{if(ToolTips.current){ToolTips.out()}var N=ToolTips.element;while(!N.getAttribute("nicetitle")&&N.nodeName.toLowerCase()!="body"){N=N.parentNode}var A=N.getAttribute("nicetitle");if(!A){return }var K=document.createElement("div");K.className="nicetitle";K.innerHTML=A;var J=100;var E=600;if(window.innerWidth){E=Math.min(E,window.innerWidth-20)}if(document.body&&document.body.scrollWidth){E=Math.min(E,document.body.scrollWidth-20)}var B=0;var Q=A.replace(/<br ?\/>/g,"\n").split("\n");for(var H=0;H<Q.length;++H){B=Math.max(B,Q[H].length)}var D=B*7;var P=B*10;var O;if(D>J){O=D}else{if(J>P){O=P}else{O=J}}var C=M[0]+20,L=window.innerWidth||document.documentElement.clientWidth||document.body.offsetWidth,F=window.pageXOffset||document.documentElement.scrollLeft;if(L&&((C+O)>(L+F))){C=L-O-40+F}if(document.body.scrollWidth&&((C+O)>(document.body.scrollWidth+F))){C=document.body.scrollWidth-O-25+F}K.id="toolTip";K.style.left=C+"px";K.style.width=Math.min(O,E)+"px";K.style.top=(M[1]+10)+"px";K.style.display="";document.getElementsByTagName("body")[0].appendChild(K);ToolTips.current=K;if(typeof ToolTips_Option_Windowed_Controls!="undefined"){var G=document.getElementById("iframe_tt");if(G==null){G=document.createElement('<iframe src="javascript:false;" name="iframe_tt" id="iframe_tt" scrolling="no" frameborder="0" style="position:absolute;top:0;left:0;display:none"></iframe>');document.getElementsByTagName("body")[0].appendChild(G)}G.style.width=K.offsetWidth;G.style.height=K.offsetHeight;G.style.top=K.style.top;G.style.left=K.style.left;G.style.position="absolute";G.style.display="block";K.style.zIndex=100;G.style.zIndex=99}}catch(I){}}};function mousePos(A){return[A.pageX||(A.clientX+(document.documentElement.scrollLeft||document.body.scrollLeft)),A.pageY||(A.clientY+(document.documentElement.scrollTop||document.body.scrollTop))]}function eltPos(A){if(A.offsetParent){for(posX=0,posY=0;A.offsetParent;A=A.offsetParent){posX+=A.offsetLeft;posY+=A.offsetTop}return[posX,posY]}else{return[A.x,A.y]}}function addEvent(D,C,A){if(D.addEventListener){D.addEventListener(C,A,true);return true}else{if(D.attachEvent){var B=D.attachEvent("on"+C,A);EventCache.add(D,C,A);return B}else{return false}}}var EventCache=function(){var A=[];return{listEvents:A,add:function(C,E,D,B){A.push(arguments)},flush:function(){var B,C;for(B=A.length-1;B>=0;B=B-1){C=A[B];if(C[0].removeEventListener){C[0].removeEventListener(C[1],C[2],C[3])}if(C[1].substring(0,2)!="on"){C[1]="on"+C[1]}if(C[0].detachEvent){C[0].detachEvent(C[1],C[2])}C[0][C[1]]=null}}}}();if(document.createElement&&document.getElementsByTagName){addEvent(window,"load",ToolTips.attachBehavior);addEvent(window,"unload",ToolTips.out);addEvent(window,"unload",EventCache.flush)};