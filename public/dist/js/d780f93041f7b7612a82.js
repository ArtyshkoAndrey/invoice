"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[24],{7399:(t,e,s)=>{s.d(e,{Z:()=>i});var a=s(1519),n=s.n(a)()((function(t){return t[1]}));n.push([t.id,'.wrapper_step[data-v-cc4a585c]{margin-left:30px;margin-right:30px;padding:0}.wrapper_step[data-v-cc4a585c]:first-child{margin-left:0}.wrapper_step[data-v-cc4a585c]:last-child{margin-right:0}.wrapper_step:last-child .some_step[data-v-cc4a585c]:after{content:none}.some_step[data-v-cc4a585c]{background:transparent;border-color:rgb(var(--vs-gray-4))!important;cursor:pointer;height:40px;position:relative;width:40px}.some_step[data-v-cc4a585c]:after{background:rgb(var(--vs-gray-4))!important;content:"";display:block;height:2px;left:40px;position:absolute;top:calc(50% - 2px);width:60px}.some_step.active[data-v-cc4a585c]{background:rgb(var(--vs-primary));border-color:rgb(var(--vs-primary))!important;color:#fff}.some_step.success[data-v-cc4a585c]{background:rgb(var(--vs-success));border-color:rgb(var(--vs-success))!important;color:#fff}',""]);const i=n},8461:(t,e,s)=>{s.d(e,{Z:()=>i});var a=s(1519),n=s.n(a)()((function(t){return t[1]}));n.push([t.id,".slide-fade-enter-active[data-v-e3daceb6]{transition:all .3s ease}.slide-fade-leave-active[data-v-e3daceb6]{transition:all .3s cubic-bezier(1,.5,.8,1)}.slide-fade-enter[data-v-e3daceb6],.slide-fade-leave-to[data-v-e3daceb6]{opacity:0;transform:translateX(10px)}",""]);const i=n},2024:(t,e,s)=>{s.r(e),s.d(e,{default:()=>B});var a=s(7757),n=s.n(a),i=s(538),r=s(9669),o=s.n(r);const c={name:"Stepper",props:{count:{type:Number,required:!1,default:5},bus:{type:i.default,required:!0}},data:function(){return{steps:[],localStep:{}}},mounted:function(){for(var t,e=0;e<this.count;)t="default",0===e&&(t="active",this.localStep={step:e+1,status:"default"}),this.steps.push({status:t,step:e+1}),e++;this.bus.$on("setStatus",this.setStatus)},methods:{setStatus:function(t){var e=this.steps.find((function(e){return e.step===t.step+1}));this.localStep.step===t.step&&(this.localStep.status=t.status),console.log("load new Status",e),this.setStatusStep(e)},setStatusStep:function(t){var e=this;if(console.log("parent step","default"===t.status&&"default"===this.localStep.status),"default"===t.status&&t.step-this.localStep.step>=1&&"default"===t.status&&"default"===this.localStep.status)return console.log("set step if False"),!1;var s=this.steps.find((function(t){return t.step===e.localStep.step}));s.status=this.localStep.status,console.log("is this step",s),this.localStep={step:t.step,status:t.status},t.status="active",console.log("new step",t),this.bus.$emit("changeStep",t.step)}}};var l=s(3379),u=s.n(l),d=s(7399),p={insert:"head",singleton:!1};u()(d.Z,p);d.Z.locals;var v=s(1900);const f=(0,v.Z)(c,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"row justify-content-center w-100"},t._l(t.steps,(function(e){return s("div",{staticClass:"d-flex w-auto wrapper_step"},[s("div",{staticClass:"border some_step d-flex justify-content-center align-items-center rounded-circle",class:e.status,on:{click:function(s){return t.setStatusStep(e)}}},["success"===e.status?s("i",{staticClass:"bx bx-check",attrs:{"aria-hidden":"true"}}):s("span",{staticClass:"d-flex"},[t._v(t._s(e.step))])])])})),0)}),[],!1,null,"cc4a585c",null).exports;const m={name:"Step1",props:{companies:{required:!0,type:Array}}};const h=(0,v.Z)(m,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card"},[t._m(0),t._v(" "),s("div",{staticClass:"card-body p-0 pb-3"},[s("div",{staticClass:"mx-3 my-2"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 col-md-6 col-lg-4"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.company_name")},scopedSlots:t._u([t.$parent.companyError?{key:"message-danger",fn:function(){return[t._v("\n              "+t._s(t.$parent.companyError)+"\n            ")]},proxy:!0}:null],null,!0),model:{value:t.$parent.form.company,callback:function(e){t.$set(t.$parent.form,"company",e)},expression:"$parent.form.company"}},[t._v(" "),t._l(t.companies,(function(e){return s("vs-option",{key:e.id,attrs:{label:e.name,value:e.id}},[t._v("\n              "+t._s(e.name)+"\n            ")])}))],2)],1),t._v(" "),s("div",{staticClass:"col-12 col-md-6 col-lg-4"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.company_ref")},scopedSlots:t._u([t.$parent.companyError?{key:"message-danger",fn:function(){return[t._v("\n              "+t._s(t.$parent.companyError)+"\n            ")]},proxy:!0}:null],null,!0),model:{value:t.$parent.form.company,callback:function(e){t.$set(t.$parent.form,"company",e)},expression:"$parent.form.company"}},[t._v(" "),t._l(t.companies,(function(e){return s("vs-option",{key:e.id,attrs:{label:e.code,value:e.id}},[t._v("\n              "+t._s(e.code)+"\n            ")])}))],2)],1)]),t._v(" "),s("div",{staticClass:"row justify-content-end"},[s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{flat:""},on:{click:t.$parent.next},scopedSlots:t._u([!1===t.$parent.companyError?{key:"animate",fn:function(){return[s("i",{staticClass:"bx bx-right-arrow-alt fs-2",attrs:{"aria-hidden":"true"}})]},proxy:!0}:{key:"animate",fn:function(){return[s("i",{staticClass:"bx bx-x fs-2",attrs:{"aria-hidden":"true"}})]},proxy:!0}],null,!0)},[t._v("\n            "+t._s(t.$t("invoice.buttons.next"))+"\n\n            ")])],1)])])])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-title px-3 pb-2 pt-4"},[s("h6",{staticClass:"fw-light text-reset"},[t._v("Шаг 1 из 5 "),s("span",{staticClass:"fw-bolder"},[t._v("Компания")])])])}],!1,null,"195897b5",null).exports;const _={name:"Step_2"};const b=(0,v.Z)(_,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card"},[t._m(0),t._v(" "),s("div",{staticClass:"card-body p-0 pb-3"},[s("div",{staticClass:"mx-3 my-2"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 col-md-6 col-lg-4"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.user.name")},scopedSlots:t._u([{key:"icon",fn:function(){return[s("i",{staticClass:"bx bx-user",attrs:{"aria-hidden":"true"}})]},proxy:!0},t.$parent.userNameError?{key:"message-danger",fn:function(){return[t._v("\n              "+t._s(t.$parent.userNameError)+"\n            ")]},proxy:!0}:null],null,!0),model:{value:t.$parent.form.user.name,callback:function(e){t.$set(t.$parent.form.user,"name",e)},expression:"$parent.form.user.name"}})],1),t._v(" "),s("div",{staticClass:"col-12 col-md-6 col-lg-4"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.user.nationality")},scopedSlots:t._u([{key:"icon",fn:function(){return[s("i",{staticClass:"bx bx-globe",attrs:{"aria-hidden":"true"}})]},proxy:!0},t.$parent.userNationalityError?{key:"message-danger",fn:function(){return[t._v("\n              "+t._s(t.$parent.userNationalityError)+"\n            ")]},proxy:!0}:null],null,!0),model:{value:t.$parent.form.user.nationality,callback:function(e){t.$set(t.$parent.form.user,"nationality",e)},expression:"$parent.form.user.nationality"}})],1)]),t._v(" "),s("div",{staticClass:"row justify-content-end"},[s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{flat:""},on:{click:t.$parent.next},scopedSlots:t._u([!1===t.$parent.userNationalityError&&!1===t.$parent.userNameError?{key:"animate",fn:function(){return[s("i",{staticClass:"bx bx-right-arrow-alt fs-2",attrs:{"aria-hidden":"true"}})]},proxy:!0}:{key:"animate",fn:function(){return[s("i",{staticClass:"bx bx-x fs-2",attrs:{"aria-hidden":"true"}})]},proxy:!0}],null,!0)},[t._v("\n            "+t._s(t.$t("invoice.buttons.next"))+"\n\n            ")])],1)])])])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-title px-3 pb-2 pt-4"},[s("h6",{staticClass:"fw-light text-reset"},[t._v("Шаг 2 из 5 "),s("span",{staticClass:"fw-bolder"},[t._v("Данные пользователя")])])])}],!1,null,"e33e3a8a",null).exports;var g=s(7410);function y(t,e,s,a,n,i,r){try{var o=t[i](r),c=o.value}catch(t){return void s(t)}o.done?e(c):Promise.resolve(c).then(a,n)}function x(t){return function(){var e=this,s=arguments;return new Promise((function(a,n){var i=t.apply(e,s);function r(t){y(i,a,n,r,o,"next",t)}function o(t){y(i,a,n,r,o,"throw",t)}r(void 0)}))}}const $={name:"Step_3",components:{Loader:g.Z},props:{hotelsOnw:{type:Array,require:!1,default:null}},data:function(){return{hotels:[],rooms:[],loading:!0,h:[]}},mounted:function(){var t=this;return x(n().mark((function e(){return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,t.getHotels();case 2:return e.next=4,t.getRooms();case 4:if(!(t.hotelsOnw instanceof Array)){e.next=13;break}if(!(t.hotelsOnw.length>0)){e.next=9;break}t.h=t.hotelsOnw,e.next=11;break;case 9:return e.next=11,t.createNewHotel();case 11:e.next=15;break;case 13:return e.next=15,t.createNewHotel();case 15:case"end":return e.stop()}}),e)})))()},computed:{disabledNext:function(){var t=!1;return 0===this.h.length&&(t=!0),this.h.forEach((function(e){""!==e.hotel_id&&""!==e.room_type_id&&""!==e.count&&""!==e.adults&&""!==e.children&&""!==e.check_in&&""!==e.check_out&&""!==e.booking_number||(t=!0)})),t}},methods:{getHotels:function(){var t=this;return x(n().mark((function e(){return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,o().get("/api/hotels").then((function(e){e.data.success?t.hotels=e.data.payload.hotels:(t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")}),t.$router.push({name:"dashboard.invoices.index"}))})).catch((function(e){t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")})}));case 2:case"end":return e.stop()}}),e)})))()},getRooms:function(){var t=this;return x(n().mark((function e(){return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,o().get("/api/room_types").then((function(e){e.data.success?t.rooms=e.data.payload.room_types:(t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")}),t.$router.push({name:"dashboard.invoices.index"}))})).catch((function(e){t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")})}));case 2:case"end":return e.stop()}}),e)})))()},createNewHotel:function(){this.h.push({hotel_id:"",room_type_id:"",count:"",extra_bed:!1,adults:"",children:"",bb:"BB",check_in:"",check_out:"",booking_number:""}),this.loading=!1},removeHotel:function(t){this.h.splice(t,1)},next:function(){var t=this;this.$parent.next((function(){t.$parent.form.hotels=t.h}))}}};const C=(0,v.Z)($,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card"},[t._m(0),t._v(" "),t.loading?s("div",{staticClass:"card-body"},[s("Loader")],1):s("div",{staticClass:"card-body p-0 pb-3"},[s("div",{staticClass:"mx-3 my-2"},[t._l(t.h,(function(e,a){return s("div",{staticClass:"row"},[s("div",{staticClass:"col-12"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 col-md-6 col-lg-4"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.hotel_name")},model:{value:e.hotel_id,callback:function(s){t.$set(e,"hotel_id",s)},expression:"hotel.hotel_id"}},t._l(t.hotels,(function(e){return s("vs-option",{key:e.id,attrs:{value:e.id,label:e.name}},[t._v("\n                  "+t._s(e.name)+"\n                ")])})),1)],1),t._v(" "),s("div",{staticClass:"d-none d-md-block col-auto"},[s("vs-button",{attrs:{danger:""},on:{click:function(e){return t.removeHotel(a)}}},[t._v("\n                "+t._s(t.$t("form.delete"))+"\n              ")])],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-6 col-lg-3"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.room_type")},model:{value:e.room_type_id,callback:function(s){t.$set(e,"room_type_id",s)},expression:"hotel.room_type_id"}},t._l(t.rooms,(function(e){return s("vs-option",{key:e.id,attrs:{value:e.id,label:e.name}},[t._v("\n                  "+t._s(e.name)+"\n                ")])})),1)],1),t._v(" "),s("div",{staticClass:"col col-md-6 col-lg-3"},[s("vs-input",{attrs:{type:"number",inputmode:"numeric",pattern:"[0-9]*",placeholder:t.$t("invoice.inputs.countable")},model:{value:e.count,callback:function(s){t.$set(e,"count",t._n(s))},expression:"hotel.count"}})],1),t._v(" "),s("div",{staticClass:"col-auto"},[s("vs-checkbox",{model:{value:e.extra_bed,callback:function(s){t.$set(e,"extra_bed",s)},expression:"hotel.extra_bed"}},[t._v("\n                "+t._s(t.$t("invoice.inputs.extra_bed"))+"\n              ")])],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{type:"number",inputmode:"numeric",pattern:"[0-9]*",placeholder:t.$t("invoice.inputs.adults")},model:{value:e.adults,callback:function(s){t.$set(e,"adults",t._n(s))},expression:"hotel.adults"}})],1),t._v(" "),s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{type:"number",inputmode:"numeric",pattern:"[0-9]*",placeholder:t.$t("invoice.inputs.children")},model:{value:e.children,callback:function(s){t.$set(e,"children",t._n(s))},expression:"hotel.children"}})],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-6 col-lg-4"},[s("vs-select",{attrs:{placeholder:t.$t("invoice.inputs.bb")},model:{value:e.bb,callback:function(s){t.$set(e,"bb",s)},expression:"hotel.bb"}},[s("vs-option",{attrs:{value:"BB",label:"BB"}},[t._v("\n                  "+t._s(t.$t("invoice.inputs.bb"))+"\n                ")])],1)],1)]),t._v(" "),s("div",{staticClass:"row mt-5 mb-4"},[s("div",{staticClass:"col-12"},[s("h6",{staticClass:"text-reset"},[t._v(t._s(t.$t("invoice.create.step_3.date_title")))])])]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-6 col-md-4 col-lg-3"},[s("vs-input",{attrs:{type:"date",label:t.$t("invoice.inputs.check_in")},model:{value:e.check_in,callback:function(s){t.$set(e,"check_in",s)},expression:"hotel.check_in"}})],1),t._v(" "),s("div",{staticClass:"col-6 col-md-4 col-lg-3"},[s("vs-input",{attrs:{type:"date",label:t.$t("invoice.inputs.check_out")},model:{value:e.check_out,callback:function(s){t.$set(e,"check_out",s)},expression:"hotel.check_out"}})],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.booking_number")},model:{value:e.booking_number,callback:function(s){t.$set(e,"booking_number",s)},expression:"hotel.booking_number"}})],1)])]),t._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"d-block d-md-none col-12"},[s("vs-button",{attrs:{danger:""},on:{click:function(e){return t.removeHotel(a)}}},[t._v("\n              "+t._s(t.$t("form.delete"))+"\n            ")])],1)]),t._v(" "),t.h.length>1&&a!==t.h.length-1?s("div",{staticClass:"col-12"},[s("hr")]):t._e()])})),t._v(" "),s("div",{staticClass:"row justify-content-start mt-5"},[s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{success:""},on:{click:t.createNewHotel}},[t._v("\n            "+t._s(t.$t("invoice.buttons.add_hotel"))+"\n          ")])],1)]),t._v(" "),s("div",{staticClass:"row justify-content-end"},[s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{disabled:t.disabledNext},on:{click:t.next}},[t._v("\n            "+t._s(t.$t("invoice.buttons.next"))+"\n          ")])],1)])],2)])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-title px-3 pb-2 pt-4"},[s("h6",{staticClass:"fw-light text-reset"},[t._v("Шаг 3 из 5 "),s("span",{staticClass:"fw-bolder"},[t._v("Данные отеля")])])])}],!1,null,"51d4d7af",null).exports;function k(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var s=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null==s)return;var a,n,i=[],r=!0,o=!1;try{for(s=s.call(t);!(r=(a=s.next()).done)&&(i.push(a.value),!e||i.length!==e);r=!0);}catch(t){o=!0,n=t}finally{try{r||null==s.return||s.return()}finally{if(o)throw n}}return i}(t,e)||function(t,e){if(!t)return;if("string"==typeof t)return w(t,e);var s=Object.prototype.toString.call(t).slice(8,-1);"Object"===s&&t.constructor&&(s=t.constructor.name);if("Map"===s||"Set"===s)return Array.from(t);if("Arguments"===s||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s))return w(t,e)}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function w(t,e){(null==e||e>t.length)&&(e=t.length);for(var s=0,a=new Array(e);s<e;s++)a[s]=t[s];return a}const S={name:"Step4",comments:{Loader:g.Z},data:function(){return{airports:[],loading:!0,transfer:{arrival_time:"",transport_id:"",arrival_airport_id:"",arrival_flight_code:"",departure_time:"",departure_airport_id:"",departure_flight_code:"",driver_number:"",driver_name:"",passengers:"",gid:!1}}},computed:{disabledNext:function(){var t=!1;return Object.entries(this.transfer).forEach((function(e){var s=k(e,2),a=s[0],n=s[1];console.log("".concat(a," ").concat(n)),""===n&&(t=!0)})),t}},mounted:function(){var t=this;o().get("/api/airports").then((function(e){e.data.success?(t.airports=e.data.payload.airports,t.loading=!1):t.$router.push({name:"dashboard.invoice.index"})})).catch((function(e){t.$router.push({name:"dashboard.invoice.index"})}))},methods:{next:function(){var t=this;this.$parent.next((function(){t.$parent.form.transfer=t.transfer}))}}};const E=(0,v.Z)(S,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card"},[t._m(0),t._v(" "),t.loading?s("div",{staticClass:"card-body"},[s("Loader")],1):s("div",{staticClass:"card-body p-0 pb-3"},[s("div",{staticClass:"mx-3 my-2"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.arrival_time"),type:"date"},model:{value:t.transfer.arrival_time,callback:function(e){t.$set(t.transfer,"arrival_time",e)},expression:"transfer.arrival_time"}})],1),t._v(" "),s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.airport")},model:{value:t.transfer.arrival_airport_id,callback:function(e){t.$set(t.transfer,"arrival_airport_id",e)},expression:"transfer.arrival_airport_id"}},t._l(t.airports,(function(e){return s("vs-option",{key:e.id,attrs:{label:e.name,value:e.id}},[t._v("\n              "+t._s(e.name)+"\n            ")])})),1)],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-3 col-lg-2"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.arrival_flight_code")},model:{value:t.transfer.arrival_flight_code,callback:function(e){t.$set(t.transfer,"arrival_flight_code",e)},expression:"transfer.arrival_flight_code"}})],1)]),t._v(" "),s("div",{staticClass:"row mt-5"},[s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.departure_time"),type:"date"},model:{value:t.transfer.departure_time,callback:function(e){t.$set(t.transfer,"departure_time",e)},expression:"transfer.departure_time"}})],1),t._v(" "),s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.airport")},model:{value:t.transfer.departure_airport_id,callback:function(e){t.$set(t.transfer,"departure_airport_id",e)},expression:"transfer.departure_airport_id"}},t._l(t.airports,(function(e){return s("vs-option",{key:e.id,attrs:{label:e.name,value:e.id}},[t._v("\n              "+t._s(e.name)+"\n            ")])})),1)],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-3 col-lg-2"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.departure_flight_code")},model:{value:t.transfer.departure_flight_code,callback:function(e){t.$set(t.transfer,"departure_flight_code",e)},expression:"transfer.departure_flight_code"}})],1)]),t._v(" "),s("div",{staticClass:"row mt-5"},[s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-select",{staticClass:"mw-100",attrs:{placeholder:t.$t("invoice.inputs.transport")},model:{value:t.transfer.transport_id,callback:function(e){t.$set(t.transfer,"transport_id",e)},expression:"transfer.transport_id"}},[s("vs-option",{attrs:{value:"Минивен",label:"Минивен"}},[t._v("\n              Минивен\n            ")])],1)],1),t._v(" "),s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.driver_number")},model:{value:t.transfer.driver_number,callback:function(e){t.$set(t.transfer,"driver_number",e)},expression:"transfer.driver_number"}})],1),t._v(" "),s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.driver_name")},model:{value:t.transfer.driver_name,callback:function(e){t.$set(t.transfer,"driver_name",e)},expression:"transfer.driver_name"}})],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("div",{staticClass:"col-12 col-md-4 col-lg-3"},[s("vs-input",{attrs:{placeholder:t.$t("invoice.inputs.passengers"),type:"number"},model:{value:t.transfer.passengers,callback:function(e){t.$set(t.transfer,"passengers",e)},expression:"transfer.passengers"}})],1)]),t._v(" "),s("div",{staticClass:"row mt-3"},[s("vs-checkbox",{model:{value:t.transfer.gid,callback:function(e){t.$set(t.transfer,"gid",e)},expression:"transfer.gid"}},[t._v("\n          "+t._s(t.$t("invoice.inputs.gid"))+"\n        ")])],1),t._v(" "),s("div",{staticClass:"row justify-content-end"},[s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{disabled:t.disabledNext},on:{click:t.next}},[t._v("\n            "+t._s(t.$t("invoice.buttons.next"))+"\n          ")])],1)])])])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-title px-3 pb-2 pt-4"},[s("h6",{staticClass:"fw-light text-reset"},[t._v("\n      Шаг 4 из 5 "),s("span",{staticClass:"fw-bolder"},[t._v("Трансфер")])])])}],!1,null,"d213ff42",null).exports;const j={name:"ChooseTemplate",props:{bus:{required:!0,type:i.default}},data:function(){return{active:!1,template_id:"",samples:[],loading:!0}},computed:{disableButton:function(){return""===this.template_id}},mounted:function(){this.bus.$on("open",this.open)},methods:{open:function(){var t=this;o().get("/api/samples").then((function(e){e.data.success?(t.samples=e.data.payload.samples,t.active=!0,setTimeout((function(){t.loading=!1}),500)):(t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")}),t.$router.push({name:"dashboard.invoice.index"}))})).catch((function(e){t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")}),t.$router.push({name:"dashboard.invoice.index"})}))},done:function(){var t,e=this;this.loading=!0,o().get("/api/samples/"+this.template_id).then((function(s){s.data.success?((t=s.data.payload.sample).days.forEach((function(t){null===t.resort&&(t.resort={id:""})})),e.bus.$emit("setTemplate",t),e.active=!1):e.error=s.data.message,e.loading=!1})).catch((function(t){e.$vs.notification({title:e.$t("notification.get.danger.title"),text:e.$t("notification.get.danger.text")}),e.loading=!1}))}}};const O=(0,v.Z)(j,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("vs-dialog",{attrs:{loading:t.loading},scopedSlots:t._u([{key:"header",fn:function(){return[s("h4",{staticClass:"m-0"},[t._v("\n      "+t._s(t.$t("invoice.create.step_5.template.title"))+"\n    ")])]},proxy:!0},{key:"footer",fn:function(){return[s("div",{staticClass:"footer-dialog"},[s("vs-button",{attrs:{block:"",success:"",disabled:t.disableButton},on:{click:t.done}},[t._v("\n        "+t._s(t.$t("invoice.create.step_5.template.done"))+"\n      ")])],1)]},proxy:!0}]),model:{value:t.active,callback:function(e){t.active=e},expression:"active"}},[t._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-12"},[s("vs-select",{staticClass:"mw-100",model:{value:t.template_id,callback:function(e){t.template_id=e},expression:"template_id"}},t._l(t.samples,(function(e){return s("vs-option",{key:e.id,attrs:{value:e.id,label:e.name}},[t._v("\n          "+t._s(e.name)+"\n        ")])})),1)],1)])])}),[],!1,null,"fa17cc74",null).exports,N={name:"Step5",components:{Loader:g.Z,ChooseTemplate:O},props:{sample:{type:Object,require:!0,default:null}},data:function(){return{bus:new i.default,loading:!1,template:null,setTemplateFlag:!1,resorts:[]}},computed:{disabledNext:function(){var t=!1;return null===this.template||this.template.days.length<=0?t=!0:this.template.days.forEach((function(e){if((""===e.resort.id||null===e.resort.id)&&!1===e.free)return t=!0,0})),t}},watch:{template:{handler:function(t){this.$parent.form.sample=t},deep:!0}},mounted:function(){this.bus.$on("setTemplate",this.setTemplate),null!==this.sample&&this.setTemplate(this.sample)},methods:{setTemplate:function(t){this.template=null!==t?t:{days:[],name:""},this.loading=!0,this.setTemplateFlag=!0,this.getResorts()},getResorts:function(){var t=this;o().get("/api/resorts").then((function(e){e.data.success?(t.resorts=e.data.payload.resorts,t.loading=!1):(t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")}),t.$router.push({name:"dashboard.invoice.index"}))})).catch((function(e){t.$vs.notification({title:t.$t("notification.get.danger.title"),text:t.$t("notification.get.danger.text")}),t.$router.push({name:"dashboard.invoice.index"})}))},addDay:function(){this.template.days.push({id:"",order:"",resort:{id:""},free:!1})},removeDay:function(t){this.template.days=this.template.days.filter((function(e,s){return s!==t}))}}};function Z(t,e){var s=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),s.push.apply(s,a)}return s}function T(t,e,s){return e in t?Object.defineProperty(t,e,{value:s,enumerable:!0,configurable:!0,writable:!0}):t[e]=s,t}function P(t,e,s,a,n,i,r){try{var o=t[i](r),c=o.value}catch(t){return void s(t)}o.done?e(c):Promise.resolve(c).then(a,n)}const F={name:"Create",components:{Stepper:f,Step_1:h,Step_2:b,Step_3:C,Step_4:E,Step_5:(0,v.Z)(N,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card"},[t._m(0),t._v(" "),t.loading?s("div",{staticClass:"card-body p-0 pb-3"},[s("Loader")],1):s("div",{staticClass:"card-body p-0 pb-3"},[s("div",{staticClass:"mx-3 my-2"},[t.setTemplateFlag?s("div",[t._l(t.template.days,(function(e,a){return s("div",{key:a,staticClass:"row align-items-center my-2"},[s("div",{staticClass:"col-lg-auto col-sm-2 col-4"},[s("p",{staticClass:"mb-0"},[t._v("\n              "+t._s(t.$t("samples.edit.day",{number:a+1}))+"\n            ")])]),t._v(" "),s("div",{staticClass:"col-lg-auto col-sm-4 col-8"},[s("vs-select",{attrs:{placeholder:"Курорты",disabled:e.free},model:{value:e.resort.id,callback:function(s){t.$set(e.resort,"id",s)},expression:"day.resort.id"}},t._l(t.resorts,(function(a){return s("vs-option",{key:a.id,attrs:{label:a.name,value:a.id,disabled:e.free}},[t._v("\n                "+t._s(a.name)+"\n              ")])})),1)],1),t._v(" "),s("div",{staticClass:"col-lg-auto col-sm-2 col-6 mt-2 mt-lg-0"},[s("vs-checkbox",{model:{value:e.free,callback:function(s){t.$set(e,"free",s)},expression:"day.free"}},[t._v("\n              "+t._s(t.$t("samples.edit.free_day"))+"\n            ")])],1),t._v(" "),s("div",{staticClass:"col-lg-auto col-sm col-6 mt-2 mt-lg-0"},[s("vs-button",{attrs:{circle:"",danger:"",flat:""},on:{click:function(e){return t.removeDay(a)}}},[s("em",{staticClass:"bx bx-trash-alt d-none d-lg-block"}),t._v(" "),s("span",{staticClass:"d-block d-lg-none"},[t._v(t._s(t.$t("form.delete")))])])],1),t._v(" "),t._m(1,!0)])})),t._v(" "),s("div",{staticClass:"row justify-content-between align-items-center mt-3"},[s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{gradient:""},on:{click:t.addDay}},[t._v("\n              "+t._s(t.$t("samples.edit.add_day"))+"\n            ")])],1),t._v(" "),s("div",{staticClass:"col-auto"},[s("vs-button",{attrs:{disabled:t.disabledNext},on:{click:t.$parent.next}},[t._v("\n              "+t._s(t.$t("invoice.buttons.next"))+"\n            ")])],1)])],2):s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 col-md-auto"},[s("vs-button",{attrs:{success:""},on:{click:function(e){return t.bus.$emit("open")}}},[t._v("\n            "+t._s(t.$t("invoice.buttons.choose_template"))+"\n          ")])],1),t._v(" "),s("div",{staticClass:"col-12 col-md-auto"},[s("vs-button",{attrs:{success:"",flat:""},on:{click:function(e){return t.setTemplate(null)}}},[t._v("\n            "+t._s(t.$t("invoice.buttons.create_new_template"))+"\n          ")])],1)])])]),t._v(" "),s("ChooseTemplate",{attrs:{bus:t.bus}})],1)}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"card-title px-3 pb-2 pt-4"},[s("h6",{staticClass:"fw-light text-reset"},[t._v("\n      Шаг 5 из 5 "),s("span",{staticClass:"fw-bolder"},[t._v("Программа")])])])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"col-12"},[e("hr",{staticClass:"d-block d-lg-none"})])}],!1,null,"27982907",null).exports,Loader:g.Z},data:function(){return{stepForm:1,bus:new i.default,companies:[],form:{company:"",user:{name:"",nationality:""},hotels:[],transfer:{},sample:null}}},computed:{step:{get:function(){return this.stepForm},set:function(t){console.log("Пришло на set",t),t<0||t>5?this.$vs.notification({duration:2e3,sticky:!0,position:"top-right",color:"danger",title:"Ошибка!",text:"Вы ушли за границу данных"}):(this.stepForm=t,console.log("Сохранило в set",t))}},companyError:function(){return(""===this.form.company||null===this.form.company)&&this.$t("invoice.errors.company")},userNameError:function(){return(""===this.form.user.name||null===this.form.user.name)&&this.$t("invoice.errors.user.name")},userNationalityError:function(){return(""===this.form.user.nationality||null===this.form.user.nationality)&&this.$t("invoice.errors.user.nationality")}},mounted:function(){var t,e=this;return(t=n().mark((function t(){return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.bus.$on("changeStep",e.changeStep),t.next=3,o().get("/api/companies").then((function(t){e.companies=t.data.payload.companies})).catch((function(t){e.$vs.notification({title:e.$t("notification.get.danger.title"),text:e.$t("notification.get.danger.text")})}));case 3:return t.next=5,e.$root.$loading.finish();case 5:case"end":return t.stop()}}),t)})),function(){var e=this,s=arguments;return new Promise((function(a,n){var i=t.apply(e,s);function r(t){P(i,a,n,r,o,"next",t)}function o(t){P(i,a,n,r,o,"throw",t)}r(void 0)}))})()},methods:{changeStep:function(t){console.log("changeStep",t),this.step=t},notifyError:function(){this.$vs.notification({duration:2e3,sticky:!0,position:"top-right",color:"danger",title:this.$t("invoice.errors.validateInputs.title"),text:this.$t("invoice.errors.validateInputs.text")})},next:function(t){if(1===this.step){if(this.companyError)return this.notifyError(),!1;this.bus.$emit("setStatus",{step:this.step,status:"success"})}else if(2===this.step){if(this.userNationalityError||this.userNameError)return this.notifyError(),!1;this.bus.$emit("setStatus",{step:this.step,status:"success"})}else 3===this.step||4===this.step?this.bus.$emit("setStatus",{step:this.step,status:"success"}):5===this.step&&this.createInvoice();"function"==typeof t&&t()},createInvoice:function(){var t=this;this.loading=!0,o().post("/api/invoices",function(t){for(var e=1;e<arguments.length;e++){var s=null!=arguments[e]?arguments[e]:{};e%2?Z(Object(s),!0).forEach((function(e){T(t,e,s[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(s)):Z(Object(s)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(s,e))}))}return t}({},this.form)).then((function(e){e.data.success?t.$router.push({name:"dashboard.invoice.index"}):t.notifyError()})).catch((function(e){422===e.response.status?(t.$vs.notification({title:"Ошибка",text:e.response.data.message}),Object.keys(e.response.data.errors).forEach((function(s){t.$vs.notification({title:s.capitalize(),text:e.response.data.errors[s]})}))):404===e.response.status&&t.$vs.notification({title:"Ошибка",text:e.response.data.message})}))}}};var A=s(8461),H={insert:"head",singleton:!1};u()(A.Z,H);A.Z.locals;const B=(0,v.Z)(F,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("transition",{attrs:{appear:"",mode:"out-in",name:"fade"}},[t.$root.$loading.show?s("Loader",{key:"1"}):s("div",{key:"2",attrs:{id:"groupCollapse"}},[s("div",{staticClass:"row justify-content-center mb-5"},[s("div",{staticClass:"col-12 col-mg-8 col-lg justify-content-center"},[s("Stepper",{attrs:{bus:t.bus,count:5}})],1)]),t._v(" "),s("div",{staticClass:"row mx-0"},[s("div",{staticClass:"col-12"},[s("transition",{attrs:{name:"slide-fade",appear:"",mode:"out-in"}},[1===t.stepForm?s("Step_1",{key:"1",attrs:{companies:t.companies}}):t._e(),t._v(" "),2===t.stepForm?s("Step_2",{key:"2"}):t._e(),t._v(" "),3===t.stepForm?s("Step_3",{key:"3"}):t._e(),t._v(" "),4===t.stepForm?s("Step_4",{key:"4"}):t._e(),t._v(" "),5===t.stepForm?s("Step_5",{key:"5",attrs:{sample:t.form.sample}}):t._e()],1)],1)])])],1)}),[],!1,null,"e3daceb6",null).exports}}]);