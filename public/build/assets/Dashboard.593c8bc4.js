import{B as p,_ as f,a as g,b as v,c as h}from"./ResponsiveNavLink.48574363.js";import{r as b,o as r,c as d,d as e,a as o,w as a,u as _,L as x,e as n,t as i,n as l,f as u,g as w,H as y,F as k}from"./app.98f3858a.js";const $={class:"min-h-screen bg-gray-100"},B={class:"bg-white border-b border-gray-100"},D={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},L={class:"flex justify-between h-16"},C={class:"flex"},M={class:"shrink-0 flex items-center"},N={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},j=n(" Dashboard "),V={class:"hidden sm:flex sm:items-center sm:ml-6"},z={class:"ml-3 relative"},A={class:"inline-flex rounded-md"},F={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"},H=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),O=n(" Log Out "),S={class:"-mr-2 flex items-center sm:hidden"},E={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},T={class:"pt-2 pb-3 space-y-1"},Y=n(" Dashboard "),q={class:"pt-4 pb-1 border-t border-gray-200"},G={class:"px-4"},I={class:"font-medium text-base text-gray-800"},J={class:"font-medium text-sm text-gray-500"},K={class:"mt-3 space-y-1"},P=n(" Log Out "),Q={key:0,class:"bg-white shadow"},R={class:"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},U={__name:"Authenticated",setup(m){const t=b(!1);return(s,c)=>(r(),d("div",null,[e("div",$,[e("nav",B,[e("div",D,[e("div",L,[e("div",C,[e("div",M,[o(_(x),{href:s.route("dashboard")},{default:a(()=>[o(p,{class:"block h-9 w-auto"})]),_:1},8,["href"])]),e("div",N,[o(f,{href:s.route("dashboard"),active:s.route().current("dashboard")},{default:a(()=>[j]),_:1},8,["href","active"])])]),e("div",V,[e("div",z,[o(v,{align:"right",width:"48"},{trigger:a(()=>[e("span",A,[e("button",F,[n(i(s.$page.props.auth.user.name)+" ",1),H])])]),content:a(()=>[o(g,{href:s.route("logout"),method:"post",as:"button"},{default:a(()=>[O]),_:1},8,["href"])]),_:1})])]),e("div",S,[e("button",{onClick:c[0]||(c[0]=Z=>t.value=!t.value),class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"},[(r(),d("svg",E,[e("path",{class:l({hidden:t.value,"inline-flex":!t.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:l({hidden:!t.value,"inline-flex":t.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:l([{block:t.value,hidden:!t.value},"sm:hidden"])},[e("div",T,[o(h,{href:s.route("dashboard"),active:s.route().current("dashboard")},{default:a(()=>[Y]),_:1},8,["href","active"])]),e("div",q,[e("div",G,[e("div",I,i(s.$page.props.auth.user.name),1),e("div",J,i(s.$page.props.auth.user.email),1)]),e("div",K,[o(h,{href:s.route("logout"),method:"post",as:"button"},{default:a(()=>[P]),_:1},8,["href"])])])],2)]),s.$slots.header?(r(),d("header",Q,[e("div",R,[u(s.$slots,"header")])])):w("",!0),e("main",null,[u(s.$slots,"default")])])]))}},W=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Dashboard ",-1),X=e("div",{class:"py-12"},[e("div",{class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},[e("div",{class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},[e("div",{class:"p-6 bg-white border-b border-gray-200"}," You're logged in as a teacher or admin ")])])],-1),te={__name:"Dashboard",setup(m){return(t,s)=>(r(),d(k,null,[o(_(y),{title:"Dashboard"}),o(U,null,{header:a(()=>[W]),default:a(()=>[X]),_:1})],64))}};export{te as default};
