"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[253],{5907:(e,t,r)=>{r.d(t,{Z:()=>y});var o=r(821),n=r(4112),a=["id"],l={class:"relative w-full max-w-md max-h-full"},i={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},s=[(0,o.createElementVNode)("svg",{class:"w-3 h-3","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[(0,o.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),(0,o.createElementVNode)("span",{class:"sr-only"},"Close modal",-1)],u={class:"p-6 text-center"},c=(0,o.createElementVNode)("svg",{class:"mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},[(0,o.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"})],-1),d={class:"mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"},m={key:0,class:"flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400",role:"alert"},g=(0,o.createElementVNode)("svg",{class:"flex-shrink-0 inline w-4 h-4 me-3","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"currentColor",viewBox:"0 0 20 20"},[(0,o.createElementVNode)("path",{d:"M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"})],-1),f=(0,o.createElementVNode)("span",{class:"sr-only"},"Info",-1),p=(0,o.createElementVNode)("span",{class:"font-medium"},"Error!",-1);const y={__name:"AlertModal",props:{modelValue:{required:!0,type:Boolean,default:!1},message:{default:"Are you sure you want to delete this?",type:String},idModal:{required:!0,type:String},errorMessage:{required:!1,type:String},showErrorMessage:{default:!1,type:Boolean}},emits:["close","accept"],setup:function(e,t){var r=t.emit,y=e,v=r,h=function(){v("close",!1)},b=function(){v("accept",!0)};return(0,o.watch)((function(){return y.modelValue}),(function(e){var t=document.getElementById(y.idModal),r=new n.u_(t,{backdrop:"static"});e?r.show():r.hide()})),function(t,r){return(0,o.openBlock)(),(0,o.createElementBlock)("div",{id:e.idModal,tabindex:"-1","aria-hidden":"true","data-modal-backdrop":"static",class:"fixed top-0 left-0 right-0 z-60 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full transition-opacity duration-300"},[(0,o.createElementVNode)("div",l,[(0,o.createElementVNode)("div",i,[(0,o.createElementVNode)("button",{onClick:r[0]||(r[0]=function(e){return h()}),type:"button",class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"},s),(0,o.createElementVNode)("div",u,[c,(0,o.createElementVNode)("h3",d,(0,o.toDisplayString)(e.message),1),e.showErrorMessage?((0,o.openBlock)(),(0,o.createElementBlock)("div",m,[g,f,(0,o.createElementVNode)("div",null,[p,(0,o.createTextVNode)(" "+(0,o.toDisplayString)(e.errorMessage),1)])])):(0,o.createCommentVNode)("",!0),(0,o.createElementVNode)("button",{onClick:b,type:"button",class:"text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 gree dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"}," Aceptar "),(0,o.createElementVNode)("button",{onClick:r[1]||(r[1]=function(e){return h()}),type:"button",class:"text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"}," Cancelar ")])])])],8,a)}}}},4253:(e,t,r)=>{r.r(t),r.d(t,{default:()=>c});var o=r(821),n=r(5907),a=r(9038);function l(e){return l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},l(e)}function i(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,o)}return r}function s(e,t,r){var o;return o=function(e,t){if("object"!=l(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var o=r.call(e,t||"default");if("object"!=l(o))return o;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(t,"string"),(t="symbol"==l(o)?o:String(o))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var u=[(0,o.createElementVNode)("svg",{class:"w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 18 20"},[(0,o.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"})],-1)];const c={__name:"Delete",props:{user:{required:!0,type:Object},message:{required:!0,type:String}},setup:function(e){var t=e,r=(0,o.ref)(!1),l=(0,o.ref)(),c=(0,o.ref)(!1),d=function(){return r.value=!0},m=function(e){var t;r.value=!1,null===(t=document.querySelector("body > div[modal-backdrop]"))||void 0===t||t.remove()},g=function(e){var r=(0,a.cI)(function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?i(Object(r),!0).forEach((function(t){s(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):i(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},t.user));r.delete(route("users.destroy",t.user.id),{preserveScroll:!0,onError:function(e){l.value=e.message,c.value=!0},onSuccess:function(){c.value=!1,m()}})};return function(t,a){return(0,o.openBlock)(),(0,o.createElementBlock)(o.Fragment,null,[(0,o.createElementVNode)("span",{title:"Eliminar usuario",onClick:a[0]||(a[0]=function(t){return d(e.user)})},u),(0,o.createVNode)(n.Z,{idModal:d+e.user.id,modelValue:r.value,"onUpdate:modelValue":a[1]||(a[1]=function(e){return r.value=e}),message:e.message,errorMessage:l.value,showErrorMessage:c.value,onClose:a[2]||(a[2]=function(e){return m()}),onAccept:a[3]||(a[3]=function(e){return g()})},null,8,["idModal","modelValue","message","errorMessage","showErrorMessage"])],64)}}}}}]);