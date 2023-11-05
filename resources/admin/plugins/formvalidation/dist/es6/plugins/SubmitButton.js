import t from "../core/Plugin.js";export default class e extends t{constructor(t){super(t);this.isFormValid=false;this.opts=Object.assign({},{aspNetButton:false,buttons: t=>[].slice.call(t.querySelectorAll('[type="submit"]:not([formnovalidate])'))},t);this.submitHandler=this.handleSubmitEvent.bind(this);this.buttonClickHandler=this.handleClickEvent.bind(this)}install(){if(!(this.core.getFormElement()instanceof HTMLFormElement)){return}const t=this.core.getFormElement();this.submitButtons=this.opts.buttons(t);t.setAttribute("novalidate","novalidate");t.addEventListener("submit",this.submitHandler);this.hiddenClickedEle=document.createElement("input");this.hiddenClickedEle.setAttribute("type","hidden");t.appendChild(this.hiddenClickedEle);this.submitButtons.forEach((t=>{t.addEventListener("click",this.buttonClickHandler)}))}uninstall(){const t=this.core.getFormElement();if(t instanceof HTMLFormElement){t.removeEventListener("submit",this.submitHandler)}this.submitButtons.forEach((t=>{t.removeEventListener("click",this.buttonClickHandler)}));this.hiddenClickedEle.parentElement.removeChild(this.hiddenClickedEle)}handleSubmitEvent(t){this.validateForm(t)}handleClickEvent(t){const e=t.currentTarget;if(e instanceof HTMLElement){if(this.opts.aspNetButton&&this.isFormValid===true){}else{const e=this.core.getFormElement();e.removeEventListener("submit",this.submitHandler);this.clickedButton=t.target;const i=this.clickedButton.getAttribute("name");const s=this.clickedButton.getAttribute("value");if(i&&s){this.hiddenClickedEle.setAttribute("name",i);this.hiddenClickedEle.setAttribute("value",s)}this.validateForm(t)}}}validateForm(t){t.preventDefault();this.core.validate().then((t=>{if(t==="Valid"&&this.opts.aspNetButton&&!this.isFormValid&&this.clickedButton){this.isFormValid=true;this.clickedButton.removeEventListener("click",this.buttonClickHandler);this.clickedButton.click()}}))}}
