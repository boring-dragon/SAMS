import{z as f,h as g,o,c as l,d as e,j as h,q as i,A as a,F as c,p as u,i as b,t as m}from"./app.c2979c7d.js";import{L as v}from"./Loader.ed50b8f6.js";import"./plugin-vue_export-helper.21dcd24c.js";const k={class:"py-12"},w={class:"p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3"},y=["onSubmit"],x=e("label",{class:"block text-sm font-medium text-gray-700",for:"student"},"Select Student",-1),S=["value"],j=e("label",{class:"block text-sm font-medium text-gray-700",for:"module"},"Select Module",-1),B=["value"],F={class:"mt-4"},M={class:"inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto",type:"submit"},O=e("span",{class:"font-medium mr-3"},"Enroll",-1),L={key:1,class:"w-5 h-5",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},U=e("path",{d:"M14 5l7 7m0 0l-7 7m7-7H3","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2"},null,-1),V=[U],q={__name:"Form",props:{enrollment:Object,errors:Object,students:Object,modules:Object},setup(p){const r=p,s=f({sending:!1,form:g({module_id:null,student_id:null},{resetOnSuccess:!1})});function _(){let d={headers:{Accept:"application/json"},onStart:()=>s.sending=!0,onFinish:()=>s.sending=!1,preserveScroll:!0};s.form.post(route("admin.enrollments.store"),d)}return(d,n)=>(o(),l("div",k,[e("div",w,[e("form",{onSubmit:h(_,["prevent"]),class:"space-y-4"},[e("div",null,[x,i(e("select",{class:"py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-green-500 focus:ring-green-500 mt-2",placeholder:"Select User","onUpdate:modelValue":n[0]||(n[0]=t=>s.form.student_id=t)},[(o(!0),l(c,null,u(r.students,t=>(o(),l("option",{key:t.id,value:t.id},m(t.full_name),9,S))),128))],512),[[a,s.form.student_id]])]),e("div",null,[j,i(e("select",{class:"py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-green-500 focus:ring-green-500 mt-2",placeholder:"Select Module","onUpdate:modelValue":n[1]||(n[1]=t=>s.form.module_id=t)},[(o(!0),l(c,null,u(r.modules,t=>(o(),l("option",{key:t.id,value:t.id},m(t.name),9,B))),128))],512),[[a,s.form.module_id]])]),e("div",F,[e("button",M,[O,s.sending?(o(),b(v,{key:0})):(o(),l("svg",L,V))])])],40,y)])]))}};export{q as default};