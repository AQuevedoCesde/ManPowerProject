/*! For license information please see 249.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[249],{4078:(e,t,r)=>{r.d(t,{Z:()=>a});var n=r(821),o=["type"];const a={__name:"Button",props:{type:{type:String,default:"submit"},disabled:{type:Boolean,default:!1},classes:{type:String},colors:{type:String,default:"bg-blue-500 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"}},setup:function(e){return function(t,r){return e.disabled?((0,n.openBlock)(),(0,n.createElementBlock)("button",{key:1,type:"button",class:(0,n.normalizeClass)(["text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center",e.classes]),disabled:""},[(0,n.renderSlot)(t.$slots,"default")],2)):((0,n.openBlock)(),(0,n.createElementBlock)("button",{key:0,type:e.type,class:(0,n.normalizeClass)([[e.colors,e.classes],"text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition ease-in-out duration-150"])},[(0,n.renderSlot)(t.$slots,"default")],10,o))}}}},2187:(e,t,r)=>{r.d(t,{Z:()=>i});var n=r(821),o={class:"px-4 sm:px-2"},a={class:"font-semibold text-xl text-gray-800 leading-tight bg-gray-50"},l={class:"text-sm mt-2"};const i={__name:"Header",props:["title"],setup:function(e){return function(t,r){return(0,n.openBlock)(),(0,n.createElementBlock)("div",o,[(0,n.createElementVNode)("h2",a,(0,n.toDisplayString)(e.title),1),(0,n.createElementVNode)("div",l,[(0,n.renderSlot)(t.$slots,"default")])])}}}},4508:(e,t,r)=>{r.d(t,{Z:()=>i});var n=r(821),o={role:"status"},a=[(0,n.createElementVNode)("path",{d:"M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z",fill:"currentColor"},null,-1),(0,n.createElementVNode)("path",{d:"M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z",fill:"currentFill"},null,-1)],l=(0,n.createElementVNode)("span",{class:"sr-only"},"Loading...",-1);const i={__name:"LoadingSpinner",props:["classes"],setup:function(e){return function(t,r){return(0,n.openBlock)(),(0,n.createElementBlock)("div",o,[((0,n.openBlock)(),(0,n.createElementBlock)("svg",{"aria-hidden":"true",class:(0,n.normalizeClass)(["inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600",e.classes]),viewBox:"0 0 100 101",fill:"none",xmlns:"http://www.w3.org/2000/svg"},a,2)),l])}}}},2249:(e,t,r)=>{r.r(t),r.d(t,{default:()=>A});var n=r(821),o=r(9038),a=r(4508),l=r(4078),i=r(2187),c=r(9285);function s(e){return s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},s(e)}function u(){u=function(){return t};var e,t={},r=Object.prototype,n=r.hasOwnProperty,o=Object.defineProperty||function(e,t,r){e[t]=r.value},a="function"==typeof Symbol?Symbol:{},l=a.iterator||"@@iterator",i=a.asyncIterator||"@@asyncIterator",c=a.toStringTag||"@@toStringTag";function d(e,t,r){return Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}),e[t]}try{d({},"")}catch(e){d=function(e,t,r){return e[t]=r}}function f(e,t,r,n){var a=t&&t.prototype instanceof v?t:v,l=Object.create(a.prototype),i=new D(n||[]);return o(l,"_invoke",{value:L(e,r,i)}),l}function m(e,t,r){try{return{type:"normal",arg:e.call(t,r)}}catch(e){return{type:"throw",arg:e}}}t.wrap=f;var p="suspendedStart",h="suspendedYield",g="executing",y="completed",b={};function v(){}function x(){}function k(){}var w={};d(w,l,(function(){return this}));var E=Object.getPrototypeOf,N=E&&E(E(O([])));N&&N!==r&&n.call(N,l)&&(w=N);var C=k.prototype=v.prototype=Object.create(w);function V(e){["next","throw","return"].forEach((function(t){d(e,t,(function(e){return this._invoke(t,e)}))}))}function B(e,t){function r(o,a,l,i){var c=m(e[o],e,a);if("throw"!==c.type){var u=c.arg,d=u.value;return d&&"object"==s(d)&&n.call(d,"__await")?t.resolve(d.__await).then((function(e){r("next",e,l,i)}),(function(e){r("throw",e,l,i)})):t.resolve(d).then((function(e){u.value=e,l(u)}),(function(e){return r("throw",e,l,i)}))}i(c.arg)}var a;o(this,"_invoke",{value:function(e,n){function o(){return new t((function(t,o){r(e,n,t,o)}))}return a=a?a.then(o,o):o()}})}function L(t,r,n){var o=p;return function(a,l){if(o===g)throw new Error("Generator is already running");if(o===y){if("throw"===a)throw l;return{value:e,done:!0}}for(n.method=a,n.arg=l;;){var i=n.delegate;if(i){var c=S(i,n);if(c){if(c===b)continue;return c}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(o===p)throw o=y,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);o=g;var s=m(t,r,n);if("normal"===s.type){if(o=n.done?y:h,s.arg===b)continue;return{value:s.arg,done:n.done}}"throw"===s.type&&(o=y,n.method="throw",n.arg=s.arg)}}}function S(t,r){var n=r.method,o=t.iterator[n];if(o===e)return r.delegate=null,"throw"===n&&t.iterator.return&&(r.method="return",r.arg=e,S(t,r),"throw"===r.method)||"return"!==n&&(r.method="throw",r.arg=new TypeError("The iterator does not provide a '"+n+"' method")),b;var a=m(o,t.iterator,r.arg);if("throw"===a.type)return r.method="throw",r.arg=a.arg,r.delegate=null,b;var l=a.arg;return l?l.done?(r[t.resultName]=l.value,r.next=t.nextLoc,"return"!==r.method&&(r.method="next",r.arg=e),r.delegate=null,b):l:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,b)}function _(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function j(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function D(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(_,this),this.reset(!0)}function O(t){if(t||""===t){var r=t[l];if(r)return r.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var o=-1,a=function r(){for(;++o<t.length;)if(n.call(t,o))return r.value=t[o],r.done=!1,r;return r.value=e,r.done=!0,r};return a.next=a}}throw new TypeError(s(t)+" is not iterable")}return x.prototype=k,o(C,"constructor",{value:k,configurable:!0}),o(k,"constructor",{value:x,configurable:!0}),x.displayName=d(k,c,"GeneratorFunction"),t.isGeneratorFunction=function(e){var t="function"==typeof e&&e.constructor;return!!t&&(t===x||"GeneratorFunction"===(t.displayName||t.name))},t.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,k):(e.__proto__=k,d(e,c,"GeneratorFunction")),e.prototype=Object.create(C),e},t.awrap=function(e){return{__await:e}},V(B.prototype),d(B.prototype,i,(function(){return this})),t.AsyncIterator=B,t.async=function(e,r,n,o,a){void 0===a&&(a=Promise);var l=new B(f(e,r,n,o),a);return t.isGeneratorFunction(r)?l:l.next().then((function(e){return e.done?e.value:l.next()}))},V(C),d(C,c,"Generator"),d(C,l,(function(){return this})),d(C,"toString",(function(){return"[object Generator]"})),t.keys=function(e){var t=Object(e),r=[];for(var n in t)r.push(n);return r.reverse(),function e(){for(;r.length;){var n=r.pop();if(n in t)return e.value=n,e.done=!1,e}return e.done=!0,e}},t.values=O,D.prototype={constructor:D,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=e,this.done=!1,this.delegate=null,this.method="next",this.arg=e,this.tryEntries.forEach(j),!t)for(var r in this)"t"===r.charAt(0)&&n.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=e)},stop:function(){this.done=!0;var e=this.tryEntries[0].completion;if("throw"===e.type)throw e.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var r=this;function o(n,o){return i.type="throw",i.arg=t,r.next=n,o&&(r.method="next",r.arg=e),!!o}for(var a=this.tryEntries.length-1;a>=0;--a){var l=this.tryEntries[a],i=l.completion;if("root"===l.tryLoc)return o("end");if(l.tryLoc<=this.prev){var c=n.call(l,"catchLoc"),s=n.call(l,"finallyLoc");if(c&&s){if(this.prev<l.catchLoc)return o(l.catchLoc,!0);if(this.prev<l.finallyLoc)return o(l.finallyLoc)}else if(c){if(this.prev<l.catchLoc)return o(l.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<l.finallyLoc)return o(l.finallyLoc)}}}},abrupt:function(e,t){for(var r=this.tryEntries.length-1;r>=0;--r){var o=this.tryEntries[r];if(o.tryLoc<=this.prev&&n.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var a=o;break}}a&&("break"===e||"continue"===e)&&a.tryLoc<=t&&t<=a.finallyLoc&&(a=null);var l=a?a.completion:{};return l.type=e,l.arg=t,a?(this.method="next",this.next=a.finallyLoc,b):this.complete(l)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),b},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.finallyLoc===e)return this.complete(r.completion,r.afterLoc),j(r),b}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.tryLoc===e){var n=r.completion;if("throw"===n.type){var o=n.arg;j(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,r,n){return this.delegate={iterator:O(t),resultName:r,nextLoc:n},"next"===this.method&&(this.arg=e),b}},t}function d(e,t,r,n,o,a,l){try{var i=e[a](l),c=i.value}catch(e){return void r(e)}i.done?t(c):Promise.resolve(c).then(n,o)}var f=(0,n.createElementVNode)("p",null," Crear nuevo usuario, por favor completa los campos requeridos marcados con (*). ",-1),m={class:"mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg"},p={class:"grid gap-0 mb-0 md:grid-cols-1"},h={class:"flex items-center"},g=(0,n.createElementVNode)("label",{for:"search-user",class:"sr-only"},"Search",-1),y={class:"relative w-full"},b=(0,n.createElementVNode)("div",{class:"absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"},[(0,n.createElementVNode)("svg",{class:"w-4 h-4 text-gray-500 dark:text-gray-400","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24"},[(0,n.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1c0 .6-.4 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"})])],-1),v=(0,n.createElementVNode)("button",{type:"submit",class:"p-2.5 ms-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 rounded-lg border border-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300"},[(0,n.createElementVNode)("svg",{class:"w-4 h-4","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},[(0,n.createElementVNode)("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"})]),(0,n.createElementVNode)("span",{class:"sr-only"},"Search")],-1),x=["textContent"],k=["textContent"],w={class:"grid gap-6 mb-6 md:grid-cols-2"},E=(0,n.createElementVNode)("label",{for:"name",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Nombre completo *",-1),N=["textContent"],C=(0,n.createElementVNode)("label",{for:"email",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Correo electrónico *",-1),V=["textContent"],B={class:"grid gap-6 mb-6 md:grid-cols-1"},L=(0,n.createElementVNode)("label",{for:"roles",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Roles",-1),S=["value"],_={key:0,class:"mt-1 text-xs text-gray-500 dark:text-gray-300"},j=["textContent"],D=(0,n.createElementVNode)("label",{for:"roles",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Permisos",-1),O={class:"flex items-center h-5"},Z=["id","value"],M={class:"ms-2 text-sm"},F=["for"],P={id:"helper-checkbox-text",class:"text-xs font-normal text-gray-500 dark:text-gray-300"},T=["textContent"],G={class:"flex items-center mt-4"};const A={__name:"Create",props:{permissions:Array,roles:Array},setup:function(e){var t=e,r=((0,n.ref)(!1),(0,n.ref)({email:""})),s=(0,n.ref)([]),A=(0,n.ref)(),U=function(){var e,t=(e=u().mark((function e(){return u().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,axios.post(route("users.adldap"),r.value).then((function(e){console.log(e),e.data.hasOwnProperty("message")?A.value=e.data.message:A.value=null,I.email=e.data.email,I.name=e.data.name,s.value=[]})).catch((function(e){A.value=null,422===e.response.status&&(s.value=e.response.data.errors)}));case 2:case"end":return e.stop()}}),e)})),function(){var t=this,r=arguments;return new Promise((function(n,o){var a=e.apply(t,r);function l(e){d(a,n,o,l,i,"next",e)}function i(e){d(a,n,o,l,i,"throw",e)}l(void 0)}))});return function(){return t.apply(this,arguments)}}(),z=(0,n.ref)(!1),I=(0,o.cI)({name:null,email:null,roles:[],permissions:[]}),H=(0,n.computed)((function(){return c.Z.chunk(t.permissions,4)})),$=function(){z.value=!0,I.post(route("users.store"),{preserveScroll:!0,onError:function(){z.value=!1}})};return function(t,o){var c=(0,n.resolveComponent)("Head");return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createVNode)(c,{title:"Crear usuario"}),(0,n.createVNode)(i.Z,{title:"Administración / Crear usuario"},{default:(0,n.withCtx)((function(){return[f]})),_:1}),(0,n.createElementVNode)("div",m,[(0,n.createElementVNode)("form",{onSubmit:(0,n.withModifiers)(U,["prevent"]),autocomplete:"off",class:"mb-6"},[(0,n.createElementVNode)("div",p,[(0,n.createElementVNode)("div",h,[g,(0,n.createElementVNode)("div",y,[b,(0,n.withDirectives)((0,n.createElementVNode)("input",{type:"text",id:"search-user",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"Buscar usuario a través de la dirección de correo electrónico.","onUpdate:modelValue":o[0]||(o[0]=function(e){return r.value.email=e})},null,512),[[n.vModelText,r.value.email]])]),v]),(0,n.unref)(s)?((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,{key:0},(0,n.renderList)((0,n.unref)(s).email,(function(e){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{key:e,textContent:(0,n.toDisplayString)(e),class:"text-red-500 text-xs mt-1"},null,8,x)})),128)):(0,n.createCommentVNode)("",!0),(0,n.unref)(A)?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:1,textContent:(0,n.toDisplayString)((0,n.unref)(A)),class:"text-red-500 text-xs mt-1"},null,8,k)):(0,n.createCommentVNode)("",!0)])],32),(0,n.createElementVNode)("form",{onSubmit:o[5]||(o[5]=(0,n.withModifiers)((function(){return(0,n.unref)($)&&(0,n.unref)($).apply(void 0,arguments)}),["prevent"])),autocomplete:"off"},[(0,n.createElementVNode)("div",w,[(0,n.createElementVNode)("div",null,[E,(0,n.withDirectives)((0,n.createElementVNode)("input",{type:"text",id:"name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"Nombre completo","onUpdate:modelValue":o[1]||(o[1]=function(e){return(0,n.unref)(I).name=e}),disabled:"disabled"},null,512),[[n.vModelText,(0,n.unref)(I).name]]),(0,n.unref)(I).errors.name?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:0,textContent:(0,n.toDisplayString)((0,n.unref)(I).errors.name),class:"text-red-500 text-xs mt-1"},null,8,N)):(0,n.createCommentVNode)("",!0)]),(0,n.createElementVNode)("div",null,[C,(0,n.withDirectives)((0,n.createElementVNode)("input",{type:"email",id:"email",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"sistemassp@manpower.com.co","onUpdate:modelValue":o[2]||(o[2]=function(e){return(0,n.unref)(I).email=e}),disabled:"disabled"},null,512),[[n.vModelText,(0,n.unref)(I).email]]),(0,n.unref)(I).errors.email?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:0,textContent:(0,n.toDisplayString)((0,n.unref)(I).errors.email),class:"text-red-500 text-xs mt-1"},null,8,V)):(0,n.createCommentVNode)("",!0)])]),(0,n.createElementVNode)("div",B,[(0,n.createElementVNode)("div",null,[L,(0,n.withDirectives)((0,n.createElementVNode)("select",{multiple:"",id:"roles","onUpdate:modelValue":o[3]||(o[3]=function(e){return(0,n.unref)(I).roles=e}),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"},[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(e.roles,(function(e,t){return(0,n.openBlock)(),(0,n.createElementBlock)("option",{key:t,value:e.id},(0,n.toDisplayString)(e.display_name),9,S)})),128))],512),[[n.vModelSelect,(0,n.unref)(I).roles]]),(0,n.unref)(I).errors.roles?(0,n.createCommentVNode)("",!0):((0,n.openBlock)(),(0,n.createElementBlock)("div",_," Elige uno o varios roles para otorgar permisos al usuario. También puedes asignar permisos de manera individual utilizando la opción que se encuentra a continuación. Dejar en blanco para eliminar roles al usuario. ")),(0,n.unref)(I).errors.roles?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:1,textContent:(0,n.toDisplayString)((0,n.unref)(I).errors.roles),class:"text-red-500 text-xs mt-1"},null,8,j)):(0,n.createCommentVNode)("",!0)])]),D,((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(H.value,(function(e,t){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{key:t,class:"grid gap-6 mb-2 md:grid-cols-4"},[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(e,(function(e,t){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{class:"flex",key:t},[(0,n.createElementVNode)("div",O,[(0,n.withDirectives)((0,n.createElementVNode)("input",{"aria-describedby":"helper-checkbox-text",type:"checkbox",id:e.name,value:e.id,"onUpdate:modelValue":o[4]||(o[4]=function(e){return(0,n.unref)(I).permissions=e}),class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,8,Z),[[n.vModelCheckbox,(0,n.unref)(I).permissions]])]),(0,n.createElementVNode)("div",M,[(0,n.createElementVNode)("label",{for:e.name,class:"font-bold text-gray-900 dark:text-gray-300"},(0,n.toDisplayString)(e.display_name),9,F),(0,n.createElementVNode)("p",P,(0,n.toDisplayString)(e.name),1)])])})),128))])})),128)),(0,n.unref)(I).errors.permissions?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:0,textContent:(0,n.toDisplayString)((0,n.unref)(I).errors.name),class:"text-red-500 text-xs mt-1"},null,8,T)):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("div",G,[(0,n.createVNode)(l.Z,{type:"submit",disabled:(0,n.unref)(z)},{default:(0,n.withCtx)((function(){return[(0,n.createTextVNode)(" Crear usuario ")]})),_:1},8,["disabled"]),(0,n.unref)(z)?((0,n.openBlock)(),(0,n.createBlock)(a.Z,{key:0,classes:"fill-green-500 ml-4"})):(0,n.createCommentVNode)("",!0)])],32)])],64)}}}}}]);