import{j as g,k,x as w,u as s,o as d,c as _,y as x,m as y,l as m,w as c,a as o,H as v,t as V,g as u,d as l,L as $,n as B,p as C,e as h}from"./app.98f3858a.js";import{_ as L,a as N}from"./Guest.21be4e60.js";import{_ as R,a as p,b as f}from"./ValidationErrors.e8fd6804.js";const S=["value"],U={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(r,{emit:e}){const i=r,n=g({get(){return i.checked},set(t){e("update:checked",t)}});return(t,a)=>k((d(),_("input",{type:"checkbox",value:r.value,"onUpdate:modelValue":a[0]||(a[0]=b=>x(n)?n.value=b:null),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"},null,8,S)),[[w,s(n)]])}},q={key:0,class:"mb-4 font-medium text-sm text-green-600"},F=["onSubmit"],P={class:"mt-4"},j={class:"block mt-4"},D={class:"flex items-center"},E=l("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),H={class:"flex items-center justify-end mt-4"},M=h(" Forgot your password? "),z=h(" Log in "),I={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(r){const e=y({email:"",password:"",remember:!1}),i=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(n,t)=>(d(),m(L,null,{default:c(()=>[o(s(v),{title:"Log in"}),o(R,{class:"mb-4"}),r.status?(d(),_("div",q,V(r.status),1)):u("",!0),l("form",{onSubmit:C(i,["prevent"])},[l("div",null,[o(p,{for:"email",value:"Email"}),o(f,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":t[0]||(t[0]=a=>s(e).email=a),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"])]),l("div",P,[o(p,{for:"password",value:"Password"}),o(f,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":t[1]||(t[1]=a=>s(e).password=a),required:"",autocomplete:"current-password"},null,8,["modelValue"])]),l("div",j,[l("label",D,[o(U,{name:"remember",checked:s(e).remember,"onUpdate:checked":t[2]||(t[2]=a=>s(e).remember=a)},null,8,["checked"]),E])]),l("div",H,[r.canResetPassword?(d(),m(s($),{key:0,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:c(()=>[M]),_:1},8,["href"])):u("",!0),o(N,{class:B(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:c(()=>[z]),_:1},8,["class","disabled"])])],40,F)]),_:1}))}};export{I as default};