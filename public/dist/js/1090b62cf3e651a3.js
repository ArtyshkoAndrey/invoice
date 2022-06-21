"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[834],{6834:(s,t,i)=>{i.r(t),i.d(t,{default:()=>v});var a=i(5714),c=i(9669),n=i.n(c),o=i(1596);const l={name:"Show",components:{Loader:a.Z},metaInfo:function(){return{title:this.$t("invoice.index.title")}},data:function(){return{title:o.Z.t("invoice.index.title"),loading:!0,invoice:null}},computed:{id:function(){return this.$route.params.id}},mounted:function(){var s=this;n().get("/api/invoices/"+this.id).then((function(t){t.data.success?s.invoice=t.data.payload.invoice:s.$router.push({name:"dashboard.invoice.index"}),s.loading=!1,s.$root.$loading.finish()})).catch((function(t){404===t.response.status&&(console.log(t.response.data),s.$vs.notification({title:"Ошибка",text:t.response.data.message}),s.$router.push({name:"dashboard.invoice.index"}))}))},methods:{edit:function(){this.$router.push({name:"dashboard.invoice.edit",params:{id:this.id}})},pdf:function(){window.open(window.config.pdfUrl+"/"+this.id,"_blank")},pdfNoCost:function(){window.open(window.config.pdfUrlNoCost+"/"+this.id,"_blank")}}};const v=(0,i(1900).Z)(l,(function(){var s=this,t=s.$createElement,i=s._self._c||t;return i("div",[i("transition",{attrs:{appear:"",mode:"out-in",name:"fade"}},[s.loading?i("Loader",{key:"1"}):i("div",{key:"2"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-12 col-md-10 col-lg-6 col-xl-4"},[i("div",{staticClass:"row gy-4 p-0 m-0"},[i("div",{staticClass:"col-12 p-0"},[i("div",{staticClass:"card"},[i("div",{staticClass:"card-title px-3 pt-3"},[i("h5",{staticClass:"text-reset"},[s._v("\n                    "+s._s(s.$t("invoice.show.title.info_client"))+"\n                  ")])]),s._v(" "),i("div",{staticClass:"card-body px-3 pt-0"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.inputs.user.name"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.user_name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.inputs.user.nationality"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.user_nationality)+"\n                      ")])])]),s._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.inputs.company_name"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.company.name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.inputs.company_ref"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.company.code)+"\n                      ")])])])])])]),s._v(" "),i("div",{staticClass:"col-12 p-0"},[i("div",{staticClass:"card"},[i("div",{staticClass:"card-title px-3 pt-3"},[i("h5",{staticClass:"text-reset"},[s.invoice.bookings.length>1?i("span",[s._v("\n                      "+s._s(s.$t("invoice.show.title.info_hotels"))+"\n                    ")]):i("span",[s._v("\n                      "+s._s(s.$t("invoice.show.title.info_hotel"))+"\n                    ")])])]),s._v(" "),i("div",{staticClass:"card-body px-3 pt-0"},s._l(s.invoice.bookings,(function(t,a){return i("div",{key:t.id,staticClass:"row"},[i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.hotel"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(t.hotel.name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.room"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(t.room.name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-12"},[i("div",{staticClass:"row justify-content-between"},[i("div",{staticClass:"col-4"},[i("div",{staticClass:"px-2 py-1 booking_badge mb-2"},[i("span",{staticClass:"small"},[s._v(s._s(s.$t("invoice.show.count")))]),s._v(" "),i("p",{staticClass:"mb-0"},[s._v("\n                              "+s._s(t.count)+"\n                            ")])])]),s._v(" "),i("div",{staticClass:"col-4"},[i("div",{staticClass:"px-2 py-1 booking_badge mb-2"},[i("span",{staticClass:"small"},[s._v(s._s(s.$t("invoice.show.adults")))]),s._v(" "),i("p",{staticClass:"mb-0"},[s._v("\n                              "+s._s(t.adults)+"\n                            ")])])]),s._v(" "),i("div",{staticClass:"col-4"},[i("div",{staticClass:"px-2 py-1 booking_badge mb-2"},[i("span",{staticClass:"small"},[s._v(s._s(s.$t("invoice.show.children")))]),s._v(" "),i("p",{staticClass:"mb-0"},[s._v("\n                              "+s._s(t.children)+"\n                            ")])])])])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.check_in"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.$formatDate(t.check_in))+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.check_out"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.$formatDate(t.check_out))+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.number_booking"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(t.booking_number)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        Meal plan\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(t.bb)+"\n                      ")])]),s._v(" "),s.invoice.bookings.length>1&&a+1!==s.invoice.bookings.length?i("div",{staticClass:"col-12"},[i("div",{staticClass:"row justify-content-center"},[i("div",{staticClass:"col-11"},[i("hr")])])]):s._e()])})),0)])]),s._v(" "),i("div",{staticClass:"col-12 p-0"},[i("div",{staticClass:"card"},[i("div",{staticClass:"card-body px-3"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-6"},[i("p",{staticClass:"fw-bold fs-6"},[s._v("\n                        "+s._s(s.$t("invoice.show.title.hotline"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.hotline.phone)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-6"},[i("p",{staticClass:"fw-bold fs-6"},[s._v("\n                        "+s._s(s.$t("invoice.show.title.cost"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.hotline.cost)+" $\n                      ")])])])])])])])]),s._v(" "),i("div",{staticClass:"col-12 col-md-10 col-lg-6 col-xl-6"},[i("div",{staticClass:"row gy-4  p-0 m-0"},[i("div",{staticClass:"col-12 p-0"},[i("div",{staticClass:"card"},[i("div",{staticClass:"card-title px-3 pt-3"},[i("h5",{staticClass:"text-reset"},[s._v("\n                    "+s._s(s.$t("invoice.show.title.transfer"))+"\n                  ")])]),s._v(" "),i("div",{staticClass:"card-body px-3 pt-0"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.arrival_time"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.$formatDate(s.invoice.arrival_time))+" "+s._s(s.$formatTime(s.invoice.arrival_time))+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.where"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.arrival_airport.name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.flight_code"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.arrival_flight_code)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.departure_time"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.$formatDate(s.invoice.departure_time))+" "+s._s(s.$formatTime(s.invoice.departure_time))+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.from"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.departure_airport.name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.flight_code"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.departure_flight_code)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.transport"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.transport.name)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.count_sits"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.passengers)+"\n                      ")])]),s._v(" "),i("div",{staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.gid"))+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[s._v("\n                        "+s._s(s.invoice.gid?"Yas":"No")+"\n                      ")])])])])])]),s._v(" "),i("div",{staticClass:"col-12 p-0"},[i("div",{staticClass:"card"},[i("div",{staticClass:"card-title px-3 pt-3"},[i("h5",{staticClass:"text-reset"},[s._v("\n                    "+s._s(s.$t("invoice.show.title.schedule"))+"\n                  ")])]),s._v(" "),i("div",{staticClass:"card-body px-3 pt-0"},[i("div",{staticClass:"row"},s._l(s.invoice.days,(function(t,a){return i("div",{key:t.id,staticClass:"col-4"},[i("p",{staticClass:"opacity-50 fs-6 mb-0"},[s._v("\n                        "+s._s(s.$t("invoice.show.day"))+" "+s._s(a+1)+"\n                      ")]),s._v(" "),i("p",{staticClass:"fw-500"},[t.free?i("span",[s._v("\n                          Free day\n                        ")]):i("span",[s._v("\n                          "+s._s(t.resort.name)+"\n                        ")])])])})),0)])])])])]),s._v(" "),i("div",{staticClass:"col-12 mt-4 col-md-10 col-lg-auto col-xl-2"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-12"},[i("vs-button",{staticClass:"w-100",attrs:{success:""},on:{click:s.edit}},[s._v("\n                "+s._s(s.$t("form.edit"))+"\n              ")])],1),s._v(" "),i("div",{staticClass:"col-12"},[i("vs-button",{staticClass:"w-100",attrs:{danger:""},on:{click:s.pdf}},[i("em",{staticClass:"bx bxs-file-pdf h5 m-0"})])],1),s._v(" "),i("div",{staticClass:"col-12"},[i("vs-button",{staticClass:"w-100",attrs:{primary:""},on:{click:s.pdfNoCost}},[i("em",{staticClass:"bx bxs-file-pdf h5 m-0"})])],1)])])])])],1)],1)}),[],!1,null,"cc78a7d4",null).exports}}]);