"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[166],{2187:(e,r,t)=>{t.d(r,{Z:()=>d});var l=t(821),o={class:"px-4 sm:px-2"},a={class:"font-semibold text-xl text-gray-800 leading-tight bg-gray-50"},n={class:"text-sm mt-2"};const d={__name:"Header",props:["title"],setup:function(e){return function(r,t){return(0,l.openBlock)(),(0,l.createElementBlock)("div",o,[(0,l.createElementVNode)("h2",a,(0,l.toDisplayString)(e.title),1),(0,l.createElementVNode)("div",n,[(0,l.renderSlot)(r.$slots,"default")])])}}}},1166:(e,r,t)=>{t.r(r),t.d(r,{default:()=>h});var l=t(821),o=t(9038),a=t(2187),n=t(9285),d={class:"mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg"},s={class:"grid gap-6 mb-6 md:grid-cols-2"},i=(0,l.createElementVNode)("label",{for:"name",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Nombre completo *",-1),c=(0,l.createElementVNode)("label",{for:"email",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Correo electrónico *",-1),u={class:"grid gap-6 mb-6 md:grid-cols-1"},m=(0,l.createElementVNode)("label",{for:"roles",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Roles",-1),b=["value"],g=(0,l.createElementVNode)("label",{for:"roles",class:"block mb-2 text-sm font-bold text-gray-900 dark:text-white"},"Permisos",-1),p={class:"flex items-center h-5"},f=["id","value"],k={class:"ms-2 text-sm"},y=["for"],x={id:"helper-checkbox-text",class:"text-xs font-normal text-gray-500 dark:text-gray-300"};const h={__name:"Show",props:{user:Object,permissions:Array,roles:Array},setup:function(e){var r=e;(0,l.onMounted)((function(){t.permissions=r.user.permissions.map((function(e){return e.id})),t.roles=r.user.roles.map((function(e){return e.id}))}));var t=(0,o.cI)({name:r.user.name,email:r.user.email,roles:[],permissions:[]}),h=(0,l.computed)((function(){return n.Z.chunk(r.permissions,4)}));return function(r,o){var n=(0,l.resolveComponent)("Head");return(0,l.openBlock)(),(0,l.createElementBlock)(l.Fragment,null,[(0,l.createVNode)(n,{title:"Crear nuevo usuario"}),(0,l.createVNode)(a.Z,{title:"Administración / Ver usuario #".concat(e.user.id)},{default:(0,l.withCtx)((function(){return[(0,l.createElementVNode)("p",null,"Ver usuario #"+(0,l.toDisplayString)(e.user.id)+".",1)]})),_:1},8,["title"]),(0,l.createElementVNode)("div",d,[(0,l.createElementVNode)("form",{onSubmit:o[4]||(o[4]=(0,l.withModifiers)((function(){return r.submit&&r.submit.apply(r,arguments)}),["prevent"])),autocomplete:"off"},[(0,l.createElementVNode)("div",s,[(0,l.createElementVNode)("div",null,[i,(0,l.withDirectives)((0,l.createElementVNode)("input",{type:"text",id:"name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"Nombre completo","onUpdate:modelValue":o[0]||(o[0]=function(e){return(0,l.unref)(t).name=e}),disabled:""},null,512),[[l.vModelText,(0,l.unref)(t).name]])]),(0,l.createElementVNode)("div",null,[c,(0,l.withDirectives)((0,l.createElementVNode)("input",{type:"email",id:"email",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"sistemassp@manpower.com.co","onUpdate:modelValue":o[1]||(o[1]=function(e){return(0,l.unref)(t).email=e}),disabled:""},null,512),[[l.vModelText,(0,l.unref)(t).email]])])]),(0,l.createElementVNode)("div",u,[(0,l.createElementVNode)("div",null,[m,(0,l.withDirectives)((0,l.createElementVNode)("select",{multiple:"",disabled:"",id:"roles","onUpdate:modelValue":o[2]||(o[2]=function(e){return(0,l.unref)(t).roles=e}),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"},[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(e.roles,(function(e,r){return(0,l.openBlock)(),(0,l.createElementBlock)("option",{key:r,value:e.id},(0,l.toDisplayString)(e.display_name),9,b)})),128))],512),[[l.vModelSelect,(0,l.unref)(t).roles]])])]),g,((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(h.value,(function(e,r){return(0,l.openBlock)(),(0,l.createElementBlock)("div",{key:r,class:"grid gap-6 mb-2 md:grid-cols-4"},[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(e,(function(e,r){return(0,l.openBlock)(),(0,l.createElementBlock)("div",{class:"flex",key:r},[(0,l.createElementVNode)("div",p,[(0,l.withDirectives)((0,l.createElementVNode)("input",{"aria-describedby":"helper-checkbox-text",type:"checkbox",id:e.name,value:e.id,"onUpdate:modelValue":o[3]||(o[3]=function(e){return(0,l.unref)(t).permissions=e}),disabled:"",class:"w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,8,f),[[l.vModelCheckbox,(0,l.unref)(t).permissions]])]),(0,l.createElementVNode)("div",k,[(0,l.createElementVNode)("label",{for:e.name,class:"font-bold text-gray-900 dark:text-gray-300"},(0,l.toDisplayString)(e.display_name),9,y),(0,l.createElementVNode)("p",x,(0,l.toDisplayString)(e.name),1)])])})),128))])})),128))],32)])],64)}}}}}]);