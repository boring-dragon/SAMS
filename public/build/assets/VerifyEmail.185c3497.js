import{g as u,l as f,o as a,h as _,w as s,a as i,u as e,H as h,c as g,e as p,d as o,n as y,L as v,i as b,j as n}from"./app.ee471600.js";import{_ as k,a as x}from"./Guest.0cf70441.js";const w=o("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B=["onSubmit"],E={class:"mt-4 flex items-center justify-between"},L=n(" Resend Verification Email "),N=n("Log Out"),H={__name:"VerifyEmail",props:{status:String},setup(r){const c=r,t=u(),d=()=>{t.post(route("verification.send"))},l=f(()=>c.status==="verification-link-sent");return(m,S)=>(a(),_(k,null,{default:s(()=>[i(e(h),{title:"Email Verification"}),w,e(l)?(a(),g("div",V," A new verification link has been sent to the email address you provided during registration. ")):p("",!0),o("form",{onSubmit:b(d,["prevent"])},[o("div",E,[i(x,{class:y({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[L]),_:1},8,["class","disabled"]),i(e(v),{href:m.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:s(()=>[N]),_:1},8,["href"])])],40,B)]),_:1}))}};export{H as default};