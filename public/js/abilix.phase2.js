function wxShare(i){wx.ready(function(){wx.onMenuShareAppMessage({title:i.title,desc:i.desc,link:i.link,imgUrl:i.imgUrl,type:i.type||"link",dataUrl:i.dataUrl||"",success:function(){_czc.push(["_trackEvent","abilix-H5","bt-分享完成"])},cancel:function(){}}),wx.onMenuShareTimeline({title:i.title,desc:i.desc,link:i.link,imgUrl:i.imgUrl,type:i.type||"link",dataUrl:i.dataUrl||"link",success:function(){_czc.push(["_trackEvent","abilix-H5","bt-分享完成"])},cancel:function(){}})})}$().ready(function(){!1===$("#bg-music")[0].paused?$("#playMusic img").eq(1).removeClass("hide"):$("#playMusic img").eq(0).removeClass("hide"),$("#playMusic").on("touchend",function(){!1===$("#bg-music")[0].paused?($("#playMusic img").eq(0).addClass("hide"),$("#playMusic img").eq(1).removeClass("hide"),$("#bg-music")[0].pause()):($("#playMusic img").eq(1).addClass("hide"),$("#playMusic img").eq(0).removeClass("hide"),$("#bg-music")[0].play())}),$(document).bind("ajaxStart.abilix",function(){hasSubmitted=!0,$("#modal-tip").modal({keyboard:!1,show:!0,backdrop:"static"})}),$(document).bind("ajaxComplete.abilix",function(){hasSubmitted=!1,$("#modal-tip").modal("hide")});var i=$(window).height()-$("#header").height()/_s;$(".page1").height(i),$(".btn-share").on("touchend",function(){$("#modal-share").modal({keyboard:!1,show:!0})}),$(".share-close").on("touchend",function(){$("#modal-share").modal("hide")}),_czc.push(["_trackEvent","abilix-H5","loading"]),_czc.push(["_trackEvent","abilix-H5","p-1"]),_czc.push(["_trackEvent","abilix-H5","p-2"])});