import e from "../utils/fetch.js";export default function a(){const a={crossDomain:false,data:{},headers:{},method:"GET",validKey:"valid"};return{validate(t){if(t.value===""){return Promise.resolve({valid:true})}const s=Object.assign({},a,t.options);let r=s.data;if("function"===typeof s.data){r=s.data.call(this,t)}if("string"===typeof r){r=JSON.parse(r)}r[s.name||t.field]=t.value;const o="function"===typeof s.url?s.url.call(this,t):s.url;return e(o,{crossDomain:s.crossDomain,headers:s.headers,method:s.method,params:r}).then((e=>Promise.resolve({message:e["message"],meta:e,valid:`${e[s.validKey]}`==="true"}))).catch((e=>Promise.reject({valid:false})))}}}
