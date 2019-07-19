var SORT_INDEX,THOUSANDS_SEPARATOR=",",DECIMAL_SEPARATOR=".",TableSort=new Class({initialize:function(e,l,s){if(l&&(THOUSANDS_SEPARATOR=l),s&&(DECIMAL_SEPARATOR=s),!(!e.rows||e.rows.length<1||!e.tHead||e.tHead.rows.length<1)){var a=null,r=this,t=Cookie.read("TS_"+e.get("id").toUpperCase());null!==t&&(a=t.split("|"));for(var n=e.tHead.rows[e.tHead.rows.length-1],c=0;c<n.cells.length;c++)if(-1==n.cells[c].className.indexOf("unsortable")){var o=n.cells[c],i=new Element("a").addClass("pointer");i.innerHTML=o.innerHTML,o.innerHTML="",i.addEvent("click",function(e,l){r.resort(e,l)}.pass([c,o],this)).inject(o),null!==a&&a[0]==c&&($(o).addClass("desc"==a[1]?"asc":"desc"),r.resort(a[0],o))}}},resort:function(e,l){var s=$(l);if(null!=s){var a=s.getParent("tr"),r=a.getParent("table");if(!(null==r||r.tBodies[0].rows.length<2)){SORT_INDEX=e;for(var t,n=0,c="";""==c&&r.tBodies[0].rows[n];)c=r.tBodies[0].rows[n].cells[e].innerHTML.replace(/<[^>]+>/g,"").clean(),n++;var o=[];for(n=0;n<r.tBodies[0].rows.length;n++)o[n]=r.tBodies[0].rows[n];-1!=l.className.indexOf("date")||c.match(/^\d{1,4}[\/\. -]\d{1,2}[\/\. -]\d{1,4}$/)?o.sort(this.sortDate):-1!=l.className.indexOf("currency")||c.match(/^[£$€Û¢´]/)||c.match(/^-?[\d\.,]+[£$€]$/)?o.sort(this.sortNumeric):-1!=l.className.indexOf("numeric")||c.match(/^-?[\d\.,]+(E[-+][\d]+)?$/)||c.match(/^-?[\d\.,]+%?$/)?o.sort(this.sortNumeric):o.sort(this.sortCaseInsensitive);var i,d=$$("base").get("href"),h=d[0].replace(window.location.protocol+"//","").replace(window.location.host,"").replace(/\/$/,"")||"/",g=a.getChildren();if(-1==l.className.indexOf("asc")){for(n=0;n<g.length;n++)g[n].removeClass("asc"),g[n].removeClass("desc");l.addClass("asc"),Cookie.write("TS_"+r.id.toUpperCase(),e+"|asc",{path:h})}else{for(n=0;n<g.length;n++)g[n].removeClass("asc"),g[n].removeClass("desc");l.addClass("desc"),Cookie.write("TS_"+r.id.toUpperCase(),e+"|desc",{path:h}),o.reverse()}for(n=0;n<o.length;n++){for(i=o[n].className,i=i.replace(/row_\d+/,"").replace(/odd|even|row_first|row_last/g,"").clean(),i+=" row_"+n,0==n&&(i+=" row_first"),n>=o.length-1&&(i+=" row_last"),i+=n%2==0?" even":" odd",o[n].className=i.trim(),t=0;t<o[n].cells.length;t++)i=o[n].cells[t].className,i=i.replace(/col_\d+/,"").replace(/odd|even|col_first|col_last/g,"").clean(),i+=" col_"+t,0==t&&(i+=" col_first"),t>=o[n].cells.length-1&&(i+=" col_last"),o[n].cells[t].className=i.trim();r.tBodies[0].appendChild(o[n])}}}},sortDate:function(e,l){var s,a,r=e.cells[SORT_INDEX].innerHTML.replace(/<[^>]+>/g,"").clean(),t=l.cells[SORT_INDEX].innerHTML.replace(/<[^>]+>/g,"").clean(),n=r.replace(/[\/\.-]/g," ").split(" "),c=t.replace(/[\/\.-]/g," ").split(" ");return r.match(/^\d{1,2}[\/\. -]\d{1,2}[\/\. -]\d{2,4}$/)&&(s=(4==n[2].length?n[2]:"19"+n[2])+(2==n[1].length?n[1]:"0"+n[1])+(2==n[0].length?n[0]:"0"+n[0]),a=(4==c[2].length?c[2]:"19"+c[2])+(2==c[1].length?c[1]:"0"+c[1])+(2==c[0].length?c[0]:"0"+c[0])),r.match(/^\d{2,4}[\/\. -]\d{1,2}[\/\. -]\d{1,2}$/)&&(s=(4==n[0].length?n[0]:"19"+n[0])+(2==n[1].length?n[1]:"0"+n[1])+(2==n[2].length?n[2]:"0"+n[2]),a=(4==c[0].length?c[0]:"19"+c[0])+(2==c[1].length?c[1]:"0"+c[1])+(2==c[2].length?c[2]:"0"+c[2])),s==a?0:a>s?-1:1},sortNumeric:function(e,l){var s=new RegExp("\\"+THOUSANDS_SEPARATOR,"g"),a=e.cells[SORT_INDEX].innerHTML.replace(s,""),r=l.cells[SORT_INDEX].innerHTML.replace(s,"");return"."!=DECIMAL_SEPARATOR&&(a=a.replace(DECIMAL_SEPARATOR,"."),r=r.replace(DECIMAL_SEPARATOR,".")),a=a.replace(/<[^>]+>/).replace(/[^0-9\.,-]/g,"").clean(),r=r.replace(/<[^>]+>/).replace(/[^0-9\.,-]/g,"").clean(),a=parseFloat(a),isNaN(a)&&(a=0),r=parseFloat(r),isNaN(r)&&(r=0),a-r},sortCaseInsensitive:function(e,l){var s=e.cells[SORT_INDEX].innerHTML.replace(/<[^>]+>/g,"").clean().toLowerCase(),a=l.cells[SORT_INDEX].innerHTML.replace(/<[^>]+>/g,"").clean().toLowerCase();return s==a?0:a>s?-1:1}});