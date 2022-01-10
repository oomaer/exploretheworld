


let vh = $(window).height();

const applyParallax = (container, element, scrollTop) => {

    let containerOffsetTop = container.offset().top



    if(scrollTop + vh > containerOffsetTop){
        console.log('inside the elements');
        let newoffset = scrollTop + vh -  - 200;
        console.log(newoffset);

        // element.css('transform', `translate3d(0px, ${newoffset }px, 0px)`)
    }




}


$(window).scroll(() => {

    let scrollTop = $(window).scrollTop();
    // console.log(scrollTop + vh);

    $(".upbaloon").css({"bottom": `${scrollTop-250}px`, "left": `${(scrollTop*0.5)}px`, 'width': `${(scrollTop*0.5)+200}px`});
    $('.cover-header').css('bottom', `${scrollTop*0.5}px`);
    $('.down-arrow').css('bottom', `-${scrollTop*0.3}px`);

});


