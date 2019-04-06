$('.cd-trigger').on('click', function(event){
    $('.cd-quick-view').css({
       "top": topSelected, // this is the selected image top value
       "left": leftSelected, // this is the selected image left value
       "width": widthSelected, // this is the selected image width
    }).velocity({
       //animate the quick view: animate its width and center it in the viewport
       //during this animation, only the slider image is visible
       'width': sliderFinalWidth+'px',
       'left': finalLeft+'px', // ($(window).width - sliderFinalWidth)/2,
       'top': finalTop+ 'px', // ($(window).height - slider final height)/2,
    }, 1000, [ 400, 20 ])
    .velocity({
       'width': quickViewWidth+'px', // 80% of the viewport
       'left': quickViewLeft+'px', // 10% of the viewport
    }, 300, 'ease' ,function(){
       //show quick view content
       $('.cd-quick-view').addClass('add-content');
    }).addClass('is-visible');
    //assign .overlay-layer class to the body, assign the .empty-box class to the selected .cd-item
    //...
 });