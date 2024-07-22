"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[653,178],{5907:(e,t,r)=>{r.d(t,{Z:()=>y});var a=r(821),n=r(4112),o=["id"],l={class:"relative w-full max-w-md max-h-full"},c={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},s=[(0,a.createElementVNode)("svg",{class:"w-3 h-3","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[(0,a.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),(0,a.createElementVNode)("span",{class:"sr-only"},"Close modal",-1)],i={class:"p-6 text-center"},d=(0,a.createElementVNode)("svg",{class:"mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},[(0,a.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"})],-1),u={class:"mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"},m={key:0,class:"flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400",role:"alert"},g=(0,a.createElementVNode)("svg",{class:"flex-shrink-0 inline w-4 h-4 me-3","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"currentColor",viewBox:"0 0 20 20"},[(0,a.createElementVNode)("path",{d:"M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"})],-1),p=(0,a.createElementVNode)("span",{class:"sr-only"},"Info",-1),f=(0,a.createElementVNode)("span",{class:"font-medium"},"Error!",-1);const y={__name:"AlertModal",props:{modelValue:{required:!0,type:Boolean,default:!1},message:{default:"Are you sure you want to delete this?",type:String},idModal:{required:!0,type:String},errorMessage:{required:!1,type:String},showErrorMessage:{default:!1,type:Boolean}},emits:["close","accept"],setup:function(e,t){var r=t.emit,y=e,v=r,b=function(){v("close",!1)},k=function(){v("accept",!0)};return(0,a.watch)((function(){return y.modelValue}),(function(e){var t=document.getElementById(y.idModal),r=new n.u_(t,{backdrop:"static"});e?r.show():r.hide()})),function(t,r){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{id:e.idModal,tabindex:"-1","aria-hidden":"true","data-modal-backdrop":"static",class:"fixed top-0 left-0 right-0 z-60 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full transition-opacity duration-300"},[(0,a.createElementVNode)("div",l,[(0,a.createElementVNode)("div",c,[(0,a.createElementVNode)("button",{onClick:r[0]||(r[0]=function(e){return b()}),type:"button",class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"},s),(0,a.createElementVNode)("div",i,[d,(0,a.createElementVNode)("h3",u,(0,a.toDisplayString)(e.message),1),e.showErrorMessage?((0,a.openBlock)(),(0,a.createElementBlock)("div",m,[g,p,(0,a.createElementVNode)("div",null,[f,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(e.errorMessage),1)])])):(0,a.createCommentVNode)("",!0),(0,a.createElementVNode)("button",{onClick:k,type:"button",class:"text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 gree dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"}," Aceptar "),(0,a.createElementVNode)("button",{onClick:r[1]||(r[1]=function(e){return b()}),type:"button",class:"text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"}," Cancelar ")])])])],8,o)}}}},8200:(e,t,r)=>{r.d(t,{Z:()=>c});var a=r(821),n={class:"flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800",role:"alert"},o=(0,a.createElementVNode)("svg",{class:"flex-shrink-0 w-4 h-4","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"currentColor",viewBox:"0 0 20 20"},[(0,a.createElementVNode)("path",{d:"M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"})],-1),l={class:"ms-3 text-sm font-medium"};const c={__name:"AlertSuccess",props:{message:{required:!0,type:String}},setup:function(e){return function(t,r){return(0,a.openBlock)(),(0,a.createElementBlock)("div",n,[o,(0,a.createElementVNode)("div",l,(0,a.toDisplayString)(e.message),1)])}}}},4078:(e,t,r)=>{r.d(t,{Z:()=>o});var a=r(821),n=["type"];const o={__name:"Button",props:{type:{type:String,default:"submit"},disabled:{type:Boolean,default:!1},classes:{type:String},colors:{type:String,default:"bg-blue-500 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"}},setup:function(e){return function(t,r){return e.disabled?((0,a.openBlock)(),(0,a.createElementBlock)("button",{key:1,type:"button",class:(0,a.normalizeClass)(["text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center",e.classes]),disabled:""},[(0,a.renderSlot)(t.$slots,"default")],2)):((0,a.openBlock)(),(0,a.createElementBlock)("button",{key:0,type:e.type,class:(0,a.normalizeClass)([[e.colors,e.classes],"text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition ease-in-out duration-150"])},[(0,a.renderSlot)(t.$slots,"default")],10,n))}}}},2187:(e,t,r)=>{r.d(t,{Z:()=>c});var a=r(821),n={class:"px-4 sm:px-2"},o={class:"font-semibold text-xl text-gray-800 leading-tight bg-gray-50"},l={class:"text-sm mt-2"};const c={__name:"Header",props:["title"],setup:function(e){return function(t,r){return(0,a.openBlock)(),(0,a.createElementBlock)("div",n,[(0,a.createElementVNode)("h2",o,(0,a.toDisplayString)(e.title),1),(0,a.createElementVNode)("div",l,[(0,a.renderSlot)(t.$slots,"default")])])}}}},4508:(e,t,r)=>{r.d(t,{Z:()=>c});var a=r(821),n={role:"status"},o=[(0,a.createElementVNode)("path",{d:"M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z",fill:"currentColor"},null,-1),(0,a.createElementVNode)("path",{d:"M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z",fill:"currentFill"},null,-1)],l=(0,a.createElementVNode)("span",{class:"sr-only"},"Loading...",-1);const c={__name:"LoadingSpinner",props:["classes"],setup:function(e){return function(t,r){return(0,a.openBlock)(),(0,a.createElementBlock)("div",n,[((0,a.openBlock)(),(0,a.createElementBlock)("svg",{"aria-hidden":"true",class:(0,a.normalizeClass)(["inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600",e.classes]),viewBox:"0 0 100 101",fill:"none",xmlns:"http://www.w3.org/2000/svg"},o,2)),l])}}}},6078:(e,t,r)=>{r.d(t,{Z:()=>i});var a=r(821),n=r(4112),o={id:"modalContent",tabindex:"-1","aria-hidden":"true","data-modal-backdrop":"static",class:"fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"},l={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},c=[(0,a.createElementVNode)("svg",{class:"w-3 h-3","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[(0,a.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),(0,a.createElementVNode)("span",{class:"sr-only"},"Close modal",-1)],s={class:"px-6 py-6 lg:px-8"};const i={__name:"Modal",props:{modelValue:{required:!0,type:Boolean,default:!1},classes:{type:String,default:"max-w-lg"}},emits:["close"],setup:function(e,t){var r=t.emit,i=e,d=r;return(0,a.watch)((function(){return i.modelValue}),(function(e){var t=document.getElementById("modalContent"),r=new n.u_(t,{backdrop:"static"});e?r.show():r.hide()})),function(t,r){return(0,a.openBlock)(),(0,a.createElementBlock)("div",o,[(0,a.createElementVNode)("div",{class:(0,a.normalizeClass)(["relative w-full max-h-full",e.classes])},[(0,a.createElementVNode)("div",l,[(0,a.createElementVNode)("button",{onClick:r[0]||(r[0]=function(e){d("close",!1)}),type:"button",class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"},c),(0,a.createElementVNode)("div",s,[(0,a.renderSlot)(t.$slots,"default")])])],2)])}}}},2148:(e,t,r)=>{r.d(t,{Z:()=>c});var a=r(821),n={key:0,class:"bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300"},o={key:1,class:"bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"},l={key:2,class:"bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"};const c={__name:"Status",props:{status:{type:Object,required:!0}},setup:function(e){return function(t,r){return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[1==e.status.id?((0,a.openBlock)(),(0,a.createElementBlock)("span",n,(0,a.toDisplayString)(e.status.name),1)):(0,a.createCommentVNode)("",!0),2==e.status.id?((0,a.openBlock)(),(0,a.createElementBlock)("span",o,(0,a.toDisplayString)(e.status.name),1)):(0,a.createCommentVNode)("",!0),3==e.status.id?((0,a.openBlock)(),(0,a.createElementBlock)("span",l,(0,a.toDisplayString)(e.status.name),1)):(0,a.createCommentVNode)("",!0)],64)}}}},6653:(e,t,r)=>{r.r(t),r.d(t,{default:()=>we});var a=r(821),n=r(2187),o=r(2148),l=r(6078),c=r(4508),s=r(4078),i=r(5907),d=r(8200),u=r(3178),m=r(9038),g=r(9285);function p(e){return p="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},p(e)}function f(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,a)}return r}function y(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?f(Object(r),!0).forEach((function(t){v(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function v(e,t,r){var a;return a=function(e,t){if("object"!=p(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var a=r.call(e,t||"default");if("object"!=p(a))return a;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(t,"string"),(t="symbol"==p(a)?a:String(a))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var b={class:"mt-5 py-6 px-4 relative shadow-md rounded-lg bg-white border-b border-gray-200"},k={class:"font-semibold text-lg text-gray-800 leading-tight mb-4 flex justify-left items-center"},x=(0,a.createElementVNode)("svg",{class:"w-6 h-6 text-gray-800 dark:text-white","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"currentColor",viewBox:"0 0 20 16"},[(0,a.createElementVNode)("path",{d:"m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"})],-1),h={class:"pl-2"},V=(0,a.createElementVNode)("hr",{class:"h-px my-2 mb-4 bg-gray-200 border-0 dark:bg-gray-700"},null,-1),w={class:"grid gap-6 mb-6 md:grid-cols-2"},E={key:0,class:"max-w-lg vacancy_image"},N=["src","alt"],C=(0,a.createElementVNode)("figcaption",{class:"mt-2 text-sm text-center text-gray-500 dark:text-gray-400"}," Imagen generada con AI ",-1),B={key:1,class:"p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300",role:"alert"},S=(0,a.createElementVNode)("span",{class:"font-medium"},"Aún no has generado ninguna imagen para esta vacante o no está aprobada. ",-1),_={class:"max-w-md space-y-1 text-gray-500 text-md list-inside dark:text-gray-400 mb-4"},j=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Categoría: ",-1),M=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Ciudad: ",-1),O=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Salario: ",-1),Z=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"ID Vacante Jobsite: ",-1),D=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Enlace de la vacante: ",-1),P=["href"],A=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Usuario: ",-1),q=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Estado: ",-1),z=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Fecha creado: ",-1),T=(0,a.createElementVNode)("span",{class:"font-semibold text-gray-900 dark:text-white"},"Fecha actualizado: ",-1),H=(0,a.createElementVNode)("h4",{class:"font-semibold text-gray-900 dark:text-white"}," Descripción: ",-1),I={class:"text-sm"},F={key:0},L=(0,a.createElementVNode)("h4",{class:"font-semibold text-gray-900 dark:text-white"}," Información adicional: ",-1),U={class:"text-sm"},$={class:"relative overflow-x-auto mt-5"},R={key:0,class:"w-full text-sm text-left text-gray-500 dark:text-gray-400"},G=(0,a.createElementVNode)("caption",{class:"p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800"}," Piezas generadas para la vacante ",-1),J=(0,a.createElementVNode)("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[(0,a.createElementVNode)("tr",null,[(0,a.createElementVNode)("th",{scope:"col",class:"px-6 py-3"},"#"),(0,a.createElementVNode)("th",{scope:"col",class:"px-6 py-3"},"Imagen"),(0,a.createElementVNode)("th",{scope:"col",class:"px-6 py-3"},"Descripción"),(0,a.createElementVNode)("th",{scope:"col",class:"px-6 py-3"},"Estado"),(0,a.createElementVNode)("th",{scope:"col",class:"px-6 py-3"},"Opciones")])],-1),W={class:"px-6 py-4"},K={class:"w-32 p-4 vacancy_image"},Q=["src","alt","onClick"],X={class:"px-6 py-4"},Y={class:"text-ellipsis text-md"},ee={class:"px-6 py-4"},te={class:"px-6 py-4"},re={class:"flex items-center justify-end"},ae={key:0,class:"pl-2"},ne=["onClick"],oe=[(0,a.createElementVNode)("svg",{class:"w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 19"},[(0,a.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4"})],-1)],le={class:"pl-2"},ce=["onClick"],se=[(0,a.createElementVNode)("svg",{class:"w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 14"},[(0,a.createElementVNode)("g",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2"},[(0,a.createElementVNode)("path",{d:"M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"}),(0,a.createElementVNode)("path",{d:"M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"})])],-1)],ie={key:1,class:"pl-2"},de=(0,a.createElementVNode)("span",{title:"Actualizar plantilla"},[(0,a.createElementVNode)("svg",{class:"w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},[(0,a.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M7 19H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v4M6 1v4a1 1 0 0 1-1 1H1m11 8h4m-2 2v-4m5 2a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"})])],-1),ue={key:2,class:"pl-2"},me={class:"grid gap-6 mb-6 md:grid-cols-2"},ge={class:"max-w-full vacancy_image"},pe=["src","alt"],fe=(0,a.createElementVNode)("h3",{class:"font-bold"},"Estado de la pieza gráfica.",-1),ye={class:"mt-4"},ve={method:"post",autocomplete:"off"},be=(0,a.createElementVNode)("label",{for:"reason",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[(0,a.createTextVNode)("Por favor, proporciona la razón o motivo específico detrás de tu decisión de rechazo o aprobación. Detalles adicionales ayudarán a comprender mejor tu elección. "),(0,a.createElementVNode)("strong",null,"(Opcional)")],-1),ke=["disabled"],xe={key:0,class:"mt-4"},he={key:1},Ve={key:2};const we={__name:"Show",props:{vacancy:{required:!0,type:Object}},setup:function(e){(0,a.onMounted)((function(){document.querySelector(".vacancy_image img").addEventListener("contextmenu",(function(e){e.preventDefault()}))}));var t=e,r=(0,a.ref)(!1),p=(0,a.ref)(!1),f=(0,a.ref)(!1),v=function(e){if(e.length>0){var t=e.find((function(e){return 3==e.status_id}));if(t)return t.url}},we=function(e){return g.Z.formatDateWhitHours(e)},Ee=(0,a.ref)(!1),Ne=function(e){var t;Ee.value=e,null===(t=document.querySelector("body > div[modal-backdrop]"))||void 0===t||t.remove()},Ce=(0,a.ref)({reason:""}),Be=function(e){Ee.value=!0,Ce.value=e},Se=function(e){var t;p.value=e,null===(t=document.querySelector("body > div[modal-backdrop]"))||void 0===t||t.remove()},_e=function(e){var t;f.value=e,null===(t=document.querySelector("body > div[modal-backdrop]"))||void 0===t||t.remove()};return function(je,Me){var Oe=(0,a.resolveComponent)("Head"),Ze=(0,a.resolveComponent)("Link");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(Oe,{title:e.vacancy.position},null,8,["title"]),(0,a.createVNode)(n.Z,{title:"Marketing / Vacantes / Ver #".concat(e.vacancy.id)},null,8,["title"]),(0,a.createElementVNode)("div",b,[(0,a.createElementVNode)("h4",k,[x,(0,a.createElementVNode)("span",h,(0,a.toDisplayString)(e.vacancy.position),1)]),V,je.$page.props.flash.message?((0,a.openBlock)(),(0,a.createBlock)(d.Z,{key:0,message:je.$page.props.flash.message},null,8,["message"])):(0,a.createCommentVNode)("",!0),(0,a.createElementVNode)("div",w,[(0,a.createElementVNode)("div",null,[0!=e.vacancy.vacancy_images.length&&v(e.vacancy.vacancy_images)?((0,a.openBlock)(),(0,a.createElementBlock)("figure",E,[(0,a.createElementVNode)("img",{class:"h-auto max-w-full",src:"".concat(v(e.vacancy.vacancy_images)),alt:e.vacancy.position},null,8,N),C])):((0,a.openBlock)(),(0,a.createElementBlock)("div",B,[S,(0,a.createTextVNode)(" Por favor, genera una ahora o solicita la aprobación de las piezas generadas. "),(0,a.unref)(g.Z).can("create_image")?((0,a.openBlock)(),(0,a.createBlock)(Ze,{key:0,href:je.route("vacancy.social",e.vacancy.id),class:"font-bold text-blue-600 dark:text-blue-500",title:"Generar pieza grafica"},{default:(0,a.withCtx)((function(){return[(0,a.createTextVNode)("Generar imagen ")]})),_:1},8,["href"])):(0,a.createCommentVNode)("",!0)]))]),(0,a.createElementVNode)("div",null,[(0,a.createElementVNode)("ol",_,[(0,a.createElementVNode)("li",null,[j,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(e.vacancy.category.name),1)]),(0,a.createElementVNode)("li",null,[M,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(e.vacancy.city.name)+" - "+(0,a.toDisplayString)(e.vacancy.city.state.name),1)]),(0,a.createElementVNode)("li",null,[O,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(e.vacancy.salary),1)]),(0,a.createElementVNode)("li",null,[Z,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(e.vacancy.erp_vacancy_id),1)]),(0,a.createElementVNode)("li",null,[D,(0,a.createElementVNode)("a",{class:"bg-blue-700 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800",href:e.vacancy.link,target:"_blank",rel:"noopener noreferrer"},"Ver oferta",8,P)]),(0,a.createElementVNode)("li",null,[A,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(e.vacancy.user.name),1)]),(0,a.createElementVNode)("li",null,[q,(0,a.createVNode)(o.Z,{status:e.vacancy.status},null,8,["status"])]),(0,a.createElementVNode)("li",null,[z,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(we(e.vacancy.created_at)),1)]),(0,a.createElementVNode)("li",null,[T,(0,a.createTextVNode)(" "+(0,a.toDisplayString)(we(e.vacancy.updated_at)),1)])]),(0,a.createElementVNode)("div",null,[H,(0,a.createElementVNode)("p",I,(0,a.toDisplayString)(e.vacancy.description),1)]),e.vacancy.more_information?((0,a.openBlock)(),(0,a.createElementBlock)("div",F,[L,(0,a.createElementVNode)("p",U,(0,a.toDisplayString)(e.vacancy.more_information),1)])):(0,a.createCommentVNode)("",!0)])]),(0,a.createElementVNode)("div",$,[0!=e.vacancy.vacancy_images.length?((0,a.openBlock)(),(0,a.createElementBlock)("table",R,[G,J,(0,a.createElementVNode)("tbody",null,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(e.vacancy.vacancy_images,(function(r,n){return(0,a.openBlock)(),(0,a.createElementBlock)("tr",{class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700",key:n},[(0,a.createElementVNode)("td",W,(0,a.toDisplayString)(r.id),1),(0,a.createElementVNode)("td",K,[(0,a.createElementVNode)("img",{class:"cursor-pointer",src:"".concat(r.url),alt:e.vacancy.position,onClick:function(e){return(0,a.unref)(Be)(r)},title:"Descargar"},null,8,Q)]),(0,a.createElementVNode)("td",X,[(0,a.createElementVNode)("p",Y,(0,a.toDisplayString)(r.description),1)]),(0,a.createElementVNode)("td",ee,[(0,a.createVNode)(o.Z,{status:r.status},null,8,["status"])]),(0,a.createElementVNode)("td",te,[(0,a.createElementVNode)("div",re,[3==r.status_id?((0,a.openBlock)(),(0,a.createElementBlock)("div",ae,[(0,a.createElementVNode)("span",{title:"Descargar",onClick:function(e){return function(e){var r=document.createElement("a");r.href=e,r.download=t.vacancy.position,r.target="_blank",r.style.display="none",document.body.appendChild(r),r.click(),document.body.removeChild(r)}(r.url)}},oe,8,ne)])):(0,a.createCommentVNode)("",!0),(0,a.createElementVNode)("div",le,[(0,a.createElementVNode)("span",{title:"Ver imagen",onClick:function(e){return(0,a.unref)(Be)(r)}},se,8,ce)]),(0,a.unref)(g.Z).can("edit_image")?((0,a.openBlock)(),(0,a.createElementBlock)("div",ie,[(0,a.createVNode)(Ze,{href:je.route("vacancy.social.edit",r)},{default:(0,a.withCtx)((function(){return[de]})),_:2},1032,["href"])])):(0,a.createCommentVNode)("",!0),(0,a.unref)(g.Z).can("delete_image")?((0,a.openBlock)(),(0,a.createElementBlock)("div",ue,[(0,a.createVNode)(u.default,{image:r,message:"¿Estás seguro de que quieres eliminar esta imagen?"},null,8,["image"])])):(0,a.createCommentVNode)("",!0)])])])})),128))])])):(0,a.createCommentVNode)("",!0)])]),(0,a.createVNode)(l.Z,{onClose:Me[3]||(Me[3]=function(e){return Ne(e)}),modelValue:Ee.value,"onUpdate:modelValue":Me[4]||(Me[4]=function(e){return Ee.value=e}),classes:"max-w-7xl"},{default:(0,a.withCtx)((function(){return[(0,a.createElementVNode)("div",me,[(0,a.createElementVNode)("div",null,[(0,a.createElementVNode)("figure",ge,[(0,a.unref)(Ce).filename?((0,a.openBlock)(),(0,a.createElementBlock)("img",{key:0,class:"h-auto mx-auto max-w-full",src:"".concat((0,a.unref)(Ce).url),alt:e.vacancy.position},null,8,pe)):(0,a.createCommentVNode)("",!0)])]),(0,a.createElementVNode)("div",null,[fe,(0,a.createElementVNode)("div",ye,[(0,a.createElementVNode)("form",ve,[be,(0,a.withDirectives)((0,a.createElementVNode)("textarea",{id:"reason",rows:"4","onUpdate:modelValue":Me[0]||(Me[0]=function(e){return(0,a.unref)(Ce).reason=e}),disabled:3==(0,a.unref)(Ce).status_id||2==(0,a.unref)(Ce).status_id,class:"block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"Mensaje..."},null,8,ke),[[a.vModelText,(0,a.unref)(Ce).reason]])])]),3!=(0,a.unref)(Ce).status_id&&2!=(0,a.unref)(Ce).status_id?((0,a.openBlock)(),(0,a.createElementBlock)("div",xe,[(0,a.unref)(r)?((0,a.openBlock)(),(0,a.createBlock)(c.Z,{key:0,classes:"fill-green-500"})):(0,a.createCommentVNode)("",!0),(0,a.unref)(g.Z).can("approve_image")?((0,a.openBlock)(),(0,a.createElementBlock)("span",he,[(0,a.createVNode)(s.Z,{onClick:Me[1]||(Me[1]=function(e){return(0,a.unref)(Ce),p.value=!0}),type:"button",classes:"",colors:"bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"},{default:(0,a.withCtx)((function(){return[(0,a.createTextVNode)(" Aprobar ")]})),_:1})])):(0,a.createCommentVNode)("",!0),(0,a.unref)(g.Z).can("reject_image")?((0,a.openBlock)(),(0,a.createElementBlock)("span",Ve,[(0,a.createVNode)(s.Z,{onClick:Me[2]||(Me[2]=function(e){return f.value=!0}),type:"button",classes:"ml-3",colors:"bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"},{default:(0,a.withCtx)((function(){return[(0,a.createTextVNode)(" Rechazar ")]})),_:1})])):(0,a.createCommentVNode)("",!0)])):(0,a.createCommentVNode)("",!0)])])]})),_:1},8,["modelValue"]),(0,a.createVNode)(i.Z,{idModal:"approveImage",modelValue:(0,a.unref)(p),"onUpdate:modelValue":Me[5]||(Me[5]=function(e){return(0,a.isRef)(p)?p.value=e:p=e}),message:"Aprobar imagen para su publicación en redes sociales!",onClose:Me[6]||(Me[6]=function(e){return Se(e)}),onAccept:Me[7]||(Me[7]=function(e){(0,m.cI)(y({},Ce.value)).post(route("vacancy.social.approve"),{preserveScroll:!0,onError:function(){r.value=!1,Se(!1)},onSuccess:function(){Ne(!1),Se(!1)}})})},null,8,["modelValue"]),(0,a.createVNode)(i.Z,{idModal:"rejectImage",modelValue:(0,a.unref)(f),"onUpdate:modelValue":Me[8]||(Me[8]=function(e){return(0,a.isRef)(f)?f.value=e:f=e}),message:"Rechazar la imagen debido a que no cumple con las condiciones de marca o ortografía.",onClose:Me[9]||(Me[9]=function(e){return _e(e)}),onAccept:Me[10]||(Me[10]=function(e){(0,m.cI)(y({},Ce.value)).post(route("vacancy.social.reject"),{preserveScroll:!0,onError:function(){r.value=!1,_e(!1)},onSuccess:function(){Ne(!1),_e(!1)}})})},null,8,["modelValue"])],64)}}}},3178:(e,t,r)=>{r.r(t),r.d(t,{default:()=>d});var a=r(821),n=r(5907),o=r(9038);function l(e){return l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},l(e)}function c(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,a)}return r}function s(e,t,r){var a;return a=function(e,t){if("object"!=l(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var a=r.call(e,t||"default");if("object"!=l(a))return a;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(t,"string"),(t="symbol"==l(a)?a:String(a))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var i=[(0,a.createElementVNode)("svg",{class:"w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 18 20"},[(0,a.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"})],-1)];const d={__name:"Delete",props:{image:{required:!0,type:Object},message:{required:!0,type:String}},setup:function(e){var t=e,r=(0,a.ref)(!1),l=function(){return r.value=!0},d=function(e){var t;r.value=!1,null===(t=document.querySelector("body > div[modal-backdrop]"))||void 0===t||t.remove()},u=function(e){var r=(0,o.cI)(function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?c(Object(r),!0).forEach((function(t){s(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):c(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},t.image));r.delete(route("vacancy.social.delete",t.image.id),{preserveScroll:!0,onError:function(){d()},onSuccess:function(){d()}})};return function(t,o){return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createElementVNode)("span",{title:"Eliminar",onClick:o[0]||(o[0]=function(t){return l(e.image)})},i),(0,a.createVNode)(n.Z,{idModal:l+e.image.id,modelValue:r.value,"onUpdate:modelValue":o[1]||(o[1]=function(e){return r.value=e}),message:e.message,onClose:o[2]||(o[2]=function(e){return d()}),onAccept:o[3]||(o[3]=function(e){return u()})},null,8,["idModal","modelValue","message"])],64)}}}}}]);