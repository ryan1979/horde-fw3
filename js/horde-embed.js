var Horde_ToolTips={attachBehavior:function(B){var A=B;$(A).select("a").each(function(C){Horde_ToolTips.attach(C)}.bind(Horde_ToolTips))},attach:function(B){var A=B.getAttribute("title");if(!A){return}B.setAttribute("nicetitle",A);B.removeAttribute("title");Event.observe(B,"mouseover",this.onMouseover.bindAsEventListener(this));Event.observe(B,"mouseout",this.out.bind(this));Event.observe(B,"focus",this.onFocus.bindAsEventListener(this));Event.observe(B,"blur",this.out.bind(this))},onMouseover:function(A){this.onOver(A,[Event.pointerX(A),Event.pointerY(A)])},onFocus:function(A){this.onOver(A,Position.cumulativeOffset(Event.element(A)))},onOver:function(B,A){if(this.timeout){clearTimeout(this.timeout)}this.element=Event.element(B);this.timeout=setTimeout(function(){this.show(A)}.bind(this),300)},out:function(){if(this.timeout){clearTimeout(this.timeout)}if(this.current){this.current.remove();this.current=null;var A=$("iframe_tt");if(A){A.hide()}}},show:function(K){try{if(this.current){this.out()}var L=this.element;while(!L.getAttribute("nicetitle")&&L.nodeName.toLowerCase()!="body"){L=L.parentNode}var A=L.getAttribute("nicetitle");if(!A){return}var I=$(document.createElement("DIV"));I.id="horde_toolTip";I.addClassName("horde_nicetitle");I.update(A);var H=100,E=600;if(window.innerWidth){E=Math.min(E,window.innerWidth-20)}if(document.body&&document.body.scrollWidth){E=Math.min(E,document.body.scrollWidth-20)}var B=0;A.replace(/<br ?\/>/g,"\n").split("\n").each(function(O){B=Math.max(B,O.stripTags().length)});var D=B*7,N=B*10,M;if(D>H){M=D}else{if(H>N){M=N}else{M=H}}var C=K[0]+20,J=window.innerWidth||document.documentElement.clientWidth||document.body.offsetWidth,F=window.pageXOffset||document.documentElement.scrollLeft;if(J&&((C+M)>(J+F))){C=J-M-40+F}if(document.body.scrollWidth&&((C+M)>(document.body.scrollWidth+F))){C=document.body.scrollWidth-M-25+F}I.setStyle({left:Math.max(C,5)+"px",width:Math.min(M,E)+"px",top:(K[1]+10)+"px"});I.show();document.body.appendChild(I);this.current=I}catch(G){}}};