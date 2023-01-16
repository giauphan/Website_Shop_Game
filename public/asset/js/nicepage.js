$(document).ready(function () {
    var max_width = 1350;
    var length_li = $(".box-img-slide>li").length;
    var width_ul = max_width * length_li;
    $("#slide-show").css({ "width": width_ul + "px" });
    var show_banner = function () {
        var postion = $("li.active-slide").position().left;
    }
    var run_banner = function () {

        var left = $(".box-img-slide").find("li.active-slide").position().left;
        left = left + max_width;
        console.log(left + "/" + width_ul);
        if (left == width_ul) {
            $(".box-img-slide li").removeClass("active-slide");
            $(".box-img-slide").css({ "left": "0" });
            $(".box-img-slide li:first-child").addClass("active-slide");
        } else {
            var postion_li = left / max_width;
            console.log(postion_li);
            var left_current = left;
            var check_postion = postion_li;
            if (postion_li == 1) {
                var left_current = (left * parseInt(postion_li));
                postion_li = 2;
            }
            if (postion_li == length_li) {
                postion_li--;
                $(".box-img-slide").css({ "left": -(left_current) + "px" });
                $(".box-img-slide li:first-child").addClass("active-slide");
                postion_li = 0;
            }
            else {
                $(".box-img-slide").css({ "left": -(left_current) + "px" });
                $(".box-img-slide li").removeClass("active-slide");
                if (check_postion == (length_li - 1)) {
                    $(".box-img-slide li:last-child").addClass("active-slide");
                } else {
                    $(".box-img-slide li:nth-child(" + postion_li + ")").addClass("active-slide");
                }
            }
            postion_li = 0;
            left = 0;
        }
    }
    var myVar;
    var init_banner = function () {
        myVar = setInterval(run_banner, 8000);
    }
    function stop_banner() {
        clearInterval(myVar);
    }

    //SET HOVER BANNER STOP IMAGE
    $("#slide-show").hover(function () {
        stop_banner();
    }, function () {
         init_banner();
     });

    //CLICK BUTTON RIGHT
    $(".btn-right-sk").click(function () {
        stop_banner();
        var left = $(".box-img-slide").find("li.active-slide").position().left; //0
        left = left + max_width;
        console.log(left);//2700
        var position_left = left / max_width; 
        var postion_left_tam = position_left;
        position_left++;

        if (left == width_ul) {
            $(".box-img-slide li").removeClass("active-slide");
            $(".box-img-slide").css({ "left": "0px" });
            $(".box-img-slide li:first-child").addClass("active-slide");
        } else {
            if (postion_left_tam == (length_li - 1)) {
                $(".box-img-slide").css({ "left": -(left) + "px" });
                $(".box-img-slide li").removeClass("active-slide");
                $(".box-img-slide li:last-child").addClass("active-slide");
            } else {

                $(".box-img-slide li").removeClass("active-slide");
                $(".box-img-slide li:nth-child(" + position_left + ")").addClass("active-slide");
                $(".box-img-slide").css({ "left": -(left) + "px" });
            }

        }
         init_banner();
    });

    //CLICK BUTTON LEFT
    $(".btn-left-sk").click(function () {
        stop_banner();
        var left = $(".box-img-slide").find("li.active-slide").position().left;
      
        if (left != 0) {
            left =  (left) - max_width;
            left_tam = left;
            console.log(left_tam);
            var position_left = (left / max_width);
            var postion_left_tam = position_left;
            if (-(left) == width_ul) {
                $(".box-img-slide li").removeClass("active-slide");
              
                $(".box-img-slide li:last-child").addClass("active-slide");
            } else {
                $(".box-img-slide li").removeClass("active-slide");
                if (position_left == 0) {
                    console.log(position_left);
                    $(".box-img-slide li:first-child").addClass("active-slide");
                } else {
                    position_left++;  //3
                    $(".box-img-slide li:nth-child(" + position_left + ")").addClass("active-slide");
                }



                var height_pre = -left_tam;
                $(".box-img-slide").css({ "left": height_pre + "px" });
            }
            init_banner();
        }


    });

    //RUN BEGIN BANNER
    setTimeout(init_banner(), 100);
});
