import{o as i,c as l,a as s,u as r,H as f,w as o,F as d,L as x,b as e,p as g,t as a,k as _,e as p,J as h}from"./app.5c0d937e.js";import{_ as y}from"./Authenticated.ca6e5094.js";import{P as w}from"./Pagination.20626019.js";import{h as b}from"./moment.17f8281e.js";import"./FlashMessages.a0b81726.js";import"./plugin-vue_export-helper.21dcd24c.js";const v=p("Enrollments"),k=p("Add Enrollment"),E={class:"py-12"},A={class:"px-4 sm:px-6 lg:px-8"},H={class:"mt-8 flex flex-col"},M={class:"-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8"},Y={class:"inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"},j={class:"bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10"},B=e("div",{class:"sm:flex items-center justify-between"},[e("div",{class:"flex items-center"},[e("a",{class:"rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800",href:" javascript:void(0)"},[e("div",{class:"py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full"},[e("p",null,"All")])])])],-1),C={class:"mt-7"},D={class:"w-full whitespace-nowrap"},L=e("thead",{class:"bg-gray-50"},[e("tr",null,[e("th",{class:"py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6",scope:"col"},"Student"),e("th",{class:"px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500",scope:"col"},"Module"),e("th",{class:"px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500",scope:"col"},"Enrolled At"),e("th",{class:"px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500",scope:"col"},"Actions"),e("th",{class:"relative py-3 pl-3 pr-4 sm:pr-6",scope:"col"},[e("span",{class:"sr-only"},"Edit")])])],-1),N={class:"whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"},V={class:"whitespace-nowrap px-3 py-4 text-sm text-gray-500"},F={class:"whitespace-nowrap px-3 py-4 text-sm text-gray-500"},I={class:"pl-4 space-x-8"},P=["onClick"],G={__name:"Index",props:{enrollments:{type:Object,required:!0}},setup(m){const c=m;function u(n){confirm("Are you sure you want to delete this enrollment?")&&h.Inertia.delete(route("admin.enrollments.destroy",n))}return(n,S)=>(i(),l(d,null,[s(r(f),{title:"Enrollments"}),s(y,null,{header:o(()=>[v]),actions:o(()=>[s(r(x),{href:n.route("admin.enrollments.create"),class:"ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500"},{default:o(()=>[k]),_:1},8,["href"])]),default:o(()=>[e("div",E,[e("div",A,[e("div",H,[e("div",M,[e("div",Y,[e("div",j,[B,e("div",C,[e("table",D,[L,e("tbody",null,[(i(!0),l(d,null,g(c.enrollments.data,t=>(i(),l("tr",{key:t.id,class:"focus:outline-none h-16 border border-gray-100 rounded",tabindex:"0"},[e("td",N,a(t.student.full_name),1),e("td",V,a(t.module.name),1),e("td",F,a(r(b)(t.enrolled_at).format("YYYY-MM-DD HH:mm")),1),e("td",I,[e("button",{onClick:_($=>u(t),["prevent"]),class:"focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-red-600 py-3 px-5 bg-red-100 rounded hover:bg-red-200 focus:outline-none"},"Remove",8,P)])]))),128))])])]),s(w,{links:c.enrollments.links,class:"mt-6"},null,8,["links"])])])])])])])]),_:1})],64))}};export{G as default};
