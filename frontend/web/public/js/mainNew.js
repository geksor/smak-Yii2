$('.btn_mobile').on('click', function () {
    $('#menu').show('drop', 300, function () {
        $('#panel').addClass('blur');
    });
    $('#panel').addClass('menuOpen');
});

$('#mMenuClose').on('click', function () {
    $('#menu').hide('drop', 300, function () {
        $('#panel').removeClass('menuOpen')
    });
    $('#panel').removeClass('blur');
});


$(document).on('click', function (event) {
    if ($(event.target).closest(".noneClose").length
        || $(event.target).closest("#mess_block").length
        || !$(event.target).hasClass('popUp')) {
        return;
    }
    $('#ok').trigger('click');
    event.stopPropagation();
});


$('#ok').click(function () {
    $('#mess_block').css('display', 'none');
    $('.page').removeClass('popUp blur')
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
        $('#buttonUp').fadeIn().addClass('active');
    } else {
        $('#buttonUp').fadeOut().removeClass('active');
    }
});

$('#buttonUp').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
});

$('.service_Slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,

    prevArrow: '<button class="slideNavBtn serviceType__navBtn prev">\n' +
    '                                <svg\n' +
    '                                        xmlns="http://www.w3.org/2000/svg"\n' +
    '                                        xmlns:xlink="http://www.w3.org/1999/xlink"\n' +
    '                                        width="16px" height="9px">\n' +
    '                                    <path fill-rule="evenodd"\n' +
    '                                          d="M4.388,-0.000 L5.101,0.731 L1.929,3.983 L16.000,3.983 L16.000,5.017 L1.929,5.017 L5.101,8.269 L4.388,9.000 L-0.000,4.500 L4.388,-0.000 Z"/>\n' +
    '                                </svg>\n' +
    '                            </button>',

    nextArrow: '<button class="slideNavBtn serviceType__navBtn next">\n' +
    '                                <svg\n' +
    '                                        xmlns="http://www.w3.org/2000/svg"\n' +
    '                                        xmlns:xlink="http://www.w3.org/1999/xlink"\n' +
    '                                        width="16px" height="9px">\n' +
    '                                    <path fill-rule="evenodd"\n' +
    '                                          d="M11.612,-0.000 L10.899,0.731 L14.070,3.983 L-0.000,3.983 L-0.000,5.017 L14.070,5.017 L10.899,8.269 L11.612,9.000 L16.000,4.500 L11.612,-0.000 Z"/>\n' +
    '                                </svg>\n' +
    '                            </button>',
    appendArrows: $('.serviceType__navBlock'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('#course_select').on('change', function () {
    $('.courseTiming').removeClass('active');
    $($('#course_select').val()).addClass('active')
});

$('.toggleBlock').on('click', function () {
    console.log('toggleBlock click');
    $(this).find('.toggleBlock__toggle').slideToggle();
    $(this).find('.toggle__ico').toggleClass('open', function () {
        $(this).hasClass('open')? $(this).html('&ndash;') : $(this).html('&#43;');
    });
});

$('.newsMore').on('click', function () {
    var $fullText = $('.' + $(this).data('id'));
    var $buttonText = $(this).find('.buttonText');
    var $buttonIco = $(this).find('.buttonIco');

    $fullText.slideToggle();
    if ($(this).hasClass('more')){
        $buttonText.text('Свернуть');
        $buttonIco.find('svg').css('transform', 'rotate(180deg)');
        $(this).removeClass('more');
    }else {
        $buttonText.text('Продолжить чтение');
        $buttonIco.find('svg').removeAttr('style');
        $(this).addClass('more');
    }
});
$('.newsLess').on('click', function () {
    $('.' + $(this).data('id')).trigger('click');
});

$('#doctor_select').on('change', function () {
    $('.doctorTiming').removeClass('active');
    $($('#doctor_select').val()).addClass('active')
});

$('.phoneMask').mask('+7 (999)-999-99-99');
$('.insurance').mask('9999 9999 9999 9999',  {placeholder: "0000 0000 0000 0000" });

