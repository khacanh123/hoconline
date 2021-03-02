// Get the modal
var modal = document.getElementById("myModal");

// Get the <div> element that closes the modal
var span = document.getElementsByClassName("close")[0];

  modal.style.display = "block";


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var vl = [];
  localStorage.setItem('dataCart',vl);
var dataC = localStorage.getItem('dataCart');
console.log(dataC);
var numberItem = 0;
var num = document.getElementById('numberItem');
num.innerHTML = numberItem;
var dataCart = localStorage.getItem('dataCart');

// dataCart.push()
$(document).on('click','.add-cart', function(){
  var id =   $(this).attr('data-id');
  var name = $(this).attr('data-name');
  var price = $(this).attr('data-price');
      $.ajax({
        type: 'POST',
        url: 'add-to-cart',
        data: {
         '_token': $('meta[name="csrf-token"]').attr('content'),
          'id': id,
          'name': name,
          'price': price
        },
        success: function (data){
          console.log(data);
          if(data.result == 1){
            alert('Lỗi: Bạn chưa đăng nhập');
            location.href = '/dang-nhap';
          }
          if(data.result == 2){
            numberItem = numberItem +1;
            num.innerHTML = numberItem;
            var $select = $('#cart-item');
    options = [];
    $.each(data.data, function(i , value) {
         options.push('<li class="nav-item" > <div class="item item-cart"> <div class="item-left"> <a href="/detail/'+value.id+'">'+value.name+'</a><p>'+Intl.NumberFormat( { style: 'currency', currency: 'VND' }).format(value.price)+'</p>  </div> </div> <div class="item-right"><button class="btn btn-xs btn-danger pull-right">x</button> </div></div></li>');
    });
    $select.html(options.join(""));
          }
          if(data.result == 3){
      alert('Khóa học này đã có trong giỏ hàng, vui lòng lựa chọn khóa học khác!');
          }
        }
      });
  // check giỏ hàng
  

})