function stripeAllElements(){$$(".striped").each(stripeElement);}function stripeElement(_1){var _2=["rowEven","rowOdd"],e=[];if(_1.tagName=="TABLE"){_1.immediateDescendants().each(stripeElement);return;}else{e=_1.immediateDescendants();}e.each(function(c){c.removeClassName(_2[1]);c.addClassName(_2[0]);_2.reverse(true);});}document.observe("dom:loaded",stripeAllElements);