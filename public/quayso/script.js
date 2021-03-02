//Thông số vòng quay
let duration = 10; //Thời gian kết thúc vòng quay
let spins    = 15; //Quay nhanh hay chậm 3, 8, 15
let giaithuong = '';
let theWheel = new Winwheel({
    'numSegments'  : 8,     // Chia 8 phần bằng nhau
    'outerRadius'  : 212,   // Đặt bán kính vòng quay
    'textFontSize' : 13,    // Đặt kích thước chữ
    'rotationAngle': 0,     // Đặt góc vòng quay từ 0 đến 360 độ.
    'segments'     :        // Các thành phần bao gồm màu sắc và văn bản.
    [
       {'fillStyle' : '#eae56f', 'text' : 'Tiền mặt 300.000 VNĐ '},
       {'fillStyle' : '#89f26e', 'text' : 'Voucher giảm giá 40%'},
       {'fillStyle' : '#7de6ef', 'text' : 'Voucher giảm giá 15%'},
       {'fillStyle' : '#e7706f', 'text' : 'Tiền mặt 100.000 VNĐ'},
       {'fillStyle' : '#eae56f', 'text' : 'Combo 3 khóa học bất kỳ'},
       {'fillStyle' : '#89f26e', 'text' : 'Học thử 2 tháng miễn phí'},
       {'fillStyle' : '#7de6ef', 'text' : 'Chúc bạn may mắn lần sau!'},
       {'fillStyle' : '#e7706f', 'text' : 'Tiền mặt 200.000 VNĐ'}
    ],
    'animation' : {
        'type'     : 'spinToStop',
        'duration' : duration,
        'spins'    : spins,
        'callbackSound'    : playSound,     //Hàm gọi âm thanh khi quay
        'soundTrigger'     : 'pin',         //Chỉ định chân là để kích hoạt âm thanh
        'callbackFinished' : alertPrize,    //Hàm hiển thị kết quả trúng giải thưởng
    },
    'pins' :
    {
        'number' : 32   //Số lượng chân. Chia đều xung quanh vòng quay.
    }
});

//Kiểm tra vòng quay
let wheelSpinning = false;

//Tạo âm thanh và tải tập tin tick.mp3.
let audio = new Audio('quayso/tick.mp3');
function playSound() {
    audio.pause();
    audio.currentTime = 0;
    audio.play();
}

//Hiển thị các nút vòng quay
function statusButton(status) {
    if ( status==1 ) { //trước khi quay
        document.getElementById('spin_start').removeAttribute("disabled");
    } else if ( status==2 ) { //đang quay
        document.getElementById('spin_start').setAttribute("disabled", false);
    } else if ( status==3 ) { //kết quả
        $.ajax({
            type: 'POST',
            url: '/spnit-result',
            data: {
               '_token': $('meta[name="csrf-token"]').attr('content'),
               'giaithuong': giaithuong
            },
            
        });
        location.href = '/quay-so';
    } else {
        alert('Các giá trị của status: 1, 2, 3');
    }
}
statusButton(1);

//stopAngle
function stopAngle() {
    //Ta có: 360 độ chia 8 bằng 45 độ cho mỗi giải thưởng.
    //VD: Giải 3 => Có gốc độ từ 91 đến 135.
    let start = 91;
    let stop = Math.floor((Math.random() * 43)); //Giá trị cao nhất 44
    let stopAt = start + stop;
    theWheel.animation.stopAngle = stopAt;
}

//startSpin
function startSpin() {
    // Ensure that spinning can't be clicked again while already running.
    if (wheelSpinning == false) {
        //CSS hiển thị button
        statusButton(2);
        
        //Đặt kết quả mong muốn
        stopAngle();
        
        //Hàm bắt đầu quay
        theWheel.startAnimation();

        //Khóa vòng quay
        wheelSpinning = true;
        console.log('hello');
        $.ajax({
            type: 'POST',
            url: '/spnit',
            data: {
               '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data){
                luot = data;
            }
        });
    }
}

//Result
function alertPrize(indicatedSegment) {
    alert("Chúc mừng bạn trúng: " + indicatedSegment.text);
    giaithuong = indicatedSegment.text;
    
    //CSS hiển thị button
    statusButton(3);
}

//resetWheel
function resetWheel() {
    //CSS hiển thị button
    statusButton(1);
    
    theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
    theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
    theWheel.draw();                // Call draw to render changes to the wheel.

    wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
}