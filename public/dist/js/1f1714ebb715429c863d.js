"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[467],{8616:(t,e,a)=>{a.d(e,{Z:()=>o});function n(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,n)}return a}function s(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?n(Object(a),!0).forEach((function(e){i(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):n(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function i(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}const r={name:"EditItemsModal",props:{bus:{type:a(538).default,required:!0},title:{type:String,required:!1,default:""},fields:{type:Array,required:!0},inputs:{type:Object,default:new Object}},data:function(){return{active:!1,data:{},nameTitle:"",loading:!1,error:{}}},mounted:function(){this.data=this.inputs,this.data.name&&(this.nameTitle=this.data.name),this.bus.$on("openModal",this.openModal)},computed:{translateTitle:function(){return""===this.title?this.$t("form.title.edit"):this.$t(this.title)}},methods:{openModal:function(){this.active=!0},save:function(){this.loading=!0,this.bus.$emit("save",s(s({},this.data),{},{callbackSuccess:this.callbackSuccess,callbackError:this.callbackError}))},callbackSuccess:function(){this.active=!1,this.loading=!1,this.error={}},callbackError:function(t){this.loading=!1,this.error=t}}};const o=(0,a(1900).Z)(r,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("vs-dialog",{attrs:{loading:t.loading,"not-center":"",width:"300px"},scopedSlots:t._u([{key:"header",fn:function(){return[a("h4",{staticClass:"not-margin"},[t._v("\n      "+t._s(t.translateTitle)+" "),t.nameTitle?a("strong",[t._v(t._s(t.nameTitle))]):t._e()])]},proxy:!0},{key:"footer",fn:function(){return[a("div",{staticClass:"row justify-content-end align-items-center"},[a("div",{staticClass:"col-auto"},[a("vs-button",{attrs:{flat:"",success:""},on:{click:t.save}},[t._v("\n          "+t._s(t.$t("form.save"))+"\n        ")])],1),t._v(" "),a("div",{staticClass:"col-auto"},[a("vs-button",{attrs:{danger:"",flat:""},on:{click:function(e){t.active=!1}}},[t._v("\n          "+t._s(t.$t("form.cancel"))+"\n        ")])],1)])]},proxy:!0}]),model:{value:t.active,callback:function(e){t.active=e},expression:"active"}},[t._v(" "),a("div",{staticClass:"con-content"},[t._l(t.fields,(function(e){return"id"!==e?a("vs-input",{key:e,staticClass:"mt-2",attrs:{placeholder:t.$t("form.inputs."+e+".placeholder")},scopedSlots:t._u([t.error[e]?{key:"message-danger",fn:function(){return[t._v("\n        "+t._s(t.error[e][0])+"\n      ")]},proxy:!0}:null],null,!0),model:{value:t.data[e],callback:function(a){t.$set(t.data,e,a)},expression:"data[field]"}}):t._e()})),t._v(" "),t.error.message?a("span",{staticClass:"text-danger"},[t._v("\n      "+t._s(t.error.message)+"\n    ")]):t._e()],2)])}),[],!1,null,"4c4df356",null).exports},5801:(t,e,a)=>{a.d(e,{Z:()=>i});var n=a(538);const s={name:"ItemCardOneField",components:{EditItemsModal:a(8616).Z},props:{item:{type:Object,required:!0},fields:{type:Array,required:!0},updateModalTitle:{type:String,required:!1,default:""},hideId:{type:Boolean,default:!0}},data:function(){return{bus:new n.default}},computed:{inputs:function(){var t=this,e={};return this.fields.forEach((function(a){e[a]=t.item[a]})),e},checkTitleRouter:function(){return void 0!==this.$attrs["title-router"]}},mounted:function(){this.bus.$on("save",this.update)},methods:{openModal:function(){this.bus.$emit("openModal",{name:this.name,id:this.id})},update:function(t){this.$emit("update",t)},routePush:function(t){console.log(void 0!==this.$attrs["title-router"]),void 0!==this.$attrs["title-router"]&&(0!==t||this.hideId||this.$emit("title-route"),1===t&&this.hideId&&this.$emit("title-route"))}}};const i=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("div",{staticClass:"card"},[a("div",{staticClass:"card-body"},[a("div",{staticClass:"row align-items-center mx-0"},[t._l(t.fields,(function(e,n){return a("div",{key:e,staticClass:"col-auto",class:"id"===e&&t.hideId||"password"===e?"d-none":""},[a("h6",{staticClass:"mb-0",style:t.checkTitleRouter?"cursor: pointer":"",on:{click:function(e){return t.routePush(n)}}},[t._v("\n            "+t._s(t.inputs[e])+"\n          ")])])})),t._v(" "),a("div",{staticClass:"col-auto ms-auto"},[a("div",{staticClass:"row gx-0"},[a("div",{staticClass:"col"},[a("vs-button",{attrs:{icon:"",circle:"",success:"",flat:""},on:{click:t.openModal}},[a("em",{staticClass:"bx bx-pencil"})])],1),t._v(" "),a("div",{staticClass:"col"},[a("vs-button",{attrs:{icon:"",circle:"",danger:"",flat:""},on:{click:function(e){return t.$emit("destroy",t.inputs.id)}}},[a("em",{staticClass:"bx bx-trash-alt"})])],1)])])],2)])]),t._v(" "),a("EditItemsModal",{attrs:{bus:t.bus,title:t.updateModalTitle,fields:t.fields,inputs:t.inputs}})],1)}),[],!1,null,"158ba340",null).exports},467:(t,e,a)=>{a.r(e),a.d(e,{default:()=>v});var n=a(7757),s=a.n(n),i=a(9669),r=a.n(i),o=a(7410),l=a(901),c=a(5801),u=a(8616),d=a(538),f=a(266);function h(t,e,a,n,s,i,r){try{var o=t[i](r),l=o.value}catch(t){return void a(t)}o.done?e(l):Promise.resolve(l).then(n,s)}const p={name:"Index",components:{Loader:o.Z,HeaderFilterInfo:l.Z,ItemCardOneField:c.Z,EditItemsModal:u.Z},data:function(){return{title:f.Z.t("hotels.index.title"),viewLength:10,hotels:{},filter:new d.default,busCreateHotel:new d.default,inputs:["id","name"]}},metaInfo:{title:f.Z.t("hotels.index.title")},mounted:function(){var t,e=this;return(t=s().mark((function t(){return s().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,e.busCreateHotel.$on("save",e.store);case 2:return t.next=4,e.$root.$loading.set(50);case 4:return t.next=6,r().get("/api/hotels",{params:{per_page:e.viewLength}}).then((function(t){console.log(t.data),e.hotels=t.data.payload.hotels,e.$root.$loading.finish()})).catch((function(t){console.log(t),e.$root.$loading.fail()}));case 6:case"end":return t.stop()}}),t)})),function(){var e=this,a=arguments;return new Promise((function(n,s){var i=t.apply(e,a);function r(t){h(i,n,s,r,o,"next",t)}function o(t){h(i,n,s,r,o,"throw",t)}r(void 0)}))})()},methods:{get:function(t){var e=this;r().get("/api/hotels",{params:{per_page:this.viewLength,page:t.page,search:t.search}}).then((function(t){e.hotels=t.data.payload.hotels,e.filter.$emit("updateData",t.data.payload.hotels),console.log("new data",t.data)}))},setViewLength:function(t){this.viewLength=t},deleteItem:function(t){var e=this;r().delete("/api/hotels/"+t).then((function(t){e.$vs.notification({duration:2e3,sticky:!0,position:"top-right",color:"success",title:e.$t("notification.delete.success.title",{name:t.data.payload.hotel.name}),text:e.$t("notification.delete.success.text",{name:t.data.payload.hotel.name})}),e.get({page:e.$refs.filter.page,search:e.$refs.filter.value})})).catch((function(t){e.$vs.notification({duration:2e3,sticky:!0,position:"top-right",color:"danger",title:e.$t("notification.delete.danger.title"),text:e.$t("notification.delete.danger.text")}),e.get({page:e.$refs.filter.page,search:e.$refs.filter.value})}))},update:function(t){var e=this;r().put("/api/hotels/"+t.id,{name:t.name}).then((function(a){a.data.success?(t.callbackSuccess(),e.get({page:e.$refs.filter.page,search:e.$refs.filter.value})):t.callbackError("Не предвиденная ошибка")})).catch((function(e){e.response.data.errors?t.callbackError(e.response.data.errors):t.callbackError({message:e.response.data.message})}))},store:function(t){var e=this;r().post("/api/hotels/",{name:t.name}).then((function(a){a.data.success?(t.callbackSuccess(),e.get({page:e.$refs.filter.page,search:e.$refs.filter.value})):t.callbackError("Server return Error")})).catch((function(e){e.response.data.errors?t.callbackError(e.response.data.errors):t.callbackError({message:e.response.data.message})}))}}};const v=(0,a(1900).Z)(p,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.$root.$loading.show?a("Loader"):a("div",[a("HeaderFilterInfo",{ref:"filter",attrs:{filter:t.filter,title:t.$t("hotels.index.filter_title"),values:t.hotels,"view-length":t.viewLength},on:{create:function(e){return t.busCreateHotel.$emit("openModal")},get:t.get,setViewLength:t.setViewLength}}),t._v(" "),a("div",{staticClass:"row gy-3 mt-3"},t._l(t.hotels.data,(function(e){return a("div",{key:e.id,staticClass:"col-12"},[a("ItemCardOneField",{attrs:{fields:t.inputs,item:e,"update-modal-title":"hotels.edit-modal.title"},on:{destroy:t.deleteItem,update:t.update}})],1)})),0),t._v(" "),a("EditItemsModal",{attrs:{bus:t.busCreateHotel,fields:t.inputs,inputs:{},title:"hotels.create-modal.title"}})],1)}),[],!1,null,"286c075a",null).exports}}]);