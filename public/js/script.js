function generatePDF(e,t,n,a){if(e&&t){if(!n)return refreshTimer&&clearTimeout(refreshTimer),void(refreshTimer=setTimeout(function(){generatePDF(e,t,!0,a)},500));refreshTimer=null,e=calculateAmounts(e);var o=GetPdfMake(e,t,a);return a&&o.getDataUrl(a),o}}function copyObject(e){return!!e&&JSON.parse(JSON.stringify(e))}function processVariables(e){if(!e)return"";for(var t=["MONTH","QUARTER","YEAR"],n=0;n<t.length;n++){var a=t[n],o=new RegExp(":"+a+"[+-]?[\\d]*","g"),r=e.match(o);if(r)for(var i=0;i<r.length;i++){var u=r[i],s=0;u.split("+").length>1?s=u.split("+")[1]:u.split("-").length>1&&(s=parseInt(u.split("-")[1])*-1),e=e.replace(u,getDatePart(a,s))}}return e}function getDatePart(e,t){return t=parseInt(t),t||(t=0),"MONTH"==e?getMonth(t):"QUARTER"==e?getQuarter(t):"YEAR"==e?getYear(t):void 0}function getMonth(e){var t=new Date,n=["January","February","March","April","May","June","July","August","September","October","November","December"],a=t.getMonth();return a=parseInt(a)+e,a%=12,a<0&&(a+=12),n[a]}function getYear(e){var t=new Date,n=t.getFullYear();return parseInt(n)+e}function getQuarter(e){var t=new Date,n=Math.floor((t.getMonth()+3)/3);return n+=e,n%=4,0==n&&(n=4),"Q"+n}function isStorageSupported(){try{return"localStorage"in window&&null!==window.localStorage}catch(e){return!1}}function isValidEmailAddress(e){var t=new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);return t.test(e)}function enableHoverClick(e,t,n){}function setAsLink(e,t){t?(e.css("text-decoration","underline"),e.css("cursor","pointer")):(e.css("text-decoration","none"),e.css("cursor","text"))}function setComboboxValue(e,t,n){e.find("input").val(t),e.find("input.form-control").val(n),t&&n?(e.find("select").combobox("setSelected"),e.find(".combobox-container").addClass("combobox-selected")):e.find(".combobox-container").removeClass("combobox-selected")}function convertDataURIToBinary(e){var t=e.indexOf(BASE64_MARKER)+BASE64_MARKER.length,n=e.substring(t);return base64DecToArr(n)}function getContactDisplayName(e){return e.first_name||e.last_name?(e.first_name||"")+" "+(e.last_name||""):e.email}function getClientDisplayName(e){var t=!!e.contacts&&e.contacts[0];return e.name?e.name:t?getContactDisplayName(t):""}function populateInvoiceComboboxes(e,t){for(var n={},a={},o={},r=$("select#client"),i=0;i<invoices.length;i++){var u=invoices[i],s=u.client;o.hasOwnProperty(s.public_id)||(o[s.public_id]=[]),o[s.public_id].push(u),a[u.public_id]=u}for(var i=0;i<clients.length;i++){var s=clients[i];n[s.public_id]=s}r.append(new Option("",""));for(var i=0;i<clients.length;i++){var s=clients[i],l=getClientDisplayName(s);l&&r.append(new Option(l,s.public_id))}e&&r.val(e),r.combobox(),r.on("change",function(e){var t=$("input[name=client]").val(),r=$("input[name=invoice]").val(),i=a[r];if(i&&i.client.public_id==t)return void e.preventDefault();setComboboxValue($(".invoice-select"),"",""),$invoiceCombobox=$("select#invoice"),$invoiceCombobox.find("option").remove().end().combobox("refresh"),$invoiceCombobox.append(new Option("",""));for(var u=t?o.hasOwnProperty(t)?o[t]:[]:invoices,s=0;s<u.length;s++){var i=u[s],l=n[i.client.public_id];l&&getClientDisplayName(l)&&$invoiceCombobox.append(new Option(i.invoice_number+" - "+i.invoice_status.name+" - "+getClientDisplayName(l)+" - "+formatMoneyInvoice(i.amount,i)+" | "+formatMoneyInvoice(i.balance,i),i.public_id))}$("select#invoice").combobox("refresh")});var c=$("select#invoice").on("change",function(e){$clientCombobox=$("select#client");var t=$("input[name=invoice]").val();if(t){var o=a[t],r=n[o.client.public_id];o.client=r,setComboboxValue($(".client-select"),r.public_id,getClientDisplayName(r)),parseFloat($("#amount").val())||$("#amount").val(parseFloat(o.balance).toFixed(2))}});if(c.combobox(),t){var u=a[t],s=n[u.client.public_id];u.client=s,setComboboxValue($(".invoice-select"),u.public_id,u.invoice_number+" - "+u.invoice_status.name+" - "+getClientDisplayName(s)+" - "+formatMoneyInvoice(u.amount,u)+" | "+formatMoneyInvoice(u.balance,u)),c.trigger("change")}else if(e){var s=n[e];setComboboxValue($(".client-select"),s.public_id,getClientDisplayName(s)),r.trigger("change")}else r.trigger("change")}function formatAddress(e,t,n,a){var o="";return a?(o+=n?n+" ":"",o+=e?e:"",o+=e&&t?", ":e?" ":"",o+=t):(o+=e?e:"",o+=e&&t?", ":t?" ":"",o+=t+" "+n),o}function concatStrings(){for(var e="",t=[],n=0;n<arguments.length;n++){var a=arguments[n];a&&t.push(a)}for(var n=0;n<t.length;n++)e+=t[n],0==n&&t.length>1?e+=", ":n<t.length-1&&(e+=" ");return t.length?e:""}function calculateAmounts(e){var t=0,n=!1,a={};e.has_product_key=!1,2==e.invoice_design_id&&(e.has_product_key=!0);for(var o=0;o<e.invoice_items.length;o++){var r=e.invoice_items[o],i=roundToTwo(NINJA.parseFloat(r.cost))*roundToTwo(NINJA.parseFloat(r.qty));i=roundToTwo(i),i&&(t+=i)}for(var o=0;o<e.invoice_items.length;o++){var r=e.invoice_items[o],u=0,s="",l=0,c="";r.product_key?e.has_product_key=!0:1!=e.invoice_items.length||r.qty||(e.has_product_key=!0),r.tax_name1&&(u=parseFloat(r.tax_rate1),s=r.tax_name1),r.tax_name2&&(l=parseFloat(r.tax_rate2),c=r.tax_name2);var i=roundToTwo(NINJA.parseFloat(r.cost))*roundToTwo(NINJA.parseFloat(r.qty));0!=e.discount&&(i-=roundToTwo(parseInt(e.is_amount_discount)?i/t*e.discount:i*(e.discount/100)));var d=roundToTwo(i*u/100);if(s){var f=s+u;a.hasOwnProperty(f)?a[f].amount+=d:a[f]={name:s,rate:u,amount:d}}var p=roundToTwo(i*l/100);if(c){var f=c+l;a.hasOwnProperty(f)?a[f].amount+=p:a[f]={name:c,rate:l,amount:p}}(r.tax_name1||r.tax_name2)&&(n=!0)}e.subtotal_amount=t;var b=0;0!=e.discount&&(b=roundToTwo(parseInt(e.is_amount_discount)?e.discount:t*(e.discount/100)),t-=b),NINJA.parseFloat(e.custom_value1)&&"1"==e.custom_taxes1&&(t+=roundToTwo(e.custom_value1)),NINJA.parseFloat(e.custom_value2)&&"1"==e.custom_taxes2&&(t+=roundToTwo(e.custom_value2)),u=0,l=0,e.tax_rate1&&parseFloat(e.tax_rate1)&&(u=parseFloat(e.tax_rate1)),e.tax_rate2&&parseFloat(e.tax_rate2)&&(l=parseFloat(e.tax_rate2)),d=roundToTwo(t*(u/100)),p=roundToTwo(t*(l/100)),t=t+d+p;for(var f in a)a.hasOwnProperty(f)&&(t+=a[f].amount);return NINJA.parseFloat(e.custom_value1)&&"1"!=e.custom_taxes1&&(t+=roundToTwo(e.custom_value1)),NINJA.parseFloat(e.custom_value2)&&"1"!=e.custom_taxes2&&(t+=roundToTwo(e.custom_value2)),e.total_amount=roundToTwo(roundToTwo(t)-(roundToTwo(e.amount)-roundToTwo(e.balance))),e.discount_amount=b,e.tax_amount1=d,e.tax_amount2=p,e.item_taxes=a,NINJA.parseFloat(e.partial)?e.balance_amount=roundToTwo(e.partial):e.balance_amount=e.total_amount,e}function objectEquals(e,t){if(e instanceof Function)return t instanceof Function&&e.toString()===t.toString();if(null===e||void 0===e||null===t||void 0===t)return e===t;if(e===t||e.valueOf()===t.valueOf())return!0;if(e instanceof Date)return!1;if(t instanceof Date)return!1;if(!(e instanceof Object))return!1;if(!(t instanceof Object))return!1;var n=Object.keys(e);return!!Object.keys(t).every(function(e){return n.indexOf(e)!==-1})&&n.every(function(n){return objectEquals(e[n],t[n])})}function b64ToUint6(e){return e>64&&e<91?e-65:e>96&&e<123?e-71:e>47&&e<58?e+4:43===e?62:47===e?63:0}function base64DecToArr(e,t){for(var n,a,o=e.replace(/[^A-Za-z0-9\+\/]/g,""),r=o.length,i=t?Math.ceil((3*r+1>>2)/t)*t:3*r+1>>2,u=new Uint8Array(i),s=0,l=0,c=0;c<r;c++)if(a=3&c,s|=b64ToUint6(o.charCodeAt(c))<<18-6*a,3===a||r-c===1){for(n=0;n<3&&l<i;n++,l++)u[l]=s>>>(16>>>n&24)&255;s=0}return u}function uint6ToB64(e){return e<26?e+65:e<52?e+71:e<62?e-4:62===e?43:63===e?47:65}function base64EncArr(e){for(var t=2,n="",a=e.length,o=0,r=0;r<a;r++)t=r%3,r>0&&4*r/3%76===0&&(n+="\r\n"),o|=e[r]<<(16>>>t&24),2!==t&&e.length-r!==1||(n+=String.fromCharCode(uint6ToB64(o>>>18&63),uint6ToB64(o>>>12&63),uint6ToB64(o>>>6&63),uint6ToB64(63&o)),o=0);return n.substr(0,n.length-2+t)+(2===t?"":1===t?"=":"==")}function UTF8ArrToStr(e){for(var t,n="",a=e.length,o=0;o<a;o++)t=e[o],n+=String.fromCharCode(t>251&&t<254&&o+5<a?1073741824*(t-252)+(e[++o]-128<<24)+(e[++o]-128<<18)+(e[++o]-128<<12)+(e[++o]-128<<6)+e[++o]-128:t>247&&t<252&&o+4<a?(t-248<<24)+(e[++o]-128<<18)+(e[++o]-128<<12)+(e[++o]-128<<6)+e[++o]-128:t>239&&t<248&&o+3<a?(t-240<<18)+(e[++o]-128<<12)+(e[++o]-128<<6)+e[++o]-128:t>223&&t<240&&o+2<a?(t-224<<12)+(e[++o]-128<<6)+e[++o]-128:t>191&&t<224&&o+1<a?(t-192<<6)+e[++o]-128:t);return n}function strToUTF8Arr(e){for(var t,n,a=e.length,o=0,r=0;r<a;r++)n=e.charCodeAt(r),o+=n<128?1:n<2048?2:n<65536?3:n<2097152?4:n<67108864?5:6;t=new Uint8Array(o);for(var i=0,u=0;i<o;u++)n=e.charCodeAt(u),n<128?t[i++]=n:n<2048?(t[i++]=192+(n>>>6),t[i++]=128+(63&n)):n<65536?(t[i++]=224+(n>>>12),t[i++]=128+(n>>>6&63),t[i++]=128+(63&n)):n<2097152?(t[i++]=240+(n>>>18),t[i++]=128+(n>>>12&63),t[i++]=128+(n>>>6&63),t[i++]=128+(63&n)):n<67108864?(t[i++]=248+(n>>>24),t[i++]=128+(n>>>18&63),t[i++]=128+(n>>>12&63),t[i++]=128+(n>>>6&63),t[i++]=128+(63&n)):(t[i++]=252+n/1073741824,t[i++]=128+(n>>>24&63),t[i++]=128+(n>>>18&63),t[i++]=128+(n>>>12&63),t[i++]=128+(n>>>6&63),t[i++]=128+(63&n));return t}function hexToR(e){return parseInt(cutHex(e).substring(0,2),16)}function hexToG(e){return parseInt(cutHex(e).substring(2,4),16)}function hexToB(e){return parseInt(cutHex(e).substring(4,6),16)}function cutHex(e){return"#"==e.charAt(0)?e.substring(1,7):e}function setDocHexColor(e,t){var n=hexToR(t),a=hexToG(t),o=hexToB(t);return e.setTextColor(n,a,o)}function setDocHexFill(e,t){var n=hexToR(t),a=hexToG(t),o=hexToB(t);return e.setFillColor(n,a,o)}function setDocHexDraw(e,t){var n=hexToR(t),a=hexToG(t),o=hexToB(t);return e.setDrawColor(n,a,o)}function toggleDatePicker(e){$("#"+e).datepicker("show")}function roundToTwo(e,t){var n=+(Math.round(e+"e+2")+"e-2");return t?n.toFixed(2):n||0}function roundToFour(e,t){var n=+(Math.round(e+"e+4")+"e-4");return t?n.toFixed(4):n||0}function truncate(e,t){return e&&e.length>t?e.substr(0,t-1)+"...":e}function endsWith(e,t){return e.indexOf(t,e.length-t.length)!==-1}function secondsToTime(e){e=Math.round(e);var t=Math.floor(e/3600),n=e%3600,a=Math.floor(n/60),o=n%60,r=Math.ceil(o),i={h:t,m:a,s:r};return i}function twoDigits(e){return e<10?"0"+e:e}function toSnakeCase(e){return e?e.replace(/([A-Z])/g,function(e){return"_"+e.toLowerCase()}):""}function snakeToCamel(e){return e.replace(/_([a-z])/g,function(e){return e[1].toUpperCase()})}function getDescendantProp(e,t){for(var n=t.split(".");n.length&&(e=e[n.shift()]););return e}function doubleDollarSign(e){return e?e.replace?e.replace(/\$/g,"$$$"):e:""}function truncate(e,t){return e.length>t?e.substring(0,t)+"...":e}function actionListHandler(){$("tbody tr .tr-action").closest("tr").mouseover(function(){$(this).closest("tr").find(".tr-action").show(),$(this).closest("tr").find(".tr-status").hide()}).mouseout(function(){$dropdown=$(this).closest("tr").find(".tr-action"),$dropdown.hasClass("open")||($dropdown.hide(),$(this).closest("tr").find(".tr-status").show())})}function loadImages(e){$(e+" img").each(function(e,t){var n=$(t).attr("data-src");$(t).attr("src",n),$(t).attr("data-src",n)})}function prettyJson(e){return"string"!=typeof e&&(e=JSON.stringify(e,void 0,2)),e=e.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;"),e.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,function(e){var t="number";return/^"/.test(e)?t=/:$/.test(e)?"key":"string":/true|false/.test(e)?t="boolean":/null/.test(e)&&(t="null"),e=snakeToCamel(e),'<span class="'+t+'">'+e+"</span>"})}function searchData(e,t,n){return function(a,o){var r;if(n){var i={keys:[t]},u=new Fuse(e,i);r=u.search(a)}else r=[],substrRegex=new RegExp(escapeRegExp(a),"i"),$.each(e,function(e,n){substrRegex.test(n[t])&&r.push(n)});o(r)}}function escapeRegExp(e){return e.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")}var isOpera=!!window.opera||navigator.userAgent.indexOf(" OPR/")>=0,isFirefox="undefined"!=typeof InstallTrigger,isSafari=Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor")>0,isEdge=navigator.userAgent.indexOf("Edge/")>=0,isChrome=!!window.chrome&&!isOpera&&!isEdge,isChromium=isChrome&&navigator.userAgent.indexOf("Chromium")>=0,isChrome48=isChrome&&navigator.userAgent.indexOf("Chrome/48")>=0,isIE=!!document.documentMode,refreshTimer;$.fn.dataTableExt&&($.extend($.fn.dataTableExt.oStdClasses,{sWrapper:"dataTables_wrapper form-inline"}),$.fn.dataTableExt.oApi.fnPagingInfo=function(e){return{iStart:e._iDisplayStart,iEnd:e.fnDisplayEnd(),iLength:e._iDisplayLength,iTotal:e.fnRecordsTotal(),iFilteredTotal:e.fnRecordsDisplay(),iPage:e._iDisplayLength===-1?0:Math.ceil(e._iDisplayStart/e._iDisplayLength),iTotalPages:e._iDisplayLength===-1?0:Math.ceil(e.fnRecordsDisplay()/e._iDisplayLength)}},$.extend($.fn.dataTableExt.oPagination,{bootstrap:{fnInit:function(e,t,n){var a=(e.oLanguage.oPaginate,function(t){t.preventDefault(),e.oApi._fnPageChange(e,t.data.action)&&n(e)});$(t).addClass("pagination").append('<ul class="pagination"><li class="prev disabled"><a href="#">&laquo;</a></li><li class="next disabled"><a href="#">&raquo;</a></li></ul>');var o=$("a",t);$(o[0]).bind("click.DT",{action:"previous"},a),$(o[1]).bind("click.DT",{action:"next"},a)},fnUpdate:function(e,t){var n,a,o,r,i,u,s=5,l=e.oInstance.fnPagingInfo(),c=e.aanFeatures.p,d=Math.floor(s/2);for(l.iTotalPages<s?(i=1,u=l.iTotalPages):l.iPage<=d?(i=1,u=s):l.iPage>=l.iTotalPages-d?(i=l.iTotalPages-s+1,u=l.iTotalPages):(i=l.iPage-d+1,u=i+s-1),n=0,a=c.length;n<a;n++){for($("li:gt(0)",c[n]).filter(":not(:last)").remove(),o=i;o<=u;o++)r=o==l.iPage+1?'class="active"':"",$("<li "+r+'><a href="#">'+o+"</a></li>").insertBefore($("li:last",c[n])[0]).bind("click",function(n){n.preventDefault(),e._iDisplayStart=(parseInt($("a",this).text(),10)-1)*l.iLength,t(e)});0===l.iPage?$("li:first",c[n]).addClass("disabled"):$("li:first",c[n]).removeClass("disabled"),l.iPage===l.iTotalPages-1||0===l.iTotalPages?$("li:last",c[n]).addClass("disabled"):$("li:last",c[n]).removeClass("disabled")}}}})),$.fn.DataTable.TableTools&&($.extend(!0,$.fn.DataTable.TableTools.classes,{container:"DTTT btn-group",buttons:{normal:"btn",disabled:"disabled"},collection:{container:"DTTT_dropdown dropdown-menu",buttons:{normal:"",disabled:"disabled"}},print:{info:"DTTT_print_info modal"},select:{row:"active"}}),$.extend(!0,$.fn.DataTable.TableTools.DEFAULTS.oTags,{collection:{container:"ul",button:"li",liner:"a"}})),$(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})});var BASE64_MARKER=";base64,";window.ko&&(ko.bindingHandlers.dropdown={init:function(e,t,n){var a=n().dropdownOptions||{},o=ko.utils.unwrapObservable(t()),r=o&&o.public_id?o.public_id():o&&o.id?o.id():!!o&&o;r&&$(e).val(r),$(e).combobox(a)},update:function(e,t){var n=ko.utils.unwrapObservable(t()),a=n&&n.public_id?n.public_id():n&&n.id?n.id():!!n&&n;a?($(e).val(a),$(e).combobox("refresh")):($(e).combobox("clearTarget"),$(e).combobox("clearElement"))}},ko.bindingHandlers.combobox={init:function(e,t,n){var a=n().dropdownOptions||{},o=ko.utils.unwrapObservable(t()),r=o&&o.public_id?o.public_id():o&&o.id?o.id():!!o&&o;r&&$(e).val(r),$(e).combobox(a),ko.utils.registerEventHandler(e,"change",function(){var n=t();n($(e).val())})},update:function(e,t){var n=ko.utils.unwrapObservable(t()),a=n&&n.public_id?n.public_id():n&&n.id?n.id():!!n&&n;a?($(e).val(a),$(e).combobox("refresh")):($(e).combobox("clearTarget"),$(e).combobox("clearElement"))}},ko.bindingHandlers.datePicker={init:function(e,t,n){var a=ko.utils.unwrapObservable(t());a&&$(e).datepicker("update",a),$(e).change(function(){var n=t();n($(e).val())})},update:function(e,t){var n=ko.utils.unwrapObservable(t());n&&$(e).datepicker("update",n)}},ko.bindingHandlers.placeholder={init:function(e,t,n){var a=t();ko.applyBindingsToNode(e,{attr:{placeholder:a}})}},ko.bindingHandlers.tooltip={init:function(e,t){var n=ko.utils.unwrapObservable(t()),a={};ko.utils.extend(a,ko.bindingHandlers.tooltip.options),ko.utils.extend(a,n),$(e).tooltip(a),ko.utils.domNodeDisposal.addDisposeCallback(e,function(){$(e).tooltip("destroy")})},options:{placement:"bottom",trigger:"hover"}},ko.bindingHandlers.typeahead={init:function(e,t,n,a,o){var r=$(e),i=n();r.typeahead({highlight:!0,minLength:0},{name:"data",display:i.key,limit:50,source:searchData(i.items,i.key)}).on("typeahead:change",function(e,n,a){var o=t();o(n)})},update:function(e,t){var n=ko.utils.unwrapObservable(t());n&&$(e).typeahead("val",n)}});var CONSTS={};CONSTS.INVOICE_STATUS_DRAFT=1,CONSTS.INVOICE_STATUS_SENT=2,CONSTS.INVOICE_STATUS_VIEWED=3,CONSTS.INVOICE_STATUS_APPROVED=4,CONSTS.INVOICE_STATUS_PARTIAL=5,CONSTS.INVOICE_STATUS_PAID=6,$.fn.datepicker.defaults.autoclose=!0,$.fn.datepicker.defaults.todayHighlight=!0,window.alert=function(){var e=window.alert;return function(t){window.alert=e,t&&0===t.indexOf("DataTables warning")?void 0:e(t)}}();
//# sourceMappingURL=script.js.map
