import e from "../utils/format.js";export default function s(){return{validate(s){if(s.value===""){return{valid:true}}const A=Object.assign({},{message:""},s.options);const i={3:/^[0-9A-F]{8}-[0-9A-F]{4}-3[0-9A-F]{3}-[0-9A-F]{4}-[0-9A-F]{12}$/i,4:/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i,5:/^[0-9A-F]{8}-[0-9A-F]{4}-5[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i,all:/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i};const n=A.version?`${A.version}`:"all";return{message:A.version?e(s.l10n?A.message||s.l10n.uuid.version:A.message,A.version):s.l10n?s.l10n.uuid.default:A.message,valid:null===i[n]?true:i[n].test(s.value)}}}}
