import t from "../../algorithms/luhn.js";export default function e(e){if(!/^\d{1,9}$/.test(e)){return{meta:{},valid:false}}return{meta:{},valid:t(e)}}
