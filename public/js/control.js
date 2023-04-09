$(function () {
    //The passed argument has to be at least a empty object or a object with your desired options
    //$("body").overlayScrollbars({ });
    $("#items").height(552);
    $("#items").overlayScrollbars({
        overflowBehavior: {
            x: "hidden",
            y: "scroll"
        }
    });
    $("#cart").height(445);
    $("#cart").overlayScrollbars({});
});
