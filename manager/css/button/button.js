$(function(){$.fn.hasAttr=function(e){var t=this.attr(e);if(typeof t!==typeof undefined&&t!==false)return true;return false};$.fn.materialForm=function(){function e(e){var t=e.attr("type");return t!="hidden"&&t!="submit"&&t!="checkbox"&&t!="radio"&&t!="file"?1:0}function t(e){if(e.val())e.addClass("filled");else e.removeClass("filled")}this.find("input, textarea").each(function(){if(e($(this))){var n=$(this).attr("name");$(this).attr("id",n);var r=$(this).wrap("<div class='material-input'></div>").parent();r.append("<span class='material-bar'></span>");var i=$(this).prop("tagName").toLowerCase();r.addClass(i);var s=$(this).attr("placeholder");if(s){r.append("<label for='"+n+"'>"+s+"</label>");$(this).removeAttr("placeholder")}t($(this))}});this.find("input, textarea").on("blur",function(){if(e($(this)))t($(this))});this.find("select").each(function(e){var t=$(this).attr("placeholder");var n=$(this).attr("multiple")?"checkbox":"radio";var r=id=$(this).attr("name");var i=$(this).wrap("<div class='material-select'></div>").parent();if(n=="checkbox"){r+="[]";var s=$('<span class="material-bar"></span>');i.append(s).addClass("checkbox")}else{var o=$('<span class="material-title">'+t+"</span>");i.prepend(o)}var u=$('<label for="select-'+e+'"><span>'+t+"</span><strong></strong></label>");var a=$('<input type="checkbox" id="select-'+e+'">');i.prepend(a);i.prepend(u);var f=$('<ul class="'+n+'"></ul>');i.append(f);var l=0;var c=$(this).children("option").length;var h;$(this).children("option").each(function(e){var t=$(this).text();var i=$(this).val();var s=$(this).hasAttr("selected");var o=$("<li></li>");f.append(o);var u=$('<label for="'+id+"-"+e+'">'+t+"</label>");var a=$('<input type="'+n+'" value="'+i+'" name="'+r+'" id="'+id+"-"+e+'">');if(s){h=a.prop("checked",true);l++}o.append(a);o.append(u)});if(s){var p=l/c*100;s.width(p+"%")}else{if(l){u.children("span").text(h.next("label").text());i.addClass("filled")}}$(this).remove()});$(document).on("click",function(e){if($(e.target).closest(".material-select").length===0){$(".material-select > input").prop("checked",false)}});$(".material-select > input").on("change",function(){var e=$(this).attr("id");$(".material-select > input").each(function(){var t=$(this).attr("id");if(e!=t)$(this).prop("checked",false)})});$(".material-select ul input").on("change",function(){if($(this).closest(".material-select.checkbox").length){var e=$(this).closest("ul");var t=e.find("input").length;var n=e.find("input:checked").length;var r=n/t*100;$(this).closest(".material-select").find(".material-bar").width(r+"%")}else{var i=$(this).closest(".material-select");var s=i.children("label").children("span");var o=$(this).next("label");s.text(o.text());i.children("input").prop("checked",false);i.addClass("filled")}})}})

$(function(){
  $('form.material').materialForm(); // Apply material
  // $('form').validate({ 
  //   errorPlacement: function(error, element) {}
  // }); // Apply validator with no error messages but classes only
});