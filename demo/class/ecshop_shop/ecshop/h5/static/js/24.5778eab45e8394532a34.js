webpackJsonp([24],{"66lX":function(t,e,s){t.exports=s.p+"static/img/message_empty@2x.b561f77.png"},HzYw:function(t,e,s){"use strict";var a={data:function(){return{}},props:{type:{type:String,default:"message"},info:{type:String,default:"暂无信息"}},created:function(){},computed:{getImgUrl:function(){if("message"==this.type)return s("66lX")}}},i={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"empty-wrappers"},[e("img",{attrs:{src:this.getImgUrl}}),this._v(" "),e("p",[this._v(this._s(this.info))])])},staticRenderFns:[]};var n=s("VU/8")(a,i,!1,function(t){s("sJXq")},"data-v-4a5e6900",null);e.a=n.exports},ZJpV:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("Dd8w"),i=s.n(a),n=(s("vAZe"),s("Au9i")),c=s("+PoZ"),o=s("hlZl"),r=s("NYxO"),l={data:function(){return{NoticeMessage:[],params:{page:0,per_page:10},isMore:!0,loading:!1}},created:function(){},components:{"v-empty-message":s("HzYw").a},methods:i()({},Object(r.d)({saveLastSystemMsgTime:"saveLastSystemMsgTime"}),{goBack:function(){this.$router.go(-1)},getmessageSystemList:function(t){var e=this;n.Indicator.open();var s=this.params;Object(c.c)(s.page,s.per_page).then(function(s){n.Indicator.close(),s&&s.messages.length>0&&(e.saveLastSystemMsgTime(s.messages[0].created_at),t&&(e.NoticeMessage=e.NoticeMessage.concat(s.messages)),e.isMore=1==s.paged.more)})},getMore:function(){this.loading=!0,this.params.page=++this.params.page,this.isMore&&(this.loading=!1,this.getmessageSystemList(!0))},goNotice:function(t){t&&t.length&&Object(o.a)(this.$router,t)}})},g={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"container"},[a("mt-header",{staticClass:"header",attrs:{title:"通知消息"}},[a("header-item",{attrs:{slot:"left",isBack:!0},on:{onclick:t.goBack},slot:"left"})],1),t._v(" "),a("div",{directives:[{name:"infinite-scroll",rawName:"v-infinite-scroll",value:t.getMore,expression:"getMore"}],staticClass:"body",attrs:{"infinite-scroll-disabled":"loading","infinite-scroll-distance":"10"}},[t._l(t.NoticeMessage,function(e,i){return t.NoticeMessage.length>0?a("div",{key:i,staticClass:"notice-message-body",on:{click:function(s){t.goNotice(e.link)}}},[a("p",[t._v(t._s(t._f("convertTime")(1e3*e.created_at)))]),t._v(" "),a("div",{staticClass:"notice-track"},[a("div",{staticClass:"notice-status"},[a("p",{staticClass:"title"},[t._v(t._s(e.title))]),t._v(" "),e.content?a("p",{staticClass:"content"},[t._v(t._s(e.content))]):t._e(),t._v(" "),e.content?t._e():a("p",{staticClass:"content"},[t._v("暂无信息")])]),t._v(" "),a("img",{staticClass:"arrow-right",attrs:{src:s("TNrS")}})])]):t._e()}),t._v(" "),t.NoticeMessage.length<=0?a("v-empty-message",{attrs:{info:"您还没有消息通知",type:"message"}}):t._e()],2)],1)},staticRenderFns:[]};var d=s("VU/8")(l,g,!1,function(t){s("hxuw")},"data-v-2288d8c2",null);e.default=d.exports},hxuw:function(t,e){},sJXq:function(t,e){}});
//# sourceMappingURL=24.5778eab45e8394532a34.js.map