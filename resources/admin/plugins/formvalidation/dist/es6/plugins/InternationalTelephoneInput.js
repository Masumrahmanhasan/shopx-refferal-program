import e from "../core/Plugin.js";export default class t extends e{constructor(e){super(e);this.intlTelInstances=new Map;this.countryChangeHandler=new Map;this.fieldElements=new Map;this.opts=Object.assign({},{autoPlaceholder:"polite",utilsScript:""},e);this.validatePhoneNumber=this.checkPhoneNumber.bind(this);this.fields=typeof this.opts.field==="string"?this.opts.field.split(","):this.opts.field}install(){this.core.registerValidator(t.INT_TEL_VALIDATOR,this.validatePhoneNumber);this.fields.forEach((e=>{this.core.addField(e,{validators:{[t.INT_TEL_VALIDATOR]:{message:this.opts.message}}});const s=this.core.getElements(e)[0];const i=()=>this.core.revalidateField(e);s.addEventListener("countrychange",i);this.countryChangeHandler.set(e,i);this.fieldElements.set(e,s);this.intlTelInstances.set(e,intlTelInput(s,this.opts))}))}uninstall(){this.fields.forEach((e=>{const s=this.countryChangeHandler.get(e);const i=this.fieldElements.get(e);const n=this.intlTelInstances.get(e);if(s&&i&&n){i.removeEventListener("countrychange",s);this.core.disableValidator(e,t.INT_TEL_VALIDATOR);n.destroy()}}))}checkPhoneNumber(){return{validate: e=>{const t=e.value;const s=this.intlTelInstances.get(e.field);if(t===""||!s){return{valid:true}}return{valid:s.isValidNumber()}}}}}t.INT_TEL_VALIDATOR="___InternationalTelephoneInputValidator";
