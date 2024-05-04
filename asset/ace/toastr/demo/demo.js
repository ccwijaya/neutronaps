$(document).ready(()=>{
    let color = 'info';
    let align = 'center';

    $('.tr_info, .tr_success, .tr_notice, .tr_danger').on('click', e =>{
        e.preventDefault();
        color = e.target.getAttribute('data-color');
        toastr();
    });

    $('.tr_left, .tr_center, .tr_right').on('click', e => {
        e.preventDefault();
        align = e.target.getAttribute('data-align');
        toastr();
    });

    function toastr() {
        $(document).toastr({
            align: align,
            status: color,
            text_heading: color.toUpperCase(),
            text_body: 'jQueryScript.Net'
        });
    }


});
