import e from "../utils/classSet.js";import t from "../utils/hasClass.js";import n from "./Framework.js";export default class s extends n{constructor(e){super(Object.assign({},{formClass:"fv-plugins-semantic",messageClass:"ui pointing red label",rowInvalidClass:"error",rowPattern:/^.*(field|column).*$/,rowSelector:".fields",rowValidClass:"fv-has-success"},e))}onIconPlaced(t){const n=t.element.getAttribute("type");if("checkbox"===n||"radio"===n){const n=t.element.parentElement;e(t.iconElement,{"fv-plugins-icon-check":true});n.parentElement.insertBefore(t.iconElement,n.nextSibling)}}onMessagePlaced(e){const n=e.element.getAttribute("type");const s=e.elements.length;if(("checkbox"===n||"radio"===n)&&s>1){const l=e.elements[s-1];const o=l.parentElement;if(t(o,n)&&t(o,"ui")){o.parentElement.insertBefore(e.messageElement,o.nextSibling)}}}}
