import t from "../core/Plugin.js";import e from "../utils/classSet.js";export default class i extends t{constructor(t){super(t);this.messages=new Map;this.opts=Object.assign({},{placement:"top",trigger:"click"},t);this.iconPlacedHandler=this.onIconPlaced.bind(this);this.validatorValidatedHandler=this.onValidatorValidated.bind(this);this.elementValidatedHandler=this.onElementValidated.bind(this);this.documentClickHandler=this.onDocumentClicked.bind(this)}install(){this.tip=document.createElement("div");e(this.tip,{"fv-plugins-tooltip":true,[`fv-plugins-tooltip--${this.opts.placement}`]:true});document.body.appendChild(this.tip);this.core.on("plugins.icon.placed",this.iconPlacedHandler).on("core.validator.validated",this.validatorValidatedHandler).on("core.element.validated",this.elementValidatedHandler);if("click"===this.opts.trigger){document.addEventListener("click",this.documentClickHandler)}}uninstall(){this.messages.clear();document.body.removeChild(this.tip);this.core.off("plugins.icon.placed",this.iconPlacedHandler).off("core.validator.validated",this.validatorValidatedHandler).off("core.element.validated",this.elementValidatedHandler);if("click"===this.opts.trigger){document.removeEventListener("click",this.documentClickHandler)}}onIconPlaced(t){e(t.iconElement,{"fv-plugins-tooltip-icon":true});switch(this.opts.trigger){case"hover":t.iconElement.addEventListener("mouseenter",(e=>this.show(t.element,e)));t.iconElement.addEventListener("mouseleave",(t=>this.hide()));break;case"click":default:t.iconElement.addEventListener("click",(e=>this.show(t.element,e)));break}}onValidatorValidated(t){if(!t.result.valid){const e=t.elements;const i=t.element.getAttribute("type");const s="radio"===i||"checkbox"===i?e[0]:t.element;const o=typeof t.result.message==="string"?t.result.message:t.result.message[this.core.getLocale()];this.messages.set(s,o)}}onElementValidated(t){if(t.valid){const e=t.elements;const i=t.element.getAttribute("type");const s="radio"===i||"checkbox"===i?e[0]:t.element;this.messages.delete(s)}}onDocumentClicked(t){this.hide()}show(t, i){i.preventDefault();i.stopPropagation();if(!this.messages.has(t)){return}e(this.tip,{"fv-plugins-tooltip--hide":false});this.tip.innerHTML=`<div class="fv-plugins-tooltip__content">${this.messages.get(t)}</div>`;const s=i.target;const o=s.getBoundingClientRect();const{height:l,width:n}=this.tip.getBoundingClientRect();let a=0;let d=0;switch(this.opts.placement){case"bottom":a=o.top+o.height;d=o.left+o.width/2-n/2;break;case"bottom-left":a=o.top+o.height;d=o.left;break;case"bottom-right":a=o.top+o.height;d=o.left+o.width-n;break;case"left":a=o.top+o.height/2-l/2;d=o.left-n;break;case"right":a=o.top+o.height/2-l/2;d=o.left+o.width;break;case"top-left":a=o.top-l;d=o.left;break;case"top-right":a=o.top-l;d=o.left+o.width-n;break;case"top":default:a=o.top-l;d=o.left+o.width/2-n/2;break}const c=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0;const r=window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft||0;a=a+c;d=d+r;this.tip.setAttribute("style",`top: ${a}px; left: ${d}px`)}hide(){e(this.tip,{"fv-plugins-tooltip--hide":true})}}